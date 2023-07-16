<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class ViewPluginController extends Controller
{
    public function __invoke(Plugin $plugin)
    {
        return view('plugins.view-plugin', ['plugin' => $plugin]);
    }
}
