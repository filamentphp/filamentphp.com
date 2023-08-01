<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;

class ViewPluginController extends Controller
{
    public function __invoke(Plugin $plugin)
    {
        seo()
            ->title("{$plugin->name} by {$plugin->author->name}")
            ->image($plugin->getImageUrl() ?? $plugin->getThumbnailUrl());

        return view('plugins.view-plugin', ['plugin' => $plugin]);
    }
}
