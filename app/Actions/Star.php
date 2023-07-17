<?php

namespace App\Actions;

use App\Models\Contracts\Starrable;

class Star
{
    public function __invoke(Starrable $starrable): void
    {
        if ($starrable->stars()->where('ip', request()->ip())->exists()) {
            return;
        }

        $starrable->stars()->create([
            'ip' => request()->ip(),
        ]);

        $starrable->cacheStarsCount();
        $starrable->getAuthor()->cacheStarsCount();
    }
}
