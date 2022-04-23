<?php

namespace App\Filament\Resources\TrickResource\Pages;

use App\Filament\Resources\TrickResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListTricks extends ListRecords
{
    protected static string $resource = TrickResource::class;

    protected function getCreateAction(): Action
    {
        return parent::getCreateAction()->label('Submit trick');
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
