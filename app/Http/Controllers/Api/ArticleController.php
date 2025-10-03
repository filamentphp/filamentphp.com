<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::paginate();
    }

    public function show(Article $article)
    {
        return $article->append('stars_count');
    }
}
