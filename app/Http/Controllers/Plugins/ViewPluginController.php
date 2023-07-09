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
                'name' => 'Media Library Manager',
                'price' => '€49,00',
                'buy_link' => 'https://checkout.anystack.sh/filament-media-library-pro?via=arf178',
                'github_stars' => null,
                'view_count' => 20303,
                'thumbnail' => '',
                'discord_link' => 'https://discord.com/channels/883083792112300104/961393209639067698',
                'github_link' => null,
                'description' => 'Give your users a beautiful way to upload, manage and select media and images in Filament Admin. Integrates with Spatie MediaLibrary.',
                'author' => [
                    'name' => 'Ralph J. Smit',
                    'avatar' => 'https://avatars.githubusercontent.com/u/59207045?v=4',
                    'twitter' => 'https://twitter.com/ralphjsmit',
                    'github' => 'https://github.com/ralphjsmit',
                    'stats' => [
                        'plugins' => 3,
                        'views' => 20303,
                        'stars' => 579,
                    ]
                ],
                'features' => [
                    'dark_mode' => true,
                    'multi_language' => true,
                ],
                'supported_versions' => ['2', '3'],
                'categories' => ['Admin Panel', 'Field', 'Kit', 'Spatie', 'Form Builder'],
                'latest_activity_at' => '2023-04-07T00:21:45.148Z',
            ],
        ]);
    }
}
