<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ListArticlesController extends Controller
{
    public function __invoke()
    {
        return redirect()->route(Article::query()->first()->getUrl());

        seo()->title('Blog');

        return view('blog.list-articles', [
            'famousArticle' => Article::query()
                ->published()
                ->with(['author'])
                ->orderByDesc('views')
                ->first(),
            'latestArticle' => Article::query()
                ->published()
                ->with(['author'])
                ->latest()
                ->first(),
            'randomArticle' => Article::query()
                ->published()
                ->with(['author'])
                ->inRandomOrder()
                ->first(),
        ]);
    }
}
