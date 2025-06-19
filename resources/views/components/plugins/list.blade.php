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

            // Reset the page number on category, version, price or sort change
            $watch(
                '[selectedCategories.size, selectedVersion, selectedPrice, selectedSort, features]',
                () => {
                    currentPage = 1
                },
            )

            // Initialize the minisearch instance
            searchEngine = new MiniSearch({
                fields: ['name', 'description', 'github_repository', 'author.name'],
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

            // Index the plugins
            searchEngine.addAll(plugins)

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
        showCategories: false,
        selectedCategories: new Set(),
        selectedVersion: $queryString('3').usePush().as('version'),
        selectedPrice: $queryString('All').usePush().as('price'),
        selectedSort: $queryString('Newest').usePush().as('sort'),
        features: $queryString({
            dark_theme: false,
            translations: false,
        })
            .usePush()
            .as('features'),

        plugins: @js($plugins),

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

        get filteredPlugins() {
            let filterResult = this.plugins

            // Show plugins that are in the selected categories
            if (this.selectedCategories.size > 0) {
                filterResult = filterResult.filter((plugin) =>
                    plugin.categories.some((pluginCategory) =>
                        this.selectedCategories.has(pluginCategory),
                    ),
                )
            }

            // Show plugins that are in the selected version
            filterResult = filterResult.filter((plugin) =>
                plugin.versions.includes(+this.selectedVersion),
            )

            // Show plugins that are in the selected features
            filterResult = filterResult.filter(
                (plugin) =>
                    (this.features.dark_theme
                        ? plugin.features.dark_theme
                        : true) &&
                    (this.features.translations
                        ? plugin.features.translations
                        : true),
            )

            // If the selectedPrice is 'All', show all plugins, if the selectedPrice is 'Free', only show plugins that have a price of 'Free', if the selectedPrice is 'Paid', only show plugins that have a price that is not 'Free'
            filterResult = filterResult.filter(
                (plugin) =>
                    this.selectedPrice === 'All' ||
                    (this.selectedPrice === 'Free' && plugin.price === 'Free') ||
                    (this.selectedPrice === 'Paid' && plugin.price !== 'Free'),
            )

            // Sort the results
            if (this.selectedSort === 'Newest') {
                filterResult = filterResult.sort((a, b) =>
                    a.publish_date < b.publish_date ? 1 : -1,
                )
            } else if (this.selectedSort === 'Oldest') {
                filterResult = filterResult.sort((a, b) =>
                    a.publish_date > b.publish_date ? 1 : -1,
                )
            } else if (this.selectedSort === 'Alphabetical') {
                filterResult = filterResult.sort((a, b) =>
                    a.name > b.name ? 1 : -1,
                )
            } else if (this.selectedSort === 'Popular') {
                filterResult = filterResult.sort((a, b) =>
                    a.stars_count < b.stars_count ? 1 : -1,
                )
            }

            // If the search is not empty, show plugins that match the search
            if (this.search) {
                const searchResult = this.searchEngine.search(this.search)

                filterResult = filterResult.filter((plugin) =>
                    searchResult.some((result) => result.id === plugin.id),
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
    {{-- Header --}}
    <div class="text-2xl font-bold">All Plugins</div>

    <div class="flex flex-wrap items-center gap-3 pt-5">
        {{-- Version Switch --}}
        <div class="min-[1170px]:min-w-[15rem]">
            <div
                class="relative z-10 inline-flex select-none items-center gap-2.5 rounded-full bg-white p-[.55rem] font-medium shadow-lg shadow-black/[0.01]"
            >
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
                    class="relative z-20 w-14 text-center transition duration-300"
                    x-on:click="selectedVersion = '4'"
                    :class="{
                            'cursor-pointer opacity-50 hover:opacity-100': selectedVersion !== '4',
                            'text-salmon': selectedVersion === '4',
                        }"
                >
                    v4.x
                </div>
                <div
                    class="absolute left-[.31rem] top-[.31rem] -z-10 h-8 w-16 rounded-full bg-fair-pink transition duration-300 ease-out will-change-transform"
                    :class="{
                            'translate-x-[4.1rem]': selectedVersion === '3',
                            'translate-x-[8.2rem]': selectedVersion === '4',
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

        {{-- Price Toggle --}}
        <div
            class="relative z-10 flex h-11 w-[205px] select-none items-center justify-between gap-1 rounded-full bg-white px-[.55rem] text-sm font-medium shadow-lg shadow-black/[0.01]"
        >
            <div
                x-on:click="selectedPrice = 'All'"
                class="relative z-20 w-14 text-center transition duration-300"
                :class="{
                    'cursor-pointer opacity-50 hover:opacity-100': selectedPrice !== 'All',
                    'text-salmon': selectedPrice === 'All',
                }"
            >
                All
            </div>
            <div
                x-on:click="selectedPrice = 'Free'"
                class="relative z-20 w-14 text-center transition duration-300"
                :class="{
                    'cursor-pointer opacity-50 hover:opacity-100': selectedPrice !== 'Free',
                    'text-salmon': selectedPrice === 'Free',
                }"
            >
                Free
            </div>
            <div
                x-on:click="selectedPrice = 'Paid'"
                class="relative z-20 w-14 text-center transition duration-300"
                :class="{
                    'cursor-pointer opacity-50 hover:opacity-100': selectedPrice !== 'Paid',
                    'text-salmon': selectedPrice === 'Paid',
                }"
            >
                Paid
            </div>
            <div
                class="absolute left-[.35rem] top-[.35rem] -z-10 h-8 w-16 rounded-full bg-fair-pink transition duration-300 ease-out will-change-transform"
                :class="{
                    'translate-x-[4rem]': selectedPrice === 'Free',
                    'translate-x-[8.2rem]': selectedPrice === 'Paid',
                }"
            ></div>
        </div>

        {{-- Vertical Divider --}}
        <div
            class="hidden h-5 w-px rounded-full bg-hurricane/10 min-[1170px]:block"
        ></div>

        {{-- Dark Mode Toggle --}}
        <div
            x-on:click="features.dark_theme = ! features.dark_theme"
            class="group/dark-mode-toggle flex cursor-pointer select-none items-center gap-3 rounded-full py-3 pl-4 pr-6 transition duration-300 hover:shadow-lg hover:shadow-black/[0.01]"
            :class="{
                'bg-fair-pink': features.dark_theme,
                'bg-white': ! features.dark_theme,
            }"
        >
            <div class="text-salmon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                >
                    <g fill="currentColor">
                        <path
                            d="M19.9 2.307a.483.483 0 0 0-.9 0l-.43 1.095a.484.484 0 0 1-.272.274l-1.091.432a.486.486 0 0 0 0 .903l1.091.432a.48.48 0 0 1 .272.273L19 6.81c.162.41.74.41.9 0l.43-1.095a.484.484 0 0 1 .273-.273l1.091-.432a.486.486 0 0 0 0-.903l-1.091-.432a.484.484 0 0 1-.273-.274l-.43-1.095ZM16.033 8.13a.483.483 0 0 0-.9 0l-.157.399a.484.484 0 0 1-.272.273l-.398.158a.486.486 0 0 0 0 .903l.398.157c.125.05.223.148.272.274l.157.399c.161.41.739.41.9 0l.157-.4a.484.484 0 0 1 .272-.273l.398-.157a.486.486 0 0 0 0-.903l-.398-.158a.484.484 0 0 1-.272-.273l-.157-.4Z"
                        />
                        <path
                            d="M12 22c5.523 0 10-4.477 10-10c0-.463-.694-.54-.933-.143a6.5 6.5 0 1 1-8.924-8.924C12.54 2.693 12.463 2 12 2C6.477 2 2 6.477 2 12s4.477 10 10 10Z"
                        />
                    </g>
                </svg>
            </div>
            <div
                class="text-sm transition duration-300"
                :class="{
                    'text-salmon': features.dark_theme,
                    'opacity-70 text-dolphin group-hover/dark-mode-toggle:opacity-100': ! features.dark_theme,
                }"
            >
                Dark mode
            </div>
        </div>

        {{-- Vertical Divider --}}
        <div
            class="hidden h-5 w-px rounded-full bg-hurricane/10 min-[1170px]:block"
        ></div>

        {{-- Multi Language Toggle --}}
        <div
            x-on:click="features.translations = ! features.translations"
            class="group/multi-language-toggle flex cursor-pointer select-none items-center gap-3 rounded-full py-3 pl-4 pr-6 transition duration-300 hover:shadow-lg hover:shadow-black/[0.01]"
            :class="{
                'bg-fair-pink': features.translations,
                'bg-white': ! features.translations,
            }"
        >
            <div class="text-salmon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="19"
                    height="19"
                    viewBox="0 0 20 20"
                >
                    <g fill="currentColor">
                        <path
                            d="M7.75 2.75a.75.75 0 0 0-1.5 0v1.258a32.987 32.987 0 0 0-3.599.278a.75.75 0 1 0 .198 1.487A31.545 31.545 0 0 1 8.7 5.545A19.381 19.381 0 0 1 7 9.56a19.418 19.418 0 0 1-1.002-2.05a.75.75 0 0 0-1.384.577a20.935 20.935 0 0 0 1.492 2.91a19.613 19.613 0 0 1-3.828 4.154a.75.75 0 1 0 .945 1.164A21.116 21.116 0 0 0 7 12.331c.095.132.192.262.29.391a.75.75 0 0 0 1.194-.91a18.97 18.97 0 0 1-.59-.815a20.888 20.888 0 0 0 2.333-5.332c.31.031.618.068.924.108a.75.75 0 0 0 .198-1.487a32.832 32.832 0 0 0-3.599-.278V2.75Z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M13 8a.75.75 0 0 1 .671.415l4.25 8.5a.75.75 0 1 1-1.342.67L15.787 16h-5.573l-.793 1.585a.75.75 0 1 1-1.342-.67l4.25-8.5A.75.75 0 0 1 13 8Zm2.037 6.5L13 10.427L10.964 14.5h4.073Z"
                            clip-rule="evenodd"
                        />
                    </g>
                </svg>
            </div>
            <div
                class="text-sm transition duration-300"
                :class="{
                    'text-salmon': features.translations,
                    'opacity-70 text-dolphin group-hover/multi-language-toggle:opacity-100': ! features.translations,
                }"
            >
                Multi language
            </div>
        </div>
    </div>

    <div class="items-start gap-5 pt-5 sm:flex">
        {{-- Categories --}}
        <div class="w-full sm:max-w-[15rem]">
            <div class="hidden font-semibold sm:block">Categories</div>
            <div
                class="flex cursor-pointer justify-between gap-5 rounded-lg bg-merino px-3.5 py-2.5 sm:hidden"
                x-on:click="showCategories = !showCategories"
            >
                <div class="font-semibold">
                    <span>Select Categories</span>
                    <span class="text-sm tracking-tighter">
                        <span>(</span>
                        <span x-text="selectedCategories.size"></span>
                        <span>)</span>
                    </span>
                </div>
                <div
                    class="transition duration-300"
                    :class="{
                        'rotate-180': !showCategories,
                    }"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <g
                            fill="none"
                            fill-rule="evenodd"
                        >
                            <path
                                d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"
                            />
                            <path
                                fill="currentColor"
                                d="M12.707 15.707a1 1 0 0 1-1.414 0L5.636 10.05A1 1 0 1 1 7.05 8.636l4.95 4.95l4.95-4.95a1 1 0 0 1 1.414 1.414l-5.657 5.657Z"
                            />
                        </g>
                    </svg>
                </div>
            </div>
            <div
                class="flex flex-wrap gap-x-2 gap-y-0.5 pt-5"
                :class="{
                    'opacity-0 invisible h-0 sm:opacity-100 sm:visible sm:h-auto': !showCategories,
                }"
            >
                @foreach ($categories as $category)
                    <x-plugins.category
                        :name="$category->name"
                        :slug="$category->slug"
                    >
                        <x-slot name="icon">
                            {!! $category->getIcon() !!}
                        </x-slot>
                    </x-plugins.category>
                @endforeach
            </div>
        </div>

        <div class="w-full">
            {{-- Pagination --}}
            <div class="flex items-center justify-between px-1 py-3">
                <div
                    class="flex flex-1 flex-wrap items-center gap-5 lg:flex-nowrap"
                >
                    <div
                        x-show="filteredPlugins.length"
                        class="mr-auto text-sm text-gray-700"
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

                    {{-- Sort Selectbox --}}
                    <select
                        x-model="selectedSort"
                        class="block w-32 rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-salmon focus:ring-salmon"
                    >
                        <option>Newest</option>
                        <option>Popular</option>
                        <option>Oldest</option>
                        <option>Alphabetical</option>
                    </select>

                    <div x-show="!filteredPlugins.length">
                        <div class="text-sm text-gray-700">
                            No results found
                        </div>
                    </div>

                    <x-ui.pagination />
                </div>
            </div>

            <div class="relative min-h-[16rem]">
                {{-- Plugins --}}
                <div
                    x-ref="plugin_cards_wrapper"
                    x-init="
                        () => {
                            autoAnimate($refs.plugin_cards_wrapper)
                        }
                    "
                    class="sticky left-0 top-5 grid w-full grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-6"
                >
                    <template
                        x-for="plugin in filteredPlugins"
                        :key="plugin.id"
                    >
                        <x-plugins.card />
                    </template>
                </div>

                {{-- No Results Message --}}
                <div
                    x-show="! filteredPlugins.length"
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
                        Sorry we couldn't find any plugins matching your search.
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
