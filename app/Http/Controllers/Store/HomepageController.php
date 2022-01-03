<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\StoreProduct;

class HomepageController extends Controller
{
    public function __invoke()
    {
        return view('store.index', [
            'popularProducts' => StoreProduct::query()
                ->with(['owner'])
                ->withCount(['purchasers'])
                ->orderBy('purchasers_count', 'desc')
                ->limit(4)
                ->get(),
        ]);
    }
}
