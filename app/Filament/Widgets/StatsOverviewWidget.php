<?php

namespace App\Filament\Widgets;

use App\Models\Link;
use App\Models\Plugin;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                'Your plugins',
                Plugin::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-puzzle'),
            Card::make(
                'Your links',
                Link::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-link'),
            Card::make(
                'Your views',
                Plugin::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views') +
                Link::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views'),
            )->icon('heroicon-s-eye'),
        ];
    }
}
