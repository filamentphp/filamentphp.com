<x-layouts.app previewify="858" :previewify-data="[
    'title' => 'Filament Tricks',
    'subtitle' => 'Tricks discovered by Filament users',
]">
    <x-header>
        Tricks

        <x-slot name="subheading">
            Reading our community tricks is a great way to discover new, lesser-known features of Filament!
        </x-slot>

        <x-slot name="doodles">
            <div class="absolute items-center hidden -bottom-3 lg:flex">
                <img
                    src="{{ asset('images/croc.svg') }}"
                    alt="Crocodile"
                    class="h-[7rem] -rotate-[4deg]"
                />
            </div>

            <div class="absolute inset-y-0 items-center hidden end-24 lg:flex">
                <img
                    src="{{ asset('images/bulb.svg') }}"
                    alt="Light bulb"
                    class="h-[10rem]"
                />
            </div>
        </x-slot>
    </x-header>

    <x-section>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    ⭐️ Famous trick
                </h2>

                <x-tricks.card :trick="$famousTrick" />
            </div>

            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    🆕 Latest trick
                </h2>

                <x-tricks.card :trick="$latestTrick" />
            </div>

            <div class="space-y-2">
                <h2 class="text-lg text-gray-900 font-heading">
                    🎲 Random trick
                </h2>

                <x-tricks.card :trick="$randomTrick" />
            </div>
        </div>

        <div aria-hidden="true" class="border-t"></div>

        @livewire(\App\Http\Livewire\Tricks\SearchTricks::class)
    </x-section>

    <section class="bg-gray-900">
        <div class="relative items-center px-8 py-32 mx-auto space-y-16 lg:flex max-w-7xl lg:space-y-0 lg:space-x-16">
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold font-heading text-primary-200">
                        Submit your own tricks 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the trick dashboard to publish your own tricks to our website!
                    </p>
                </div>

                <a
                    href="/admin/tricks"
                    target="_blank"
                    class="inline-flex items-center justify-center px-6 text-lg font-semibold tracking-tight text-white transition rounded-lg group sm:text-xl h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:ring-primary-200 focus:text-primary-800 focus:bg-primary-200 focus:outline-none"
                >
                    Go to trick dashboard
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
