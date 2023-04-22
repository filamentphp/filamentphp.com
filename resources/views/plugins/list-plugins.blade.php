<x-layouts.app previewify="858" :previewify-data="[
    'title' => 'Filament Plugins',
    'subtitle' => 'Composer packages made by our community, giving you access to awesome new features.',
]">
    <x-header>
        Plugins

        <x-slot name="subheading">
            Composer packages made by our community for Filament projects, giving you access to awesome new features.
        </x-slot>

        <x-slot name="doodles">
            <div class="absolute inset-y-0 items-center hidden start-32 lg:flex">
                <img
                    src="{{ asset('images/bolt.svg') }}"
                    alt="Lightning bolt"
                    class="h-[8rem]"
                />
            </div>

            <div class="absolute inset-y-0 items-center hidden end-24 lg:flex">
                <img
                    src="{{ asset('images/unicorn.svg') }}"
                    alt="Unicorn"
                    class="h-[10rem]"
                />
            </div>
        </x-slot>
    </x-header>

    <x-section>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    ⭐️ Famous plugin
                </h2>

                <x-plugins.card :plugin="$famousPlugin" />
            </div>

            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    🆕 Latest plugin
                </h2>

                <x-plugins.card :plugin="$latestPlugin" />
            </div>

            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    🎲 Random plugin
                </h2>

                <x-plugins.card :plugin="$randomPlugin" />
            </div>
        </div>

        <div aria-hidden="true" class="border-t"></div>

        @livewire(\App\Http\Livewire\Plugins\SearchPlugins::class)
    </x-section>

    <section class="bg-gray-900">
        <div class="relative items-center px-8 py-32 mx-auto space-y-16 lg:flex max-w-8xl lg:space-y-0 lg:space-x-16">
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold font-heading text-primary-200">
                        Submit your own plugins 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the plugin dashboard to publish your own plugins to our website!
                    </p>
                </div>

                <a
                    href="/admin/plugins"
                    target="_blank"
                    class="inline-flex items-center justify-center px-6 text-lg font-semibold tracking-tight text-white transition rounded-lg group sm:text-xl h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:ring-primary-200 focus:text-primary-800 focus:bg-primary-200 focus:outline-none"
                >
                    Go to plugin dashboard
                </a>
            </div>

            <div class="absolute hidden end-0 top-12 me-12 xl:block">
                <img
                    src="{{ asset('images/hands.svg') }}"
                    alt="Hands"
                    class="h-[8rem]"
                />
            </div>
        </div>
    </section>
</x-layouts.app>
