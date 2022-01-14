<?php

namespace App\Http\Livewire\Plugins;

use App\Models\Plugin;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = '';

    public $tableRecordsPerPage = 12;

    protected function getPlugins()
    {
        return Plugin::query()
            ->when(
                filled($this->search),
                fn (Builder $query) => $query->where('name', 'like', "%{$this->search}%"),
            )
            ->with(['author'])
            ->withCount(['purchasers'])
            ->orderBy('purchasers_count', 'desc')
            ->paginate($this->tableRecordsPerPage);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedTableRecordsPerPage(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.plugins.search');
    }
}
