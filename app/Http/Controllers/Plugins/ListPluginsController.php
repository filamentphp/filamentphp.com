<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\Trick;
use App\Models\User;

class ListPluginsController extends Controller
{
    public function __invoke()
    {
        seo()->title('Plugins');

        return view('plugins');
    }
}
