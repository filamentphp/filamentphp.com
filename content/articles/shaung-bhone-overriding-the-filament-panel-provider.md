---
title: Overriding the Filament PanelProvider
slug: shaung-bhone-overriding-the-filament-panel-provider
author_slug: shaung-bhone
publish_date: 2023-11-20
categories: [panel-builder]
type_slug: trick
---

## Introduction

Today, I will guide you on minimizing code splitting by overriding the PanelProvider in Filament. At my company, we're currently integrating the admin panel into Filament for our finance app, and I'm tasked with managing this process. Within our app, various models such as client, agent, transaction, and more exist. Particularly in the client model, numerous branches and agents are present. To address this, I've opted to create distinct panels for each category.

So I run 
```php
php artisan make:filament-panel client  
```

I got `ClientPanelProvider.php`. Like that.

```php

<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ClientPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('client')
            ->path('client')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandLogoHeight('3rem')
                ->favicon(asset('favicon-32x32.png'))
                ->colors([
                    'primary' => Color::Blue,
                    'gray' => Color::Slate,
                ])
            ->discoverResources(
                in: app_path('Filament/Client/Resources'),
                for: 'App\\Filament\\Client\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Client/Pages'), 
                for: 'App\\Filament\\Client\\Pages'
            )
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Client/Widgets'),
                for: 'App\\Filament\\Client\\Widgets'
            )
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
```

So, I created the PanelProvider in Providers.

```php
<?php

namespace App\Providers;
//

abstract class PanelProvider extends ServiceProvider
{
    abstract public function panel(Panel $panel): Panel;

    public function register(): void
    {
        Filament::registerPanel(
            $this->panel(Panel::make())
                ->brandLogoHeight('3rem')
                ->favicon(asset('favicon-32x32.png'))
                ->colors([
                    'primary' => Color::Blue,
                    'gray' => Color::Slate,
                ])
                ->middleware([
                    EncryptCookies::class,
                    //
                ])
                ->authMiddleware([
                    Authenticate::class,
                ]),
        );
    }
}
```

I added default values for `brandLogoHeight()`, `colors()`, `middleware()`, and so on. Therefore, when creating a new panel, I only need to provide the `id` and `path`, like that.

```php
<?php

namespace App\Providers\Filament;

use App\Providers\PanelProvider;
use Filament\Panel;

class ClientPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('client')
            ->path('client')
            ->discoverResources(
                in: app_path('Filament/Client/Resources'),
                for: 'App\\Filament\\Client\\Resources'
            );
    }
}
```

That's it. Thank you.
