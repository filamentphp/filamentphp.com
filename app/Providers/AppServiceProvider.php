<?php

namespace App\Providers;

use App\Jobs\CheckIfIpIsVpn;
use App\Models\Article;
use App\Models\Plugin;
use App\Models\Star;
use App\Services\PackageDownloadStats;
use App\Services\PackageGitHubStarsStats;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            'package-github-stars-stats',
            fn () => new PackageGitHubStarsStats(),
        );

        $this->app->bind(
            'package-download-stats',
            fn () => new PackageDownloadStats(),
        );
    }

    public function boot(): void
    {
        seo()
            ->site(config('app.name'))
            ->title(
                modify: fn (string $title) => $title . ' - ' . config('app.name'),
                default: 'Filament - Accelerated Laravel development framework: admin panel, form builder, table builder and more',
            )
            ->description(default: 'A collection of beautiful full-stack components for Laravel. The perfect starting point for your next app. Using Livewire, Alpine.js and Tailwind CSS.')
            ->twitterSite('filamentphp');

        Model::preventLazyLoading(! app()->isProduction());
        Model::unguard();

        Relation::enforceMorphMap([
            'article' => Article::class,
            'plugin' => Plugin::class,
        ]);

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        RateLimiter::for('vpn_api', function (CheckIfIpIsVpn $job): Limit {
            if (
                Star::query()
                    ->where('ip', $job->ip)
                    ->whereNotNull('is_vpn_ip')
                    ->exists()
            ) {
                return Limit::none();
            }

            return Limit::perDay(1000)->by('free');
        });
    }
}
