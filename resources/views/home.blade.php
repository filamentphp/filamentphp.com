<x-layouts.app previewify="757" :previewify-data="[
    'title' => 'The elegant TALLkit for Laravel artisans.',
    'subtitle' => 'Rapidly build TALL stack apps, designed for humans.',
    'code' => 'composer require filament/filament',
]">
    <header class="max-w-7xl mx-auto py-12 px-8 md:py-24">
        <h1 class="text-4xl font-heading md:text-6xl">
            <span class="block text-gray-800 md:inline">
                Laravel development.
            </span>

            <span class="block mt-3 italic text-primary-500 relative md:mt-0 md:inline">
                <span class="absolute opacity-[10%] left-[-1px]" aria-hidden="true">Accelerated</span>
                <span class="absolute opacity-[10%] left-[-2px]" aria-hidden="true">Accelerated</span>
                <span class="absolute opacity-[9%] left-[-3px]" aria-hidden="true">Accelerated</span>
                <span class="absolute opacity-[9%] left-[-4px]" aria-hidden="true">Accelerated</span>
                <span class="absolute opacity-[8%] left-[-5px]" aria-hidden="true">Accelerated</span>
                <span class="absolute opacity-[8%] left-[-6px]" aria-hidden="true">Accelerated</span>
                <span>Accelerated.</span>
            </span>
        </h1>

        <h3 class="mt-8 text-gray-700 font-medium text-xl md:text-3xl">
            Stop rebuilding the same UI over and <span class="bg-gradient-to-r from-gray-700 via-transparent text-transparent bg-clip-text">over <span aria-hidden="true">and over and over and over and over and over</span></span>
        </h3>

        <div class="flex flex-wrap gap-4 mt-4">
            <a
                href="{{ route('docs') }}"
                class="inline-flex items-center font-medium text-lg px-4 py-2 rounded-lg bg-rose-500 text-white transition hover:text-rose-100 hover:scale-105"
            >
                <x-heroicon-o-academic-cap class="w-6 h-6 mr-3" />

                Visit the documentation
            </a>

            <a
                href="{{ route('discord') }}"
                target="_blank"
                class="inline-flex items-center font-medium text-lg px-4 py-2 rounded-lg bg-gray-900 text-white transition hover:text-primary-100 hover:scale-105"
            >
                <svg class="w-5 mr-3" fill="none" viewBox="0 0 71 55" aria-hidden="true">
                    <g clip-path="url(#clip0)">
                        <path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z" fill="currentColor"/>
                    </g>
                </svg>

                <span>
                    Join our community
                </span>
            </a>
        </div>

        <div class="relative mt-12 max-w-6xl mx-auto transition hover:scale-[1.02] md:mt-28">
            <a href="https://demo.filamentphp.com" target="_blank" class="relative group block shadow-2xl bg-gray-900 ring-1 ring-primary-500 shadow-primary-500/60 rounded-2xl overflow-hidden">
                <div class="rounded-t-2xl flex space-x-2 p-4 bg-gray-900 border-b border-gray-700">
                    <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                    <div class="w-3 h-3 rounded-full bg-primary-500"></div>
                    <div class="w-3 h-3 rounded-full bg-success-500"></div>
                </div>

                <div class="flex w-full rounded-b-2xl overflow-hidden max-h-[32rem]">
                    <div class="overflow-hidden max-h-full">
                        <img src="/images/home/demo-sidebar.png" aria-hidden="true" />
                    </div>

                    <div class="overflow-y-auto max-h-full">
                        <img src="/images/home/demo-content.png" alt="Screenshot of the admin panel demo" />
                    </div>
                </div>

                <div class="absolute inset-0 flex items-center justify-center transition bg-white/20 group-hover:opacity-0 group-hover:hidden rounded-2xl">
                    <div class="flex items-center gap-2 bg-gray-900 py-2 px-4 rounded-lg font-medium text-xl text-white">
                        <x-heroicon-o-play class="w-5 h-5" />

                        Try our admin panel
                    </div>
                </div>
            </a>

            <div class="hidden absolute -top-[4.5rem] right-16 md:flex">
                <div class="relative">
                    <span class="absolute font-medium top-1.5 text-lg right-[4.5rem] whitespace-nowrap">
                        it's open source
                    </span>

                    <img src="/images/arrow-turn.svg" class="h-20 -scale-x-100 -rotate-90" />
                </div>
            </div>
        </div>
    </header>

    <section class="bg-gray-900 -mt-[16rem] md:-mt-[24rem] pt-[8rem] md:pt-[16rem]">
        <div class="max-w-7xl text-center mx-auto px-8 py-16 space-y-16 lg:py-32">
            <div class="space-y-4">
                <h3 class="leading-tight font-heading font-bold text-gray-200 text-5xl">
                    <span>
                        Built with the
                    </span>

                    <span class="text-primary-400">
                        TALL stack
                    </span>
                </h3>

                <p class="text-gray-400">
                    /tɔːl stæk/
                </p>

                <h4 class="text-gray-200 text-xl max-w-2xl mx-auto">
                    A set of technologies that allow the development of dynamic, maintainable, full-stack applications quickly.
                </h4>
            </div>

            <div class="grid divide-x-4 divide-y-4 divide-gray-100 rounded-xl overflow-hidden sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex items-center justify-center bg-white p-8">
                    <a
                        href="https://tailwindcss.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/tailwind.svg"
                            alt="Tailwind CSS"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center bg-white p-8">
                    <a
                        href="https://alpinejs.dev"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/alpine.svg"
                            alt="Alpine.js"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center bg-white p-8">
                    <a
                        href="https://laravel.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/laravel.svg"
                            alt="Laravel"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>

                <div class="flex items-center justify-center bg-white p-8">
                    <a
                        href="https://laravel-livewire.com"
                        target="_blank"
                        class="block"
                    >
                        <img
                            src="/images/livewire.svg"
                            alt="Livewire"
                            class="w-full max-w-xs transition hover:scale-105"
                        />
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
