---
name: Minimal Theme
slug: filament-minimal-theme
author_slug: filament
categories: [form-builder, panel-builder, table-builder, theme]
checkout_url: https://filamentthemes.lemonsqueezy.com/checkout/buy/58c32592-f76a-4685-aba2-65487cbcd3cc?embed=1&logo=0
description: Featuring a clean design with less rounding, a lighter background and redesigned UI components.
discord_url: https://discord.com/channels/883083792112300104/1080807837833384017
github_repository: filamentphp/minimal-theme
has_dark_theme: true
has_translations: true
is_lemon_squeezy_embedded: true
is_presale: true
price: €49.00
versions: [3]
publish_date: 2023-09-05
---

Want your Filament applications to look more streamlined? The official Filament Minimal Theme features a clean design with less rounding, a lighter background and redesigned UI components. No need to hire a designer to make your projects look different from the default Filament style. Simply install our Composer package and you're good to go. Perfect for corporate software.

> This theme covers all Filament packages and can be used standalone. You may choose a license for a single project or unlimited projects, both including free updates.

## Installation

### Requirements

Filament Minimal Theme alpha requires the latest version of Filament v3, as it depends on new APIs added to Filament's core.

> This plugin is currently in alpha, which means it's not yet ready for use in production environments.

### Installation

Filament Minimal Theme can be installed using our private Composer repository. Configure the repository in your application's `composer.json` file:

```json
"repositories": [
    {
        "type": "composer",
        "url": "https://privato.pub/composer/filament"
    }
]
```

Now you can install the package using:

```bash
composer require filament/minimal-theme:"^3.0@alpha"
```

You will be prompted to provide a username and password. Use your order email address as username and the license key you received as password.

### Panels

#### Stylesheet

To start using the Minimal Theme with the Filament Panel Builder, you need to [create a custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme).

Next, replace the imported Panel Builder stylesheet with the Minimal Theme stylesheet in your theme CSS file:

```diff
- @import '/vendor/filament/filament/resources/css/theme.css';
+ @import '/vendor/filament/minimal-theme/resources/css/index.css';
```

Now compile your theme stylesheet using `npm run build`.

#### Configuration

Finally, register the theme plugin in your panel configuration file, and configure the colors and icons:

```php
<?php

namespace App\Providers\Filament;

use Filament\MinimalTheme;
use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugin(new MinimalTheme())
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors(MinimalTheme::getColors())
            ->icons(MinimalTheme::getIcons());
    }
}
```

### Standalone

If you're using Filament packages outside the Panel Builder, you may install the Minimal Theme using the following steps.

First, make sure you've properly installed any Filament packages. Your project should have a Tailwind CSS config file that extends the Filament preset, a stylesheet (e.g. `resources/css/app.css`), and a layout view that renders `@filamentStyles`.

#### Stylesheet

In your app CSS file, import the Minimal Theme stylesheets for the Filament packages you're using:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@import '/vendor/filament/minimal-theme/resources/css/actions';
@import '/vendor/filament/minimal-theme/resources/css/forms';
@import '/vendor/filament/minimal-theme/resources/css/infolists';
@import '/vendor/filament/minimal-theme/resources/css/notifications';
@import '/vendor/filament/minimal-theme/resources/css/support';
@import '/vendor/filament/minimal-theme/resources/css/tables';
@import '/vendor/filament/minimal-theme/resources/css/widgets';
```

Note that some packages depend on other Filament packages, so you need to make sure to import the stylesheets of all dependencies. Here's the list of packages with their dependencies:

- Actions
    - Forms
    - Infolists
    - Notifications
    - Support
- Forms
    - Actions
    - Infolists
    - Notifications
    - Support
- Infolists
    - Actions
    - Forms
    - Notifications
    - Support
- Notifications
    - Actions
    - Support
- Support
- Tables
    - Actions
    - Forms
    - Infolists
    - Notifications
    - Support
- Widgets
    - Support

Next, compile your updated stylesheet using `npm run build`.

#### Configuration

Finally, the theme's colors, color shades, and icons need to be configured. You may do this by registering the theme's service provider in `config/app.php` by adding it to the `providers` array:

```php
/*
 * Package Service Providers...
 */
Filament\MinimalThemeServiceProvider::class,
```

Alternatively, if you need more control or only want to use the theme in certain parts of your app, you may configure the theme manually (e.g. in a middleware):

```php
use Filament\MinimalTheme;

MinimalTheme::configure();
```

## Issues

If you find a bug in this package, please [create an issue on the main Filament GitHub repository](https://github.com/filamentphp/filament/issues/new?assignees=&labels=bug%2Cunconfirmed%2Clow+priority&projects=&template=bug_report.yml).
