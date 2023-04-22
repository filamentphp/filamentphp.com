<?php

namespace App\Filament\Resources\PluginResource\Pages;

use App\Filament\Resources\PluginResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlugins extends ListRecords
{
    protected static string $resource = PluginResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Submit plugin'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PluginResource\Widgets\ListPluginsHeader::class,
        ];
    }

    protected function getTableEmptyStateHeading(): string
    {
        return 'You\'ve not submitted any plugins yet.';
    }
}
