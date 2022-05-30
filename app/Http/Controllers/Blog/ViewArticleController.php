<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ViewArticleController extends Controller
{
    public function __invoke(Article $article)
    {
        $article->load(['author']);

        seo()
            ->title("{$article->title} by {$article->author->name} - Blog");

        $viewingKey = "articles.{$article->getKey()}.views." . request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $article->views++;
            $article->save();
        }

        return view('blog.view-article', [
            'article' => $article,
            'otherArticles' => Article::query()
                ->published()
                ->inRandomOrder()
                ->whereNot('id', $article->id)
                ->limit(3)
                ->get(),
        ]);
    }
}
