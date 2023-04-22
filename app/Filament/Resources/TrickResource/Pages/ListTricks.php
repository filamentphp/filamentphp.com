<?php

namespace App\Filament\Resources\TrickResource\Pages;

use App\Filament\Resources\TrickResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTricks extends ListRecords
{
    protected static string $resource = TrickResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Submit trick'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TrickResource\Widgets\ListTricksHeader::class,
        ];
    }

    protected function getTableEmptyStateHeading(): string
    {
        return 'You\'ve not submitted any tricks yet.';
    }
}
