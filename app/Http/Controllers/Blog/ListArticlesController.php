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
                ->orderByDesc('views')
                ->first(),
            'latestArticle' => Article::query()
                ->published()
                ->latest()
                ->first(),
            'randomArticle' => Article::query()
                ->published()
                ->inRandomOrder()
                ->first(),
        ]);
    }
}
