<div
    class="mx-auto w-full max-w-8xl px-5 sm:px-10"
    x-cloak
    x-data="{
        search: '',
        selectedCategory: new Set(),
        selectedVersion: '3',
        selectedPrice: 'All',
        features: {
            dark_mode: false,
            multi_language: false,
        },

        plugins: [
            {
                id: 1,
                name: 'Access and Menu Management',
                price: 'Free',
                github_stars: 54,
                view_count: 3719,
                thumbnail: '',
                link: 'https://filament.app.test/plugins/access-and-menu-management',
                description: 'Modular support based on nwidart/laravel-modules.',
                author: {
                    name: 'Alan Lam',
                    avatar: null,
                },
                features: {
                    dark_mode: false,
                    multi_language: false,
                },
                supported_versions: ['1', '2'],
                categories: ['Editor', 'Authentication'],
                latest_activity_at: '2023-04-07T00:21:45.148Z',
            },
            {
                id: 2,
                name: 'Overlook',
                price: '$199',
                github_stars: 145,
                view_count: 54001,
                thumbnail: '',
                link: 'https://filament.app.test/plugins/overlook',
                description:
                    'Widget to show an overview of resources on the dashboard.',
                author: {
                    name: 'Adam Weston',
                    avatar: 'https://avatars.githubusercontent.com/u/3596800?v=4',
                },
                features: {
                    dark_mode: true,
                    multi_language: true,
                },
                supported_versions: ['2', '3'],
                categories: ['Admin Panel', 'Widget'],
                latest_activity_at: '2022-03-08T07:52:26+00:00',
            },
            {
                id: 3,
                name: 'Access and Menu Management',
                price: 'Free',
                github_stars: 9,
                view_count: 8901,
                thumbnail: '',
                link: 'https://filament.app.test/plugins/overlook',
                description:
                    'This is an authentication plugin provides a way to manage users, roles, permissions, and Menu in a Filament Admin application.',
                author: {
                    name: 'alan lam',
                    avatar: '',
                },
                features: {
                    dark_mode: true,
                    multi_language: false,
                },
                supported_versions: ['2'],
                categories: [
                    'Admin Panel',
                    'Authentication',
                    'Authorization',
                    'Spatie',
                ],
                latest_activity_at: '2022-03-08T07:52:26+00:00',
            },
            {
                id: 4,
                name: 'User & Role Resource Management',
                price: 'Free',
                github_stars: 71,
                view_count: 33461,
                thumbnail: '',
                link: 'https://filament.app.test/plugins/overlook',
                description: 'Widget for Dashboard to show recent registrations',
                author: {
                    name: 'Craig Smith',
                    avatar: 'https://avatars.githubusercontent.com/u/952595?v=4',
                },
                features: {
                    dark_mode: false,
                    multi_language: true,
                },
                supported_versions: ['2', '3'],
                categories: ['Admin Panel', 'Spatie', 'Widget', 'Authentication'],
                latest_activity_at: '2022-03-05T07:52:26+00:00',
            },
            {
                id: 5,
                name: 'Toggle Icon Column',
                price: '$99',
                github_stars: 2,
                view_count: 8792,
                thumbnail: '',
                link: 'https://filament.app.test/plugins/overlook',
                description:
                    'Toggle Icon Column combines Filaments interactive Toggle Column with its Icon Column to give developers another way to interact with their tables.',
                author: {
                    name: 'Kenneth Sese',
                    avatar: 'https://avatars.githubusercontent.com/u/952595?v=4',
                },
                features: {
                    dark_mode: true,
                    multi_language: true,
                },
                supported_versions: ['1', '2', '3'],
                categories: ['Admin Panel', 'Column', 'Table Builder'],
                latest_activity_at: '2022-03-05T07:52:26+00:00',
            },
        ],

        get filteredPlugins() {
            return this.plugins.filter(
                // search in the names
                (plugin) =>
                    plugin.name.toLowerCase().includes(this.search.toLowerCase()) &&
                    // Show plugins that are in the selected categories
                    (this.selectedCategory.size === 0 ||
                        this.selectedCategory.has(plugin.categories[0])) &&
                    // Show plugins that are in the selected version
                    plugin.supported_versions.includes(this.selectedVersion) &&
                    // Show plugins that are in the selected features
                    (this.features.dark_mode ? plugin.features.dark_mode : true) &&
                    (this.features.multi_language
                        ? plugin.features.multi_language
                        : true) &&
                    // If the selectedPrice is 'All', show all plugins, if the selectedPrice is 'Free', only show plugins that have a price of 'Free', if the selectedPrice is 'Paid', only show plugins that have a price that is not 'Free'
                    (this.selectedPrice === 'All' ||
                        (this.selectedPrice === 'Free' &&
                            plugin.price === 'Free') ||
                        (this.selectedPrice === 'Paid' && plugin.price !== 'Free')),
            )
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
            x-on:click="features.dark_mode = ! features.dark_mode"
            class="group/dark-mode-toggle flex cursor-pointer select-none items-center gap-3 rounded-full py-3 pl-4 pr-6 transition duration-200 hover:shadow-lg hover:shadow-black/[0.01]"
            :class="{
                'bg-fair-pink text-salmon': features.dark_mode,
                'bg-white text-dolphin': ! features.dark_mode,
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
                class="text-sm transition duration-200"
                :class="{
                    'opacity-70 group-hover/dark-mode-toggle:opacity-100': ! features.dark_mode,
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
            x-on:click="features.multi_language = ! features.multi_language"
            class="group/multi-language-toggle flex cursor-pointer select-none items-center gap-3 rounded-full py-3 pl-4 pr-6 transition duration-200 hover:shadow-lg hover:shadow-black/[0.01]"
            :class="{
                'bg-fair-pink text-salmon': features.multi_language,
                'bg-white text-dolphin': ! features.multi_language,
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
                class="text-sm transition duration-200"
                :class="{
                    'opacity-70 group-hover/multi-language-toggle:opacity-100': ! features.multi_language,
                }"
            >
                Multi language
            </div>
        </div>
    </div>

    <div class="flex items-start gap-5 pt-5">
        {{-- Categories --}}
        <div class="hidden w-full max-w-[15rem] sm:block">
            <div class="font-semibold">Categories</div>
            <div class="pt-5">
                <x-plugins.category>
                    <x-slot name="category">Action</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="21"
                            height="21"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                d="M19.503 9.97c1.204.489 1.112 2.224-.137 2.583l-6.306 1.813l-2.88 5.895c-.57 1.168-2.295.957-2.568-.314L4.677 6.257A1.369 1.369 0 0 1 6.53 4.7l12.973 5.27Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Admin Panel</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="21"
                            height="21"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="currentColor"
                                d="M12 23C6.443 21.765 2 16.522 2 11V5l10-4l10 4v6c0 5.524-4.443 10.765-10 12ZM4 6v5a10.58 10.58 0 0 0 8 10a10.58 10.58 0 0 0 8-10V6l-8-3Z"
                            />
                            <circle
                                cx="12"
                                cy="8.5"
                                r="2.5"
                                fill="currentColor"
                            />
                            <path
                                fill="currentColor"
                                d="M7 15a5.782 5.782 0 0 0 5 3a5.782 5.782 0 0 0 5-3c-.025-1.896-3.342-3-5-3c-1.667 0-4.975 1.104-5 3Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Analytics</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <g
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 22h18"
                                />
                                <path
                                    d="M3 11c0-.943 0-1.414.293-1.707C3.586 9 4.057 9 5 9c.943 0 1.414 0 1.707.293C7 9.586 7 10.057 7 11v6c0 .943 0 1.414-.293 1.707C6.414 19 5.943 19 5 19c-.943 0-1.414 0-1.707-.293C3 18.414 3 17.943 3 17v-6Zm7-4c0-.943 0-1.414.293-1.707C10.586 5 11.057 5 12 5c.943 0 1.414 0 1.707.293C14 5.586 14 6.057 14 7v10c0 .943 0 1.414-.293 1.707C13.414 19 12.943 19 12 19c-.943 0-1.414 0-1.707-.293C10 18.414 10 17.943 10 17V7Zm7-3c0-.943 0-1.414.293-1.707C17.586 2 18.057 2 19 2c.943 0 1.414 0 1.707.293C21 2.586 21 3.057 21 4v13c0 .943 0 1.414-.293 1.707C20.414 19 19.943 19 19 19c-.943 0-1.414 0-1.707-.293C17 18.414 17 17.943 17 17V4Z"
                                />
                            </g>
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Authentication</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="currentColor"
                                d="M6 9V7.25C6 3.845 8.503 1 12 1s6 2.845 6 6.25V9h.5a2.5 2.5 0 0 1 2.5 2.5v8a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 19.5v-8A2.5 2.5 0 0 1 5.5 9Zm-1.5 2.5v8a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-13a1 1 0 0 0-1 1Zm3-4.25V9h9V7.25c0-2.67-1.922-4.75-4.5-4.75c-2.578 0-4.5 2.08-4.5 4.75Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Authorization</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="currentColor"
                                d="M12 12h7c-.53 4.11-3.28 7.78-7 8.92V12H5V6.3l7-3.11M12 1L3 5v6c0 5.55 3.84 10.73 9 12c5.16-1.27 9-6.45 9-12V5l-9-4Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Column</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="currentColor"
                                d="M4 3.77c0-.967.784-1.75 1.75-1.75h12.5c.966 0 1.75.783 1.75 1.75v2.5a1.75 1.75 0 0 1-1.75 1.75H5.75A1.75 1.75 0 0 1 4 6.27v-2.5Zm1.75-.25a.25.25 0 0 0-.25.25v2.5c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25v-2.5a.25.25 0 0 0-.25-.25H5.75ZM4 10.77c0-.967.784-1.75 1.75-1.75h12.5c.966 0 1.75.783 1.75 1.75v2.5a1.75 1.75 0 0 1-1.75 1.75H5.75A1.75 1.75 0 0 1 4 13.27v-2.5Zm1.75-.25a.25.25 0 0 0-.25.25v2.5c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25v-2.5a.25.25 0 0 0-.25-.25H5.75Zm0 5.5A1.75 1.75 0 0 0 4 17.77v2.5c0 .966.784 1.75 1.75 1.75h12.5A1.75 1.75 0 0 0 20 20.27v-2.5a1.75 1.75 0 0 0-1.75-1.75H5.75Zm-.25 1.75a.25.25 0 0 1 .25-.25h12.5a.25.25 0 0 1 .25.25v2.5a.25.25 0 0 1-.25.25H5.75a.25.25 0 0 1-.25-.25v-2.5Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Developer Tool</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-width="1.5"
                                d="m17 7.83l1.697 1.526c1.542 1.389 2.313 2.083 2.313 2.974c0 .89-.771 1.585-2.314 2.973L17 16.83M13.987 5L12 12.415l-1.987 7.415M7 7.83L5.304 9.356C3.76 10.745 2.99 11.44 2.99 12.33c0 .89.771 1.585 2.314 2.973L7 16.83"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Editor</x-slot>
                    <x-slot name="icon">
                        <svg
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
                                stroke-width="1.5"
                                d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0L5 16ZM15 6l3 3m-5 11h8"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Field</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="currentColor"
                                d="M15.5 7.5h-2.75v9h.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1 0-1.5h.5v-9H8.5v.75a.75.75 0 1 1-1.5 0v-1.5A.75.75 0 0 1 7.75 6h8.5a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0V7.5ZM5.75 3A3.75 3.75 0 0 0 2 6.75v10.5A3.75 3.75 0 0 0 5.75 21h12.5A3.75 3.75 0 0 0 22 17.25V6.75A3.75 3.75 0 0 0 18.25 3H5.75ZM3.5 6.75A2.25 2.25 0 0 1 5.75 4.5h12.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25H5.75a2.25 2.25 0 0 1-2.25-2.25V6.75Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Form Builder</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 48 48"
                        >
                            <path
                                fill="currentColor"
                                d="M21 21.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0Zm-2.5 0a2 2 0 1 0-4 0a2 2 0 0 0 4 0Zm-2 15.5a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm0-2.5a2 2 0 1 1 0-4a2 2 0 0 1 0 4ZM13.25 12a1.25 1.25 0 1 0 0 2.5h21.5a1.25 1.25 0 1 0 0-2.5h-21.5ZM23 21.75c0-.69.56-1.25 1.25-1.25h10.5a1.25 1.25 0 1 1 0 2.5h-10.5c-.69 0-1.25-.56-1.25-1.25ZM24.25 31a1.25 1.25 0 1 0 0 2.5h10.5a1.25 1.25 0 1 0 0-2.5h-10.5Zm-12-25A6.25 6.25 0 0 0 6 12.25v23.5A6.25 6.25 0 0 0 12.25 42h23.5A6.25 6.25 0 0 0 42 35.75v-23.5A6.25 6.25 0 0 0 35.75 6h-23.5ZM8.5 12.25a3.75 3.75 0 0 1 3.75-3.75h23.5a3.75 3.75 0 0 1 3.75 3.75v23.5a3.75 3.75 0 0 1-3.75 3.75h-23.5a3.75 3.75 0 0 1-3.75-3.75v-23.5Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Kit</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            viewBox="0 0 32 32"
                        >
                            <path
                                fill="currentColor"
                                d="M12.1 2a9.8 9.8 0 0 0-5.4 1.6l6.4 6.4a2.1 2.1 0 0 1 .2 3a2.1 2.1 0 0 1-3-.2L3.7 6.4A9.84 9.84 0 0 0 2 12.1a10.14 10.14 0 0 0 10.1 10.1a10.9 10.9 0 0 0 2.6-.3l6.7 6.7a5 5 0 0 0 7.1-7.1l-6.7-6.7a10.9 10.9 0 0 0 .3-2.6A10 10 0 0 0 12.1 2Zm8 10.1a7.61 7.61 0 0 1-.3 2.1l-.3 1.1l.8.8l6.7 6.7a2.88 2.88 0 0 1 .9 2.1A2.72 2.72 0 0 1 27 27a2.9 2.9 0 0 1-4.2 0l-6.7-6.7l-.8-.8l-1.1.3a7.61 7.61 0 0 1-2.1.3a8.27 8.27 0 0 1-5.7-2.3A7.63 7.63 0 0 1 4 12.1a8.33 8.33 0 0 1 .3-2.2l4.4 4.4a4.14 4.14 0 0 0 5.9.2a4.14 4.14 0 0 0-.2-5.9L10 4.2a6.45 6.45 0 0 1 2-.3a8.27 8.27 0 0 1 5.7 2.3a8.49 8.49 0 0 1 2.4 5.9Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Layout</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                d="M2.5 6.5c0-1.886 0-2.828.586-3.414C3.672 2.5 4.614 2.5 6.5 2.5c1.886 0 2.828 0 3.414.586c.586.586.586 1.528.586 3.414v11c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586c-1.886 0-2.828 0-3.414-.586C2.5 20.328 2.5 19.386 2.5 17.5v-11Zm11 9c0-1.886 0-2.828.586-3.414c.586-.586 1.528-.586 3.414-.586c1.886 0 2.828 0 3.414.586c.586.586.586 1.528.586 3.414v2c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586c-1.886 0-2.828 0-3.414-.586c-.586-.586-.586-1.528-.586-3.414v-2Zm0-10c0-.932 0-1.398.152-1.765a2 2 0 0 1 1.083-1.083c.367-.152.833-.152 1.765-.152h2c.932 0 1.398 0 1.765.152a2 2 0 0 1 1.083 1.083c.152.367.152.833.152 1.765c0 .932 0 1.398-.152 1.765a2 2 0 0 1-1.083 1.083c-.367.152-.833.152-1.765.152h-2c-.932 0-1.398 0-1.765-.152a2 2 0 0 1-1.083-1.083C13.5 6.898 13.5 6.432 13.5 5.5Z"
                            />
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Spatie</x-slot>
                    <x-slot name="icon">
                        <div class="font-black">S</div>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Table Builder</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 256 256"
                        >
                            <g fill="currentColor">
                                <path
                                    d="M88 104v96H32v-96Z"
                                    opacity=".2"
                                />
                                <path
                                    d="M224 48H32a8 8 0 0 0-8 8v136a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a8 8 0 0 0-8-8ZM40 112h40v32H40Zm56 0h120v32H96Zm120-48v32H40V64ZM40 160h40v32H40Zm176 32H96v-32h120v32Z"
                                />
                            </g>
                        </svg>
                    </x-slot>
                </x-plugins.category>
                <x-plugins.category>
                    <x-slot name="category">Widget</x-slot>
                    <x-slot name="icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <g
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    d="M14.5 6.5h3m0 0h3m-3 0v3m0-3v-3"
                                />
                                <path
                                    d="M2.5 6.5c0-1.886 0-2.828.586-3.414C3.672 2.5 4.614 2.5 6.5 2.5c1.886 0 2.828 0 3.414.586c.586.586.586 1.528.586 3.414c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586c-1.886 0-2.828 0-3.414-.586C2.5 9.328 2.5 8.386 2.5 6.5Zm11 11c0-1.886 0-2.828.586-3.414c.586-.586 1.528-.586 3.414-.586c1.886 0 2.828 0 3.414.586c.586.586.586 1.528.586 3.414c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586c-1.886 0-2.828 0-3.414-.586c-.586-.586-.586-1.528-.586-3.414Zm-11 0c0-1.886 0-2.828.586-3.414c.586-.586 1.528-.586 3.414-.586c1.886 0 2.828 0 3.414.586c.586.586.586 1.528.586 3.414c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586c-1.886 0-2.828 0-3.414-.586C2.5 20.328 2.5 19.386 2.5 17.5Z"
                                />
                            </g>
                        </svg>
                    </x-slot>
                </x-plugins.category>
            </div>
        </div>

        <div class="relative min-h-[16rem] w-full">
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
                    class=""
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
    </div>
</div>
