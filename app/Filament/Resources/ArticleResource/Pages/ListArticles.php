<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getCreateAction(): Action
    {
        return parent::getCreateAction()->label('Submit article');
    }

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
}
