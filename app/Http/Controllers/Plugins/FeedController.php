<?php

namespace App\Http\Controllers\Plugins;

use App\Enums\PluginCategory;
use App\Http\Controllers\Controller;
use App\Models\Plugin;

class FeedController extends Controller
{
    public function __invoke()
    {
        $plugins = Plugin::query()
            ->published()
            ->with(['author', 'media'])
            ->get()
            ->map(fn (Plugin $plugin): array => [
                'id' => $plugin->id,
                'name' => $plugin->name,
                'slug' => $plugin->slug,
                'description' => $plugin->description,
                'thumbnail' => $plugin->getThumbnailUrl(),
                'categories' => collect($plugin->categories)->map(fn (string $category): string => PluginCategory::tryFrom($category)?->getLabel())->all(),
                'github_repository' => $plugin->github_repository,
                'license' => $plugin->license,
                'price' => $plugin->getPrice(),
                'url' => route('plugins.view', $plugin),
                'author' => [
                    'name' => $plugin->getAuthorName(),
                ],
                'created_at' => $plugin->created_at->toDateTimeString(),
                'updated_at' => $plugin->updated_at->toDateTimeString()
            ])
            ->all();

        return [
            'last_updated_at' => Plugin::query()->published()->latest('updated_at')->value('updated_at')->toDateTimeString(),
            'plugins' => $plugins,
        ];
    }
}
