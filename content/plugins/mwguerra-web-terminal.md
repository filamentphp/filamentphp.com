---
name: Web Terminal
slug: mwguerra-web-terminal
author_slug: mwguerra
categories:
    - developer-tool
    - admin-panel
description: A secure web terminal for Laravel with Filament integration. Execute allowed commands on local systems or SSH servers with command whitelisting, audit logging, and multi-tenant support.
docs_url: https://github.com/mwguerra/web-terminal#readme
github_repository: mwguerra/web-terminal
has_dark_theme: true
has_translations: true
versions:
    - 4
publish_date: 2025-12-01
---

A secure web terminal package for Laravel with Filament v4 integration. Execute allowed commands on local systems or SSH servers with comprehensive security features.

![Web Terminal](https://raw.githubusercontent.com/mwguerra/web-terminal/main/docs/images/mwguerra-web-terminal.jpg)

## Features

- **Local & SSH connections**: Execute commands locally or connect to remote servers via SSH
- **Command whitelisting**: Only allowed commands can be executed for security
- **Preset configurations**: Quick presets for Git, Docker, Node.js, Laravel Artisan, and more
- **Comprehensive logging**: Audit trail for connections, commands, and errors
- **Multi-tenant support**: Built-in tenant isolation for SaaS applications
- **Session management**: Inactivity timeout and disconnect-on-navigate options
- **Filament integration**: Ready-to-use Terminal page and Terminal Logs resource
- **Embeddable**: Use as standalone pages or embed in Filament forms
- **Dark mode**: Full dark mode support via Filament
- **Localization**: English and Portuguese (BR) translations included

## Installation

```bash
composer require mwguerra/web-terminal
```

Run the interactive installer:

```bash
php artisan terminal:install
```

Register the plugin in your Panel Provider:

```php
use MWGuerra\WebTerminal\WebTerminalPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            WebTerminalPlugin::make(),
        ]);
}
```

## Quick Start

After installation, access the terminal at `/admin/terminal`.

For a custom terminal with specific commands:

```php
use MWGuerra\WebTerminal\Schemas\Components\WebTerminal;

WebTerminal::make()
    ->local()
    ->allowedCommands(['ls', 'pwd', 'cd', 'cat', 'git *'])
    ->workingDirectory(base_path())
    ->height('400px')
```

## Plugin Configuration

Customize navigation and disable components:

```php
use MWGuerra\WebTerminal\WebTerminalPlugin;

WebTerminalPlugin::make()
    // Configure Terminal page navigation
    ->terminalNavigation(
        icon: 'heroicon-o-command-line',
        label: 'Terminal',
        sort: 100,
        group: 'Tools',
    )
    // Configure Terminal Logs resource navigation
    ->terminalLogsNavigation(
        icon: 'heroicon-o-clipboard-document-list',
        label: 'Terminal Logs',
        sort: 101,
        group: 'Tools',
    )

// Disable components
WebTerminalPlugin::make()
    ->withoutTerminalPage()     // Only show logs
    ->withoutTerminalLogs()    // Only show terminal
```

## Connection Types

### Local Connection

```php
WebTerminal::make()
    ->local()
    ->allowedCommands(['ls', 'pwd', 'cd'])
    ->workingDirectory(base_path())
```

### SSH Connection

```php
WebTerminal::make()
    ->ssh(
        host: 'server.example.com',
        username: 'deploy',
        key: file_get_contents('/path/to/private_key'),
        port: 22
    )
```

## Preset Configurations

Quick presets for common use cases:

```php
// Read-only file browser
WebTerminal::make()->readOnly()

// Git operations
WebTerminal::make()->gitTerminal()

// Docker management
WebTerminal::make()->dockerTerminal()

// Node.js development
WebTerminal::make()->nodeTerminal()

// Laravel Artisan commands
WebTerminal::make()->artisanTerminal()
```

## Logging

Enable comprehensive audit logging:

```php
WebTerminal::make()
    ->local()
    ->log(
        enabled: true,
        commands: true,
        output: false,
        identifier: 'production-terminal',
    )
```

## Security

- **Command whitelisting**: Only allowed commands can be executed
- **Credential protection**: SSH credentials never exposed to the browser
- **Input sanitization**: All user input is validated and escaped
- **Rate limiting**: Configurable rate limits to prevent abuse
- **Audit logging**: Track all terminal activity for compliance

## Issues and Contributing

Found a bug or have a feature request? Please open an issue on [GitHub Issues](https://github.com/mwguerra/web-terminal/issues).

## License

Web Terminal is open-sourced software licensed under the [MIT License](https://github.com/mwguerra/web-terminal/blob/main/LICENSE).
