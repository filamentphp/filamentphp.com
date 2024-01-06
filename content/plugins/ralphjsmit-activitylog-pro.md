---
name: Activitylog Pro
slug: ralphjsmit-activitylog-pro
author_slug: ralphjsmit
categories: [analytics, developer-tool, kit, panel-builder, action, form-builder, form-field, infolist-entry, spatie]
checkout_url: https://ralphjsmit.com/filament-plugins/filament-activitylog-pro/configure?referer=filament
price: €59.00
description: Easily add beautiful timelines to your Filament apps – inside panels or stand-alone. Integrates with Spatie Activitylog.  
discord_url: https://discord.com/channels/....
github_repository: ralphjsmit/laravel-filament-activitylog
has_dark_theme: true
has_translations: true
versions: [3]
publish_date: 2024-01-08
---

This packages allows you to easily integrate beautiful timelines into your Filament app, including outside the admin panel, allowing you to display timelines with **minimal effort**. The package integrates [Spatie Activitylog](https://pulse.laravel.com/) into [Filament](https://filamentphp.com/) and it **works out-of-the-box** with the underlying activitylog. Therefore, this package is great way to get a **premium activitylog** in your app for new projects, but also for existing projects that already have recorded events using the Spatie Activitylog.

The package supports both form & infolist components, includes special actions for tables & pages, and allows you to easily extend the timelime with additional actions.

# Features

- Form & infolist components for the **activity timeline** with many **configuration** options. 💛
- Timelines in many beautiful variations.
- Searchable, compact & scrollable timelines. ✨
- Include custom **actions** inside your timelines.
- Timeline action components to use in tables & pages.
- Support for displaying activity **batches**. ✍️
- Easy global configuration of icons, colors, actions, descriptions & more. 🚀
- Beautiful design & integration with Filament Admin.
- Works **outside** the admin panel in all forms, infolists & tables.
- Support for dark mode. 🌚
- Fully & easily translatable.
- Works out-of-the-box with model events. ⚡️

# Screenshots

## Timeline form/infolist component

The timeline component will work out-of-the-box in any Filament form or infolist, also outside the admin panel. It looks like this:

![Default timeline](https://ralphjsmit.com/storage/media/268/responsive-images/Timeline-Light___responsive_2262_1627.jpg)

As you see in the above image, placing the timeline inside a `Section` works really well. The timeline looks great in dark mode also:

![Timeline dark mode](https://ralphjsmit.com/storage/media/267/responsive-images/Timeline-Dark___responsive_2262_1627.jpg)

Another option would be to place the timeline directly on the page. This makes the timeline feel more 'supplemental' to the main content of the page:

![Timeline Without Section](https://ralphjsmit.com/storage/media/276/responsive-images/Timeline-Without-Section___responsive_2255_1627.jpg)

All icons & colors in the timeline are fully customizable. You can also add actions to the timeline, including actions that can open modals. The actions will be displayed beneath each item in the timeline:

![Timeline Action](https://ralphjsmit.com/storage/media/278/responsive-images/Timeline-Actions___responsive_1354_1586.jpg)

If you hover over a timestamp, you can see the exact date & time of the activity:

![Timeline Time](https://ralphjsmit.com/storage/media/275/responsive-images/Timeline-Time___responsive_1466_570.jpg)

Next, you can also allow your users to search through the timeline. The searching is done all in the browser, so this will feel super-snappy 👌

![Timeline Search](https://ralphjsmit.com/storage/media/270/responsive-images/Timeline-Search___responsive_1466_614.jpg)

![Timeline Search Dark](https://ralphjsmit.com/storage/media/272/responsive-images/Timeline-search-dark___responsive_1466_526.jpg)

The timeline has automatic support for displaying activities that were logged in batches (e.g. activities related to each other). These batches are by default shown as an indented, compact sub-timeline, but still connected to the main timeline.

However, you can also choose to display the batch inline with the main timeline. The items will now be merged with the main timeline:

![Timeline inline batch](https://ralphjsmit.com/storage/media/277/responsive-images/Timeline-Inlined-Batches___responsive_1497_1328.jpg)

The timeline also comes with a special compact design, which is especially useful when you have many activities. As you can see, the timeline is re-designed to occopy less space:

![Timeline Compact Light](https://ralphjsmit.com/storage/media/265/responsive-images/Timeline-Compact-Light___responsive_1416_1384.jpg)

Of course, this looks great in dark mode as well:

![Timeline Compact Dark](https://ralphjsmit.com/storage/media/264/responsive-images/Timeline-Compact-Dark___responsive_1416_1384.jpg)

If you want to limit the space used by the timeline even more, you can set a maximum height. The timeline will then become scrollable if the content exceeds the maximum height.

If there are no activities logged yet, the timeline will display an empty state. You can style the empty state as you wish, by providing a custom text, custom description and custom icon:

![Timeline empty state](https://ralphjsmit.com/storage/media/260/responsive-images/Empty-State-Default___responsive_1362_604.jpg)

## Timeline Actions

The package also provides a nice Timeline action that you can use in your tables & pages. For example, the page action can be placed in the `getHeaderActions()` method, on the top-level or in an `ActionGroup`:

![Timeline Page Action](https://ralphjsmit.com/storage/media/271/responsive-images/Timeline-Page-Action-Ligh___responsive_2262_1627.jpg)

![Timeline Page Action Dark](https://ralphjsmit.com/storage/media/269/responsive-images/Timeline-Page-Action-Dark___responsive_2262_1627.jpg)

The action also has a special version for use in tables:

![Timeline Table Action](https://ralphjsmit.com/storage/media/274/responsive-images/Timeline-Table-Action-Light-___responsive_2262_1627.jpg)

![Timeline Table Action Dark](https://ralphjsmit.com/storage/media/273/responsive-images/Timeline-Table-Action-Dark___responsive_2262_1627.jpg)

# Installation guide: Filament Activitylog Pro

Thank you for purchasing the Activitylog Pro plugin for Filament Admin!

We tried to make the plugin as **easy-to-install** and **versatile** as possible. Nevertheless, if you still have a **question or a feature request**, please send an e-mail to **support@ralphjsmit.com**.

## Prerequisites

Before starting the further installation, you should already have the Spatie Activitylog package installed according to the [Spatie Activitylog installation guide](https://spatie.be/docs/laravel-activitylog/v4/installation-and-setup).

If you already have the Spatie Activitylog installed in your project and already recorded data, you can immediately proceed to the next step.

The package is supported on Laravel 10 or higher and Filament V3.

### Installation via Composer

To install the package you should add the following lines to your `composer.json` file in the `repositories` key in order to get access to the private package:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "https://satis.ralphjsmit.com"
        }
    ]
}
```

> If you have one of my other premium packages installed already, then you don't need to repeat these lines.

Next, you should require the package via the command line. You will be prompted for your username (which is your e-mail) and your password (which is your license key, e.g. `8c21df8f-6273-4932-b4ba-8bcc723ef500`).

```bash
composer require ralphjsmit/laravel-filament-activitylog
```

### Add plugin Blade files to `tailwind.config.js`

For all panels that you want to use the package in, make sure that you have created a [Filament custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme). Next, for each theme, you need to add the following line to the `tailwind.config.js` file:

```js
content: [
    // Your other files
    './vendor/ralphjsmit/laravel-filament-activitylog/resources/**/*.blade.php',
],
```

If you are using the plugin outside the admin panel, then make sure to include the above line in the `tailwind.config.js`'s that are used to generate the CSS for the Livewire components where you will use the timeline in.

### Configuring the plugin per-panel

The Filament Activitylog Pro package works in all forms, tables & infolists, irrespective of whether you also have a Filament panel or not. This means that you can nicely include the Activitylog in your app, anywhere you want and wherever you have a form, table or infolist.

If you do decide to use the Filament Activitylog package in a panel, then you should register the plugin in the `$panel` providers that you want to use the plugin in:

```php
use RalphJSmit\Filament\Activitylog\FilamentActivitylog;
 
$panel
    ->plugin(FilamentActivitylog::make())
```

There currently are no configuration methods on the plugin itself. However, it is best practice in Filament V3 to register plugins in the panels that a plugin is used in. Also, if it ever becomes necessary in the future to add per-panel configuration methods to the plugin, then I will be able to do so without needing a breaking change.

# Usage

In general, the underlying `spatie/laravel-activitylog` package allows two things:

1. Automatically **log model events** on Eloquent models.
2. Log **custom events** & associate them with Eloquent models.

## Logging model events

For information about logging model events and how to set it up, see the [Spatie documentation](https://spatie.be/docs/laravel-activitylog/v4/advanced-usage/logging-model-events). I would recommend to enable logging these model events first, and using them as the basis of your timelines.

## Custom events

### Terminology

When logging custom activities, there are four main properties relevant to each activity log:

1. **Subject** – the Eloquent model on which the event was logged.
2. **Causer** – the Eloquent model for (usually) the User that caused the event, or `null` when no user was logged.
3. **Event** - the programmatic name of the event as a verb in the past tense. Examples: `created`, `updated`, `deleted`, `restored`, but can also be custom events like `published`, `unpublished`, `archived`, `verified`, etc.
4. **Description** – most of the time identical to the event name, but can also be a human-readable description.

### Logging custom events

It is required to always **include an event name** in the activity. For example, let's say that we want to log a `'published'` event on a `Post` model. We can do this as follows:

```php
$post = Post::find(1);
$johnDoe = User::firstWhere('email', 'johndoe@example.com');

$post->touched('published_at');

activity()
    ->performedOn($post)
    ->causedBy($johnDoe) // Not necessary if there is an authenticated user.
    ->event('published') 
    ->log('published'); // Keep log description identical to the event name, OR provide a custom description.   
```

By default, this will show an item in the timeline with the following description:

> John Doe published the post.

### Displaying the causer name

The name of the causer is automatically inferred from the causer model using following steps:

1. If the causer model implements the `Filament\Models\Contracts\FilamentUser` contract, then the `getFilamentName()` method will be used.
2. If the causer model has an attribute called `name`, then this attribute will be used.
3. If the causer model has an attribute called `first_name` and/or `last_name`, then these attributes will be used.
4. Otherwise, no name for the causer will be included ("The post was published.").

### Displaying/logging custom descriptions

Usually, the description of the activity (the string passed to the `->log('...')` method) will be the **same as the event name**. If that is the case, then the package will automatically construct a nice human-readable string.

If you want to log a **custom description** instead, you can do that as well:

```php
activity()
    ->performedOn($post)
    ->event('published')
    ->log('This is a custom description');    
```

Keep in mind though that this description is stored directly in the database and therefore also not translatable. If you want to use a custom description that is translatable, use the `->eventDescription()` method on the component instead (see below).

If you want, you can use inline markdown to apply formatting like bold or italic.

### Logging activity in batches

The Spatie Activitylog package allows you to **log activity in batches**. You can consider a batch as a group of actions that are performed together in one go. Each timeline can display the batches and the linked activities.

You can start a new batch as follows:

```php
LogBatch::startBatch();

$post->touch('published_at');
$post->tweet()->create(['content' => 'Check out my new blog post ✍️']);
$post->draftPosts->each(fn (DraftPost $draftPost) => $draftPost->delete());

LogBatch::endBatch();
```

You can also start and end a batch using a closure, similar to a database transaction:

```php
LogBatch::withinBatch(function () {
    // ...
});
```

This is the basics about batches, but there are some gotchas relating to e.g. queue jobs. You can read more about that in the [documentation](https://spatie.be/docs/laravel-activitylog/v4/advanced-usage/batch-logs).

## Form component (timeline)

The timeline form component can be used in your **forms to display a timeline** of the activities related to the current form record. The timeline will automatically be filled with the activities that happened to the current Eloquent model:

```php
use RalphJSmit\Filament\Activitylog\Forms\Components\Timeline;

Timeline::make()
    ->label('History'),    
```

In general, you don't have data yet on pages where you create an item. Therefore, by default, the timeline will hide itself on pages where `$operation === 'create'`, so you don't need to manually hide the timeline on create pages. If you still want to show it, just pass `->visible(true)` to the component.

If the timeline is empty (meaning that there are no activities yet displayed), then the timeline will display an empty state, which you can also customize (see below).

### Customizing timeline items

#### Icons & colors

By default, each item in the timeline will be a small, gray dot. You can **customize the icon and color** of each item using the `->itemIcon()` and `->itemIconColor()` methods.

```php
use Spatie\Activitylog\Models\Activity;

Timeline::make()
    // You can let the package inject both the actual `Activity` Eloquent model, or just the string/nullable event name:
    ->itemIcon('created', 'heroicon-o-plus-circle')
    ->itemIcon('deleted', 'heroicon-o-trash')
    ->itemIcons([
        'created' => fn (Activity $activity) => $activity->causer->isAdmin() ? 'heroicon-o-plus' : 'heroicon-o-plus-small',
        'deleted' => 'heroicon-o-trash',
    ])
    ->itemIconColor('created', 'info')
    ->itemIconColor('deleted', 'danger')
    ->itemIconColors([
        'created' => 'info',
        'deleted' => 'danger',
    ]),
```

> Tip: generally, in a single timeline, it is nice to use a combination of both items with and without an icon. For example, you could consider giving "major" activity events an icon, like 'created' or 'deleted', whereas you could leave other events (like 'updated') without an icon.

Instead of strings, you can also pass custom closures. You can let the package inject both the actual `Activity` Eloquent model, or just the string/nullable event name:

```php
use Spatie\Activitylog\Models\Activity;

Timeline::make()
    ->itemIcon('created', fn (string $event, Activity $activity) => /** */)
    ->itemIconColor('created', fn (string $event, Activity $activity) => /** */)
```

You can also scope the icons & colors to specific Eloquent models. This can be useful in cases where you have a timeline with activities for multiple types of Eloquent models (e.g. when working with batches), and you only want to apply a certain icon or color to one or more particular models.

```php
Timeline::make()
    ->itemIcon('created', 'heroicon-o-plus-circle', [Post::class]) // Either array of classes or a single class.
    ->itemIconColor('created', 'success', Post::class)
```

#### Actions

You can easily **add actions** to the timeline using the `->itemActions()` method. This method allows you to specify the event name and provide an array of actions that will be displayed beneath each item in the timeline.

The below example shows how to add actions for the `'published'` event on a `Post` model:

```php
use Filament\Forms;

Timeline::make()
    ->itemActions('published', [
          Forms\Components\Actions\Action::make('view_url_in_search_console')
            ->label('Open Google Search Console')
            ->icon('heroicon-m-magnifying-glass')
            ->url(fn (Post $post) => "https://search.google.com/...."),
          Forms\Components\Actions\Action::make('create_tweet')
            ->label('Send Tweet')
            ->icon('heroicon-m-megaphone')
            ->hidden(fn (Post $post) => $post->tweeted_at !== null)
            ->form([
                Forms\Components\Textarea::make('content')
                    ->label('Tweet')
                    ->helperText('Max. 280 characters')
                    ->maxLength(280)
                    ->required()
            ])
            ->action(function (Post $post, array $data) {
                // Send tweet...
                
                $post->touch('tweeted_at');
                
                // Of course, we will also log a new activity to the timeline :)
                activity()
                    ->performedOn($post)
                    ->causedBy(auth()->user())
                    ->event('tweeted')
                    ->log('tweeted');
                
                Notification::make()
                    ->title('Tweet sent')
                    ->body('Let\'s hope our followers like it as much as we do 🙏')
                    ->success()
                    ->send();
            })
        ])
    ]),
```

#### Define icons, colors & actions globally

If you want to **globally provide icons, colors and actions**, you can make use of the Filament `configureUsing()` method. When working globally with timelines, it is generally very handy to scope the configuration to specific models:

```php
Timeline::configureUsing(function (Timeline $timeline) {
   return $timeline
        ->itemIcons([
            // Applies to all Eloquent models...
            'created' => 'heroicon-o-plus-circle',
            'deleted' => 'heroicon-o-trash',
        ])
        ->itemIcon('created', 'heroicon-o-pencil', [Post::class, GlossaryItem::class]) // Applies only to `Post` and `GlossaryItem` model.
        ->itemIcon('created', null, User::class) // Disables icon for the `User` model.
        ->itemIconColors([
            'created' => 'info',
            'deleted' => 'danger',
        ])
        ->itemActions(
            event: 'published',
            actions: [
                // ...
            ],
            subjectScopes: [Post::class],
        )
});
```

These globals are kept as defaults. If you provide a custom override on any individual timeline, then that value will override the global defaults.

#### Descriptions

By default, the Filament Activitylog package will **generate a nice description** for you based on the event name and whether or not there's a causer name (see above). If you want to override the description for individual events, you can do so via the `->eventDescription()` method:

```php
Timeline::make()
    ->eventDescription('published', 'Post is now shared with the world 🌎') // Instead of: John Doe published the post.
```

You can scope the custom descriptions also to specific Eloquent models:

```php
use App\Models\Post;

Timeline::make()
    ->eventDescription('published', 'Post is now shared with the world 🌎', [Post::class]) // Apply description only to `Post` models and not to `Tweet` models. 
```

You can also set descriptions in bulk:

```php
use Spatie\Activitylog\Models\Activity;

Timeline::make()
    ->eventDescriptions(
        descriptions: [
            'created' => fn (Activity $activity) => "{$activity->causer->full_name} started a draft post",
            'published' => 'Post is now shared with the world 🌎',
        ], 
        subjectScopes: [Post::class]
    )
```

#### Formatting attribute values

If you have enabled the logging of changed attributes, the timeline will automatically display changed attributes in the description for the `updated` event. For example, consider the following changed attributes:

```php
[
    'title' => 'New title',
    'some_boolean' => true,
    'some_date' => Carbon::parse('2024-01-01 10:00'),
]
```

The package will automatically generate a description like this:

> **[Causer name]** updated **title** to **New title**, **some boolean** to **true** and **some date** to **2024-01-01 10:00**.

As you can see, the package automatically formats the values of the attributes in a human-readable way. Strings are kept, booleans are converted to `'true'`/`'false'` in text, arrays are converted to JSON, enums are converted to either their name or to the `getLabel()` method if you implemented the `Filament\Support\Contracts\HasLabel` interface and dates are converted to a better format.

#### Formatting attribute labels

For getting the human-readable names of the attributes, the package will first automatically and intelligently check whether there is any other form component on the page that has a custom label for this attribute. For example, if you have a `DatePicker::make('some_date')->label('Published at')`, then the package will automatically use the label `'published at'`.

You can also **provide custom labels** for attributes by using the `->attributeLabel()` or `->attributeLabels()` method:

```php
Timeline::make()
  ->attributeLabel('some_date', 'published at')
  ->attributeLabel('some_date', fn () => 'published at')
  ->attributeLabels([
      'some_boolean' => 'is hidden from SEO',
  ]),
```

Finally, if there is still no attribute label found, the package will automatically try to convert the attribute name to a human-readable label. For example, `some_date` will be converted to `some date`.

### Activity batches

By default, if the package detects that an event belongs to a batch, it will **display the batch** in a compact, **inline timeline**. The inline timeline will be 'connected' to the "main" timeline. This looks nice and can be very useful to your users to view related events together.

If you don't have the room for an inline timeline, you can also opt to display the batch **inline**. This means that the activity items from the batch will be shown inline with the main timeline items, just as if the items from the batch was part of the main timeline.

```php
Timeline::make()
    ->inlineBatches(),
```

### Customizing empty state

When the timeline is empty, it will show an empty state (similar to how the empty state looks in Filament tables). You can **customize the empty state** using the following methods:

```php
Timeline::make()
    ->emptyStateHeading('No history')
    ->emptyStateDescription('Nothing has happened to this Eloquent model.')
    ->emptyStateIcon('heroicon-o-bars-arrow-down'),  
```

### Compact timeline

By default, the timeline has a very nice design, but with a larger number of activities it can take up a lot of space. To solve this, you can opt to make use of the `->compact()` option, which will provide a **more compact design**:

```php
Timeline::make()
    ->compact(),
```

If you want to make all timelines compact by default, you can configure that globally:

```php
Timeline::configureUsing(fn (Timeline $timeline) => $timeline->compact());
```

#### Heroicon Mini icons

If you use a compact timeline, it generally looks better to use icons from the `heroicons-m-` set instead of the `heroicons-o-` set, because the [Heroicon Mini](https://heroicons.com/mini) versions are designed for smaller sizes. On compact timelines, the package will automatically convert icons from the `heroicons-o-` set to the `heroicons-m-` set, and vice-versa on non-compact timelines.

If you want to disable this, you can do so passing `false` to the `->convertHeroicons()` method:

```php
Timeline::make()
    ->convertHeroicons(false),
```
```php
Timeline::configureUsing(fn (Timeline $timeline) => $timeline->convertHeroicons(false));
```

### Searchable timelines

If you have many activities in your timeline, you might want to make the **timeline searchable**:

```php
Timeline::make()
    ->searchable(),
```

This will display a small text input above the timeline. Whenever a user types a search query in the input, it will look through the descriptions of all activities using JavaScript, and only display the activities that match the search query.

### Maximum height

If you have a timeline with many activities, you might want to define a **maximum height** for the timeline. This will make the timeline scrollable:

```php
Timeline::make()
    ->maxHeight() // Default 500px
    ->maxHeight(800) // 800 px
    ->maxHeight('50vh') // Any CSS value
```

### Getting custom activities

By default, the timeline will assume that your current Eloquent model has the `LogsActivity` trait. In that case, your model has an `activities()` relationship and the timeline assumes that you want to display these activities. If you want override this or provide different logic for determining which activities to dispay, you can provide a custom callback to the `getActivitiesUsing()` method available on all the components:

```php
Timeline::make()
    ->getActivitiesUsing(function () {
        return Activity::get(); // Provide the activities as you wish.
    }),
```

### Tip: hiding label

Usually the design of the timeline will be clear enough to the user what it represents, so hiding the label will make the end result cleaner. You can hide the label using the `->hiddenLabel()` method:

```php
Timeline::make()
    ->hiddenLabel(),
```

## Infolist component (timeline)

The timeline component is also available as an **infolist component**. The `Timeline` infolist component will function exactly the same as the form `Timeline` component, and therefore will also have all the same methods as the timeline in the form:

```php
use RalphJSmit\Filament\Activitylog\Infolists\Components\Timeline;

Timeline::make()
    ->itemIcon('created', 'heroicon-o-plus')
    ->itemIconColor('created', 'info')
    ->itemActions('published', [
        // ...
    ])
    ->eventDescription('published', 'Post is now shared with the world 🌎')
    ->emptyStateHeading('No history')
    // ... 
```

### Adding actions to infolist timelines

When adding actions to timelines in infolists, you should logically use `Filament\Infolists\Components\Actions\Action` as action classes instead of the `Filament\Forms\Components\Actions\Action` class.

## Actions

### Page action (timeline)

You can use the `RalphJSmit\Filament\Activitylog\Actions\TimelineAction` action in your pages to display a button that will open the timeline of the record in a modal slideover:

```php
class EditPost extends EditRecord
{
    // ...
    
    public function getHeaderActions(): array
    {
        return [
             RalphJSmit\Filament\Activitylog\Actions\TimelineAction::make(),
        ];
    }
}
```

Of course, you can chain any of the methods available on the default action component to tweak the action to your liking.

The timeline in the slide-over is displayed using an infolist `Timeline` component. You can customize the component by passing a callback to the `modifyTimelineUsing()` method:

```php
TimelineAction::make()
    ->modifyTimelineUsing(function (Timeline $timeline) {
        return $timeline->compact()->searchable();
    }),
```

### Table action (timeline)

You can use the `RalphJSmit\Filament\Activitylog\Tables\Actions\TimelineAction` action in your tables to display a button that will open the timeline of the record in a modal slideover:

```php
$table
    ->actions([
        RalphJSmit\Filament\Activitylog\Tables\Actions\TimelineAction::make()
    ]);
```

The timeline in the slide-over is displayed using an infolist `Timeline` component. You can customize the component by passing a callback to the `modifyTimelineUsing()` method:

```php
TimelineAction::make()
    ->modifyTimelineUsing(function (Timeline $timeline) {
        return $timeline->compact()->searchable();
    }),
```

## Roadmap

I hope this package will be useful to you! If you have any ideas or suggestions on how to make it more useful, please let me know (support@ralphjsmit.com).

## Support

If you have a question, bug or feature request, please e-mail me at support@ralphjsmit.com or tag @ralphjsmit on [#activitylog-pro](#) on Discord. Love to hear from you!

🙋‍ [Ralph J. Smit](https://ralphjsmit.com)
