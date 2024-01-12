<section
    class="mx-auto w-full max-w-8xl px-5 sm:px-10"
    x-cloak
    x-ref="section"
    x-init="
        () => {
            // Reset the page number on search input change
            $watch('search', (newValue, oldValue) => {
                if (newValue !== oldValue) {
                    currentPage = 1
                }
            })

            // Reset the page number on category, type or version change
            $watch('[selectedCategories.size, selectedType, selectedVersion]', () => {
                currentPage = 1
            })

            // Initialize the minisearch instance
            searchEngine = new MiniSearch({
                fields: ['title', 'author.name'],
                searchOptions: {
                    fuzzy: 0.1,
                    prefix: true,
                },
                extractField: (document, fieldName) => {
                    // Enabled access to nested fields
                    return fieldName
                        .split('.')
                        .reduce((doc, key) => doc && doc[key], document)
                },
            })

            // Index the articles
            searchEngine.addAll(articles)

            if (reducedMotion) return
            gsap.fromTo(
                $refs.section,
                {
                    autoAlpha: 0,
                    y: 50,
                },
                {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    x-data="{
        searchEngine: null,
        search: $queryString('').usePush().as('search'),
        selectedCategories: new Set(),
        selectedType: $queryString('all').usePush().as('type'),
        selectedVersion: $queryString('3').usePush().as('version'),

        articles: @js($articles),
        categories: @js($categories),
        types: @js($types),

        _currentPage: $queryString(1).usePush().as('page'),
        get currentPage() {
            return +this._currentPage
        },
        set currentPage(value) {
            this._currentPage = value
        },

        perPage: 24,
        totalItems: 0,
        get totalPages() {
            return Math.ceil(this.totalItems / this.perPage)
        },

        get filteredArticles() {
            let filterResult = this.articles

            // Show articles that are in the selected categories
            if (this.selectedCategories.size > 0) {
                filterResult = filterResult.filter((article) =>
                    article.categories.some((articleCategory) =>
                        this.selectedCategories.has(articleCategory),
                    ),
                )
            }

            // Show articles that are in the selected version, or no version at all
            filterResult = filterResult.filter(
                (article) =>
                    article.versions?.includes(+this.selectedVersion) ||
                    ! article.versions?.length,
            )

            // If the selectedType is 'all', show all records, else show only the records that match the selected type
            filterResult = filterResult.filter(
                (record) =>
                    this.selectedType === 'all' ||
                    this.selectedType === record.type,
            )

            // If the search is not empty, show articles that match the search
            if (this.search) {
                const searchResult = this.searchEngine.search(this.search)

                filterResult = filterResult.filter((article) =>
                    searchResult.some((result) => result.id === article.id),
                )

                // Order the results by the search score
                filterResult = filterResult.sort((a, b) =>
                    searchResult.find((result) => result.id === a.id).score <
                    searchResult.find((result) => result.id === b.id).score
                        ? 1
                        : -1,
                )
            }

            // Update the total items
            this.totalItems = filterResult.length

            // Paginate the results
            filterResult = filterResult.slice(
                (this.currentPage - 1) * this.perPage,
                this.currentPage * this.perPage,
            )

            return filterResult
        },
    }"
>
    <div
        class="flex flex-col gap-3 pt-5 min-[900px]:flex-row min-[900px]:items-center"
    >
        {{-- Type Toggle --}}
        <div
            class="relative z-10 flex h-11 select-none items-center justify-start gap-5 rounded-full bg-white px-[.55rem] text-sm font-medium shadow-lg shadow-black/[0.01]"
        >
            <div
                x-on:click="selectedType = 'all'"
                class="relative z-20 w-16 text-center transition duration-300"
                :class="{
                    'cursor-pointer text-evening/70 hover:text-evening': selectedType !== 'all',
                    'text-salmon': selectedType === 'all',
                }"
            >
                All
            </div>
            @foreach ($types as $type)
                <div
                    x-on:click="selectedType = @js($type['slug'])"
                    class="relative z-20 flex w-20 items-center gap-2 text-center transition duration-300"
                    :class="{
                        'cursor-pointer text-evening/70 hover:text-evening': selectedType !== @js($type['slug']),
                        @js(match ($type['color']) {
                            'amber' => 'text-amber-600',
                            'blue' => 'text-blue-600',
                            'violet' => 'text-violet-600',
                        }): selectedType === @js($type['slug']),
                    }"
                >
                    {!! $type['icon'] !!}

                    <div>
                        {{ $type['name'] }}
                    </div>
                </div>
            @endforeach

            @php
                $typeConditionalColorClasses = $types
                    ->map(
                        fn (array $type): string => \Illuminate\Support\Js::from(
                            match ($type['color']) {
                                'amber' => 'bg-amber-100/60',
                                'blue' => 'bg-blue-100/60',
                                'violet' => 'bg-violet-100/60',
                            },
                        ) .
                            ': selectedType === ' .
                            \Illuminate\Support\Js::from($type['slug']),
                    )
                    ->implode(',');
            @endphp

            <div
                class="absolute left-[.35rem] top-[.35rem] -z-10 h-[2.1rem] rounded-full transition duration-300 ease-out will-change-transform"
                :class="{
                    'bg-fair-pink w-[4.5rem]': selectedType === 'all',
                    'translate-x-[4.5rem] w-[6.5rem]' : selectedType === 'article',
                    'translate-x-[10.7rem] w-[6rem]' : selectedType === 'news',
                    'translate-x-[17rem] w-[6rem]' : selectedType === 'trick',
                    {{ $typeConditionalColorClasses }},
                }"
            ></div>
        </div>

        <div
            class="flex w-full flex-1 flex-wrap items-center gap-3 min-[900px]:w-auto min-[900px]:flex-nowrap min-[900px]:justify-end"
        >
            {{-- Version Switch --}}
            <div
                class="relative z-10 inline-flex select-none items-center gap-2.5 rounded-full bg-white p-[.55rem] font-medium shadow-lg shadow-black/[0.01]"
            >
                <div
                    x-on:click="selectedVersion = '1'"
                    class="relative z-20 w-14 text-center transition duration-300"
                    :class="{
                        'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '1',
                        'text-salmon': selectedVersion === '1',
                    }"
                >
                    v1.x
                </div>
                <div
                    class="relative z-20 w-14 text-center transition duration-300"
                    x-on:click="selectedVersion = '2'"
                    :class="{
                        'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '2',
                        'text-salmon': selectedVersion === '2',
                    }"
                >
                    v2.x
                </div>
                <div
                    class="relative z-20 w-14 text-center transition duration-300"
                    x-on:click="selectedVersion = '3'"
                    :class="{
                        'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '3',
                        'text-salmon': selectedVersion === '3',
                    }"
                >
                    v3.x
                </div>
                <div
                    class="absolute left-[.31rem] top-[.31rem] -z-10 h-8 w-16 rounded-full bg-fair-pink transition duration-300 ease-out will-change-transform"
                    :class="{
                        'translate-x-[4.1rem]': selectedVersion === '2',
                        'translate-x-[8.2rem]': selectedVersion === '3',
                    }"
                ></div>
            </div>
        </div>

        <div
            class="flex w-full flex-wrap items-center gap-3 min-[900px]:w-auto min-[900px]:flex-nowrap min-[900px]:justify-end"
        >
            {{-- Search Bar --}}
            <div
                class="group/search-bar relative w-full overflow-hidden rounded-full bg-white shadow-lg shadow-black/[0.01] transition duration-200 focus-within:shadow-xl focus-within:shadow-black/[0.02] sm:max-w-xs"
            >
                {{-- Magnify Icon --}}
                <div
                    class="absolute left-1.5 top-1.5 grid h-8 w-8 place-items-center rounded-full bg-fair-pink text-salmon"
                >
                    <svg
                        class="transition duration-200 will-change-transform"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m20 20l-4.05-4.05m0 0a7 7 0 1 0-9.9-9.9a7 7 0 0 0 9.9 9.9z"
                        />
                    </svg>
                </div>
                <!-- X icon -->
                <div
                    class="absolute right-0 top-0 grid h-full w-14 place-items-center bg-transparent"
                >
                    <svg
                        class="cursor-pointer text-hurricane transition duration-200 will-change-transform hover:scale-125 hover:text-salmon"
                        x-show="search"
                        x-on:click="search = ''"
                        x-transition:enter="delay-75 ease-out"
                        x-transition:enter-start="translate-x-1 rotate-45 opacity-0"
                        x-transition:enter-end="translate-x-0 rotate-0 opacity-100"
                        x-transition:leave="delay-75 ease-in"
                        x-transition:leave-start="translate-x-0 rotate-0 opacity-100"
                        x-transition:leave-end="translate-x-1 rotate-45 opacity-0"
                        xmlns="http://www.w3.org/2000/svg"
                        width="17"
                        height="17"
                        viewBox="0 0 256 256"
                    >
                        <path
                            fill="currentColor"
                            d="M205.66 194.34a8 8 0 0 1-11.32 11.32L128 139.31l-66.34 66.35a8 8 0 0 1-11.32-11.32L116.69 128L50.34 61.66a8 8 0 0 1 11.32-11.32L128 116.69l66.34-66.35a8 8 0 0 1 11.32 11.32L139.31 128Z"
                        />
                    </svg>
                </div>
                {{-- Search Input --}}
                <input
                    type="text"
                    x-model="search"
                    placeholder="Search ..."
                    class="w-full appearance-none border-none bg-transparent py-3 pl-12 pr-10 text-sm outline-none placeholder:transition placeholder:duration-200 focus:ring-0 group-focus-within/search-bar:placeholder:translate-x-1 group-focus-within/search-bar:placeholder:opacity-0"
                />
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="pt-5">
        <div class="font-semibold">Categories</div>

        {{-- List Of Categories --}}
        <div class="flex flex-wrap gap-x-2.5 gap-y-3 pt-5">
            <template
                x-for="(category, index) in categories"
                :key="index"
            >
                <div
                    class="cursor-pointer select-none rounded-full px-5 py-2.5 text-sm transition duration-200"
                    x-text="category.name"
                    :class="{
                        'bg-salmon text-white': selectedCategories.has(category.slug),
                        'bg-stone-100 hover:bg-stone-200/70': ! selectedCategories.has(category.slug),
                    }"
                    x-on:click="
                        selectedCategories.has(category.slug)
                            ? selectedCategories.delete(category.slug)
                            : selectedCategories.add(category.slug)
                    "
                ></div>
            </template>
        </div>
    </div>

    <div class="flex items-start gap-5 pt-5">
        <div class="w-full">
            {{-- Pagination --}}
            <div class="flex items-center justify-between px-1 py-3">
                <div class="flex flex-1 items-center justify-between">
                    <div
                        x-show="filteredArticles.length"
                        class="text-sm text-gray-700"
                    >
                        Showing
                        <span
                            class="font-extrabold"
                            x-text="(currentPage - 1) * perPage + 1"
                        ></span>
                        to
                        <span
                            class="font-extrabold"
                            x-text="Math.min(currentPage * perPage, totalItems)"
                        ></span>
                        of
                        <span
                            class="font-extrabold"
                            x-text="totalItems"
                        ></span>
                        results
                    </div>
                    <div x-show="!filteredArticles.length">
                        <div class="text-sm text-gray-700">
                            No results found
                        </div>
                    </div>
                    <x-ui.pagination />
                </div>
            </div>

            <div class="relative min-h-[16rem]">
                {{-- Articles --}}
                <div
                    x-ref="article_cards_wrapper"
                    x-init="
                        () => {
                            autoAnimate($refs.article_cards_wrapper)
                        }
                    "
                    class="grid w-full grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-6"
                >
                    <template
                        x-for="article in filteredArticles"
                        :key="article.id"
                    >
                        <x-articles.card />
                    </template>
                </div>

                {{-- No Results Message --}}
                <div
                    x-show="! filteredArticles.length"
                    x-transition:enter="ease-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute right-1/2 top-0 grid w-full translate-x-1/2 place-items-center pt-10 transition duration-200"
                >
                    <svg
                        class="text-evening/40"
                        xmlns="http://www.w3.org/2000/svg"
                        width="40"
                        height="40"
                        viewBox="0 0 256 256"
                    >
                        <path
                            fill="currentColor"
                            d="m228.24 219.76l-51.38-51.38a86.15 86.15 0 1 0-8.48 8.48l51.38 51.38a6 6 0 0 0 8.48-8.48ZM38 112a74 74 0 1 1 74 74a74.09 74.09 0 0 1-74-74Z"
                        />
                    </svg>
                    <div class="pt-2 font-semibold text-evening/70">
                        No Results Found
                    </div>
                    <div class="pt-0.5 text-sm text-evening/50">
                        Sorry we couldn't find any articles matching your
                        search.
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-end px-1 pt-7">
                <x-ui.pagination />
            </div>
        </div>
    </div>
</section>
