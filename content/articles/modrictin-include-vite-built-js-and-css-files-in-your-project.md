---
title: How to include Vite built files in your Filament project
slug: modrictin-include-vite-built-js-and-css-files-in-your-project
author_slug: modrictin
publish_date: 2023-08-17
categories: [general,tailwind-css,panel-builder]
type_slug: trick
---

## The problem

What if you want to use the Vite build files in your Filament project?
You also want to utilize the HMR feature of Vite. How do you do that?

## The solution

You can use Vite facade to include the Vite build files in your Filament project.

In general, you can use the `Illuminate\Support\Facades\Vite` facade to include the Vite build files in your project.

### Get asset url

Please note, the second parameter in the `asset()` function is the build directory.

```php
Vite::useHotFile('admin.hot')
    ->asset('resources/sass/admin/app.scss','admin')
```

### Get asset html

```php
Vite::useHotFile('admin.hot')
    ->useBuildDirectory('admin')
    ->withEntryPoints(['resources/js/admin/app.js'])
    ->toHtml()
```

### Add assets to your filament project

You can do this multiple ways. 
You can add the assets to render hook in your panels, or you can add to your FilamentResources.

#### Add assets to render hook in your panels:

```php
class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
             ...
             ->renderHook('panels::head.start',
                fn(): string => Vite::useHotFile('admin.hot')
                    ->useBuildDirectory('admin')
                    ->withEntryPoints(['resources/js/admin/app.js'])->toHtml())
             ...
    }
}
```

#### Add assets to your FilamentResources:

Please read more about this here [FilamentResources](https://filamentphp.com/docs/3.x/support/assets).

```php
FilamentAsset::register([
    Css::make('admin-css', Vite::useHotFile('admin.hot')
       ->asset('resources/sass/admin/app.scss','admin'))
]);
```


## If you are coming from my other article

[Have multiple Vite and Tailwind bundles in your Filament project](https://filamentphp.com/community/modrictin-multiple-vite-and-tailwind-configs), 
You will notice that we are using the `useHotFile()` function, to specify the hot file.

**You dont have to use this.** you can skip straight to `::asset()` function if you are not using multiple
vite configurations.

### Conclusion

You can now include the Vite build files in your Filament project.

Please email me to [modrictin7@gmail.com](mailto:modrictin7@gmail.com) if you have any feedback, question or suggestion.
