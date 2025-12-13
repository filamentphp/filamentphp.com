---
name: Pinpoint
slug: fahiem-pinpoint
author_slug: fahiem
categories: [form-field]
description: Google Maps location picker component with search, draggable marker, and reverse geocoding for address components (province, city, district, postal code).
discord_url:
docs_url: https://github.com/fahiem152/filament-pinpoint#readme
github_repository: fahiem152/filament-pinpoint
has_dark_theme: true
has_translations: false
image: fahiem-pinpoint.png
versions: [4]
publish_date: 2025-12-07
---

A Google Maps location picker component for **Filament 4** with search, draggable marker, and reverse geocoding support.

## Features

- **Search location** - Using Google Places Autocomplete
- **Click to set marker** - Click anywhere on the map to place a marker
- **Draggable marker** - Drag the marker to fine-tune the location
- **Current location** - Get user's current device location
- **Reverse geocoding** - Auto-fill address fields from coordinates
- **Dark mode support** - Fully compatible with Filament's dark mode
- **Fully configurable** - Customize height, zoom, default location, and more

## v1.1.0 - Address Components

New in version 1.1.0, you can now auto-fill detailed address components:

- `provinceField()` - Auto-fill province/state
- `cityField()` - Auto-fill city/county
- `districtField()` - Auto-fill district
- `villageField()` - Auto-fill village/sub-district
- `postalCodeField()` - Auto-fill postal/zip code

## Requirements

- PHP 8.1+
- Laravel 10+ / 11+ / 12+
- Filament 4.0+
- Google Maps API Key (Maps JavaScript API, Places API, Geocoding API)

## Installation

```bash
composer require fahiem/filament-pinpoint
```

## Basic Usage

```php
use Fahiem\FilamentPinpoint\Pinpoint;

Pinpoint::make('location')
    ->label('Location')
    ->latField('lat')
    ->lngField('lng')
```

## Full Example

```php
Pinpoint::make('location')
    ->label('Business Location')
    ->defaultLocation(-6.200000, 106.816666)
    ->defaultZoom(15)
    ->height(400)
    ->draggable()
    ->searchable()
    ->latField('lat')
    ->lngField('lng')
    ->addressField('address')
    ->provinceField('province')
    ->cityField('city')
    ->districtField('district')
    ->villageField('village')
    ->postalCodeField('postal_code')
    ->columnSpanFull()
```
