<div class="mx-auto w-full max-w-8xl px-10 pt-20">
    <div class="flex items-start gap-5">
        {{-- Categories --}}
        <div class="w-full max-w-[15rem]">
            Categories
        </div>

        {{-- Plugins --}}
        <div
            class="w-full grid grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-5"
        >
            <template
                x-data="{
                    plugins: [
                        {
                            name: 'Access and Menu Management',
                            description: 'Modular support based on nwidart/laravel-modules.',
                        },
                        {
                            name: 'A very long plugin name asdsad  asd asd sda A very long plugin',
                            description: 'Widget to show an overview of resources on the dashboard.',
                        },
                    ],
                }"
                x-for="plugin in plugins"
                class=""
            >
                <x-plugins.card />
            </template>
        </div>
    </div>
</div>
