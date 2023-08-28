---
title: How to implement a localized country select field
slug: josefbehr-how-to-implement-a-localized-country-select-field
author_slug: josefbehr
publish_date: 2023-08-23
categories: [general]
type_slug: article
---

Oftentimes in applications users need to provide a country (e.g. as part of an address) and it would be nice to show a `Select` with all available countries rather than having them freely enter it in a `TextInput`. For multi-language applications it would then also be great to show the country list in the current locale rather than just English.

Achieving this is quite easy using the [iso3166 package](https://iso3166.thephpleague.com/) and PHP's [intl extension](https://www.php.net/manual/de/book.intl.php).

Install the [iso3166 package](https://github.com/thephpleague/iso3166) by thephpleague:

```bash
$ composer require league/iso3166
```

and require the intl extension in your composer.json:

```json
    "require": {
        ...
        "ext-intl": "*"
    },
```

Then create a new PHP class somewhere in your project (e.g. in `app/Filament/Forms/Components/`) that extends the default `Select` component:

```php
<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\App;
use League\ISO3166\ISO3166;
use Locale;

class LocalizedCountrySelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $iso3166 = new ISO3166();

        foreach ($iso3166 as $data) {
            $this->options[$data['alpha2']] = Locale::getDisplayRegion("-{$data['alpha2']}", App::currentLocale());
        }
    }
}
```

And that's it. Now you have a form component that shows a list of countries in the current user's locale and saves the standardized country code. If you want to save the country name instead, just use `$data['name']` for the options' key.
