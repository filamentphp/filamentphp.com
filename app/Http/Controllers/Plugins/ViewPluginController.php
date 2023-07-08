<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class ViewPluginController extends Controller
{
    public function __invoke()
    {
        return view('plugins.view-plugin', [
            'plugin' => [
                'id' => 1,
                'name' => 'Access and Menu Management',
                'price' => 'Free',
                'github_stars' => 54,
                'view_count' => 3719,
                'thumbnail' => '',
                'description' => 'Modular support based on nwidart/laravel-modules.',
                'author' => [
                    'name' => 'Alan Lam',
                    'avatar' => null,
                ],
                'features' => [
                    'dark_mode' => false,
                    'multi_language' => false,
                ],
                'supported_versions' => ['1', '2'],
                'categories' => ['Editor', 'Authentication'],
                'latest_activity_at' => '2023-04-07T00:21:45.148Z',
            ],
        ]);
    }
}
