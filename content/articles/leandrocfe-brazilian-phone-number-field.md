---
title: Brazilian Phone Number field
slug: leandrocfe-brazilian-phone-number-field
author_slug: leandrocfe
publish_date: 2022-12-05
categories: [form-builder, alpinejs]
type_slug: trick
---

## Filament 3.x

### PhoneNumber Field

```php
use Filament\Support\RawJs;

TextInput::make('phone_number')
    ->mask(RawJs::make(<<<'JS'
        $input.length >= 14 ? '(99)99999-9999' : '(99)9999-9999'
    JS))
```

## Filament 2.x

Go to **AppServiceProvider** at *app\Providers\AppServiceProvider.php* and add the following:

```php
use Filament\Facades\Filament;

/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Filament::registerScripts([
        'https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js',
    ], true);
}
```

### PhoneNumber Field

```php
TextInput::make('phone_number')
    ->extraAlpineAttributes(['x-mask:dynamic' => '$input.length >=14 ? \'(99)99999-9999\' : \'(99)9999-9999\''])
```
