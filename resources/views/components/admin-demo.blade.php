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
            class="flex items-center justify-between px-5 py-1 space-x-4 transition border-b rounded-t-2xl"
            x-bind:class="theme === 'dark' ? 'bg-gray-900 border-gray-700' : 'bg-white border-gray-200'"
        >
            <div class="flex py-4 space-x-2">
                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
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
                    class="relative inline-block w-6 h-6 px-2 transition duration-200 ease-in-out transform bg-white rounded-lg shadow pointer-events-none ring-0"
                >
                    <span
                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                        aria-hidden="true"
                        x-bind:class="{
                            'opacity-0 ease-out duration-100': theme === 'light',
                            'opacity-100 ease-in duration-200': theme === 'dark',
                        }"
                    >
                        <x-heroicon-s-moon class="w-4 h-4 text-gray-400" />
                    </span>

                    <span
                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                        aria-hidden="true"
                        x-bind:class="{
                            'opacity-100 ease-in duration-200': theme === 'light',
                            'opacity-0 ease-out duration-100': theme === 'dark',
                        }"
                    >
                        <x-heroicon-s-sun class="w-4 h-4 text-primary-600" />
                    </span>
                </span>
            </button>
        </div>

        <a href="https://demo.filamentphp.com" target="_blank" class="flex w-full rounded-b-2xl overflow-hidden max-h-[190px] sm:max-h-[300px] md:max-h-[400px] lg:max-h-[500px]">
            <div class="relative max-h-full overflow-hidden -me-px -ms-px">
                <img
                    src="/images/admin/demo/light-sidebar.jpg"
                    aria-hidden="true"
                />

                <img
                    src="/images/admin/demo/dark-sidebar.jpg"
                    aria-hidden="true"
                    x-bind:class="{
                        'opacity-0': theme === 'light',
                    }"
                    class="absolute top-0 transition"
                />
            </div>

            <div class="relative max-h-full group-hover:overflow-y-auto">
                <img
                    src="/images/admin/demo/light-content.jpg"
                    alt="Screenshot of the admin panel demo"
                />

                <img
                    src="/images/admin/demo/dark-content.jpg"
                    aria-hidden="true"
                    alt="Screenshot of the admin panel demo"
                    x-bind:class="{
                        'opacity-0': theme === 'light',
                    }"
                    class="absolute top-0 transition"
                />
            </div>
        </a>

        <div class="absolute inset-0 flex items-center justify-center transition backdrop-blur-sm bg-white/10 group-hover:opacity-0 group-hover:hidden rounded-2xl">
            <div class="flex items-center px-4 py-2 font-medium text-white bg-gray-900 rounded-lg sm:text-xl">
                <x-heroicon-o-play class="w-5 h-5 me-2 sm:w-6 sm:h-6" />

                Try our admin panel
            </div>
        </div>
    </div>

    <div class="hidden absolute -top-[4.5rem] end-16 md:flex">
        <div class="relative">
            <span class="absolute font-cursive top-1 text-2xl end-[4.5rem] whitespace-nowrap">
                it's open source
            </span>

            <img src="/images/arrow-turn.svg" class="h-20 -rotate-90 -scale-x-100" />
        </div>
    </div>
</div>
