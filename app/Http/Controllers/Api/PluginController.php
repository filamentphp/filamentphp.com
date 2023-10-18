<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PluginResource;
use App\Models\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PluginResource::collection(Plugin::paginate());
    }


    /**
     * Display the specified resource.
     */
    public function show(Plugin $plugin)
    {
        return new PluginResource($plugin);
    }

}
