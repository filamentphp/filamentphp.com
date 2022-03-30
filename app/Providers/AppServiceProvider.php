<?php

namespace App\Providers;

use Flowframe\Previewify\Previewify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
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
                default: 'Filament - Livewire Laravel Admin Panel',
            )
            ->description(default: 'Filament is an open source Laravel admin panel, table builder and form builder. Built using the TALL stack - Livewire, Alpine & Tailwind CSS.')
            ->twitterSite('filamentphp');

        Model::preventLazyLoading();
        Model::unguard();

        URL::forceScheme('https');
    }
}
