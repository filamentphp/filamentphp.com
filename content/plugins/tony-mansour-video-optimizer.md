---
name: Video Optimizer
slug: tony-mansour-video-optimizer
author_slug: tony-mansour
categories: [form-field]
description: Automatically optimize and convert videos uploaded through Filament forms using FFmpeg. Reduces file sizes by up to 96% while maintaining quality.
discord_url:
github_repository: tonymans33/video-optimizer
has_dark_theme: true
has_translations: false
image: tony-mansour-video-optimizer.jpg
is_featured: false
docs: https://github.com/tonymans33/video-optimizer#readme
versions: [3, 4]
publish_date: 2025-10-02
---

Automatically optimize and convert videos uploaded through Filament forms using FFmpeg. Reduce file sizes and standardize formats without any manual intervention.

## Key Features

- 🎬 Automatic video optimization during upload
- 🔄 Format conversion (WebM, MP4)
- ⚡ Configurable quality levels (low, medium, high)
- 📦 Works with standard FileUpload and Spatie Media Library
- 🔌 Compatible with Filament v3 & v4
- 🛡️ Graceful fallback if optimization fails

## Impressive Results

Achieve up to **96% file size reduction** - from 17.8 MB down to just 679 KB while maintaining video quality!

## Quick Start

```php
use Tonymans33\VideoOptimizer\Components\VideoOptimizer;

VideoOptimizer::make('video')
    ->disk('public')
    ->directory('videos')
    ->optimize('medium')  // 'low', 'medium', 'high'
    ->format('webm');     // 'webm' or 'mp4'
```

## Requirements

- FFmpeg installed on your server
- PHP 8.1+
- Laravel 10.0+
- Filament 3.0+ or 4.0+
