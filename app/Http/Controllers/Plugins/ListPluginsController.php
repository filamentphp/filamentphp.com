<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\User;

class ListPluginsController extends Controller
{
    public function __invoke()
    {
        seo()->title('Plugins');

        return view('plugins.list-plugins', [
            'featuredPlugins' => Plugin::query()
                ->published()
                ->with(['author'])
                ->where('is_featured', true)
                ->limit(4)
                ->get(),
            'totalPlugins' => Plugin::query()->published()->count(),
            'totalPluginAuthors' => User::query()->whereHas('plugins')->count(),
        ]);
    }
}
