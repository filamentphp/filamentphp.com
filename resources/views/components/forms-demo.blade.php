@props([
    'shadow' => 'shadow-2xl shadow-primary-500/30',
])

<div x-data="{ theme: $persist('dark') }" {{ $attributes->class(['relative -mx-4 sm:mx-auto max-w-6xl mx-auto transition hover:scale-[1.02]']) }}>
    <div
        @class([
            'relative group cursor-pointer ring-1 ring-white/10 transition rounded-2xl overflow-hidden',
            $shadow,
        ])
        x-bind:class="theme === 'dark' ? 'bg-gray-900' : 'bg-gray-100'"
    >
        <div
            class="rounded-t-2xl flex justify-between items-center space-x-4 py-1 px-5 border-b transition"
            x-bind:class="theme === 'dark' ? 'bg-gray-900 border-gray-700' : 'bg-white border-gray-200'"
        >
            <div class="py-4 space-x-2 flex">
                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                <div class="w-3 h-3 rounded-full bg-primary-300"></div>
                <div class="w-3 h-3 rounded-full bg-success-400"></div>
            </div>

            <button
                role="switch"
                aria-checked="false"
                x-on:click="theme = theme === 'light' ? 'dark' : 'light'"
                x-bind:class="{
                    'bg-primary-600': theme === 'light',
                    'dark:bg-white/10': theme === 'dark',
                }"
                type="button"
                class="relative inline-flex shrink-0 p-0.5 w-14 rounded-xl border-2 border-transparent cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500 border-gray-300"
            >
                <span
                    x-bind:class="{
                        'translate-x-6 rtl:-translate-x-6': theme === 'light',
                        'translate-x-0': theme === 'dark',
                    }"
                    class="pointer-events-none relative inline-block h-6 w-6 px-2 rounded-lg bg-white shadow transform ring-0 ease-in-out transition duration-200"
                >
                    <span
                        class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                        aria-hidden="true"
                        x-bind:class="{
                            'opacity-0 ease-out duration-100': theme === 'light',
                            'opacity-100 ease-in duration-200': theme === 'dark',
                        }"
                    >
                        <x-heroicon-s-moon class="h-4 w-4 text-gray-400" />
                    </span>

                    <span
                        class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                        aria-hidden="true"
                        x-bind:class="{
                            'opacity-100 ease-in duration-200': theme === 'light',
                            'opacity-0 ease-out duration-100': theme === 'dark',
                        }"
                    >
                        <x-heroicon-s-sun class="h-4 w-4 text-primary-600" />
                    </span>
                </span>
            </button>
        </div>

        <a href="https://demo.filamentphp.com/shop/products/{{ rand(1, 50) }}/edit" target="_blank" class="flex w-full rounded-b-2xl overflow-hidden max-h-[200px] sm:max-h-[300px] md:max-h-[500px] lg:max-h-[600px]">
            <div class="relative max-h-full group-hover:overflow-y-auto">
                <img
                    src="/images/forms/demo/light.jpg"
                    alt="Screenshot of the form builder demo"
                />

                <img
                    src="/images/forms/demo/dark.jpg"
                    aria-hidden="true"
                    alt="Screenshot of the form builder demo"
                    x-bind:class="{
                        'opacity-0': theme === 'light',
                    }"
                    class="absolute top-0 transition"
                />
            </div>
        </a>

        <div class="absolute inset-0 flex items-center justify-center transition backdrop-blur-sm bg-white/10 group-hover:opacity-0 group-hover:hidden rounded-2xl">
            <div class="flex items-center bg-gray-900 py-2 px-4 rounded-lg font-medium sm:text-xl text-white">
                <x-heroicon-o-play class="w-5 h-5 sm:w-6 sm:h-6 mr-2" />

                Try our form builder
            </div>
        </div>
    </div>

    <div class="hidden absolute -top-[4.5rem] right-16 md:flex">
        <div class="relative">
            <span class="absolute font-cursive top-1 text-2xl right-[4.5rem] whitespace-nowrap">
                it's open source
            </span>

            <img src="/images/arrow-turn.svg" class="h-20 -scale-x-100 -rotate-90" />
        </div>
    </div>
</div>
