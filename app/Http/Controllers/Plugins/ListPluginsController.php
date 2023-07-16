<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Plugin;
use App\Models\PluginCategory;
use App\Models\Star;

class ListPluginsController extends Controller
{
    public function __invoke()
    {
        seo()->title('Plugins');

        return view('plugins', [
            'authorsCount' => Author::query()->whereHas('plugins')->count(),
            'categories' => PluginCategory::query()->orderBy('name')->get(),
            'pluginsCount' => Plugin::count(),
            'plugins' => cache()->remember(
                'plugins',
                now()->addMinutes(15),
                fn (): array => Plugin::query()
                    ->with(['author'])
                    ->get()
                    ->map(fn (Plugin $plugin): array => [
                        'id' => $plugin->slug,
                        'name' => $plugin->name,
                        'slug' => $plugin->slug,
                        'price' => $plugin->getPrice(),
                        'stars_count' => $plugin->getStarsCount(),
                        'image_url' => $plugin->getImageUrl(),
                        'description' => $plugin->description,
                        'author' => [
                            'name' => $plugin->author->name,
                            'avatar' => $plugin->author->getAvatarUrl(),
                        ],
                        'features' => [
                            'dark_theme' => $plugin->has_dark_theme,
                            'translations' => $plugin->has_translations,
                        ],
                        'categories' => $plugin->categories,
                        'versions' => $plugin->versions,
                    ])
                    ->all(),
            ),
            'starsCount' => Star::query()->where('starrable_type', 'plugin')->count(),
        ]);
    }
}
