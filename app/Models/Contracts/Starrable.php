<?php

namespace App\Models\Contracts;

use App\Models\Author;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Starrable
{
    public function stars(): MorphMany;

    public function cacheStarsCount(): void;

    public function getAuthor(): Author;
}
