<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            ArticleResource\Widgets\ListArticlesHeader::class,
        ];
    }

    protected function getTableEmptyStateHeading(): string
    {
        return 'You\'ve not submitted any articles yet.';
    }

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Submit article'),
        ];
    }
}
