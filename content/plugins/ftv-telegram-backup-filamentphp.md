---
name: Telegram Backup
slug: ftv-telegram-backup-filamentphp
author_slug: barryle
categories: [developer-tool, admin-panel]
description: Send Laravel backups to Telegram via Filament resources for bots, chats, and backup tracking—with Spatie Laravel Backup integration and large-file splitting.
docs_urls: https://raw.githubusercontent.com/lmkhang10/telegram-backup-filamentphp/main/README.md
github_repository: lmkhang10/telegram-backup-filamentphp
source: https://github.com/lmkhang10/telegram-backup-filamentphp
has_dark_theme: true
has_translations: true
versions: [3, 4]
publish_date: 2026-01-19
---

# Telegram Backup with FilamentPHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lmkhang10/telegram-backup-filamentphp.svg?style=flat-square)](https://packagist.org/packages/lmkhang10/telegram-backup-filamentphp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lmkhang10/telegram-backup-filamentphp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/lmkhang10/telegram-backup-filamentphp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lmkhang10/telegram-backup-filamentphp/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/lmkhang10/telegram-backup-filamentphp/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lmkhang10/telegram-backup-filamentphp.svg?style=flat-square)](https://packagist.org/packages/lmkhang10/telegram-backup-filamentphp)

A Laravel package that integrates Telegram backup functionality with FilamentPHP 3+. This package provides Filament resources for managing Telegram bots, chats, and backups, allowing you to automatically send Laravel backups to Telegram.

## Demo

| | |
|---|---|
| ![Telegram Backup - 1](https://raw.githubusercontent.com/lmkhang10/telegram-backup-filamentphp/main/guide/telegram-backup-filamentphp-1.gif) | ![Telegram Backup - 2](https://raw.githubusercontent.com/lmkhang10/telegram-backup-filamentphp/main/guide/telegram-backup-filamentphp-2.gif) |
| ![Telegram Backup - 3](https://raw.githubusercontent.com/lmkhang10/telegram-backup-filamentphp/main/guide/telegram-backup-filamentphp-3.gif) | ![Telegram Backup - 4](https://raw.githubusercontent.com/lmkhang10/telegram-backup-filamentphp/main/guide/telegram-backup-filamentphp-4.gif) |

## Installation

You can install the package via composer:

```bash
composer require lmkhang10/telegram-backup-filamentphp
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="telegram-backup-filamentphp-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="telegram-backup-filamentphp-config"
```

### Environment Variables

Add the following environment variables to your `.env` file:

```env
# Enable/disable automatic backup notifications to Telegram
TELEGRAM_BACKUP_ENABLED=true

# Chunk size for splitting large backup files (in MB, max 49)
# Default: 1 MB
BACKUP_TELEGRAM_CHUNK_SIZE=1
```

**Important:** You must configure Telegram bots and chats via the Filament admin panel. The package uses the database configuration exclusively - there are no environment variable fallbacks for bot tokens or chat IDs.

## Usage

### Register Resources in Your Filament Panel

In your Filament panel provider (e.g., `app/Providers/Filament/AdminPanelProvider.php`), add the Telegram resources:

```php
use FieldTechVN\TelegramBackup\Filament\Resources\TelegramBotResource;
use FieldTechVN\TelegramBackup\Filament\Resources\TelegramChatResource;
use FieldTechVN\TelegramBackup\Filament\Resources\TelegramBackupResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

public function panel(Panel $panel): Panel
{
    return $panel
        // ... other configuration
        ->resources([
            TelegramBotResource::class,
            TelegramChatResource::class,
            TelegramBackupResource::class,
        ])
        ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder
                ->items([
                    // ... your other navigation items
                ])
                ->groups([
                    // Telegram group
                    NavigationGroup::make('TelegramGroup')
                        ->label(__('admin.nav.telegram.group'))
                        ->items([
                            NavigationItem::make('TelegramBotResource')
                                ->label(TelegramBotResource::getNavigationLabel())
                                ->icon(TelegramBotResource::getNavigationIcon())
                                ->url(fn(): string => TelegramBotResource::getUrl())
                                ->sort(1),

                            NavigationItem::make('TelegramChatResource')
                                ->label(TelegramChatResource::getNavigationLabel())
                                ->icon(TelegramChatResource::getNavigationIcon())
                                ->url(fn(): string => TelegramChatResource::getUrl())
                                ->sort(2),

                            NavigationItem::make('TelegramBackupResource')
                                ->label(TelegramBackupResource::getNavigationLabel())
                                ->icon(TelegramBackupResource::getNavigationIcon())
                                ->url(fn(): string => TelegramBackupResource::getUrl())
                                ->sort(3),
                        ]),
                ]);
        });
}
```

### How to Add a Chat ID

To configure a Telegram group or channel for storing backups, follow these steps:

1. **Add Bot Token First**
   - Go to the Telegram Bots list page in your Filament admin panel
   - Create a new bot or edit an existing one
   - Add your Telegram bot token (obtained from [@BotFather](https://t.me/botfather) on Telegram)
   - Save the bot

2. **Add Bot to Group/Channel**
   - In Telegram, add the bot to the group or channel you want to use for cloud storage
   - Set the bot as an **Administrator** with the following permissions:
     - ✅ **Manage Messages** - Enable this (required)
     - ❌ **Change Channel Info** - Disable
     - ❌ **Manage Stories** - Disable
     - ❌ **Manage Direct Messages** - Disable
     - ❌ **Add Subscribers** - Disable
     - ❌ **Manage Video Chats** - Disable
     - ❌ **Add New Admins** - Disable
   
   > **Note:** Only "Manage Messages" permission is required. All other permissions should be disabled for security.

3. **Start Long Polling**
   - Go back to the Telegram Bots list page in Filament
   - Find your bot and click the "Start Long Polling" button
   - This will enable the bot to listen for messages and commands

4. **Run Setup Command**
   - In Telegram, go to the group/channel where you added the bot
   - Type the command: `/setup`
   - The bot will automatically:
     - Detect the chat information
     - Create or update the chat in the database
     - Link the chat to your bot
     - Send a confirmation message

5. **Done!**
   - The chat is now configured and ready to receive backups
   - You can verify the chat was added by checking the Telegram Chats list in Filament

### Features

- **Telegram Bot Management**: Create and manage Telegram bots for sending backups
- **Chat Management**: Manage Telegram chats/channels where backups are sent
- **Backup Tracking**: View and manage backups sent to Telegram
- **Automatic Backup Sending**: Integrates with Spatie Laravel Backup to automatically send backups to Telegram
- **Large File Splitting**: Automatically splits large backup files to comply with Telegram's file size limits

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](https://github.com/lmkhang10/telegram-backup-filamentphp/blob/main/CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/lmkhang10/telegram-backup-filamentphp/blob/main/.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/lmkhang10/telegram-backup-filamentphp/security/policy) on how to report security vulnerabilities.

## Credits

- [barryle](https://github.com/lmkhang10)
- [All Contributors](https://github.com/lmkhang10/telegram-backup-filamentphp/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/lmkhang10/telegram-backup-filamentphp/blob/main/LICENSE.md) for more information.
