<x-layouts.app>
    <x-header>
        Tricks

        <x-slot name="subheading">
            Reading our community tricks is a great way to discover new,
            lesser-known features of Filament!
        </x-slot>

        <x-slot name="doodles">
            <div class="absolute -bottom-3 hidden items-center lg:flex">
                <img
                    src="{{ asset('images/croc.svg') }}"
                    alt="Crocodile"
                    class="h-[7rem] -rotate-[4deg]"
                />
            </div>

            <div
                class="absolute inset-y-0 right-24 hidden items-center lg:flex"
            >
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
                <h2 class="font-heading text-lg text-gray-900">
                    ⭐️ Famous trick
                </h2>

                <x-tricks.card :trick="$famousTrick" />
            </div>

            <div class="space-y-2">
                <h2 class="font-heading text-lg text-gray-900">
                    🆕 Latest trick
                </h2>

                <x-tricks.card :trick="$latestTrick" />
            </div>

            <div class="space-y-2">
                <h2 class="font-heading text-lg text-gray-900">
                    🎲 Random trick
                </h2>

                <x-tricks.card :trick="$randomTrick" />
            </div>
        </div>

        <div
            aria-hidden="true"
            class="border-t"
        ></div>

        @livewire(\App\Http\Livewire\Tricks\SearchTricks::class)
    </x-section>

    <section class="bg-gray-900">
        <div
            class="relative mx-auto max-w-7xl items-center space-y-16 px-8 py-32 lg:flex lg:space-x-16 lg:space-y-0"
        >
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2
                        class="font-heading text-4xl font-bold text-primary-200"
                    >
                        Submit your own tricks 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the trick dashboard to publish your own tricks to
                        our website!
                    </p>
                </div>

                <a
                    href="/admin/tricks"
                    target="_blank"
                    class="group inline-flex h-11 items-center justify-center rounded-lg px-6 text-lg font-semibold tracking-tight text-white ring-2 ring-inset ring-white transition hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:bg-primary-200 focus:text-primary-800 focus:outline-none focus:ring-primary-200 sm:text-xl"
                >
                    Go to trick dashboard
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
