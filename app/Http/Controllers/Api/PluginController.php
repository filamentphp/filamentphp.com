<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plugin;

class PluginController extends Controller
{
    public function index()
    {
        return Plugin::paginate();
    }

    public function show(Plugin $plugin)
    {
        return $plugin;
    }
}
