<?php

namespace App\Livewire;

use App\Actions\Star;
use App\Actions\Unstar;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Starrecord extends Component
{
    public Model $record;

    public function isStarred(): bool
    {
        return $this->record->stars()->where('ip', request()->ip())->exists();
    }

    public function toggleStar(): void
    {
        if ($this->isStarred()) {
            app(Unstar::class)($this->record);

            return;
        }

        app(Star::class)($this->record);
    }

    public function render()
    {
        return view('livewire.star-record');
    }
}
