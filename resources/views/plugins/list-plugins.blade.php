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
            <div class="hidden absolute inset-y-0 items-center left-32 lg:flex">
                <img
                    src="{{ asset('images/bolt.svg') }}"
                    alt="Lightning bolt"
                    class="h-[8rem]"
                />
            </div>

            <div class="hidden absolute inset-y-0 items-center right-24 lg:flex">
                <img
                    src="{{ asset('images/unicorn.svg') }}"
                    alt="Unicorn"
                    class="h-[10rem]"
                />
            </div>
        </x-slot>
    </x-header>

    <x-section>
        @livewire(\App\Http\Livewire\Plugins\SearchPlugins::class)
    </x-section>

    <section class="bg-gray-900">
        <div class="relative lg:flex items-center space-y-16 max-w-8xl mx-auto px-8 py-32 lg:space-y-0 lg:space-x-16">
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="font-heading font-bold text-primary-200 text-4xl">
                        Submit your own plugins 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the plugin dashboard to publish your own plugins to our website!
                    </p>
                </div>

                <a
                    href="/admin/plugins"
                    target="_blank"
                    class="group inline-flex items-center justify-center px-6 text-lg sm:text-xl font-semibold tracking-tight text-white transition rounded-lg h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:ring-primary-200 focus:text-primary-800 focus:bg-primary-200 focus:outline-none"
                >
                    Go to plugin dashboard
                </a>
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
</x-layouts.app>
