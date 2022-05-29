@props([
    'trick',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('tricks.view', ['trick' => $trick]) }}" class="block">
        <div class="border shadow rounded-2xl p-5 space-y-2">
            <div class="space-y-1">
                <h3 class="text-base font-medium text-gray-900">
                    {{ $trick->title }}
                </h3>

                @if (count($trick->categories ?? []))
                    <div class="flex flex-wrap gap-2  -mx-2">
                        @foreach ($trick->categories as $category)
                            <span class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-5 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl whitespace-normal">
                                {{ \App\Enums\TrickCategory::tryFrom($category)?->getLabel() }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-start justify-between gap-4">
                <p class="flex-1 text-sm text-gray-500">
                    by {{ $trick->author->name }}, {{ $trick->created_at->diffForHumans() }}
                </p>

                <div class="mt-1 flex items-center shrink-0 gap-2">
                    <span class="text-xs inline-flex items-center gap-1">
                        {{ $trick->favorites ?: 0 }}

                        <x-heroicon-s-star class="w-3 h-3 text-yellow-500" />
                    </span>

                    <span class="shrink-0 text-xs inline-flex items-center gap-1">
                        {{ $trick->views ?: 0 }}

                        <x-heroicon-s-eye class="w-3 h-3 text-gray-500" />
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
