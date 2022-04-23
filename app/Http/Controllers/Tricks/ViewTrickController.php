<?php

namespace App\Http\Controllers\Tricks;

use App\Http\Controllers\Controller;
use App\Models\Trick;

class ViewTrickController extends Controller
{
    public function __invoke(Trick $trick)
    {
        seo()
            ->title("{$trick->name} by {$trick->author->name} - Tricks");

        $viewingKey = "tricks.{$trick->getKey()}.views." . request()->ip();

        if (! cache()->has($viewingKey)) {
            cache()->put($viewingKey, now());

            $trick->views++;
            $trick->save();
        }

        return view('tricks.view-trick', [
            'trick' => $trick,
        ]);
    }
}