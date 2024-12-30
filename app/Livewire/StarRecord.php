<?php

namespace App\Livewire;

use App\Actions\Star;
use App\Actions\Unstar;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class StarRecord extends Component
{
    public Model $record;

    public $isStarred;

    public $starsCount;

    public function mount()
    {
        $this->isStarred = $this->isStarred();
        $this->starsCount = $this->calculateStarsCount();
    }

    public function isStarred(): bool
    {
        return $this->record->stars()->where('ip', request()->ip())->exists();
    }

    public function toggleStar(): void
    {
        if ($this->isStarred()) {
            app(Unstar::class)($this->record);

            $this->starsCount = $this->calculateStarsCount();
            $this->isStarred = false;

            return;
        }

        app(Star::class)($this->record);

        $this->starsCount = $this->calculateStarsCount();
        $this->isStarred = true;
    }

    protected function calculateStarsCount(): int
    {
        $count = $this->record->getStarsCount();

        if ($this->record->stars()->where('ip', request()->ip())->where('is_vpn_ip', true)->exists()) {
            $count++;
        }

        return $count;
    }

    public function render(): View
    {
        return view('livewire.star-record');
    }
}
