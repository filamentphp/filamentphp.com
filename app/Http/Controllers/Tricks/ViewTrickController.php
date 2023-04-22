<?php

namespace App\Http\Controllers\Tricks;

use App\Http\Controllers\Controller;
use App\Models\Trick;
use Illuminate\Contracts\View\View;

class ViewTrickController extends Controller
{
    public function __invoke(Trick $trick): View
    {
        $trick->load(['author']);

        seo()->title("{$trick->title} by {$trick->author->name} - Tricks");

        $viewingKey = "tricks.{$trick->getKey()}.views.".request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $trick->increment('views');
        }

        return view('tricks.view-trick', [
            'otherTricks' => Trick::query()
                ->published()
                ->with(['author'])
                ->inRandomOrder()
                ->whereNot('id', $trick->id)
                ->limit(3)
                ->get(),
            'trick' => $trick,
        ]);
    }
}
