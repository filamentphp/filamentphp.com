<x-layouts.app>
    <x-section>
        <div class="max-w-4xl mx-auto">
            <div class="text-sm text-gray-700">
                <a href="{{ route('blog') }}">
                    &larr; Back to Blog
                </a>
            </div>

            <div class="mt-6">
                <h1 class="text-2xl font-heading tracking-tight text-gray-900 sm:text-3xl">
                    {{ $article->title }}
                </h1>

                <h2 id="information-heading" class="sr-only">
                    Article information
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    by {{ $article->author->name }}, {{ $article->created_at->diffForHumans() }}
                </p>

                @if (count($article->categories ?? []))
                    <div class="flex flex-wrap gap-2 mt-4 -mx-2">
                        @foreach ($article->categories as $category)
                            <span class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-normal">
                            {{ \App\Enums\ArticleCategory::tryFrom($category)?->getLabel() }}
                        </span>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8 prose max-w-none">
                    @markdown($article->content)
                </div>

                <div aria-hidden="true" class="mt-8 border-t"></div>

                <div class="mt-8 space-y-2">
                    <h2 class="text-lg font-heading text-gray-900">
                        Other articles
                    </h2>

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-3">
                        @foreach ($otherArticles as $otherArticle)
                            <x-articles.card :article="$otherArticle" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layouts.app>
