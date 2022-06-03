<x-layouts.app>
    <x-section>
        <div class="max-w-4xl mx-auto">
            <div class="mt-6">
                <div class="space-y-4">
                    <a href="{{ route('tricks') }}" class="block text-xs font-heading font-bold tracking-wider uppercase text-primary-600">
                        Tricks
                    </a>

                    <p class="text-3xl font-heading font-bold tracking-tight text-gray-900">
                        {{ $trick->title }}
                    </p>

                    <dl class="flex flex-wrap font-medium gap-x-6 gap-y-2 items-start text-gray-500">
                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </dt>

                            <dd>{{ $trick->created_at->toFormattedDateString() }}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </dt>

                            <dd>{{ $trick->author->name }}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </dt>

                            <dd>{{ collect($trick->categories)->map(fn (string $category): string => \App\Enums\TrickCategory::tryFrom($category)?->getLabel())->implode(', ') }}</dd>
                        </div>
                    </dl>
                </div>

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

                <div aria-hidden="true" class="mt-8 border-t"></div>

                <div class="mt-8">
                    @livewire('comments', ['model' => $trick])
                </div>
            </div>
        </div>
    </x-section>
</x-layouts.app>
