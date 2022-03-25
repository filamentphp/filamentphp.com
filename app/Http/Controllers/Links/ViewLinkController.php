<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;

class ViewLinkController extends Controller
{
    public function __invoke(Link $link)
    {
        $link->views++;
        $link->save();

        return redirect($link->url);
    }
}
