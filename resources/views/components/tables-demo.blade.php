@props([
    'shadow' => 'shadow-2xl shadow-primary-500/30',
])

<div
    x-data="{ theme: $persist('dark') }"
    {{ $attributes->class(['relative -mx-4 mx-auto max-w-6xl transition hover:scale-[1.02] sm:mx-auto']) }}
>
    <div
        @class([
            'group relative cursor-pointer overflow-hidden rounded-2xl ring-1 ring-white/10 transition',
            $shadow,
        ])
        x-bind:class="theme === 'dark' ? 'bg-gray-900' : 'bg-gray-100'"
    >
        <div
            class="flex items-center justify-between space-x-4 rounded-t-2xl border-b px-5 py-1 transition"
            x-bind:class="theme === 'dark' ? 'bg-gray-900 border-gray-700' : 'bg-white border-gray-200'"
        >
            <div class="flex space-x-2 py-4">
                <div class="h-3 w-3 rounded-full bg-red-500"></div>
                <div class="h-3 w-3 rounded-full bg-primary-300"></div>
                <div class="h-3 w-3 rounded-full bg-success-400"></div>
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
                class="relative inline-flex w-14 shrink-0 cursor-pointer rounded-xl border-2 border-gray-300 border-transparent p-0.5 transition-colors duration-200 ease-in-out focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-500"
            >
                <span
                    x-bind:class="{
                        'translate-x-6 rtl:-translate-x-6': theme === 'light',
                        'translate-x-0': theme === 'dark',
                    }"
                    class="translate pointer-events-none relative inline-block h-6 w-6 rounded-lg bg-white px-2 shadow ring-0 transition duration-200 ease-in-out"
                >
                    <span
                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                        aria-hidden="true"
                        x-bind:class="{
                            'opacity-0 ease-out duration-100': theme === 'light',
                            'opacity-100 ease-in duration-200': theme === 'dark',
                        }"
                    >
                        <x-heroicon-s-moon class="h-4 w-4 text-gray-400" />
                    </span>

                    <span
                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
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

        <a
            href="https://demo.filamentphp.com/blog/posts"
            target="_blank"
            class="flex w-full overflow-hidden rounded-b-2xl"
        >
            <div class="relative">
                <img
                    src="/images/tables/demo/light.jpg"
                    alt="Screenshot of the table builder demo"
                />

                <img
                    src="/images/tables/demo/dark.jpg"
                    aria-hidden="true"
                    alt="Screenshot of the table builder demo"
                    x-bind:class="{
                        'opacity-0': theme === 'light',
                    }"
                    class="absolute top-0 transition"
                />
            </div>
        </a>

        <div
            class="absolute inset-0 flex items-center justify-center rounded-2xl bg-white/10 backdrop-blur-sm transition group-hover:hidden group-hover:opacity-0"
        >
            <div
                class="flex items-center rounded-lg bg-gray-900 px-4 py-2 font-medium text-white sm:text-xl"
            >
                <x-heroicon-o-play class="mr-2 h-5 w-5 sm:h-6 sm:w-6" />

                Try our table builder
            </div>
        </div>
    </div>

    <div class="absolute -top-[4.5rem] right-16 hidden md:flex">
        <div class="relative">
            <span
                class="absolute right-[4.5rem] top-1 whitespace-nowrap font-cursive text-2xl"
            >
                it's open source
            </span>

            <img
                src="/images/arrow-turn.svg"
                class="h-20 -rotate-90 -scale-x-100"
            />
        </div>
    </div>
</div>
