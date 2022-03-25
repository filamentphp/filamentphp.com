<x-layouts.app>
    <x-section>
        <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
            <div class="lg:row-end-1 lg:col-span-4">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @forelse ($plugin->media as $media)
                                <li class="splide__slide">
                                    <div class="aspect-video rounded-2xl bg-gray-100 overflow-hidden">
                                        <img
                                            src="{{ $media->getUrl() }}"
                                            alt="{{ $plugin->name }}"
                                            class="object-center object-cover"
                                        >
                                    </div>
                                </li>
                            @empty
                                <li class="splide__slide">
                                    <div class="aspect-video rounded-2xl bg-gray-100 overflow-hidden">
                                        <img
                                            src="{{ $plugin->getThumbnailUrl() }}"
                                            alt="{{ $plugin->name }}"
                                            class="object-center object-cover"
                                        >
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
                <div class="flex flex-col-reverse">
                    <div class="mt-4">
                        <h1 class="text-2xl font-heading tracking-tight text-gray-900 sm:text-3xl">
                            {{ $plugin->name }}
                        </h1>

                        <h2 id="information-heading" class="sr-only">
                            Plugin information
                        </h2>

                        <p class="text-sm text-gray-500 mt-2">
                            by {{ $plugin->author->name }}
                        </p>
                    </div>
                </div>

                @if (count($plugin->categories ?? []))
                    <div class="flex flex-wrap gap-2 mt-4 -mx-2">
                        @foreach ($plugin->categories as $category)
                            <span class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-normal">
                                {{ \App\Enums\PluginCategory::tryFrom($category)?->getLabel() }}
                            </span>
                        @endforeach
                    </div>
                @endif

                @if (filled($plugin->description))
                    <div class="prose mt-6">
                        {!! str()->markdown($plugin->description) !!}
                    </div>
                @endif

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                    @if ($plugin->url || $plugin->github_repository)
                        <x-button
                            tag="a"
                            href="{{ $plugin->getUrl() }}"
                            target="_blank"
                            size="lg"
                        >
                            {{ $plugin->url ? 'Visit website' : 'Visit GitHub' }}
                        </x-button>
                    @endif
                </div>

                <div class="border-t border-gray-200 mt-10 pt-10">
                    <div class="flex gap-8">
                        <div class="shrink-0">
                            <h3 class="text-sm font-medium text-gray-900">Share</h3>

                            <ul role="list" class="flex items-center space-x-6 mt-4">
                                <li>
                                    <a
                                        href="https://twitter.com/share?url={{ route('plugins.view', ['plugin' => $plugin]) }}&text={{ urlencode("💖 {$plugin->name} by {$plugin->author->name}") }}"
                                        target="__blank"
                                        class="flex items-center justify-center w-6 h-6 text-gray-400 hover:text-gray-500"
                                    >
                                        <span class="sr-only">Share on Twitter</span>

                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900">Support</h3>

                            <p class="mt-4 text-sm text-gray-500">
                                <span class="font-medium">
                                    #{{ $plugin->slug }}
                                </span>

                                <span>
                                    on
                                </span>

                                <a
                                    href="{{ route('discord') }}"
                                    target="__blank"
                                    class="font-medium text-gray-600 hover:text-gray-500"
                                >
                                    Discord
                                </a>
                            </p>
                        </div>

                        @if ($plugin->license)
                            <div class="shrink-0">
                                <h3 class="text-sm font-medium text-gray-900">License</h3>

                                <p class="mt-4 text-sm text-gray-500">
                                    <a
                                        href="{{ $plugin->license_url }}"
                                        target="__blank"
                                        @class([
                                            'font-medium',
                                            'text-primary-600 hover:text-primary-500' => $plugin->license_url,
                                        ])
                                    >
                                        {{ $plugin->license->getLabel() }}
                                    </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-section>

    @if (filled($plugin->docs))
        <div class="border-t"></div>

        <x-section>
            <div class="prose">
                <h1 class="font-heading">
                    Documentation
                </h1>

                @markdown($plugin->docs)
            </div>
        </x-section>
    @endif
</x-layouts.app>
