<?php

namespace App\Actions;

use App\Models\Plugin;
use App\Models\Star;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

class GetPluginsListData
{
    public function __invoke(array $plugins = null): array
    {
        return cache()->remember(
            $plugins ? ('plugins_' . implode(',', $plugins)) : 'plugins',
            now()->addMinutes(15),
            function () use ($plugins): array {
                $stars = Star::query()
                    ->toBase()
                    ->when(
                        $plugins,
                        fn (Builder $query) => $query->whereIn('starrable_id', $plugins),
                    )
                    ->where('starrable_type', 'plugin')
                    ->where(fn (Builder $query) => $query->whereNull('is_vpn_ip')->orWhere('is_vpn_ip', false))
                    ->groupBy('starrable_id')
                    ->selectRaw('count(id) as count, starrable_id')
                    ->get()
                    ->pluck('count', 'starrable_id');

                return Plugin::with(['author'])
                    ->draft(false)
                    ->when(
                        $plugins,
                        fn (EloquentBuilder $query) => $query->whereKey($plugins),
                    )
                    ->orderByDesc('publish_date')
                    ->get()
                    ->map(fn (Plugin $plugin): array => [
                        ...$plugin->getDataArray(),
                        'stars_count' => $stars[$plugin->getKey()] ?? 0,
                    ])
                    ->all();
            },
        );
    }
}
