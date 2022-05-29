<?php

namespace App\Http\Livewire\Tricks;

use App\Models\Trick;
use Livewire\Component;

class FavoriteTrick extends Component
{
    public Trick $trick;

    public function toggleFavorite(): void
    {
        $this->trick->toggleFavorite();
    }
}
