<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\Plugin;
use App\Models\PluginCategory;
use App\Models\Star;

class ListArticlesController extends Controller
{
    public function __invoke()
    {
        return view('articles.list-articles', [
            'articlesCount' => Article::count(),
            'authorsCount' => Author::query()->whereHas('articles')->count(),
            'categories' => ArticleCategory::query()->orderBy('name')->get()->keyBy('slug'),
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
                        'versions' => $article->versions,
                    ])
                    ->all(),
            ),
            'starsCount' => Star::query()->where('starrable_type', 'article')->count(),
        ]);
    }
}
