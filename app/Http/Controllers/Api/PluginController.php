<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PluginResource;
use App\Models\Plugin;
use Illuminate\Http\Request;

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
