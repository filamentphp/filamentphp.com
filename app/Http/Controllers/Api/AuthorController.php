<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::paginate();
    }

    public function show(Author $author)
    {
        return $author->append('stars_count');
    }
}
