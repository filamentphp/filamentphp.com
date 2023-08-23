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
        seo()
            ->title('Plugins')
            ->description('Community made packages for Filament projects, which give you access to awesome new features.')
            ->image('https://previewlinks.io/generate/templates/1055/meta?url=' . url()->current())
            ->tag('previewlinks:overline', 'Filament')
            ->tag('previewlinks:title', 'Plugins')
            ->tag('previewlinks:subtitle', 'Community made packages for Filament projects, which give you access to awesome new features.')
            ->tag('previewlinks:image', 'https://filamentphp.com/images/icon.png')
            ->tag('previewlinks:repository', 'filament/filament');

        return view('plugins.list-plugins', [
            'authorsCount' => Author::query()->whereHas('plugins')->count(),
            'categories' => PluginCategory::query()->orderBy('name')->get()->keyBy('slug'),
            'pluginsCount' => Plugin::count(),
            'plugins' => cache()->remember(
                'plugins',
                now()->addMinutes(15),
                function (): array {
                    $stars = Star::query()
                        ->toBase()
                        ->where('starrable_type', 'plugin')
                        ->groupBy('starrable_id')
                        ->selectRaw('count(id) as count, starrable_id')
                        ->get()
                        ->pluck('count', 'starrable_id');

                    return Plugin::query()
                        ->orderByDesc('publish_date')
                        ->with(['author'])
                        ->get()
                        ->map(fn (Plugin $plugin): array => [
                            'id' => $plugin->slug,
                            'name' => $plugin->name,
                            'slug' => $plugin->slug,
                            'price' => $plugin->getPrice(),
                            'stars_count' => $stars[$plugin->getKey()] ?? 0,
                            'thumbnail_url' => $plugin->getThumbnailUrl(),
                            'github_repository' => $plugin->github_repository,
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
                            'publish_date' => $plugin->publish_date->format('Y-m-d'),
                        ])
                        ->all();
                },
            ),
            'starsCount' => Star::query()->where('starrable_type', 'plugin')->count(),
        ]);
    }
}
