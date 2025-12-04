---
name: File Manager
slug: mwguerra-file-manager
author_slug: mwguerra
categories:
    - panel-builder
    - form-field
description: A file manager package for organizing files and browsing storage with dual operating modes, S3/MinIO support, file previews, and drag-and-drop uploads.
docs_url: https://raw.githubusercontent.com/mwguerra/filemanager/main/README.md
github_repository: mwguerra/filemanager
has_dark_theme: true
has_translations: true
versions:
    - 4
publish_date: 2025-12-01
---

A full-featured file manager package for Laravel and Filament v4 with dual operating modes, S3/MinIO support, file previews, and drag-and-drop uploads.

![File Manager - List View](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/File%20Manager%20-%20List%20View.png)

## Features

- **Dual operating modes**: Database mode (tracked files with metadata) or Storage mode (direct filesystem browsing)
- **File browser**: Grid and list views, folder tree sidebar, breadcrumb navigation
- **File operations**: Upload, move, rename, delete with drag-and-drop support
- **Multi-selection**: Select multiple files with Ctrl/Cmd + click
- **File previews**: Built-in viewers for video, audio, images, PDF, and text files
- **Storage drivers**: Works with local, S3, MinIO, or any Laravel Storage driver
- **Security**: MIME validation, blocked extensions, filename sanitization, signed URLs
- **Authorization**: Configurable permissions with Laravel Policy support
- **Embeddable**: Use as standalone pages or embed in Filament forms
- **Dark mode**: Full dark mode support via Filament

## Installation

```bash
composer require mwguerra/filemanager
```

Publish configuration:

```bash
php artisan vendor:publish --tag=filemanager-config
```

Run migrations:

```bash
php artisan migrate
```

Run the install command:

```bash
php artisan filemanager:install
```

Register the plugin in your Panel Provider:

```php
use MWGuerra\FileManager\FileManagerPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FileManagerPlugin::make(),
        ]);
}
```

## Plugin Configuration

Register all components or select only the ones you need:

```php
use MWGuerra\FileManager\FileManagerPlugin;
use MWGuerra\FileManager\Filament\Pages\FileManager;
use MWGuerra\FileManager\Filament\Pages\FileSystem;
use MWGuerra\FileManager\Filament\Pages\SchemaExample;
use MWGuerra\FileManager\Filament\Resources\FileSystemItemResource;

// Register all enabled components (default)
FileManagerPlugin::make()

// Register only specific components
FileManagerPlugin::make([
    FileManager::class,              // Database mode - full CRUD file manager
    FileSystem::class,               // Storage mode - read-only file browser
    FileSystemItemResource::class,   // Resource for direct database table editing
    SchemaExample::class,            // Demo page showing embed components usage
])

// Using the fluent API
FileManagerPlugin::make()
    ->only([
        FileManager::class,
        FileSystem::class,
    ])
```

| Component | URL | Description |
|-----------|-----|-------------|
| `FileManager::class` | `/admin/file-manager` | Database mode with full CRUD operations |
| `FileSystem::class` | `/admin/file-system` | Storage mode for browsing files (read-only) |
| `FileSystemItemResource::class` | `/admin/file-system-items` | Direct database table management |
| `SchemaExample::class` | `/admin/schema-example` | Demo page for embedding components in forms |

## Quick Start

After installation, access the file manager at:

| Page | URL | Description |
|------|-----|-------------|
| File Manager | `/admin/file-manager` | Database mode with full CRUD operations |
| File System | `/admin/file-system` | Storage mode for browsing files (read-only) |

### File Manager (Database Mode)

Full CRUD file management with metadata tracking, thumbnails, and folder organization.

![File Manager - Database Mode](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/File%20Manager%20Page%20-%20List%20View.png)

### File System (Storage Mode: Read-only) 

Read-only file browser for direct filesystem access with S3/MinIO support.

![File System - Storage Mode](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/File%20System%20Page%20%28Storage%20Mode%29.png)

### FileSystemItems Resource

Direct database table management for file system items with Filament's standard resource interface.

![FileSystemItems Resource Page](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/FileSystemItems%20Resource%20Page.png)

## File Previews

Built-in viewers for common file types with modal preview support.

### Image Preview

![Image Preview](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/Schema%20Example%20Page%20-%20Image%20Preview.png)

### Video Preview

![Video Preview](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/Schema%20Example%20Page%20-%20Video%20Preview.png)

## Embedding in Forms

The package provides two embeddable schema components that can be added to any Filament form. Use `FileManagerEmbed` for full CRUD operations with database-tracked files, or `FileSystemEmbed` for a read-only storage browser. Both components are fully customizable with options for height, disk, target directory, and initial folder.

![File System Embed - Storage Mode](https://raw.githubusercontent.com/mwguerra/filemanager/main/docs/images/File%20System%20%28Storage%20Mode%29%20-%20Minio%20Disk.png)

```php
use MWGuerra\FileManager\Schemas\Components\FileManagerEmbed;
use MWGuerra\FileManager\Schemas\Components\FileSystemEmbed;

// Database mode (full CRUD)
FileManagerEmbed::make()
    ->height('400px')
    ->disk('s3')
    ->target('uploads'),

// Storage mode (read-only browser)
FileSystemEmbed::make()
    ->height('400px')
    ->disk('public')
    ->target('media'),
```

## Issues and Contributing

Found a bug or have a feature request? Please open an issue on [GitHub Issues](https://github.com/mwguerra/filemanager/issues).

We welcome contributions! Please read our [Contributing Guide](https://github.com/mwguerra/filemanager/blob/main/CONTRIBUTING.md) before submitting a pull request.

## License

File Manager is open-sourced software licensed under the [MIT License](https://github.com/mwguerra/filemanager/blob/main/LICENSE).
