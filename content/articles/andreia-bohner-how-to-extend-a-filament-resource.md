---
title: How to Extend a Filament Resource
slug: andreia-bohner-how-to-extend-a-filament-resource
author_slug: andreia-bohner
publish_date: 2024-03-31
categories: [plugin, panel-builder]
type_slug: article
---

## Introduction

In this article, we'll walk through how to extend a plugin resource, as well as other Filament resources.

## Checking the Plugin's Configuration

Let's say we installed a plugin that registers resources, for example, the [Filament Authentication Log](https://github.com/TappNetwork/filament-authentication-log/tree/main/src/Resources), and we want to extend the available `AuthenticationLogResource.php` resource to add some customizations in our application.

To start with, we need to check whether the plugin enables us to configure its resources. We can take a look at the [plugin's config file](https://github.com/TappNetwork/filament-authentication-log/blob/main/config/filament-authentication-log.php) to see if we can locate a "resources" key or something similar that specifies the original resource(s):

```php
// config/filament-authentication-log.php

'resources' => [
    'AutenticationLogResource' => \Tapp\FilamentAuthenticationLog\Resources\AuthenticationLogResource::class,
],
```

And on the [plugin's class](https://github.com/TappNetwork/filament-authentication-log/blob/main/src/FilamentAuthenticationLogPlugin.php) (the class used to interact with a panel configuration file), we can check that the resources registered are the ones defined on the config file:

e.g.: [/src/FilamentAuthenticationLogPlugin.php](https://github.com/TappNetwork/filament-authentication-log/blob/main/src/FilamentAuthenticationLogPlugin.php)

```php
public function register(Panel $panel): void
{
    $panel
        ->resources(
            config('filament-authentication-log.resources')
        );
}
```

Now that we have confirmed that the plugin provides this configuration, let's extend the resource!

## Extending the Plugin Resource

We are ready to write our own `AuthenticationLogResource.php` resource that extends the plugin's resource! We can write it in our project's Filament resource directory (`app/Filament/Resources`):

```php
namespace App\Filament\Resources;

use Tapp\FilamentAuthenticationLog\Resources\AuthenticationLogResource as BaseAuthenticationLogResource;

class AuthenticationLogResource extends BaseAuthenticationLogResource
{
    // your custom code here
}
```

If you haven't yet, you can now publish the plugin's configuration file so we would be able to instruct Filament to use our custom resource. Below is an example using our local `App\Filament\Resources\AuthenticationLogResource` class we've just written in the project's `config/filament-authentication-log.php` file:

```php
'resources' => [
    'AutenticationLogResource' => \App\Filament\Resources\AuthenticationLogResource::class,
],
```

Also, we can add the respective [create, edit, list, and view pages](https://filamentphp.com/docs/3.x/panels/pages) (if they are used) on our local project. Here's an example for the list page:

```php
namespace App\Filament\Resources\AuthenticationLogResource\Pages;

use Filament\Resources\Pages\ListRecords;

class ListAuthenticationLogs extends ListRecords
{
    // ...
}
```

There's just one more thing left: in the project's custom resource class, we need to override the `getPages()` method to use our pages instead of the plugin's:

```php
use App\Filament\Resources\AuthenticationLogResource\Pages;

public static function getPages(): array
{
    return [
        'index' => Pages\ListAuthenticationLogs::route('/'),
    ];
}
```

Great! The new resource class should be used now.

This same technique can be applied to extend other Filament resources as well!

Feel free to reach out to me on my [social networks](https://github.com/andreia/andreia) if you have any questions, suggestions, or are using any techniques I've mentioned. I'd love to hear from you! :)

Happy coding and see you next time!
