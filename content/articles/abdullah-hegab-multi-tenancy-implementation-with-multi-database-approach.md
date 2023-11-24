---
title: Multi Tenancy Implementation With Multi Database Approach
slug: abdullah-hegab-multi-tenancy-implementation-with-multi-database-approach
author_slug: abdullah-hegab
publish_date: 2023-11-06
categories: [integration,laravel]
type_slug: article
---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://tenancyforlaravel.com/assets/img/tenancyforlaravel.svg" width="400" alt="TenancyWithLaravel"></a></p>
<h1 align="center">
Full Guide Multi-Tenancy Implementation
</h1>
<h2 align="center">
Multi-Tenancy Implementation With Multi-Database Approach
</h2>

### Introduction
After conducting an extensive two-week search for a comprehensive guide on implementing multi-tenancy within my SaaS project, I regrettably found no fully documented resources. Consequently, I resorted to seeking assistance through Filament's support channels, where I received invaluable assistance from knowledgeable individuals.

I diligently applied the guidance and recommendations provided, addressing one issue after another, ultimately achieving a functional multi-tenancy setup within my project. Recognizing the challenges I encountered, I have undertaken the task of sharing my experiences and the solutions that worked for me, with the aim of simplifying the process for future developers seeking to establish a multi-tenancy SaaS model.

The primary objective of this endeavor is to facilitate the installation of a multi-tenancy SaaS architecture, wherein a single database encompasses all created domains, while each tenant enjoys their own dedicated database.

Before we begin, I would like to extend my heartfelt gratitude to [Geoff](https://github.com/Geoffry304) for the invaluable help, unwavering support, and diligent debugging of issues. His contributions have been instrumental in the creation of this comprehensive documentation guide. Your assistance has made this gist possible, and for that, we express our sincere thanks.

### Installation
you need to require `stancl/tenancy` in your current project by running the following command in the terminal 
```bash
  composer require stancl/tenancy
```

then you need to run this command
```bash
  php artisan tenancy:install
```
in case of success, you should see the following in your terminal
![Screenshot from 2023-10-27 22-53-17](https://user-images.githubusercontent.com/56083879/278758796-dbca716b-cadc-4345-b7b1-176dd315dcf4.png)

now you have one choice of these choises 
- if you started your project with installing multi-tenancy first you should run the following command
```bash
  php artisan migrate
```
- if you already have migrations files, you need to consider adding your own migrations under a directory called `tenant` under `migrations` which is under `database` directory, just like the following screenshot 
![Screenshot from 2023-10-27 23-02-16](https://user-images.githubusercontent.com/56083879/278759837-65e1c7ac-7ab7-4ed1-a1fc-cc226a9c7e51.png)

  then run the command :
```bash
  php artisan migrate
```
Register the service provider in `onfig/app.php`, Make sure it's on the same position as in the code snippet below:

![Screenshot from 2023-10-27 23-04-39](https://user-images.githubusercontent.com/56083879/278760227-2091598a-bda7-4f95-9545-7fb25e8b117c.png)

now, you need to create your own Tenant Model by running the php artisan command: 
```bash
  php artisan make:model Tenant
```
replace the code inside the model with the following
```php
<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
}
```
Now you need to tell the package to use this custom model. Open the `config/tenancy.php` file and modify the line below:
```php
  'tenant_model' => \App\Models\Tenant::class,
```
the most important steps now, We'll make a small change to the `app/Providers/RouteServiceProvider.php` file. Specifically, we'll make sure that central routes are registered on central domains only.

```php
protected function mapWebRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::middleware('web')
            ->domain($domain)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}

protected function mapApiRoutes()
{
    foreach ($this->centralDomains() as $domain) {
        Route::prefix('api')
            ->domain($domain)
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

protected function centralDomains(): array
{
    return config('tenancy.central_domains');
}
```
Call these methods manually from your RouteServiceProvider's boot() method, instead of the `$this->routes()` calls.
```php
        $this->routes(function () {
            $this->mapApiRoutes();
            $this->mapWebRoutes();
        });
```

To the most important steps (.env , tenancy.php, database.php)
Now we need to actually specify the central domains. A central domain is a domain that serves your "central app" content, e.g. the landing page where tenants sign up. Open the config/tenancy.php file and add them in:
```php
'central_domains' => [
    'localhost'
],
```
and to setup `database.php` connectios, i'm using `mysql` you can replace the file with the following script and change the connection name as you like
```php
  <?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'mysql_landlord' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('LANDLORD_DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_tenant' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',
];
```

and for the database configuration in .env file
```yml
 LANDLORD_DB_DATABASE=(database-name)

DB_CONNECTION=mysql_landlord
DB_DATABASE=(database-name)
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=(your-sql-username)
DB_PASSWORD=(your-sql-password)
```
<span style="color: red;">very important note :</span>make sure to set `CACHE_DRIVER` to `array`

now in the tenant.php, Your tenant routes will look like this by default:
```php
Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});
```
latter you can replace it with any view, but this is why you will detect that it is working correctly and swtiching between tenants


### Creating tenants

in the terminal run the command `php artisan tinker`
```bash
$ php artisan tinker
>>> $tenant1 = App\Models\Tenant::create(['id' => 'foo']);
>>> $tenant1->domains()->create(['domain' => 'foo.localhost']);
>>>
>>> $tenant2 = App\Models\Tenant::create(['id' => 'bar']);
>>> $tenant2->domains()->create(['domain' => 'bar.localhost']);
```
now you find that a database is created with the name foo , visit the `foo.localhost` and congraturation everything is working perfectly 

Notes: 
- to run migrations for tenants run the command `php artisan tenants:migrate`
- to freshly run migrations for tenants run the command `php artisan tenants:migrate-fresh`
- to run seeds for tenants run the command `php artisan tenants:seed`
- there is a possibility of encountering an error message indicating the absence of a tenant. To address this issue, it is imperative to create a tenant associated with the central domain, as this is a prerequisite for gaining access


### Author
[Hegabovic](https://github.com/Hegabovic)

### Contributors 
[Geoff](https://github.com/Geoffry304)
