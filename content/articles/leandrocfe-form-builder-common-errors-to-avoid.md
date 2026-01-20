---
title: Form Builder - Common Errors to Avoid
slug: leandrocfe-form-builder-common-errors-to-avoid
author_slug: leandrocfe
publish_date: 2024-11-23
categories: [form-builder, tailwind-css]
type_slug: article
---

## Introduction
As a member of the Filament community, I frequently respond to questions and issues raised in [Filament Discord](https://filamentphp.com/discord) and [Filament GitHub discussions](https://github.com/filamentphp/filament/discussions).
Many of these involve common mistakes that developers make while building forms in Filament.
In this article, I'll highlight some of these errors and show you how to avoid them.

> **_NOTE:_**  This article was written using [Filament v3.x](https://filamentphp.com/docs/3.x).

## Error 1: Using New Tailwind Classes Without Defining a Theme

Suppose you want to add a custom Tailwind class to the [helperText](https://filamentphp.com/docs/3.x/forms/fields/getting-started#adding-helper-text-below-the-field) of a [RichEditor](https://filamentphp.com/docs/3.x/forms/fields/rich-editor) component:

```php
RichEditor::make('content')
    ->columnSpanFull()
    ->helperText(new HtmlString(<<<'HTML'
    <div class="text-gray-700 dark:text-white py-4">
        You can use
        <a
            href="https://commonmark.org/help/"
            target="_blank"
            class="text-blue-500 font-bold hover:underline"
        >
            Markdown
        </a> to format your content.
    </div>
    HTML)
    ),
```

If you run this code without creating a custom theme, the new class **text-blue-500** will not be applied:
![HelperText without css applied](https://github.com/leandrocfe/filament-articles/blob/main/form-builder/images/img1.png?raw=true)

### Why?
Tailwind CSS compiles only classes explicitly referenced in scanned files. Classes dynamically added in your Blade files will be ignored unless you configure Tailwind to scan those files.

### Solution:
- Create a [custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme).
- Follow the instructions in the command:
    - _First, add a new item to the `input` array of `vite.config.js`: `resources/css/filament/admin/theme.css`_
    - _Next, register the theme in the admin panel provider using `->viteTheme('resources/css/filament/admin/theme.css')`_

- Update the content array in your `tailwind.config.js` to include the relevant directory:
```js
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        //...
    ],
}
```
- Finally, run `npm run dev` or `npm run build` to compile the theme.

After following these steps, the custom class will be applied successfully:

![HelperText with css applied](https://github.com/leandrocfe/filament-articles/blob/main/form-builder/images/img2.png?raw=true)

## Error 2: Misusing the `default()` Method in Form Components

Here's an example of a [TagsInput](https://filamentphp.com/docs/3.x/forms/fields/tags-input) component with default tags in a PostResource:

```php
TagsInput::make('tags')
    ->default([
        'Laravel',
        'Livewire',
        'Filament',
    ]),
```

This works perfectly on a Create Page:

![Default in the CreatePage](https://github.com/leandrocfe/filament-articles/blob/main/form-builder/images/img3.png?raw=true)

However, if you edit a post with no tags, the defaults won't apply:

![Default in the EditPage](https://github.com/leandrocfe/filament-articles/blob/main/form-builder/images/img4.png?raw=true)

### Why?
As the [docs say](https://filamentphp.com/docs/3.x/forms/fields/getting-started#setting-a-default-value), _defaults are only used when the form is loaded without existing data. Inside panel resources this only works on Create Pages, as Edit Pages will always fill the data from the model._

In this case, the value is `null`, which is correct on the Edit Page.

If you want to force the input to have a default value on the Edit Page if the value is `null`, you should use the `formatStateUsing()` method:

```php
TagsInput::make('tags')
    ->formatStateUsing(fn (?array $state): array => blank($state) ? [
        'Laravel',
        'Livewire',
        'Filament',
    ] : $state),
```

## Error 3: Combining `options()` and `relationship()` Methods in Select Components

When using a [Select](https://filamentphp.com/docs/3.x/forms/fields/select) or [CheckboxList](https://filamentphp.com/docs/3.x/forms/fields/checkbox-list) component with a `relationship()`, avoid also defining `options()`. For instance:

```php
Select::make('categories')
    ->multiple()
    ->preload()
    ->relationship(
        name: 'categories',
        titleAttribute: 'name'
    )
    ->options(Category::wherePublished(true)->pluck('name', 'id')), // Don't use this
```
### Why?
The `relationship` method already fetches `options` from the database using relationship methods in your Eloquent models.

### Solution:
Use the [modifyQueryUsing()](https://filamentphp.com/docs/3.x/forms/fields/select#customizing-the-relationship-query) method to customize the query:

```php
Select::make('categories')
    ->multiple()
    ->preload()
    ->relationship(
        name: 'categories',
        titleAttribute: 'name',
        modifyQueryUsing: fn (Builder $query): Builder => $query->wherePublished(true)),
```

## Error 4: Incorrectly Using a Wizard Component in Resource Pages
Using a [Wizard](https://filamentphp.com/docs/3.x/forms/layout/wizard) component directly in a Resource can result in both navigation and form buttons appearing simultaneously:

![Wizard example](https://github.com/leandrocfe/filament-articles/blob/main/form-builder/images/img5.png?raw=true)

### Why?
The [Wizard](https://filamentphp.com/docs/3.x/forms/layout/wizard) component has its own navigation buttons.

### Solution:
Use the `HasWizard` trait in your Resource Pages:

Create Page:
```php
use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;
 
class CreateCategory extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    
    protected static string $resource = CategoryResource::class;
 
    protected function getSteps(): array
    {
        return [
            // ...
        ];
    }
}
```

Edit Page:
```php
use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\EditRecord;
 
class EditCategory extends EditRecord
{
    use EditRecord\Concerns\HasWizard;
    
    protected static string $resource = CategoryResource::class;
 
    protected function getSteps(): array
    {
        return [
            // ...
        ];
    }
}
```

To implement a [Wizard within an Action](https://filamentphp.com/docs/3.x/actions/prebuilt-actions/create#using-a-wizard), use the `steps()` method:

```php
CreateAction::make()
    ->steps([
        // ...
    ]),
```

This ensures proper functionality by displaying only the navigation buttons.

## Error 5: Forgetting Key Steps in Standalone Mode

Filament provides a [Standalone Mode](https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component) to build forms.
When using Filament's Standalone Mode in a Livewire component, missing [key steps](https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component#adding-the-form) can cause unexpected behavior.
For example:

```php
class CreateCategory extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill(); // Important for initializing the form
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('slug'),
                ...
            ])
            ->statePath('data'); // Important for storing form data
    }
    ...
}
```

### Solution:
Ensure you are following these [key steps](https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component#adding-the-form) when using **Standalone Mode**.

If you omit `statePath()`, ensure that [public properties](https://livewire.laravel.com/docs/properties) exist for each [Form Field](https://filamentphp.com/docs/3.x/forms/fields/getting-started):

```php
class CreateCategory extends Component implements HasForms
{
    use InteractsWithForms;
    
    // Add public properties for each field in the form schema
    public ?string $name = null;
    public ?string $slug = null;
    ...
    
    public function mount(): void
    {
        $this->form->fill();
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('slug'),
                ...
            ]);
    }
    ...
}
```

## Conclusion
Avoiding these common errors will save you time and provide a smoother development experience with Filament.
Additionally, it will deepen your understanding of Filament's features, enabling you to create more maintainable and reliable forms for your projects.

Happy coding ;)
