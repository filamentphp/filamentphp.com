<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\User;

class ListPluginsController extends Controller
{
    public function __invoke()
    {
        return view('plugins.list-plugins', [
            'popularPlugins' => Plugin::query()
                ->with(['author'])
//                ->withCount(['purchasers'])
//                ->orderBy('purchasers_count', 'desc')
                ->limit(4)
                ->get(),
            'totalPlugins' => Plugin::query()->count(),
            'totalPluginAuthors' => User::query()->whereHas('plugins')->count(),
        ]);
    }
}
