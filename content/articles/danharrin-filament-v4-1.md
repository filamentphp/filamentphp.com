---
title: "Filament v4.1 is here!"
slug: danharrin-filament-v4-1
author_slug: danharrin
publish_date: 2025-09-29
categories: [general]
type_slug: news
---

![Filament v4.1 Release Banner Image](/images/content/articles/danharrin-filament-v4-1/banner.webp)

We're very excited to announce the release of **Filament v4.1**!

Since v4.0 was released, the core team and community have been hard at work:

- **156 bug fixes merged**
- **39 brand new features**

That's a lot of code reviewed, tested, and merged, and it wouldn't have been possible without the amazing efforts of the entire community. 💛

Special thanks to:
- [**Adam Weston**](https://github.com/awcodes) for helping port rich editor improvements from his excellent v3 TipTap plugin.
- [**@People-Sea**](https://github.com/People-Sea) for investigating bug reports from the community and providing a ton of fixes.

## Our favourite new features in v4.1

Here are a few of the highlights we're most excited about.

### New Panel Layout (No Topbar)

We've introduced a **panel layout option without a topbar**. This is perfect for apps that want to maximize vertical space. The user menu, notifications button, and global search can move to the sidebar, which opens up some interesting theming possibilities.

We can't wait to see what you build with it!

![No Topbar Layout Screenshot](/images/content/articles/danharrin-filament-v4-1/no-topbar-layout.gif)

To enable this layout, pass `false` to the `topbar()` method in your panel configuration:

```php
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->topbar(false);
}
```

Special thanks to [**Nolan Nordlund**](https://github.com/nolannordlund) for his time spent on this feature!

### Rich Editor Grid Tool

You can now insert **responsive grids** into rich editor content, up to 12 columns wide.

This includes asymmetrical splits (like a 2-column grid where one column takes 1/3 of the space). Perfect for more advanced layouts inside content.

![Rich Editor Grids Screenshot](/images/content/articles/danharrin-filament-v4-1/rich-editor-grid-tool.gif)

To enable this feature, add the `grid` tool to your rich Eeitor `toolbarButtons()`:

```php
use Filament\Forms\Components\RichEditor;

RichEditor::make('content')
    ->toolbarButtons([
        ['bold', 'italic', 'link', 'h2', 'h3'],
        ['grid', 'attachFiles'], // The grid tool can be added anywhere in the toolbar
    ])
```

### Rich Editor Text Color Tool

The rich editor now supports **text color selection**. You can pick from the default Tailwind color palette or pick your own custom color. You can also provide a custom color palette for users to pick from.

When picking from a palette, light/dark mode accessibility is handled automatically for the user.

![Rich Editor Text Color Screenshot](/images/content/articles/danharrin-filament-v4-1/rich-editor-text-color-tool.gif)

To enable this feature, add the `textColor` tool to your rich editor `toolbarButtons()`:

```php
use Filament\Forms\Components\RichEditor;

RichEditor::make('content')
    ->toolbarButtons([
        ['bold', 'italic', 'link', 'h2', 'h3'],
        ['textColor', 'attachFiles'], // The text color tool can be added anywhere in the toolbar
    ])
```

You can also customize the color palette that is available using the `textColors()` method:

```php
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;

RichEditor::make('content')
    ->textColors([
        '#0ea5e9' => 'Brand',
        'warning' => TextColor::make('Warning', '#f59e0b', darkColor: '#fbbf24'),
    ])
```

[Documentation →](https://filamentphp.com/docs/4.x/forms/rich-editor#customizing-text-colors)

### Compact Table Repeater Style

The **table repeater** introduced in v4 makes it possible to render each form field in its own table cell, with each repeater item being a row. In v4.1, some fields (like `Select` and `TextInput`) can now have a **compact design**, making them look seamless within cells.

![Compact Table Repeater Screenshot](/images/content/articles/danharrin-filament-v4-1/compact-table-repeater.gif)

To enable this, just set the `compact()` method on the repeater:

```php
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->table([
        // ...
    ])
    ->compact()
    ->schema([
        // ...
    ])
```

[Documentation →](https://filamentphp.com/docs/4.x/forms/repeater#compact-table-repeaters)

### New Table Layout For Repeatable Entry

Like the table repeater, but for **infolist entries**. Each entry is rendered in a cell, allowing you to output static tables inside schemas with **text, icons, images, and more**.

![Repeatable Entry Table Layout Screenshot](/images/content/articles/danharrin-filament-v4-1/table-repeatable-entry.webp)

To enable this, use the `table()` method on your `RepeatableEntry` component:

```php
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\RepeatableEntry\TableColumn;
use Filament\Infolists\Components\TextEntry;

RepeatableEntry::make('comments')
    ->table([
        TableColumn::make('Author'),
        TableColumn::make('Title'),
        TableColumn::make('Published'),
    ])
    ->schema([
        TextEntry::make('author.name'),
        TextEntry::make('title'),
        IconEntry::make('is_published')
            ->boolean(),
    ])
```

[Documentation →](https://filamentphp.com/docs/4.x/infolists/repeatable-entry#table-repeatable-layout)

### Empty State Schema Component

A brand-new schema component for inserting **empty states anywhere** in your app. Each empty state can include a heading, description, icon, and footer actions. Use this to guide users to take action when there's nothing to show.

![Empty State Schema Screenshot](/images/content/articles/danharrin-filament-v4-1/empty-state.webp)

To insert this component into your schema, use the `EmptyState` class:

```php
use Filament\Actions\Action;
use Filament\Schemas\Components\EmptyState;
use Filament\Support\Icons\Heroicon;

EmptyState::make('No users yet')
    ->description('Get started by creating a new user.')
    ->icon(Heroicon::OutlinedUser)
    ->footer([
        Action::make('createUser')
            ->icon(Heroicon::Plus),
    ])
```

[Documentation →](https://filamentphp.com/docs/4.x/schemas/empty-states)

## The Filament v4 Plugin Ecosystem

The plugin ecosystem keeps growing. There are now **224 v4 plugins** available on the website!

👉 [Browse all plugins](https://filamentphp.com/plugins)

Huge thanks to every community plugin author for building new plugins and upgrading existing ones. Your work makes Filament more powerful for everyone.

Here are a few of our recently added favourites:

- [**Passkeys** by Marcel Weidum](https://filamentphp.com/plugins/marcelweidum-passkeys)
- [**Prizm Theme** by Filafly](https://filamentphp.com/plugins/filafly-prizm-theme)
- [**Header Select** by Solution Forest](https://filamentphp.com/plugins/solution-forest-header-select)

## Why sponsorships matter 💸

Reviewing 156 bug fixes, 39 new features, and supporting users with questions takes a **huge amount of time** from the Filament core team. Please consider **sponsoring the project on GitHub**:

👉 [Become a sponsor of Filament](https://github.com/sponsors/danharrin)

Sponsorship directly supports the team who develops Filament and provides support. Sponsorship money is shared among core team members. Monthly and one-time options are available, as well as advertising opportunities on our website for companies sponsoring **$100/month** or more.

Your support makes Filament possible. Thank you for helping us build the tools that power your applications. 💛

## Join us at Wire ⚡️ Live Conference in Buffalo, New York on October 28-29, 2025

I'm excited to be speaking at and attending the [**Wire ⚡️ Live** Conference](https://wire-live.com?referrer=filament) in **Buffalo, New York** on **October 28-29**, 2025.

This is the first official conference dedicated to Livewire, Flux, Alpine, and Filament. It's a great opportunity to learn from the TALL stack community, meet other developers, and get inspired.

I'll be presenting a talk about "Filament's Use of Livewire and Alpine", demonstrating how Filament uses those tools internally to build full-stack interfaces without leaving PHP.

Make sure to [visit the official website](https://wire-live.com?referrer=filament) to learn more and grab your tickets. Hope to see you there!

## Try Filament v4.1 today!

The upgrade is just a `composer update` away from v4.0, and you'll immediately benefit from the bug fixes and new features.

We'd love to see what you build. Come share your work in the [Filament Discord](https://filamentphp.com/discord)!
