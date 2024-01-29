---
name: Ling Myat Starter Kit
slug: ling-myat-starter-kit
author_slug: lingmyataung
categories: [developer-tool, kit]
description: Ling Myat starter kit include ready make Multi-Tenant, Filament Shield, Filament Exception, Customize Login Page.
discord_url: https://discord.com/channels/883083792112300104/1080807837833384017
docs_url: https://github.com/LingMyat/Filament-Starter-Kit/blob/main/README.md
github_repository: https://github.com/LingMyat/Filament-Starter-Kit
has_dark_theme: true
has_translations: true
versions: [1]
publish_date: 2024-01-24
---


# LingMyatStartedKit

LingMyatStarterKit is a [Filament](https://filamentphp.com/) distribution with pre-installed.

## New Installation

```bash
composer create-project lingmyat/filament-starter-kit
```

Run migrations

```bash
php artisan migrate
```

Create the first/admin user:

```
php artisan make:filament-user
```

Init FilamentShield

```
php artisan shield:install
```


For the FilamentShield install, answer "yes" to all questions it asks.



Seed First Tenant 


You can customize your tenant team name at database\Seeders\FirstTenantSeeder Min Shin Saw will be default



```
Team::create([
    'name' => 'Min Shin Saw',
    'slug' => 'min-shin-saw',
])->users()->attach(User::find(1));

```

Then Run This

```
php artisan db:seed
```

You can now go to /admin on your site and you should see the filament 
login screen. Log in with the user you created in step #4 above. 

In this Starter Kit I use filament shield plugin for roles and permissions. If you want to know more usage and commands check out this repo [BezhanSalleh Filament Shield](https://github.com/bezhanSalleh/filament-shield).

All relevant migrations, views and config files have been published to the main Laravel 
directory tree to the locations where you would expect them. If a package (such as, for 
exmaple, the Spatie packages) is based upon another package, the base package 
migrations and config files have been published as well. 
