---
name: Simple Contact Form Pro
slug: solution-forest-simple-contact-form-pro
anystack_id: 9f7181c0-a0bb-4d04-9b93-3f0e2b4e54e4
checkout_url: https://checkout.anystack.sh/simple-contact-form-pro?via=arf178
author_slug: solution-forest
categories: [form-builder, form-field]
description: A lightweight, customizable contact form plugin for FilamentPHP that provides an easy-to-use alternative to Contact Form 7. Build and manage contact forms with a simple, intuitive interface directly from your Filament admin panel.
discord_url:
github_repository: solutionforest/simple-contact-form-pro
has_dark_theme: true
has_translations: true
versions: [3, 4]
publish_date: 2025-08-26
---

![Simple-Contact-Form-Pro](https://github.com/user-attachments/assets/302127a9-fada-404c-ade9-d7658a3bfa8c)

# Simple Contact Form Pro - FilamentPHP Plugin

**The Pro version of Simple Contact Form** adds advanced features like hooks, file upload, mail record, and full config control, making it the ultimate contact form solution for FilamentPHP projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solutionforest/simple-contact-form-pro.svg?style=flat-square)](https://packagist.org/packages/solutionforest/simple-contact-form-pro)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/simple-contact-form-pro/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solutionforest/simple-contact-form-pro/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/simple-contact-form-pro/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solutionforest/simple-contact-form-pro/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solutionforest/simple-contact-form-pro.svg?style=flat-square)](https://packagist.org/packages/solutionforest/simple-contact-form-pro)

---

## 🚀 Pro Features

- 🪝 **Hooks** - Add custom logic before/after form submit (fully configurable)
- 📁 **File Upload** - Support for file attachments, with validation and storage control
- 💾 **Mail Record** - Store and manage all sent emails and attachments
- ⚙️ **Full Config Control** - All features and behaviors can be controlled via config file
- 📝 **All Base Features** - Inherits all features from the free version

## Base Features (from Simple Contact Form)
- Easy installation
- Basic form management
- Email notifications
- Responsive design

### Supported Filament versions

| Filament Version | Plugin Version |
| ---------------- | -------------- |
| v3               | 0.0.4          |
| v4               | 2.0.2          |

## Installation

```bash
composer require solutionforest/simple-contact-form-pro
```

For Filament v4, use the v2.0.1 version:

```bash
composer require solution-forest/simple-contact-form:^2.0.2
```

Publish config and migrations:

```bash
php artisan vendor:publish --tag="simple-contact-form-pro-config"
php artisan vendor:publish --tag="simple-contact-form-migrations"
php artisan vendor:publish --tag="simple-contact-form-pro-migrations"
php artisan migrate
```

Register the plugin in your Filament Panel provider:

```php
use Solutionforest\SimpleContactFormPro\SimpleContactFormProPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugins([
            SimpleContactFormProPlugin::make(),
        ]);
}
```

Simple Contact Form provides a Filament form that can be used outside the Filament panel, but it requires Filament styles. There are several ways to set this up depending on your environment:

1. **Filament v3 with Tailwind v3:**  
   Follow the official Filament installation instructions: [https://filamentphp.com/docs/3.x/forms/installation](https://filamentphp.com/docs/3.x/forms/installation).

2. **Filament v3 with Tailwind v4:**  
   Publish the built-in CSS assets with the following command:

    ```bash
    php artisan vendor:publish --tag="simple-contact-form-assets"
    ```

3. **Filament v4 (expects Tailwind v4):**  
   Add the following to your `app.css` or your stylesheet:

    ```css
    @import '../../vendor/filament/filament/resources/css/theme.css';

    @source '../../app/Filament/**/*';
    @source '../../resources/views/filament/**/*';
    ```

    Then build your assets:

    ```bash
    npm run build
    ```


## Usage

### Creating a Pro Form
1. Go to "Contact Forms" in your Filament admin panel
2. Click "Create Form"
3. Configure advanced options (file upload, hooks, etc.)
4. Add fields and set up mail/recording as needed

### Displaying the Form in front end
Use the Blade component:

```blade
<x-simple-contact-form :form="1" />
```

## Configuration

You can customize the plugin's resources using the following options:

```php
SimpleContactFormProPlugin::make()
        ->modelLabel('Custom Contact Form') // Singular label for the model
        ->pluralModelLabel('Custom Contact Forms') // Plural label for the model
        ->navigationLabel('My Contact Forms') // Label in the navigation menu
        ->navigationIcon('heroicon-o-envelope') // Icon for navigation
        ->navigationGroup('Communication') // Group in the navigation
        ->navigationSort(100) // Sort order in navigation
        ->navigationParentItem(null) // Parent navigation item (if any)
        ->slug('contact') // Custom route slug
        ->shouldSkipAuth(false) // Require authentication
        ->shouldRegisterNavigation(true) // Show in navigation
        ->hasTitleCaseModelLabel(true); // Use title case for labels
```
All features (hooks, file upload, mail record, etc.) can be enabled/disabled and customized in `config/simple-contact-form-pro.php`.

### Enable/Disable Mail Send
```php
'mail' => [
        'enable' => true,
    ],
```
### Enable/Disable Mail Record
```php
'mail_record' => [
    'enable' => true,
],
```

### File Upload Settings
```php
'fileSystems' => [
        'disk' => env('FILESYSTEM_DISK', 'local'), // default local
        'directory' => 'livewire-tmp', // you can change which directory save to 
        'save' => false, // if false , it will delete afte mail send
    ],
```

### File Upload Notes

While you can configure file size limits in the resource form, ensure that `post_max_size` and `upload_max_filesize` in your `php.ini` are set higher than your configured limits. For more information about handling large file uploads, visit the [Filament documentation](https://filamentphp.com/docs/3.x/forms/fields/file-upload#uploading-large-files).

### Hooks
You can register before/after submit hooks in your config or via event listeners.

### Hooks Usage 
You can extend the built-in `ContactFormListener` for more structured handling:

```php
<?php

namespace App\Listeners;

use Solutionforest\SimpleContactFormPro\Listeners\ContactFormListener;
use Solutionforest\SimpleContactFormPro\Events\BeforeCreateContactForm;
use Solutionforest\SimpleContactFormPro\Events\AfterCreateContactForm;

class YourCutsomeListenr extends ContactFormListener
{   
    //these two function is must when you extends ContactFormListener.
    public function handleContactFormCreating(BeforeCreateContactForm $event): void
    {
       //your custom logic  before  record create
    }

    public function handleContactFormCreated(AfterCreateContactForm $event): void
    {
       //your custom logic  after  record create
    }
}
```

And then you will found out following in the config file:

```php
 'events' => [
        Solutionforest\SimpleContactFormPro\Events\BeforeCreateContactForm::class => [
            Solutionforest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreating',
        ],
        Solutionforest\SimpleContactFormPro\Events\AfterCreateContactForm::class => [
            Solutionforest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreated',
        ],
    ],
```

In Laravel 11 or above, listeners will be registered automatically once you create them under the `app/Listeners` directory, so there would be no need to register again, otherwise the event will run twice.

```php
 'events' => [
    // comment out this part for using your custom listener
    // Solutionforest\SimpleContactFormPro\Events\BeforeCreateContactForm::class => [
    //     Solutionforest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreating',
    // ],
    // Solutionforest\SimpleContactFormPro\Events\AfterCreateContactForm::class => [
    //     Solutionforest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreated',
    // ], 
    ],
```

### Customizing Translations

If you need to modify the translations, publish the language files:

```bash
php artisan vendor:publish --tag="simple-contact-form-lang"
php artisan vendor:publish --tag="simple-contact-form-pro-lang"
```



## Testing

```bash
composer test
```

## Changelog

See [CHANGELOG](CHANGELOG.md) for recent changes.

## Contributing

We welcome contributions! See [CONTRIBUTING.md](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) for how to report security issues.

## Credits

- [hayward](https://github.com/solutionforest)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). See [License File](LICENSE.md) for details.

<p align="center"><a href="https://solutionforest.com" target="_blank"><img src="https://github.com/solutionforest/.github/blob/main/docs/images/sf.png?raw=true" width="200"></a></p>

## About Solution Forest

[Solution Forest](https://solutionforest.com) is a web development agency based in Hong Kong. We help customers solve their problems and love open source.

We have built a collection of best-in-class products:

- [InspireCMS](https://inspirecms.net): A full-featured Laravel CMS with everything you need out of the box. Build smarter, ship faster with our complete content management solution.
- [Filaletter](https://filaletter.solutionforest.net): Filaletter - Filament Newsletter Plugin
