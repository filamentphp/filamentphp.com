<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;

class ViewArticleController extends Controller
{
    public function __invoke(Article $article): View
    {
        $article->load(['author']);

        seo()->title("{$article->title} by {$article->author->name} - Blog");

        $viewingKey = "articles.{$article->getKey()}.views.".request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $article->increment('views');
        }

        return view('blog.view-article', [
            'article' => $article,
            'otherArticles' => Article::query()
                ->published()
                ->with(['author'])
                ->inRandomOrder()
                ->whereNot('id', $article->id)
                ->limit(3)
                ->get(),
        ]);
    }
}
