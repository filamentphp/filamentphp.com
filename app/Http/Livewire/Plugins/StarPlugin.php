<?php

namespace App\Http\Livewire\Plugins;

use App\Actions\Star;
use App\Actions\Unstar;
use App\Models\Contracts\Starrable;
use App\Models\Plugin;
use Filament\Facades\Filament;
use Livewire\Component;

class StarPlugin extends Component
{
    public Plugin $plugin;

    public function isStarred(): bool
    {
        return $this->plugin->stars()->where('ip', request()->ip())->exists();
    }

    public function toggleStar(): void
    {
        if ($this->isStarred()) {
            app(Unstar::class)($this->plugin);

            return;
        }

        app(Star::class)($this->plugin);
    }

    public function render()
    {
        return view('livewire.plugins.star-plugin');
    }
}
