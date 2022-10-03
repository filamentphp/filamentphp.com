<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ListArticlesController extends Controller
{
    public function __invoke()
    {
        seo()->title('Blog');

        return view('blog.list-articles', [
            'famousArticle' => Article::query()
                ->published()
                ->with(['author'])
                ->orderByDesc('views')
                ->limit(5)
                ->get()
                ->random(),
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
