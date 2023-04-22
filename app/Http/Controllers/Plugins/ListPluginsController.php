<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Illuminate\Contracts\View\View;

class ListPluginsController extends Controller
{
    public function __invoke(): View
    {
        seo()->title('Plugins');

        return view('plugins.list-plugins', [
            'famousPlugin' => Plugin::query()
                ->published()
                ->with(['author', 'media'])
                ->orderByDesc('views')
                ->limit(5)
                ->get()
                ->random(),
            'featuredPlugins' => Plugin::query()
                ->published()
                ->with(['author', 'media'])
                ->where('is_featured', true)
                ->limit(4)
                ->get(),
            'latestPlugin' => Plugin::query()
                ->published()
                ->with(['author', 'media'])
                ->latest()
                ->first(),
            'randomPlugin' => Plugin::query()
                ->published()
                ->with(['author', 'media'])
                ->inRandomOrder()
                ->first(),
        ]);
    }
}
