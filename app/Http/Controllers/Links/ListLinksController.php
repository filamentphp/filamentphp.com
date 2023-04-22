<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Contracts\View\View;

class ListLinksController extends Controller
{
    public function __invoke(): View
    {
        seo()->title('Links');

        return view('links.list-links', [
            'famousLink' => Link::query()
                ->published()
                ->with(['author', 'media'])
                ->orderByDesc('views')
                ->limit(5)
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
