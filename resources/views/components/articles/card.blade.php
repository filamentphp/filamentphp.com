@props([
    'article',
])

<div class="group relative block transition hover:-rotate-1 hover:scale-105">
    <a
        href="{{ $article->getUrl() }}"
        class="block"
    >
        <div class="space-y-2 rounded-2xl border p-5 shadow">
            <div class="space-y-1">
                <h3 class="text-base font-medium text-gray-900">
                    {{ $article->title }}
                </h3>

                @if (count($article->categories ?? []))
                    <div class="-mx-2 flex flex-wrap gap-2">
                        @foreach ($article->categories as $category)
                            <span
                                class="min-h-5 inline-flex items-center justify-center space-x-1 whitespace-normal rounded-xl bg-primary-500/10 px-2 py-0.5 text-xs font-medium tracking-tight text-primary-700"
                            >
                                {{ \App\Enums\ArticleCategory::tryFrom($category)?->getLabel() }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-start justify-between gap-4">
                <p class="flex-1 text-sm text-gray-500">
                    by {{ $article->author->name }},
                    {{ $article->created_at->diffForHumans() }}
                </p>

                <div class="mt-1 shrink-0">
                    <span
                        class="inline-flex shrink-0 items-center gap-1 text-xs"
                    >
                        {{ $article->views ?: 0 }}

                        <x-heroicon-s-eye class="h-3 w-3 text-gray-500" />
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
