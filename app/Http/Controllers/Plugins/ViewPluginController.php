<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\V2Plugin;

class ViewPluginController extends Controller
{
    public function __invoke(string $plugin)
    {
        $pluginSlug = $plugin;

        $plugin = Plugin::find($pluginSlug);

        if ($plugin) {
            seo()
                ->title("{$plugin->name} by {$plugin->author->name}")
                ->description($plugin->description)
                ->image($plugin->getImageUrl() ?? $plugin->getThumbnailUrl());

            return view('plugins.view-plugin', ['plugin' => $plugin]);
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
