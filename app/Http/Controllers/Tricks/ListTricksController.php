<?php

namespace App\Http\Controllers\Tricks;

use App\Http\Controllers\Controller;
use App\Models\Trick;

class ListTricksController extends Controller
{
    public function __invoke()
    {
        seo()->title('Tricks');

        return view('tricks.list-tricks', [
            'famousTrick' => Trick::query()
                ->published()
                ->with(['author'])
                ->orderByDesc('favorites')
                ->first(),
            'latestTrick' => Trick::query()
                ->published()
                ->with(['author'])
                ->latest()
                ->first(),
            'randomTrick' => Trick::query()
                ->published()
                ->with(['author'])
                ->inRandomOrder()
                ->first(),
        ]);
    }
}
