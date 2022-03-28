<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;

class ViewLinkController extends Controller
{
    public function __invoke(Link $link)
    {
        $viewingKey = "links.{$link->getKey()}.views." . request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $link->views++;
            $link->save();
        }

        return redirect($link->url);
    }
}
