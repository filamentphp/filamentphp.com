---
title: "Filament Custom Themes - The Full Guide"
slug: diogogpinto-filament-themes-full-guide
author_slug: diogogpinto
publish_date: 2024-29-10
categories: [panel-builder]
type_slug: article
---

Welcome to this "full guide" on how to create a custom theme in Filament v3.

Are you looking to elevate your Filament v3 Panels with a unique appearance? This in-depth guide will take you beyond the basics covered in the official documentation.

## Resources

I would recommend checking the following resources if you haven't already.

- [Filament Official Documentation](https://filamentphp.com/docs/)
    - [Filament Official Documentation on Themes](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme)
    - [Filament Official Documentation on Style Customization](https://filamentphp.com/docs/3.x/support/style-customization)
- [Tailwind Official Documentation](https://tailwindcss.com/docs/installation)

## Before You Start

I am assuming you already have a Filament Panel setup. If you don't have one, please set up a panel using the [official documentation guide](https://filamentphp.com/docs/3.x/panels/getting-started).

## Creating a theme

In this example, we will be creating a custom theme for Filament's default panel, the `admin`panel.

> [!note]
> The same steps apply for any other panel you may have in your Filament project

### Creating the theme using the terminal

In your project's root directory, run:

```bash
php artisan make:filament-theme
```

It will scan your app for all the panels you have installed and let you select which panel this themes applies to. Select the panel which you wish to customize. In this particular case, we will select the panel `admin`.

![Create Theme Terminal Command](/images/content/articles/diogogpinto-filament-themes-full-guide/create-theme.webp)

After you've selected the panel, the terminal will give you all further instructions, but we'll go by each one step by step.

![After Creating the Theme](/images/content/articles/diogogpinto-filament-themes-full-guide/after-create-theme.webp)

#### Editing vite.config.js

Go to the `vite.config.js` file in your project's root directory and set the input array like below:

```javascript
import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel.default({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // Add the following line of code
                'resources/css/filament/admin/theme.css'
            ],
            refresh: [
                ...refreshPaths,
                'app/Filament/**',
                'app/Forms/Components/**',
                'app/Livewire/**',
                'app/Infolists/Components/**',
                'app/Providers/Filament/**',
                'app/Tables/Columns/**',
            ],
        }),
    ],
})
```

See how we've added `resources/css/filament/admin/theme.css` to that array? This will tell vite where our custom theme is located when running the build process.

>[!note]
> If you have other themes for other panels, you can add them in the same array. This vite config file can contain as many themes for as many panels as you like!

#### Registering the viteTheme() on our panel

Now we shall edit the `AdminPanelProvider.php` file and add the viteTheme method to our `$panel`, like the example below:

```php
return $panel
    ->id('admin')
    ->viteTheme('resources/css/filament/admin/theme.css') // Added this line of code
```

Our panel now knows we are using a custom theme and what our theme path is.

#### Running the build process

![Build Process](/images/content/articles/diogogpinto-filament-themes-full-guide/npm-run-build.webp)

At last, we shall run the build process with the terminal in our project's root directory:

```bash
npm run build
```

### Registering vendor files from Filament Plugins

Sometimes, when installing plugins like [Auth UI Enhancer](https://www.github.com/diogogpinto/filament-auth-ui-enhancer) or [Filament Curator](https://github.com/awcodes/filament-curator), for example, the docs may say something to the effect of:

> 1. Add the plugin's views to your tailwind.config.js file.
> ```javascript
> content: [
>     './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
> ]
> ```

#### What does this mean?

We need to make sure that - when we start the building process - `vite` will check the files in the paths specified in the `content`array and collect all used CSS classes in the plugin views. It will then compile all used CSS classes into the one single CSS file in your Filament panel.

So, in our case, installing `Auth UI Enhancer` and `Curator`plugin in our panel, we will go to `resources/css/filament/admin/tailwind.config.js`and edit it like the code below:

```js
import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Clusters/Products/**/*.php',
        './resources/views/filament/clusters/products/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        // Added the following lines of code
        './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
    ],
}
```

Additionally, in the case of the `Curator` plugin, the author requires you to import some CSS files in your `theme.css`. This can be done, by editing the file `resources/css/filament/admin/theme.css` and making it look like below:

```css
@import '/vendor/filament/filament/resources/css/theme.css';
@import '/node_modules/cropperjs/dist/cropper.css';
@import '/vendor/awcodes/filament-curator/resources/css/plugin.css';

@config 'tailwind.config.js';
```

This last step imports all custom classes needed by the plugin to render correctly. It imports the class, puts into our panel's unique CSS file and minimizes it all for greater performance.

#### Running the build process

When installing plugins and editing any theme related files, always remember to run `npm run build` when you're finished to compile all the assets.

## Customizing the theme

Laravel, and Filament being Laravel based, offer multiple solutions to the same problem. So, we will address two ways of building your own Filament look and feel, the recommended way and the not-so-recommended way. Let's start with the latter.

### Before starting the customization process

You should start the `npm run dev` process in the root of your project. This process watches for changes in the files registered in the `vite.config.js` (and `tailwind.config.js` by extension) and automatically builds a temporary CSS file to render the changes on file save.

> [!note]
> You still need to run `npm run build` when you're done customizing your theme

### The recommended way to customize your theme

The Filament panels core offers you a list of classes. Every component of the panel layout, including forms, infolists and tables, were wrapped in custom classes to make it possible, for any developer, to customize the panel look and feel. Let's look at the following example:

![Breadcrumb Example](/images/content/articles/diogogpinto-filament-themes-full-guide/breadcrumb-example.webp)

Looking at the breadcrumb component with Chrome's builtin Developer Tools > Inspect Element, you can see that the `<nav>`na tag contains the following classes:

```html
<nav class="fi-breadcrumbs mb-2 hidden sm:block">
```

The `.fi-breadcrumbs` class is inserted to allow developers to further optimize the breadcrumbs' look and feel. By default, the class has no CSS properties defined in itself, it's only there for the developer to apply custom styles.

#### Customizing the CSS

Picking up in the above example of `.fi-breadcrumbs`, we can now apply custom CSS classes on our `theme.css`. You can either use Tailwind utility classes or just write vanilla CSS. Let's say you want to override the default margin `mb-2`. Inputting the below CSS will yield the exact same results:

```css
.fi-breadcrumbs {
    @apply mb-4;
}

.fi-breadcrumbs {
    margin-bottom: 1rem;
}
```

As the `.fi-breadcrumbs` class is inserted before the default Tailwind utility classes, applying custom CSS will always override the default style.

#### Diving deeper

If we dive deeper into the breadcrumbs, we will find all the following classes, in this hierarchy:

```
- .fi-breadcrumbs
-- .fi-breadcrumbs-list
--- .fi-breadcrumbs-item
---- .fi-breadcrumbs-item-separator
---- .fi-breadcrumbs-item-label
```

Let's say we want to really change the breadcrumbs appearance. We can style each of this classes. Check the following example:

```css
.fi-breadcrumbs-list {
    @apply gap-x-0;
}

.fi-breadcrumbs-item {
    @apply gap-x-0;
}

.fi-breadcrumbs-item-label {
    @apply font-thin dark:text-primary-500 text-primary-500;
}

span.fi-breadcrumbs-item-label {
    @apply border-b-2 border-b-primary-500 font-semibold -mb-[2px];
}

.fi-breadcrumbs-item-separator {
    @apply fill-primary-500 h-4;
}
```

![Breadcrumbs Final Example](/images/content/articles/diogogpinto-filament-themes-full-guide/breadcrumbs-final.webp)

There are a lot of classes around every Filament component. You can go through each one and apply your custom CSS, so you can create a unique design for your Panel.

> [!TIP]
> There's a useful Filament Plugin ([Theme Inspector](https://filamentphp.com/plugins/codewithdennis-theme-inspector)) that lets you inspect all the classes in your panel in your dev environment. You can even copy to clipboard! It really smoothes the development process.

### Going behind CSS

Sometimes there are some things your theme requires that go behind CSS. You may want to add a custom Livewire component, Blade View or JS script. As these modifications are outside the scope of this guide, I would advise you to check the following resources:

- [Render Hooks on the Official Docs](https://filamentphp.com/docs/3.x/support/render-hooks) - check how you can render custom views almost anywhere in your panels
- [Registering Assets](https://filamentphp.com/docs/3.x/support/assets#registering-javascript-files) - check how you can register custom JS/CSS into your Filament panels

### The ~wrong~ unrecommended way to customize your theme

Another way of doing things, is publishing all the views of the Filament panels package. Why isn't this recommended? The docs say exactly why:

> You may be tempted to publish the internal Blade views to your application so that you can customize them. We don't recommend this, as it will introduce breaking changes into your application in future updates. Please use the CSS hook classes wherever possible.
> If you do decide to publish the Blade views, please lock all Filament packages to a specific version in your composer.json file, and then update Filament manually by bumping this number, testing your entire application after each update. This will help you identify breaking changes safely.

> [!warning]
> This is for demonstration purposes only, you really shouldn't do this as it can break your panels in future releases/updates. If you need to do this, only publish the necessary files and lock filament to your project's current version

So, if you were to do this, you could run the following command in your terminal:

```bash
php artisan vendor:publish --tag=filament-panels-views
```

Now, inside your `resources/views/vendor/filament-panels` folder are a bunch of files - these are the original view files you can (but shouldn't) customize.

![Vendor Files](/images/content/articles/diogogpinto-filament-themes-full-guide/vendor-publish.webp)

Navigate to your themes `tailwind.config.js` and add the filament-panels folder to the content array, so vite can process these file changes. If you're following along, your file should look like this:

```js
import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Clusters/Products/**/*.php',
        './resources/views/filament/clusters/products/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
        // Added the following line of code
        './resources/views/filament-panels/**/*.blade.php',
    ],
}
```

#### Example - make the topbar backdrop blur

If you're editing the blade files directly, to blur the background of a topbar, you should open the following file:

```
./resources/views/vendor/filament-panels/components/topbar/index.php
```

Now we can edit the `<nav>` tag, and make it look like the following:

```html
<nav
    class="flex h-16 items-center gap-x-4 bg-white bg-opacity-50 backdrop-blur-lg px-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:bg-opacity-50 dark:ring-white/10 md:px-6 lg:px-8"
>
```

To make it look consistent in the sidebar, we should also open the following file:

```
./resources/views/vendor/filament-panels/components/sidebar/index.php
```

And change the `<header>` tag to make it look like:

```html
<header
    class="fi-sidebar-header flex h-16 items-center bg-white bg-opacity-50 backdrop-blur-lg px-6 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:bg-opacity-50 dark:ring-white/10 lg:shadow-sm"
>
```

And there it is. We were able to customize the theme file in the unrecommended way. We shouldn't really do this, unless we want to add complex logic to the code. If this is the case, you can delete all the files except the ones you are directly going to modify.

![Blade editing adding backdrop](/images/content/articles/diogogpinto-filament-themes-full-guide/blade-backdrop-blur.webp)

> [!note]
> All the changes you make to these files will render on ALL of your Filament panels in the project, unless you use some kind of conditional statements in your blade files.

Remember to the things the right way whenever possible.

## Support

If you want support on creating a theme, I would recommend the following channels:

- [Filament Github Discussions](https://github.com/filamentphp/filament/discussions)
- [Filament Official Discord](https://filamentphp.com/discord)

You can also reach me on Discord or [Twitter](https://www.twitter.com/diogogpinto) if you have any questions regarding this particular guide and have any doubts regarding this process.
