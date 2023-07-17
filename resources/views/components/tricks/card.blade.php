@props([
    'trick',
])

<div class="group relative block transition hover:-rotate-1 hover:scale-105">
    <a
        href="{{ route('tricks.view', ['trick' => $trick]) }}"
        class="block"
    >
        <div class="space-y-2 rounded-2xl border p-5 shadow">
            <div class="space-y-1">
                <h3 class="text-base font-medium text-gray-900">
                    {{ $trick->title }}
                </h3>

                @if (count($trick->categories ?? []))
                    <div class="-mx-2 flex flex-wrap gap-2">
                        @foreach ($trick->categories as $category)
                            <span
                                class="min-h-5 inline-flex items-center justify-center space-x-1 whitespace-normal rounded-xl bg-primary-500/10 px-2 py-0.5 text-xs font-medium tracking-tight text-primary-700"
                            >
                                {{ \App\Enums\TrickCategory::tryFrom($category)?->getLabel() }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-start justify-between gap-4">
                <p class="flex-1 text-sm text-gray-500">
                    by {{ $trick->author->name }},
                    {{ $trick->created_at->diffForHumans() }}
                </p>

                <div class="mt-1 flex shrink-0 items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-xs">
                        {{ $trick->favorites ?: 0 }}

                        <x-heroicon-s-star class="h-3 w-3 text-amber-500" />
                    </span>

                    <span
                        class="inline-flex shrink-0 items-center gap-1 text-xs"
                    >
                        {{ $trick->views ?: 0 }}

                        <x-heroicon-s-eye class="h-3 w-3 text-gray-500" />
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
