<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListLinks extends ListRecords
{
    protected static string $resource = LinkResource::class;

    protected function getCreateAction(): Action
    {
        return parent::getCreateAction()->label('Submit link');
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
