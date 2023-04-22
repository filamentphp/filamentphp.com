<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use Filament\Widgets\Widget;

class ListArticlesHeader extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected static string $view = 'filament.resources.article-resource.widgets.list-articles-header';
}
