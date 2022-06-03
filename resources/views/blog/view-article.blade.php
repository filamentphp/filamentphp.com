<x-layouts.app previewify="900" :previewify-data="[
    'title' => $article->title,
    'author' => $article->author->name,
    'categories' => collect($article->categories)->map(fn (string $category): string => \App\Enums\ArticleCategory::tryFrom($category)?->getLabel())->implode(', '),
    'date' => $article->created_at->toFormattedDateString(),
]">
    <x-section>
        <div class="max-w-4xl mx-auto">
{{--            <div class="text-sm text-gray-700">--}}
{{--                <a href="{{ route('blog') }}">--}}
{{--                    &larr; Back to Blog--}}
{{--                </a>--}}
{{--            </div>--}}

            <div class="mt-6">

                <img src="https://previewify.app/generate/templates/900/meta?url={{ url()->current() }}" class="w-full" />

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

                    @markdown($article->content)
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
            </div>
        </div>
    </x-section>
</x-layouts.app>
