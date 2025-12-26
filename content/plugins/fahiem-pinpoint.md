---
name: Pinpoint
slug: fahiem-pinpoint
author_slug: fahiem
categories: [form-field, infolist-entry]
description: Google Maps location picker component with search, draggable marker, reverse geocoding, and multi-language support (EN, AR, NL, ID).
discord_url:
docs_url: https://raw.githubusercontent.com/fahiem152/filament-pinpoint/refs/heads/main/README.md
github_repository: fahiem152/filament-pinpoint
has_dark_theme: true
has_translations: true
images:
    - fahiem-pinpoint.png
    - fahiem-pinpoint-viewer.png
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
- **Multi-language support** - Translations for EN, AR, NL, ID
- **Infolist Entry** - Read-only map display for view pages
- **Fully configurable** - Customize height, zoom, default location, and more

## v1.1.1 - Multi-language & Infolist Entry

New in version 1.1.1:

- **Multi-language support** with translations for English, Arabic, Dutch, and Indonesian
- **PinpointEntry** component for Infolists (read-only map display)
- `shortAddressField()` - Auto-fill short address (premise + route + street number)
- `countryField()` - Auto-fill country name

## v1.1.0 - Address Components

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
    ->shortAddressField('short_address')
    ->provinceField('province')
    ->cityField('city')
    ->districtField('district')
    ->villageField('village')
    ->postalCodeField('postal_code')
    ->countryField('country')
    ->columnSpanFull()
```

## Infolist Entry (Read-Only)

```php
use Fahiem\FilamentPinpoint\PinpointEntry;

PinpointEntry::make('location')
    ->label('Location')
    ->latField('lat')
    ->lngField('lng')
    ->defaultZoom(15)
    ->height(400)
    ->columnSpanFull()
```
