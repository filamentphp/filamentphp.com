<?php

namespace App\Http\Livewire\Tricks;

use App\Models\Trick;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTricks extends Component
{
    use WithPagination;

    public $categoryFilter = [];

    public $search = '';

    public $sort = 'recent';

    public $tableRecordsPerPage = 32;

    public function mount(): void
    {
        if (session()->has('livewire.search-tricks.sort')) {
            $this->sort = session()->get('livewire.search-tricks.sort');
        }

        if (session()->has('livewire.search-tricks.table_records_per_page')) {
            $this->tableRecordsPerPage = session()->get('livewire.search-tricks.table_records_per_page');
        }
    }

    protected function getTricks()
    {
        return Trick::query()
            ->published()
            ->when(
                filled($this->search),
                function (Builder $query): Builder {
                    return $query->where(function (Builder $query): Builder {
                        return $query->where('name', 'like', "%{$this->search}%")
                            ->orWhere('description', 'like', "%{$this->search}%")
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
                }
            )
            ->when($this->sort === 'popular', fn (Builder $query): Builder => $query->orderByDesc('views'))
            ->when($this->sort === 'recent', fn (Builder $query): Builder => $query->latest())
            ->when($this->sort === 'alphabetical', fn (Builder $query): Builder => $query->orderBy('name'))
            ->with('author')
            ->paginate($this->tableRecordsPerPage);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedSort(): void
    {
        session()->put('livewire.search-tricks.sort', $this->sort);

        $this->resetPage();
    }

    public function updatedTableRecordsPerPage(): void
    {
        session()->put('livewire.search-tricks.table_records_per_page', $this->tableRecordsPerPage);

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