<?php

namespace App\Http\Controllers\Plugins;

use App\Actions\GetPluginsListData;
use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Illuminate\Http\Request;


class RssPluginsController extends Controller
{
    public function index()
    {
        $getPluginsListData = app(GetPluginsListData::class);
        $allPlugins         = $getPluginsListData();

        // Get the first 20 items
        $allPlugins = array_slice($allPlugins, 0, 20);

        $plugins = collect($allPlugins);

        return response()->view('plugins.rss-plugins', [
            'plugins' => $plugins
        ])->header('Content-Type', 'text/xml');
    }
}