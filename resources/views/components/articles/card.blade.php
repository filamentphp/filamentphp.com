@props([
    'article',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ $article->getUrl() }}" class="block">
        <div class="border shadow rounded-2xl p-5 space-y-2">
            <div class="space-y-1">
                <h3 class="text-base font-medium text-gray-900">
                    {{ $article->title }}
                </h3>

                @if (count($article->categories ?? []))
                    <div class="flex flex-wrap gap-2  -mx-2">
                        @foreach ($article->categories as $category)
                            <span class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-5 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl whitespace-normal">
                                {{ \App\Enums\ArticleCategory::tryFrom($category)?->getLabel() }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-start justify-between gap-4">
                <p class="flex-1 text-sm text-gray-500">
                    by {{ $article->author->name }}, {{ $article->created_at->diffForHumans() }}
                </p>

                <div class="mt-1 shrink-0">
                    <span class="shrink-0 text-xs inline-flex items-center gap-1">
                        {{ $article->views ?: 0 }}

                        <x-heroicon-s-eye class="w-3 h-3 text-gray-500" />
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
