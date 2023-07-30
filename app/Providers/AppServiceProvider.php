<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Plugin;
use App\Services\PackageDownloadStats;
use App\Services\PackageGitHubStarsStats;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
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
                default: 'Filament - The elegant TALLkit for Laravel artisans.',
            )
            ->description(default: 'Filament is a collection of tools for rapidly building beautiful TALL stack apps, designed for humans.')
            ->twitterSite('filamentphp');

        Model::preventLazyLoading(! app()->isProduction());
        Model::unguard();

        Relation::enforceMorphMap([
            'article' => Article::class,
            'plugin' => Plugin::class,
        ]);

        URL::forceScheme('https');
    }
}
