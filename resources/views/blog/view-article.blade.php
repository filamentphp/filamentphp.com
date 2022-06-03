<x-layouts.app previewify="900" :previewify-data="[
    'title' => $article->title,
    'author' => $article->author->name,
    'categories' => $articleCategories = collect($article->categories)->map(fn (string $category): string => \App\Enums\ArticleCategory::tryFrom($category)?->getLabel())->implode(', '),
    'date' => $articleDate = $article->created_at->toFormattedDateString(),
]">
    <x-section>
        <div class="max-w-4xl mx-auto">
            <div class="mt-6">
                <div class="space-y-4">
                    <a href="{{ route('blog') }}" class="block text-xs font-heading font-bold tracking-wider uppercase text-primary-600">
                        Blog
                    </a>

                    <p class="text-3xl font-heading font-bold tracking-tight text-gray-900">
                        {{ $article->title }}
                    </p>

                    <dl class="flex flex-wrap font-medium gap-x-6 gap-y-2 items-start text-gray-500">
                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </dt>

                            <dd>{{ $articleDate }}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </dt>

                            <dd>{{ $article->author->name }}</dd>
                        </div>

                        <div class="flex items-center gap-2">
                            <dt>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </dt>

                            <dd>{{ $articleCategories }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-16 prose max-w-none">
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

                    @markdown($article->content)
                </div>

                <div class="text-sm flex items-center gap-3 w-full mt-8">
                    <a
                        href="https://twitter.com/share?url={{ $article->getUrl() }}&text={{ urlencode("📝 {$article->title} by {$article->author->name}") }}"
                        target="__blank"
                        class="flex items-center gap-2 text-gray-500 hover:text-gray-600"
                    >
                        <svg class="w-4 h-4 text-blue-400 hover:text-blue-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>

                        <span>Share on Twitter</span>
                    </a>

                    <a
                        href="/blog/feed"
                        target="__blank"
                        class="flex items-center gap-2 text-gray-500 hover:text-gray-600"
                    >
                        <svg class="w-4 h-4 text-orange-400 hover:text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>

                        <span>Subscribe via RSS</span>
                    </a>
                </div>

{{--                <div aria-hidden="true" class="mt-8 border-t"></div>--}}

{{--                <div class="mt-8 space-y-2">--}}
{{--                    <h2 class="text-lg font-heading text-gray-900">--}}
{{--                        Other articles--}}
{{--                    </h2>--}}

{{--                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-3">--}}
{{--                        @foreach ($otherArticles as $otherArticle)--}}
{{--                            <x-articles.card :article="$otherArticle" />--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div aria-hidden="true" class="mt-8 border-t"></div>

                <div class="mt-8">
                    @livewire('comments', ['model' => $article])
                </div>
            </div>
        </div>
    </x-section>
</x-layouts.app>
