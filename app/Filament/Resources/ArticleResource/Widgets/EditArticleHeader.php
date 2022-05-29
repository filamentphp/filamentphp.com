<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\Article;
use Filament\Widgets\Widget;

class EditArticleHeader extends Widget
{
    public Article $record;

    protected $listeners = [
        'articleUpdated' => '$refresh',
    ];

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.resources.article-resource.widgets.edit-article-header';
}
