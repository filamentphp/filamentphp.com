<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index(Request $request)
    {
        return Plugin::query()
            ->when(
                $request->boolean('draft'),
                fn (Builder $query, bool $condition) => $query->draft($condition)
            )
            ->paginate();
    }

    public function show(Plugin $plugin)
    {
        return $plugin;
    }
}
