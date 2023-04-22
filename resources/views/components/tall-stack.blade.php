<section {{ $attributes->class(['bg-gray-900 bg-cover bg-center']) }} style="background-image: url({{ asset('images/backgrounds/meteor.svg') }})">
    <div class="px-8 mx-auto text-center max-w-7xl">
        <div class="max-w-6xl py-16 mx-auto space-y-16 lg:py-32">
            <div class="space-y-4">
                <h3 class="text-4xl text-gray-200 font-heading">
                    <span class="block sm:inline">
                        Built with the
                    </span>

                    <span class="block text-primary-400 sm:inline">
                        TALL stack
                    </span>
                </h3>

                <p class="text-gray-400">
                    /tɔːl stæk/
                </p>

                <h4 class="max-w-2xl mx-auto text-xl text-gray-200">
                    A set of frameworks that combine to form dynamic, maintainable, full-stack applications with little effort.
                </h4>
            </div>

            <div class="grid -mx-4 overflow-hidden rounded-xl sm:mx-auto sm:grid-cols-2 lg:grid-cols-4">
                <a
                    href="https://tailwindcss.com"
                    target="_blank"
                    class="relative flex items-center justify-center p-8 bg-white border-b-4 group lg:border-b-0 lg:border-e-4"
                >
                    <img
                        src="{{ asset('images/tailwind.svg') }}"
                        alt="Tailwind CSS"
                        class="w-full transition max-h-12 group-hover:scale-105"
                    />

                    <div class="absolute z-10 rotate-90 -bottom-6 lg:bottom-auto lg:-end-6 lg:rotate-0">
                        <img src="{{ asset('images/puzzle-join.svg') }}" class="w-6 h-6" />
                    </div>
                </a>

                <a
                    href="https://alpinejs.dev"
                    target="_blank"
                    class="relative flex items-center justify-center p-8 bg-white border-b-4 group sm:border-s-4 lg:border-b-0 lg:border-s-0 lg:border-e-4"
                >
                    <img
                        src="{{ asset('images/alpine.svg') }}"
                        alt="Alpine.js"
                        class="w-full transition max-h-12 group-hover:scale-105"
                    />

                    <div class="absolute z-10 rotate-90 -bottom-6 sm:bottom-auto sm:-start-6 sm:-rotate-180 lg:start-auto lg:-end-6 lg:rotate-0">
                        <img src="{{ asset('images/puzzle-join.svg') }}" class="w-6 h-6" />
                    </div>
                </a>

                <a
                    href="https://laravel.com"
                    target="_blank"
                    class="relative flex items-center justify-center p-8 bg-white border-b-4 group sm:border-b-0 lg:border-e-4"
                >
                    <img
                        src="{{ asset('images/laravel.svg') }}"
                        alt="Laravel"
                        class="w-full transition max-h-12 group-hover:scale-105"
                    />

                    <div class="absolute z-10 rotate-90 -bottom-6 sm:bottom-auto sm:-end-6 sm:rotate-0">
                        <img src="{{ asset('images/puzzle-join.svg') }}" class="w-6 h-6" />
                    </div>
                </a>

                <a
                    href="https://laravel-livewire.com"
                    target="_blank"
                    class="relative flex items-center justify-center p-8 bg-white group sm:border-s-4 lg:border-s-0"
                >
                    <img
                        src="{{ asset('images/livewire.svg') }}"
                        alt="Livewire"
                        class="w-full transition max-h-12 group-hover:scale-105"
                    />

                    <div class="absolute z-10 hidden -rotate-90 -top-6 sm:block lg:hidden">
                        <img src="{{ asset('images/puzzle-join.svg') }}" class="w-6 h-6" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
