<x-layouts.app>
    <div class="bg-primary-300">
        <div class="relative max-w-7xl px-8 py-24 mx-auto">
            <div class="space-y-8">
                <h1 class="text-4xl text-center font-heading">
                    Plugins
                </h1>

                <div class="mx-auto max-w-sm relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center justify-center w-10 h-10 text-primary-600 pointer-events-none">
                        <x-heroicon-o-search class="w-5 h-5" />
                    </span>

                    <input
                        x-data="{}"
                        x-on:focus="document.getElementById('search').focus(); document.getElementById('all-plugins').scrollIntoView({ behavior: 'smooth' })"
                        placeholder="Search"
                        type="search"
                        tabindex="0"
                        class="block w-full h-10 pl-10 bg-primary-200 border-0 placeholder-primary-600 rounded-lg focus:ring-0"
                    >
                </div>
            </div>

            <div class="hidden absolute inset-y-0 items-center left-32 md:flex">
                <img
                    src="{{ asset('images/bolt.svg') }}"
                    alt="Lightning bolt"
                    class="h-[8rem]"
                />
            </div>

            <div class="hidden absolute inset-y-0 items-center right-24 md:flex">
                <img
                    src="{{ asset('images/unicorn.svg') }}"
                    alt="Unicorn"
                    class="h-[10rem]"
                />
            </div>
        </div>
    </div>

    <x-section>
        <div class="flex items-center justify-between space-x-8">
            <h2 class="flex-shrink-0 text-lg font-heading text-gray-900">
                Popular plugins
            </h2>

            <a href="#all-plugins" class="whitespace-nowrap text-sm font-medium text-primary-600 hover:text-primary-500">
                View all &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
            @foreach ($popularPlugins as $plugin)
                <x-plugins.card :plugin="$plugin" />
            @endforeach
        </div>
    </x-section>

    <section class="bg-gray-900">
        <div class="relative lg:flex items-center space-y-16 max-w-7xl mx-auto px-8 py-32 lg:space-y-0 lg:space-x-16">
            <div class="flex-grow space-y-4">
                <h2 class="font-heading font-bold text-primary-200 text-4xl">
                    We ❤️ our community
                </h2>

                <p class="text-xl text-white">
                    ...and plugins are a big part of that. We now have <strong>{{ $totalPlugins }}</strong>, built by <strong>{{ $totalPluginAuthors }}</strong> amazing authors.
                </p>

                <p class="text-xl text-white">
                    Most of them are free, but all profits go towards funding ongoing development of the plugins and Filament itself.
                </p>
            </div>

            <div class="hidden absolute right-0 top-12 mr-12 xl:block">
                <img
                    src="{{ asset('images/hands.svg') }}"
                    alt="Hands"
                    class="h-[8rem]"
                />
            </div>
        </div>
    </section>

    <x-section id="all-plugins">
        @livewire('plugins.search')
    </x-section>
</x-layouts.app>
