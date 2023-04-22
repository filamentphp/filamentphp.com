<x-layouts.app previewify="858" :previewify-data="[
    'title' => 'Filament Blog',
    'subtitle' => 'Articles written by Filament users',
]">
    <x-header>
        Blog

        <x-slot name="subheading">
            A curated collection of articles written by the Filament team and our community.
        </x-slot>

        <x-slot name="doodles">
            <div class="absolute inset-y-0 items-center hidden start-10 lg:flex">
                <img
                    src="{{ asset('images/glasses.svg') }}"
                    alt="Glasses"
                    class="h-[7rem] transform scale-x-[-1]"
                />
            </div>

            <div class="absolute inset-y-0 items-center hidden end-24 lg:flex">
                <img
                    src="{{ asset('images/snake.svg') }}"
                    alt="Snake"
                    class="h-[10rem]"
                />
            </div>
        </x-slot>
    </x-header>

    <x-section>
{{--        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">--}}
{{--            <div class="space-y-2">--}}
{{--                <h2 class="text-lg text-gray-900 font-heading">--}}
{{--                    ⭐️ Famous article--}}
{{--                </h2>--}}

{{--                <x-articles.card :article="$famousArticle" />--}}
{{--            </div>--}}

{{--            <div class="space-y-2">--}}
{{--                <h2 class="text-lg text-gray-900 font-heading">--}}
{{--                    🆕 Latest article--}}
{{--                </h2>--}}

{{--                <x-articles.card :article="$latestArticle" />--}}
{{--            </div>--}}

{{--            <div class="space-y-2">--}}
{{--                <h2 class="text-lg text-gray-900 font-heading">--}}
{{--                    🎲 Random article--}}
{{--                </h2>--}}

{{--                <x-articles.card :article="$randomArticle" />--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div aria-hidden="true" class="border-t"></div>--}}

        @livewire(\App\Http\Livewire\Blog\SearchArticles::class)
    </x-section>

    <section class="bg-gray-900">
        <div class="relative items-center px-8 py-32 mx-auto space-y-16 lg:flex max-w-7xl lg:space-y-0 lg:space-x-16">
            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold font-heading text-primary-200">
                        Submit your own articles 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the article dashboard to publish your own articles to our website!
                    </p>
                </div>

                <a
                    href="/admin/articles"
                    target="_blank"
                    class="inline-flex items-center justify-center px-6 text-lg font-semibold tracking-tight text-white transition rounded-lg group sm:text-xl h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:ring-primary-200 focus:text-primary-800 focus:bg-primary-200 focus:outline-none"
                >
                    Go to article dashboard
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
