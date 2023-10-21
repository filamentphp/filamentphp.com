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
image: filament-minimal-theme.png
is_lemon_squeezy_embedded: true
is_presale: true
price: € 49
versions: [3]
publish_date: 2023-09-05
---

Want your Filament applications to look more streamlined? The official Filament Minimal Theme features a clean design with less rounding, a lighter background and redesigned UI components. No need to hire a designer to make your projects look different from the default Filament style. Simply install our Composer package and you're good to go. Perfect for corporate software.

The Filament Minimal Theme covers all Filament packages and can also be used standalone outside Filament panels. You can choose a license for a single project or unlimited projects, both including free updates. During presale, you will receive immediate access to the GitHub repository to actively provide feedback during the testing phase. You'll receive an email with instructions to get started after you complete your order.

## Installation

### Requirements

Filament Minimal Theme alpha requires the latest version of Filament v3, as it depends on new APIs added to Filament's core.

> [!WARNING]
> Filament Minimal Theme is currently in alpha, which means it's not yet ready for use in production environments.

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
composer require filament/minimal-theme:^3.0@alpha
```

You will be prompted to provide a username and password. Use your order email address as username and the license key you received as password.

### Panels

To start using the Minimal Theme with the Filament Panel Builder, you need to [create a custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme).

Next, replace the imported Panel Builder stylesheet with the Minimal Theme stylesheet in your theme CSS file:

```diff
- @import '/vendor/filament/filament/resources/css/theme.css';
+ @import '/vendor/filament/minimal-theme/resources/css/index.css';
```

Finally, register the theme plugin in your panel configuration file, optionally configuring colors and icons:

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

### Outside panels

Installation instructions for using the theme outside panels will still be added.

## Issues

If you find a bug in this package, please [create an issue on the main Filament GitHub repository](https://github.com/filamentphp/filament/issues/new?assignees=&labels=bug%2Cunconfirmed%2Clow+priority&projects=&template=bug_report.yml).
