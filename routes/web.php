<?php

use App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Route;
use Pirsch\Facades\Pirsch;

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

Route::redirect('/discord', 'https://discord.gg/filament')->name('discord');

Route::prefix('/docs')->group(function () {
    Route::redirect('/getting-started', '/docs/app/getting-started');
    Route::redirect('/resources', '/docs/app/resources');
    Route::redirect('/pages', '/docs/app/pages');
    Route::redirect('/dashboard', '/docs/app/dashboard');
    Route::redirect('/navigation', '/docs/app/navigation');
    Route::redirect('/plugin-development', '/docs/app/plugin-development');

    Route::get('/{slug?}', function (?string $slug = null): string {
        $slug = trim($slug, '/');

        $filePath = public_path("docs/{$slug}/index.html");

        if (! file_exists($filePath)) {
            abort(404);
        }

        return file_get_contents($filePath);
    })->where('slug', '.*')->name('docs');
});

Route::prefix('/links')->group(function () {
    Route::get('/', Controllers\Links\ListLinksController::class)->name('links');

    Route::name('links.')->group(function () {
        Route::prefix('/{link}')->group(function () {
            Route::get('/', Controllers\Links\ViewLinkController::class)->name('view');
        });
    });
});

Route::name('packages.')->prefix('/packages')->group(function () {
    Route::view('/app', 'packages.app')->name('app');
    Route::view('/forms', 'packages.forms')->name('forms');
    Route::view('/tables', 'packages.tables')->name('tables');
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

Route::get('/consulting', function () {
    Pirsch::track();
    return redirect('https://www.ringerhq.com/i/filamentphp/filament');
})->name('consulting');

Route::redirect('/login', '/admin/login')->name('login');
