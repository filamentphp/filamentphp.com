<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Illuminate\Contracts\View\View;

class ViewPluginController extends Controller
{
    public function __invoke(Plugin $plugin): View
    {
        $plugin->load(['author']);

        seo()
            ->title("{$plugin->name} by {$plugin->author->name} - Plugins")
            ->description($plugin->description ?? '')
            ->image($plugin->getThumbnailUrl());

        $viewingKey = "plugins.{$plugin->getKey()}.views.".request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $plugin->increment('views');
        }

        return view('plugins.view-plugin', [
            'plugin' => $plugin,
        ]);
    }
}
