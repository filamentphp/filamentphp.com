<?php

namespace App\Providers;

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
        $this->app->singleton(
            'stripe',
            fn () => new StripeClient(config('services.stripe.secret')),
        );
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
            ->twitterSite('danjharrin');

        Model::preventLazyLoading();

        Stripe::setApiKey(config('services.stripe.secret'));
    }
}
