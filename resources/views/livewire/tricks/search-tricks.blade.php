<div class="space-y-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-lg text-gray-900 shrink-0 font-heading">
            All tricks
        </h2>

        <div class="flex items-center space-x-4">
            <div>
                <label class="sr-only" for="search">
                    Search
                </label>

                <div class="relative group">
                    <span class="absolute inset-y-0 flex items-center justify-center w-10 h-10 text-gray-400 transition pointer-events-none start-0 group-focus-within:text-primary-500">
                        <x-heroicon-o-search class="w-5 h-5" />
                    </span>

                    <input
                        wire:model="search"
                        id="search"
                        placeholder="Search"
                        type="search"
                        class="block w-full h-10 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm ps-10 focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600"
                    >
                </div>
            </div>

            <div>
                <label class="sr-only" for="sort">
                    Sort
                </label>

                <select
                    wire:model="sort"
                    id="sort"
                    class="block w-full text-gray-900 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600"
                >
                    <option value="popular">Popular</option>
                    <option value="recent">Recently added</option>
                    <option value="alphabetical">Alphabetical</option>
                </select>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-2">
        <span class="font-medium">
            Filter by:
        </span>

        @foreach (\App\Enums\TrickCategory::cases() as $category)
            <button
                type="button"
                wire:click="toggleCategoryFilter('{{ $category->value }}')"
                wire:loading.class="cursor-wait"
                wire:target="toggleCategoryFilter"
                @class([
                    'inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-normal',
                    'opacity-50' => count($categoryFilter) && (! in_array($category->value, $categoryFilter)),
                ])
            >
                {{ $category->getLabel() }}
            </button>
        @endforeach
    </div>

    @php
        $tricks = $this->getTricks()
    @endphp

    @if (count($tricks))
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            @foreach ($tricks as $trick)
                <x-tricks.card :trick="$trick" />
            @endforeach
        </div>
    @else
        <x-tables::empty-state
            icon="heroicon-o-x"
            heading="No tricks found"
            description="No tricks match your search criteria."
            class="border rounded-2xl"
        />
    @endif

    <x-tables::pagination
        :paginator="$tricks"
        :records-per-page-select-options="[16, 32, 48, 64]"
    />
</div>
