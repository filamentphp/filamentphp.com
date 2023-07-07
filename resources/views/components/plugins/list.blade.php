<div
    class="mx-auto w-full max-w-8xl px-10 pt-20"
    x-data="{
        search: '',

        plugins: [
            {
                price: 'Free',
                github_stars: 54,
                view_count: 3719,
                thumbnail: '',
                name: 'Access and Menu Management',
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
                price: '$199',
                github_stars: 145,
                view_count: 54001,
                thumbnail: '',
                name: 'Overlook',
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
                supported_versions: ['1', '2', '3'],
                categories: ['Admin Panel', 'Widget'],
                latest_activity_at: '2022-03-08T07:52:26+00:00',
            },
            {
                price: '$199',
                github_stars: 145,
                view_count: 54001,
                thumbnail: '',
                name: 'Foobar',
                link: 'https://filament.app.test/plugins/overlook',
                description:
                    'Widget to show an overview of resources on the dashboard.',
                author: {
                    name: 'Adam Weston',
                    avatar: 'https://avatars.githubusercontent.com/u/3596800?v=4',
                },
                features: {
                    dark_mode: true,
                    multi_language: false,
                },
                supported_versions: ['1', '2', '3'],
                categories: ['Admin Panel', 'Widget'],
                latest_activity_at: '2022-03-08T07:52:26+00:00',
            },
        ],

        get filteredPlugins() {
            return this.plugins.filter(
                // search in the names
                (plugin) =>
                    plugin.name.toLowerCase().includes(this.search.toLowerCase()),
            )
        },
    }"
>
    {{-- Search Bar --}}
    <div
        class="group/search-bar relative w-full max-w-xs overflow-hidden rounded-full bg-white shadow-lg shadow-black/[0.02] transition duration-200 focus-within:shadow-xl focus-within:shadow-black/[0.03]"
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
            class="absolute right-0 top-0 grid h-full w-12 place-items-center bg-transparent"
        >
            <svg
                class="cursor-pointer transition delay-75 duration-200 will-change-transform hover:text-salmon text-hurricane"
                x-show="search"
                x-on:click="search = ''"
                x-transition:enter="ease-out"
                x-transition:enter-start="translate-x-1 rotate-45 opacity-0"
                x-transition:enter-end="translate-x-0 rotate-0 opacity-100"
                x-transition:leave="ease-in"
                x-transition:leave-start="translate-x-0 rotate-0 opacity-100"
                x-transition:leave-end="translate-x-1 rotate-45 opacity-0"
                xmlns="http://www.w3.org/2000/svg"
                width="19"
                height="19"
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

    <div class="flex items-start gap-5 pt-5">
        {{-- Categories --}}
        <div class="w-full max-w-[15rem]">Categories</div>

        {{-- Plugins --}}
        <div
            x-ref="plugin_cards_wrapper"
            x-init="
                () => {
                    autoAnimate($refs.plugin_cards_wrapper)
                }
            "
            class="grid w-full grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-6"
        >
            <template
                x-for="plugin in filteredPlugins"
                :key="plugin.name"
                class=""
            >
                <x-plugins.card />
            </template>
        </div>
    </div>
</div>
