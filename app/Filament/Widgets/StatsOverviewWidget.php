<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Link;
use App\Models\Plugin;
use App\Models\Trick;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                'Plugins',
                Plugin::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-puzzle'),
            Card::make(
                'Tricks',
                Trick::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-lightning-bolt'),
            Card::make(
                'Articles',
                Article::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-bookmark-alt'),
            Card::make(
                'Links',
                Link::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->count(),
            )->icon('heroicon-s-link'),
            Card::make(
                'Views',
                Plugin::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views') +
                Trick::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views') +
                Article::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views') +
                Link::query()
                    ->whereBelongsTo(auth()->user(), 'author')
                    ->sum('views'),
            )->icon('heroicon-s-eye'),
        ];
    }
}
