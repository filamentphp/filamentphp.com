---
name: Navigation
slug: shuxx-navigation
author_slug: shuxx
categories: [panel-builder, developer-tool]
description: Configure Filament navigation via a simple PHP config file with 24 separator styles, groups, and links - no manual navigation building required.
docs_url: https://github.com/shuxx/filament-navigation/blob/main/README.md
github_repository: shuxx/filament-navigation
has_dark_theme: true
has_translations: false
versions: [4]
publish_date: 2025-11-11
---

Configure your Filament navigation structure via a clean PHP configuration file instead of manually building navigation in code.

## Features

- **Config-Driven Navigation** - Define entire navigation in `config/filament-navigation.php`
- **Three Navigation Types** - Links, collapsible groups, and visual separators
- **24 Separator Styles** - From classic lines to hearts and stars
- **Order Preservation** - Array order equals display order in sidebar
- **External Link Support** - Opens links in new tab with `external => true`
- **Full Icon Support** - Complete Heroicon integration
- **Auto-Hover Disable** - Separators don't react to mouse hover (customizable)

## Quick Example

```php
'items' => [
    ['type' => 'link', 'label' => 'Dashboard', 'url' => '/admin', 'icon' => 'heroicon-o-home'],
    ['type' => 'separator', 'style' => 'stars'],
    [
        'type' => 'group',
        'label' => 'Users',
        'icon' => 'heroicon-o-user-group',
        'collapsible' => true,
        'items' => [
            ['type' => 'link', 'label' => 'All Users', 'url' => '/admin/users'],
            ['type' => 'link', 'label' => 'Roles', 'url' => '/admin/roles'],
        ],
    ],
]
```

Perfect for applications where navigation needs to be easily manageable, version-controlled, and consistent across environments.

See the [comprehensive examples](https://github.com/shuxx/filament-navigation/blob/main/EXAMPLES.md) for Blog, E-commerce, SaaS, CRM, and Project Management use cases.
