<?php

namespace App\Http\Controllers\Plugins;

use App\Actions\GetPluginsListData;
use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\V2Plugin;

class ViewPluginController extends Controller
{
    public function __invoke(GetPluginsListData $getPluginsListData, string $plugin)
    {
        $pluginSlug = $plugin;

        $plugin = Plugin::find($pluginSlug);

        if ($plugin) {
            seo()
                ->title("{$plugin->name} by {$plugin->author->name}")
                ->description($plugin->description)
                ->image($plugin->getImageUrl() ?? $plugin->getThumbnailUrl());

            $featuredPlugins = [
                'zepfietje-themes',
                'kenneth-sese-advanced-tables',
                'ralphjsmit-media-library-manager',
            ];

            if (in_array($pluginSlug, $featuredPlugins)) {
                $featuredPlugins = array_diff($featuredPlugins, [$pluginSlug]);
                $featuredPlugins[] = 'ralphjsmit-onboarding-manager-pro';
            }

            return view('plugins.view-plugin', [
                'plugin' => $plugin,
                'featuredPlugins' => $getPluginsListData($featuredPlugins),
            ]);
        }

        $v2Plugin = V2Plugin::query()
            ->where('slug', $pluginSlug)
            ->first();

        if (! $v2Plugin) {
            abort(404);
        }

        return redirect("https://v2.filamentphp.com/plugins/{$v2Plugin->slug}");
    }
}
