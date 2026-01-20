<?php

namespace App\Http\Controllers\Plugins;

use App\Actions\GetPluginsListData;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Plugin;
use App\Models\PluginCategory;
use App\Models\Star;
use Illuminate\Database\Eloquent\Builder;

class ListPluginsController extends Controller
{
    public function __invoke(GetPluginsListData $getPluginsListData)
    {
        seo()
            ->title('Plugins')
            ->description('Community made packages for Filament projects, which give you access to awesome new features.')
            ->image('https://previewlinks.io/generate/templates/1055/meta?url=' . url()->current())
            ->tag('previewlinks:overline', 'Filament')
            ->tag('previewlinks:title', 'Plugins')
            ->tag('previewlinks:subtitle', 'Community made packages for Filament projects, which give you access to awesome new features.')
            ->tag('previewlinks:image', 'https://filamentphp.com/images/icon.png')
            ->tag('previewlinks:repository', 'filament/filament');

        return view('plugins.list-plugins', [
            'authorsCount' => Author::query()
                ->whereHas('plugins')
                ->count(),
            'categories' => PluginCategory::query()
                ->orderBy('name')
                ->get()
                ->keyBy('slug'),
            'pluginsCount' => Plugin::count(),
            'plugins' => $getPluginsListData(),
            'featuredPlugins' => $getPluginsListData([
                'zepfietje-themes',
                'kenneth-sese-advanced-tables',
                'ralphjsmit-media-library-manager',
            ]),
            'starsCount' => Star::query()
                ->where('starrable_type', 'plugin')
                ->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))
                ->count(),
        ]);
    }
}
