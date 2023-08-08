---
name: Easy way to benefit from the new color mechanism in frontend
slug: mohamedsabil83-easy-way-to-benefit-from-the-new-color-mechanism-in-frontend
author_slug: mohamedsabil83
publish_date: 2023-08-08
categories: [general]
type_slug: article
---

# Easy way to benefit from the new color mechanism in Frontend

**Filament 3** was released a few days ago that's contains many new features in addition to several new main core packages (Actions, Infolist Builder, and Widgets).

Among the new features is the ability to add an unlimited number of panels (AKA admin areas / dashboards). Each of them is its own service provider, allowing you to  customizing the Panel as needed, including specifying and assigning colors individually.

We can take advantage of this feature in the Frontend (non admin parts) of the site by allowing, for example, each user to choose their own preferred color. To clarify this, we will build a quick example.

## Installation

To get started, you can install a new Laravel project. You can call this app anything you'd like, but we will call ours `custom-frontend-color`.

```bash
laravel new custom-frontend-color

cd ./custom-frontend-color
```

Since **Livewire 3** is still in beta, we need to modify the `minimum-stability` property in `composer.json` to 'dev':

```json
"minimum-stability": "dev",
```

Now we can install Filament with the following steps:

```bash
composer require filament/filament:"^3.0-stable" -W

php artisan filament:install --scaffold --panels

npm install

npm run dev
```

> Notice the `--scaffold` option in the previous command will modify and publish some files including assets and the layout file **resources/views/components/layouts/app.blade.php** which will use later.

Since we want users to be able to set their own color, we'll need to store that value somewhere. So, let's add it to our `users` database migration and the `User` model.

```php
// database/migrations/2014_10_12_000000_create_users_table.php

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('color')->default('#6a5acd'); // <-- we added this line
    $table->rememberToken();
    $table->timestamps();
});

// app/Models/User.php

protected $fillable = [
    'name',
    'email',
    'password',
    'color',
];
```

For testing and seeding purposes let's also add the new attribute to our `UserFactory`

```php
// database/factories/UserFactory.php

public function definition(): array
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'color' => fake()->hexColor(),
    ];
}
```

Now, let's edit our `DatabaseSeeder` so we have some users to continue with.

```php
// database/seeders/DatabaseSeeder.php

public function run(): void
{
    User::factory(10)->create();
}
```

Then run the following command:

```bash
php artisan migrate --seed
```

## Usage

Now let's create a controller to display user information, e.g. **UserController**, by running the following command:

```bash
php artisan make:controller -i UserController
```

Fill it like this:

```php
<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        return view('welcome', compact('user'));
    }
}
```

Next, we need to add a route to view the user in our app in the `web.php` route file.

```php
// routes/web.php

Route::get('/{user}', UserController::class);
```

Modify the body content in `welcome.blade.php` with the following:

```html
<x-layouts.app>
    <div class="p-8 bg-primary-500 text-white font-bold text-xl text-center">
        {{ $user->name }}
    </div>
</x-layouts.app>
```

We extended the layout file **resources/views/components/layouts/app.blade.php** which we mentioned in the [**Installation**](#installation) section. The content of that file is like the following:

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased">
        {{ $slot }}

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
```

>Notice the [New @filamentScripts and @filamentStyles Blade directives](https://filamentphp.com/docs/3.x/tables/upgrade-guide#new-filamentscripts-and-filamentstyles-blade-directives). They inejct all Filament styles and scripts needed.

In the last step, we will [register a view composer](https://laravel.com/docs/10.x/views#view-composers) by adding the following to the `boot()` method in the `AppServiceProvider` (or another service provider of your choice).

```php
use Filament\Support\Facades\FilamentColor;

public function boot(): void
{
    view()->composer('components.layouts.app', function () {
        $user = request()->route()?->parameter('user');

        FilamentColor::register([
            'primary' => $user?->color ?? '#000000',
        ]);
    });
}
```

Now try visiting any user's link and see how their background color is applied:

```
http://custom-frontend-color.test/1
http://custom-frontend-color.test/2
```

You can check out the [documentation](https://filamentphp.com/docs/3.x/support/colors) to learn more about customizing colors then use it according to your project.
