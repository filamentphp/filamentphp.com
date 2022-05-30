<?php

namespace App\Http\Controllers\Tricks;

use App\Http\Controllers\Controller;
use App\Models\Trick;

class ViewTrickController extends Controller
{
    public function __invoke(Trick $trick)
    {
        $trick->load(['author']);

        seo()
            ->title("{$trick->title} by {$trick->author->name} - Tricks");

        $viewingKey = "tricks.{$trick->getKey()}.views." . request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $trick->views++;
            $trick->save();
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
