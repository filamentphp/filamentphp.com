<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;

class ViewLinkController extends Controller
{
    public function __invoke(Link $link): RedirectResponse
    {
        $viewingKey = "links.{$link->getKey()}.views.".request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $link->increment('views');
        }

        return redirect($link->url);
    }
}
