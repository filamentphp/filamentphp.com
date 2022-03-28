<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class ViewPluginController extends Controller
{
    public function __invoke(Plugin $plugin)
    {
        seo()
            ->title("{$plugin->name} by {$plugin->author->name} - Plugins")
            ->description($plugin->description ?? '')
            ->image($plugin->getThumbnailUrl());

        $viewingKey = "plugins.{$plugin->getKey()}.views." . request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $plugin->views++;
            $plugin->save();
        }

        return view('plugins.view-plugin', [
            'plugin' => $plugin,
        ]);
    }
}
