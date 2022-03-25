<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\User;

class ListLinksController extends Controller
{
    public function __invoke()
    {
        seo()->title('Links');

        return view('links.list-links');
    }
}
