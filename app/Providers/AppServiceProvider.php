<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        seo()
            ->site(config('app.name'))
            ->title(
                modify: fn (string $title) => $title.' - '.config('app.name'),
                default: 'Filament - The elegant TALLkit for Laravel artisans.',
            )
            ->description(default: 'Filament is a collection of tools for rapidly building beautiful TALL stack apps, designed for humans.')
            ->twitterSite('filamentphp');

        Model::preventLazyLoading(! app()->isProduction());
        Model::unguard();

        URL::forceScheme('https');
    }
}
