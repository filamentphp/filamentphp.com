<section
    class="mx-auto w-full max-w-8xl px-5 sm:px-10"
    x-cloak
    x-ref="section"
    x-init="
        () => {
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

            // Index the records
            searchEngine.addAll(records)

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
        search: '',
        selectedCategories: new Set(),
        selectedVersion: '3',
        selectedType: 'All',
        features: {
            dark_theme: false,
            translations: false,
        },

        records: @js($records),

        currentPage: 1,
        perPage: 24,
        totalItems: 0,
        get totalPages() {
            return Math.ceil(this.totalItems / this.perPage)
        },

        get filteredRecords() {
            let filterResult = this.records

            // Show records that are in the selected categories
            if (this.selectedCategories.size > 0) {
                filterResult = filterResult.filter((record) =>
                    record.categories.some((recordCategory) =>
                        this.selectedCategories.has(recordCategory),
                    ),
                )
            }

            // Show records that are in the selected version
            filterResult = filterResult.filter((record) =>
                record.versions.includes(+this.selectedVersion),
            )

            // Show records that are in the selected features
            filterResult = filterResult.filter(
                (record) =>
                    (this.features.dark_theme
                        ? record.features.dark_theme
                        : true) &&
                    (this.features.translations
                        ? record.features.translations
                        : true),
            )

            // If the selectedType is 'All', show all records, if the selectedType is 'Trick', only show records that have a type of 'Trick', if the selectedType is 'Article', only show records that have a type that is 'Article'
            filterResult = filterResult.filter(
                (record) =>
                    this.selectedType === 'All' ||
                    (this.selectedType === 'Trick' && record.type === 'Trick') ||
                    (this.selectedType === 'Article' && record.type === 'Article'),
            )

            // If the search is not empty, show records that match the search
            if (this.search) {
                const searchResult = this.searchEngine.search(this.search)

                filterResult = filterResult.filter((record) =>
                    searchResult.some((result) => result.id === record.id),
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
    <div class="flex flex-wrap items-center gap-3 pt-5">
        {{-- Version Switch --}}
        <div class="min-[1170px]:min-w-[15rem]">
            <div
                class="relative z-10 inline-flex select-none items-center gap-2.5 rounded-full bg-white p-[.55rem] font-medium shadow-lg shadow-black/[0.01]"
            >
                <div
                    x-on:click="selectedVersion = '1'"
                    class="relative z-20 w-14 text-center transition duration-300"
                    :class="{
                            'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '1',
                            'text-violet-600': selectedVersion === '1',
                        }"
                >
                    v1.x
                </div>
                <div
                    class="relative z-20 w-14 text-center transition duration-300"
                    x-on:click="selectedVersion = '2'"
                    :class="{
                            'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '2',
                            'text-violet-600': selectedVersion === '2',
                        }"
                >
                    v2.x
                </div>
                <div
                    class="relative z-20 w-14 text-center transition duration-300"
                    x-on:click="selectedVersion = '3'"
                    :class="{
                            'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '3',
                            'text-violet-600': selectedVersion === '3',
                        }"
                >
                    v3.x
                </div>
                <div
                    class="absolute left-[.31rem] top-[.31rem] -z-10 h-8 w-16 rounded-full bg-violet-100/60 transition duration-300 ease-out will-change-transform"
                    :class="{
                            'translate-x-[4.1rem]': selectedVersion === '2',
                            'translate-x-[8.2rem]': selectedVersion === '3',
                        }"
                ></div>
            </div>
        </div>

        {{-- Search Bar --}}
        <div class="w-full sm:w-auto min-[1170px]:flex-1">
            <div
                class="group/search-bar relative w-full overflow-hidden rounded-full bg-white shadow-lg shadow-black/[0.01] transition duration-200 focus-within:shadow-xl focus-within:shadow-black/[0.02] sm:max-w-xs"
            >
                {{-- Magnify Icon --}}
                <div
                    class="absolute left-1.5 top-1.5 grid h-8 w-8 place-items-center rounded-full bg-violet-100/60 text-violet-600"
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

        {{-- Type Toggle --}}
        <div
            class="relative z-10 flex h-11 w-[275px] select-none items-center justify-start gap-5 rounded-full bg-white px-[.55rem] text-sm font-medium shadow-lg shadow-black/[0.01]"
        >
            <div
                x-on:click="selectedType = 'All'"
                class="relative z-20 w-14 text-center transition duration-300"
                :class="{
                    'cursor-pointer text-evening/70 hover:text-evening': selectedType !== 'All',
                    'text-slate-800': selectedType === 'All',
                }"
            >
                All
            </div>
            <div
                x-on:click="selectedType = 'Trick'"
                class="relative z-20 flex w-[4.5rem] items-center gap-2 text-center transition duration-300"
                :class="{
                    'cursor-pointer text-evening/70 hover:text-evening': selectedType !== 'Trick',
                    'text-violet-600': selectedType === 'Trick',
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    class="shrink-0"
                >
                    <path
                        fill="currentColor"
                        d="m9 4l2.5 5.5L17 12l-5.5 2.5L9 20l-2.5-5.5L1 12l5.5-2.5L9 4m0 4.83L8 11l-2.17 1L8 13l1 2.17L10 13l2.17-1L10 11L9 8.83M19 9l-1.26-2.74L15 5l2.74-1.25L19 1l1.25 2.75L23 5l-2.75 1.26L19 9m0 14l-1.26-2.74L15 19l2.74-1.25L19 15l1.25 2.75L23 19l-2.75 1.26L19 23Z"
                    />
                </svg>
                <div>Tricks</div>
            </div>
            <div
                x-on:click="selectedType = 'Article'"
                class="relative z-20 flex w-[4.5rem] items-center gap-2 text-center transition duration-300"
                :class="{
                    'cursor-pointer text-evening/70 hover:text-evening': selectedType !== 'Article',
                    'text-[#4BA284]': selectedType === 'Article',
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 28 28"
                    class="shrink-0"
                >
                    <path
                        fill="currentColor"
                        d="M8 10.25a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm.75 3.75a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM14 2a.75.75 0 0 1 .75.75V4h3.75V2.75a.75.75 0 0 1 1.5 0V4h.75A2.25 2.25 0 0 1 23 6.25v12.996a.75.75 0 0 1-.22.53l-5.504 5.504a.75.75 0 0 1-.53.22H6.75a2.25 2.25 0 0 1-2.25-2.25v-17A2.25 2.25 0 0 1 6.75 4H8V2.75a.75.75 0 0 1 1.5 0V4h3.75V2.75A.75.75 0 0 1 14 2ZM6 6.25v17c0 .414.336.75.75.75h9.246v-3.254a2.25 2.25 0 0 1 2.25-2.25H21.5V6.25a.75.75 0 0 0-.75-.75h-14a.75.75 0 0 0-.75.75Zm12.246 13.746a.75.75 0 0 0-.75.75v2.193l2.943-2.943h-2.193Z"
                    />
                </svg>
                <div>Articles</div>
            </div>
            <div
                class="absolute left-[.35rem] top-[.35rem] -z-10 h-[2.1rem] rounded-full transition duration-300 ease-out will-change-transform"
                :class="{
                    'bg-slate-100/80 w-16': selectedType === 'All',
                    'translate-x-[4.1rem] bg-violet-100/60 w-24': selectedType === 'Trick',
                    'translate-x-[10rem] bg-[#D4FFF0] w-[6.5rem]': selectedType === 'Article',
                }"
            ></div>
        </div>
    </div>

    <div class="flex items-start gap-5 pt-5">
        <div class="w-full">
            {{-- Pagination --}}
            <div class="flex items-center justify-between px-1 py-3">
                <div class="flex flex-1 items-center justify-between">
                    <div
                        x-show="filteredRecords.length"
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
                    <div x-show="!filteredRecords.length">
                        <div class="text-sm text-gray-700">
                            No results found
                        </div>
                    </div>
                    <x-ui.pagination />
                </div>
            </div>

            <div class="relative min-h-[16rem]">
                {{-- Records --}}
                <div
                    x-ref="record_cards_wrapper"
                    x-init="
                        () => {
                            autoAnimate($refs.record_cards_wrapper)
                        }
                    "
                    class="grid w-full grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-6"
                >
                    <template
                        x-for="record in filteredRecords"
                        :key="record.id"
                    >
                        <x-community.card />
                    </template>
                </div>

                {{-- No Results Message --}}
                <div
                    x-show="! filteredRecords.length"
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
                        Sorry we couldn't find any records matching your search.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
