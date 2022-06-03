<x-layouts.app>
    <x-section>
        <div class="max-w-4xl mx-auto">
            <div class="text-sm text-gray-700">
                <a href="{{ route('tricks') }}">
                    &larr; Back to Tricks
                </a>
            </div>

            <div class="mt-6">
                <div class="flex justify-between gap-4">
                    <h1 class="text-2xl font-heading tracking-tight text-gray-900 sm:text-3xl">
                        {{ $trick->title }}
                    </h1>

                    @livewire(\App\Http\Livewire\Tricks\FavoriteTrick::class, ['trick' => $trick])
                </div>

                <h2 id="information-heading" class="sr-only">
                    Trick information
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    by {{ $trick->author->name }}, {{ $trick->created_at->diffForHumans() }}
                </p>

                @if (count($trick->categories ?? []))
                    <div class="flex flex-wrap gap-2 mt-4 -mx-2">
                        @foreach ($trick->categories as $category)
                            <span class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-normal">
                            {{ \App\Enums\TrickCategory::tryFrom($category)?->getLabel() }}
                        </span>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8 prose max-w-none">
                    @php
                        config()->set('markdown', \Illuminate\Support\Arr::except(config('markdown'), [
                            'heading_permalink',
                            'table_of_contents',
                        ]));

                        app()->singleton('markdown.environment', function (\Illuminate\Contracts\Container\Container $app): \League\CommonMark\Environment\Environment {
                            $config = config()->get('markdown');

                            $environment = new \League\CommonMark\Environment\Environment(\Illuminate\Support\Arr::except($config, ['extensions', 'views']));

                            collect($config['extensions'])
                                ->reject(fn (string $extension): bool => in_array($extension, [
                                    \League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension::class,
                                    \League\CommonMark\Extension\TableOfContents\TableOfContentsExtension::class
                                ]))
                                ->each(fn (string $extension) => $environment->addExtension(app($extension)));

                            return $environment;
                        });

                        app()->singleton('markdown.converter', function (\Illuminate\Contracts\Container\Container $app): \League\CommonMark\MarkdownConverter {
                            $environment = app('markdown.environment');

                            return new \League\CommonMark\MarkdownConverter($environment);
                        });
                    @endphp

                    @markdown($trick->content)
                </div>

                <div aria-hidden="true" class="mt-8 border-t"></div>

                <div class="mt-8 space-y-2">
                    <h2 class="text-lg font-heading text-gray-900">
                        Other tricks
                    </h2>

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-3">
                        @foreach ($otherTricks as $otherTrick)
                            <x-tricks.card :trick="$otherTrick" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layouts.app>
