<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleType;
use App\Models\Author;
use App\Models\Star;

class ListArticlesController extends Controller
{
    public function __invoke()
    {
        return view('articles.list-articles', [
            'articles' => cache()->remember(
                'articles',
                now()->addMinutes(15),
                fn (): array => Article::query()
                    ->orderByDesc('publish_date')
                    ->with(['author'])
                    ->get()
                    ->map(fn (Article $article): array => [
                        'id' => $article->slug,
                        'title' => $article->title,
                        'slug' => $article->slug,
                        'publish_date' => $article->publish_date->diffForHumans(),
                        'stars_count' => $article->getStarsCount(),
                        'author' => [
                            'name' => $article->author->name,
                            'avatar' => $article->author->getAvatarUrl(),
                        ],
                        'categories' => $article->categories,
                        'type' => $article->type_slug,
                        'versions' => $article->versions,
                    ])
                    ->all(),
            ),
            'articlesCount' => Article::count(),
            'authorsCount' => Author::query()->whereHas('articles')->count(),
            'categories' => ArticleCategory::query()->orderBy('name')->get()->keyBy('slug'),
            'types' => ArticleType::query()->orderBy('name')->get()->keyBy('slug')->map(fn (ArticleType $type): array => [
                'name' => $type->name,
                'slug' => $type->slug,
                'color' => $type->color,
                'icon' => $type->getIcon(),
            ]),
            'starsCount' => Star::query()->where('starrable_type', 'article')->count(),
        ]);
    }
}
