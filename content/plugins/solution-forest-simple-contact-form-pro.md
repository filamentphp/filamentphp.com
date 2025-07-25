---
name: Simple Contact Form Pro
slug: solution-forest-simple-contact-form-pro
anystack_id: 9f7181c0-a0bb-4d04-9b93-3f0e2b4e54e4
check_out: https://checkout.anystack.sh/simple-contact-form-pro
author_slug: solution-forest
categories: [form-builder, form-field]
description: A lightweight, customizable contact form plugin for FilamentPHP that provides an easy-to-use alternative to Contact Form 7. Build and manage contact forms with a simple, intuitive interface directly from your Filament admin panel.
github_repository: solutionforest/simple-contact-form-pro
has_dark_theme: true
has_translations: true
versions: [3,4]
publish_date: 2025-07-25
---

<img width="3840" height="2160" alt="Simple-Contact-Form-pro" src="https://github.com/user-attachments/assets/8961ad7f-f5ff-40c8-ac5f-445d711001f2" />

# Simple Contact Form Pro - FilamentPHP Plugin

**The Pro version of Simple Contact Form** adds advanced features like hooks, file upload, mail record, and full config control, making it the ultimate contact form solution for FilamentPHP projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solutionforest/simple-contact-form-pro.svg?style=flat-square)](https://packagist.org/packages/solutionforest/simple-contact-form-pro)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/simple-contact-form-pro/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solutionforest/simple-contact-form-pro/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/simple-contact-form-pro/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solutionforest/simple-contact-form-pro/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solutionforest/simple-contact-form-pro.svg?style=flat-square)](https://packagist.org/packages/solutionforest/simple-contact-form-pro)

---
## Lisence Check Out
   https://checkout.anystack.sh/simple-contact-form-pro

## Basic Version
    https://github.com/solutionforest/simple-contact-form

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
|------------------|----------------|
| v3               | 0.0.3          |
| v4               | 2.0.1          |
## Installation
v3 installation:
```bash
composer require solutionforest/simple-contact-form-pro
```
v4 installation:
```bash
composer require solutionforest/simple-contact-form-pro:^2.0.1
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
use SolutionForest\SimpleContactFormPro\SimpleContactFormProPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugins([
            SimpleContactFormProPlugin::make(),
        ]);
}
```

## Demo


https://github.com/user-attachments/assets/801bcbb3-40f4-4b33-8fa8-bd0f03eff27f


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

use SolutionForest\SimpleContactFormPro\Listeners\ContactFormListener;
use SolutionForest\SimpleContactFormPro\Events\BeforeCreateContactForm;
use SolutionForest\SimpleContactFormPro\Events\AfterCreateContactForm;

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
        SolutionForest\SimpleContactFormPro\Events\BeforeCreateContactForm::class => [
            SolutionForest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreating',
        ],
        SolutionForest\SimpleContactFormPro\Events\AfterCreateContactForm::class => [
            SolutionForest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreated',
        ],
    ],
```

In Laravel 11 or above, listeners will be registered automatically once you create them under the `app/Listeners` directory, so there would be no need to register again, otherwise the event will run twice.

```php
 'events' => [
    // comment out this part for using your custom listener
    // SolutionForest\SimpleContactFormPro\Events\BeforeCreateContactForm::class => [
    //     SolutionForest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreating',
    // ],
    // SolutionForest\SimpleContactFormPro\Events\AfterCreateContactForm::class => [
    //     SolutionForest\SimpleContactFormPro\Listeners\ContactFormListener::class . '@handleContactFormCreated',
    // ], 
    ],
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
