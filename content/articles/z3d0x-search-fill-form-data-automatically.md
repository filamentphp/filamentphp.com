---
title: Search & fill form data automatically
slug: z3d0x-search-fill-form-data-automatically
author_slug: z3d0x
publish_date: 2023-08-20
categories: [form-builder]
type_slug: trick
---

## Setup

We are going to start with this very simple form schema.
Our goal is to automatically fill the `country_region` & `country_subregion`, based on `country_name`

```php
[
    TextInput::make('country_name'),
    TextInput::make('country_region'),
    TextInput::make('country_subregion'),
]
```

## Search method

Lets create a new method to handle our actual search functionality.

```php
public static function getCountryData(?string $searchTerm = null): ?array
{
    if (blank($searchTerm)) {
        return null;
    }

    try {
        $countryData = Http::baseUrl('https://restcountries.com/v3.1/name')
            ->get($searchTerm, ['fields' => 'region,subregion'])
            ->throw()
            ->json('0');

        return $countryData;
    } catch (RequestException $e) {

        return null;
    }
}
```

## Triggering the search

To trigger the search we are going to use a suffix action on the `country_name` field.

```php
use Filament\Forms\Components\Actions\Action;

//...
TextInput::make('country_name')
    ->suffixAction(fn ($state, Set $set) =>
        Action::make('search-action')
            ->icon('heroicon-o-magnifying-glass')
            ->action(function () use ($state, $set) {
                $countryData = static::getCountryData($state);

                $set('country_region', $countryData['region'] ?? null);
                $set('country_subregion', $countryData['subregion'] ?? null);
            })
        ),
```
