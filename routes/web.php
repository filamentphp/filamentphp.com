<?php

use App\Http\Controllers;
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

if (config('app.env') === 'beta') {
    Route::redirect('/', '/docs')->name('home');
} else {
    Route::view('/', 'home')->name('home');
}

Route::view('/consulting', 'consulting')->name('consulting');

Route::redirect('/discord', 'https://discord.gg/filament')->name('discord');

Route::prefix('/docs')->group(function () {
    Route::redirect('/getting-started', '/docs/panels/getting-started');
    Route::redirect('/resources', '/docs/panels/resources/getting-started');
    Route::redirect('/pages', '/docs/panels/pages');
    Route::redirect('/dashboard', '/docs/panels/dashboard');
    Route::redirect('/navigation', '/docs/panels/navigation');
    Route::redirect('/plugin-development', '/docs/panels/plugins');

    Route::redirect('/admin', '/docs/panels/installation');
    Route::redirect('/panels', '/docs/panels/installation');
    Route::redirect('/forms', '/docs/forms/installation');
    Route::redirect('/tables', '/docs/tables/installation');
    Route::redirect('/notifications', '/docs/notifications/installation');
    Route::redirect('/actions', '/docs/actions/installation');
    Route::redirect('/infolists', '/docs/infolists/installation');
    Route::redirect('/widgets', '/docs/widgets/installation');
    Route::redirect('/support', '/docs/support/overview');

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

        $filePath = base_path("docs/dist/{$slug}/index.html");

        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }

        $navigation = json_decode(file_get_contents(base_path('docs/src/navigation.json')), associative: true);
        $versionNavigation = $navigation[Str::before($slug, '.x') - 1];

        return redirect($versionNavigation['href']);
    })->where('slug', '.*')->name('docs');
});

Route::feeds();

Route::prefix('/plugins')->group(function () {
    Route::get('/', Controllers\Plugins\ListPluginsController::class)->name('plugins');

    Route::name('plugins.')->group(function () {
        Route::get('/feed/json', Controllers\Plugins\FeedController::class)->name('feed');

        Route::prefix('/{plugin:slug}')->group(function () {
            Route::get('/', Controllers\Plugins\ViewPluginController::class)->name('view');
        });
    });
});

Route::prefix('/tricks')->group(function () {
    Route::get('/', Controllers\Tricks\ListTricksController::class)->name('tricks');

    Route::name('tricks.')->group(function () {
        Route::prefix('/{trick:slug}')->group(function () {
            Route::get('/', Controllers\Tricks\ViewTrickController::class)->name('view');
        });
    });
});

Route::prefix('/blog')->group(function () {
    Route::get('/', Controllers\Blog\ListArticlesController::class)->name('blog');

    Route::name('blog.')->group(function () {
        Route::prefix('/{article:slug}')->group(function () {
            Route::get('/', Controllers\Blog\ViewArticleController::class)->name('article');
        });
    });
});

Route::redirect('/login', '/admin/login')->name('login');

Route::view('/community', 'community')->name('community');