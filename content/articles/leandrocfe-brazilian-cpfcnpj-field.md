---
title: Brazilian CPF CNPJ fields
slug: leandrocfe-brazilian-cpfcnpj-field
author_slug: leandrocfe
publish_date: 2023-03-01
categories: [form-builder, alpinejs]
type_slug: trick
---

## Installation

Install the [laravellegends/pt-br-validator](https://github.com/LaravelLegends/pt-br-validator) package:

```bash
composer require laravellegends/pt-br-validator
```

## Filament 3.x

### CPF_CNPJ Field

```php
use Filament\Support\RawJs;

TextInput::make('cpf_cnpj')
    ->mask(RawJs::make(<<<'JS'
        $input.length > 14 ? '99.999.999/9999-99' : '999.999.999-99'
    JS))
    ->rule('cpf_ou_cnpj')
```

### CPF Field

```php
TextInput::make('cpf')
    ->mask('999.999.999-99')
    ->rule('cpf')
```

### CNPJ Field

```php
TextInput::make('cnpj')
    ->mask('99.999.999/9999-99')
    ->rule('cnpj')
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

### CPF_CNPJ Field

```php
TextInput::make('cpf_cnpj')
    ->extraAlpineAttributes(['x-mask:dynamic' => '$input.length >14 ? \'99.999.999/9999-99\' : \'999.999.999-99\''])
    ->rule('cpf_ou_cnpj')
```

### CPF Field

```php
TextInput::make('cpf')
    ->extraAlpineAttributes(['x-mask' => '999.999.999-99'])
    ->rule('cpf')
```

### CNPJ Field

```php
TextInput::make('cnpj')
    ->extraAlpineAttributes(['x-mask' => '99.999.999/9999-99'])
    ->rule('cnpj')
```
