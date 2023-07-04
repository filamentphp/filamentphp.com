<x-layouts.app
    previewify="858"
    :previewify-data="[
            'title' => 'Filament Plugins',
            'subtitle' => 'Composer packages made by our community, giving you access to awesome new features.',
    ]"
>
    <x-plugins.hero />
    <x-section>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="space-y-2">
                <h2 class="font-heading text-lg text-gray-900">
                    ⭐️ Famous plugin
                </h2>

                <x-plugins.card :plugin="$famousPlugin" />
            </div>

            <div class="space-y-2">
                <h2 class="font-heading text-lg text-gray-900">
                    🆕 Latest plugin
                </h2>

                <x-plugins.card :plugin="$latestPlugin" />
            </div>

            <div class="space-y-2">
                <h2 class="font-heading text-lg text-gray-900">
                    🎲 Random plugin
                </h2>

                <x-plugins.card :plugin="$randomPlugin" />
            </div>
        </div>

        <div
            aria-hidden="true"
            class="border-t"
        ></div>

        @livewire(\App\Http\Livewire\Plugins\SearchPlugins::class)
    </x-section>

    <section class="bg-gray-900">
        <div
            class="relative mx-auto max-w-8xl items-center space-y-16 px-8 py-32 lg:flex lg:space-x-16 lg:space-y-0"
        >
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2
                        class="font-heading text-4xl font-bold text-primary-200"
                    >
                        Submit your own plugins 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the plugin dashboard to publish your own plugins
                        to our website!
                    </p>
                </div>

                <a
                    href="/admin/plugins"
                    target="_blank"
                    class="group inline-flex h-11 items-center justify-center rounded-lg px-6 text-lg font-semibold tracking-tight text-white ring-2 ring-inset ring-white transition hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:bg-primary-200 focus:text-primary-800 focus:outline-none focus:ring-primary-200 sm:text-xl"
                >
                    Go to plugin dashboard
                </a>
            </div>

            <div class="absolute right-0 top-12 mr-12 hidden xl:block">
                <img
                    src="{{ asset('images/hands.svg') }}"
                    alt="Hands"
                    class="h-[8rem]"
                />
            </div>
        </div>
    </section>
</x-layouts.app>
