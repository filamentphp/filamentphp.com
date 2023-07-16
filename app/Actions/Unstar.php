<?php

namespace App\Actions;

use App\Models\Contracts\Starrable;
use Illuminate\Database\Eloquent\Model;

class Unstar
{
    public function __invoke(Starrable $starrable): void
    {
        $starrable->stars()->where('ip', request()->ip())->delete();

        $starrable->cacheStarsCount();
        $starrable->getAuthor()->cacheStarsCount();
    }
}
