<?php

namespace App\Http\Livewire\Plugins;

use App\Models\Plugin;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPlugins extends Component
{
    use WithPagination;

    public $categoryFilter = [];

    public $search = '';

    public $sort = 'recent';

    public $tableRecordsPerPage = 32;

    public function mount(): void
    {
        if (session()->has('livewire.search-plugins.sort')) {
            $this->sort = session()->get('livewire.search-plugins.sort');
        }

        if (session()->has('livewire.search-plugins.table_records_per_page')) {
            $this->tableRecordsPerPage = session()->get('livewire.search-plugins.table_records_per_page');
        }
    }

    protected function getPlugins()
    {
        return Plugin::query()
            ->published()
            ->when(
                filled($this->search),
                function (Builder $query): Builder {
                    return $query->where(function (Builder $query): Builder {
                        return $query->where('name', 'like', "%{$this->search}%")
                            ->orWhere('description', 'like', "%{$this->search}%")
                            ->orWhere('slug', 'like', "%{$this->search}%")
                            ->orWhereRelation('author', 'name', 'like', "%{$this->search}%");
                    });
                },
            )
            ->when(
                count($this->categoryFilter),
                function (Builder $query): Builder {
                    return $query->where(function (Builder $query): Builder {
                        foreach ($this->categoryFilter as $category) {
                            $query->whereJsonContains('categories', $category);
                        }

                        return $query;
                    });
                },
            )
            ->when($this->sort === 'popular', fn (Builder $query): Builder => $query->orderByDesc('views'))
            ->when($this->sort === 'recent', fn (Builder $query): Builder => $query->latest())
            ->when($this->sort === 'alphabetical', fn (Builder $query): Builder => $query->orderBy('name'))
            ->with(['author', 'media'])
            ->paginate($this->tableRecordsPerPage);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedSort(): void
    {
        session()->put('livewire.search-plugins.sort', $this->sort);

        $this->resetPage();
    }

    public function updatedTableRecordsPerPage(): void
    {
        session()->put('livewire.search-plugins.table_records_per_page', $this->tableRecordsPerPage);

        $this->resetPage();
    }

    public function toggleCategoryFilter(string $category): void
    {
        if (in_array($category, $this->categoryFilter)) {
            $key = array_search($category, $this->categoryFilter);

            if (false !== $key) {
                unset($this->categoryFilter[$key]);
            }

            return;
        }

        $this->categoryFilter[] = $category;
    }
}
