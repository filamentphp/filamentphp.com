<?php

namespace App\Providers;

use Flowframe\Previewify\Previewify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;
use Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        seo()
            ->site(config('app.name'))
            ->title(
                modify: fn (string $title) => $title . ' - ' . config('app.name'),
                default: 'Filament - The elegant TALLkit for Laravel artisans.',
            )
            ->description(default: 'Filament is a collection of tools for rapidly building beautiful TALL stack interfaces, designed for humans.')
            ->twitterSite('filamentphp');

        Model::preventLazyLoading();
        Model::unguard();
    }
}
