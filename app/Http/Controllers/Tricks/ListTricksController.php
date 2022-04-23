<?php

namespace App\Http\Controllers\Tricks;

use App\Http\Controllers\Controller;

class ListTricksController extends Controller
{
    public function __invoke()
    {
        seo()->title('Tricks');

        return view('tricks.list-tricks');
    }
}