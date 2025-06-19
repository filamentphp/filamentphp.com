<?php

use App\Http\Controllers;
use App\Models\Article;
use App\Models\Plugin;
use App\Models\Star;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');

Route::get('/use-cases/admin-panel', function () {
    $pluginSlugs = [
        'bezhansalleh-shield',
        'joseph-szobody-impersonate',
        'awcodes-curator',
        'pxlrbt-excel',
        'saade-fullcalendar',
        'cheesegrits-google-maps',
    ];

    return view('use-cases.admin-panel', [
        'plugins' => Plugin::query()
            ->with(['author'])
            ->whereIn('slug', $pluginSlugs)
            ->get(),
        'pluginStars' => Star::query()
            ->toBase()
            ->where('starrable_type', 'plugin')
            ->whereIn('starrable_id', $pluginSlugs)
            ->groupBy('starrable_id')
            ->selectRaw('count(stars.id) as count, starrable_id')
            ->leftJoin('plugins', 'plugins.slug', '=', 'starrable_id')
            ->get()
            ->pluck('count', 'starrable_id'),
    ]);
})->name('use-cases.admin-panel');

Route::view('/consulting', 'consulting')->name('consulting');

Route::view('/team', 'team')->name('team');

Route::redirect('/discord', 'https://discord.gg/filament')->name('discord');

Route::get('/api/{version?}', function (string $version = '3.x'): RedirectResponse {
    return redirect('/api/' . $version . '/index.html');
})->where('version', '[1-4]+\.x')->name('api-docs');

Route::prefix('/docs')->group(function () {
    Route::get('/{slug?}', function (string $slug = null): string | RedirectResponse {
        $requestUri = request()->getRequestUri();

        if (
            str($requestUri)->endsWith('/') &&
            (session()->get('trailingSlashRedirectFrom') !== $requestUri)
        ) {
            session()->flash('trailingSlashRedirectFrom', $requestUri);

            return redirect(str($requestUri)->beforeLast('/'));
        }

        $slug = trim($slug, '/');

        if (filled($slug) && (! str_contains($slug, '.x'))) {
            return redirect()->route('docs', ['slug' => "3.x/{$slug}"]);
        }

        $filePath = base_path("docs/preserved-dist/{$slug}/index.html");

        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }

        $filePath = base_path("docs/preserved-dist/{$slug}/overview/index.html");

        if (file_exists($filePath)) {
            return redirect()->route('docs', ['slug' => "{$slug}/overview"]);
        }

        $filePath = base_path("docs/preserved-dist/{$slug}/getting-started/index.html");

        if (file_exists($filePath)) {
            return redirect()->route('docs', ['slug' => "{$slug}/getting-started"]);
        }

        $navigation = json_decode(file_get_contents(base_path('docs/src/navigation.json')), associative: true);
        $version = Str::before($slug, '.x');

        if (! is_numeric($version)) {
            abort(404);
        }

        $versionNavigation = $navigation[$version - 1] ?? null;

        if ($versionNavigation === null) {
            abort(404);
        }

        return redirect($versionNavigation['href'] ?? abort(404));
    })->where('slug', '.*')->name('docs');
});

Route::prefix('/community')->group(function () {
    Route::get('/', function () {
        return redirect(status: 301)->route('articles');
    });

    Route::name('articles.')->group(function () {
        Route::prefix('/{article:slug}')->group(function () {
            Route::get('/', function (Article $article) {
                return redirect(status: 301)->route('articles.view', ['article' => $article->slug]);
            });
        });
    });
});

Route::prefix('/content')->group(function () {
    Route::get('/', Controllers\Articles\ListArticlesController::class)->name('articles');

    Route::name('articles.')->group(function () {
        Route::prefix('/{article:slug}')->group(function () {
            Route::get('/', Controllers\Articles\ViewArticleController::class)->name('view');
        });
    });
});

Route::prefix('/plugins')->group(function () {
    Route::get('/', Controllers\Plugins\ListPluginsController::class)->name('plugins');

    Route::name('plugins.')->group(function () {
        // V2 plugin redirects immediately to V3 plugin page.
        Route::redirect('/impersonate', '/plugins/joseph-szobody-impersonate');
        Route::redirect('/media-library-pro', '/plugins/ralphjsmit-media-library-manager');
        Route::redirect('/notifications-pro', '/plugins/ralphjsmit-notifications-pro');
        Route::redirect('/onboarding-manager-pro', '/plugins/ralphjsmit-onboarding-manager-pro');
        Route::redirect('/seo', '/plugins/ralphjsmit-seo');
        Route::redirect('/kenneth-sese-filter-sets', '/plugins/kenneth-sese-advanced-tables');
        Route::redirect('/filament-google-fonts', '/plugins/filament-spatie-google-fonts');
        Route::redirect('/filament-minimal-theme', '/plugins/zepfietje-themes');
        Route::redirect('/filament-themes', '/plugins/zepfietje-themes');

        Route::prefix('/{plugin:slug}')->group(function () {
            Route::get('/', Controllers\Plugins\ViewPluginController::class)->name('view');
        });
    });
});

Route::redirect('/blog', '/community');
Route::redirect('/tricks', '/community');
Route::get('/tricks/{slug}', function (string $slug) {
    return redirect("https://v2.filamentphp.com/tricks/{$slug}");
});

Route::redirect('/login', '/admin/login')->name('login');
Route::redirect('/themes', '/plugins/zepfietje-themes');
