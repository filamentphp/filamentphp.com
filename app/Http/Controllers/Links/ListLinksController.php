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

        return view('links.list-links', [
            'famousLink' => Link::query()
                ->published()
                ->with(['author', 'media'])
                ->orderByDesc('views')
                ->limit(4)
                ->get()
                ->random(),
            'latestLink' => Link::query()
                ->published()
                ->with(['author', 'media'])
                ->latest()
                ->first(),
            'randomLink' => Link::query()
                ->published()
                ->with(['author', 'media'])
                ->inRandomOrder()
                ->first(),
        ]);
    }
}
