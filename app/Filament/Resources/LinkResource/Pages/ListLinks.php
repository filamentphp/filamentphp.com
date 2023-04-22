<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLinks extends ListRecords
{
    protected static string $resource = LinkResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Submit link'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LinkResource\Widgets\ListLinksHeader::class,
        ];
    }

    protected function getTableEmptyStateHeading(): string
    {
        return 'You\'ve not submitted any links yet.';
    }
}
