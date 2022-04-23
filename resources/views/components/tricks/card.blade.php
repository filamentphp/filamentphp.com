@props([
    'trick',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('tricks.view', ['trick' => $trick]) }}" class="block">
        <div class="border shadow bg-gray-100 rounded-2xl p-5 space-y-1">
            <div class="flex items-start justify-between gap-4">
                <h3 class="flex-1 text-base font-medium text-gray-900">
                    {{ $trick->name }}
                </h3>

                <span class="mt-1 shrink-0 text-xs inline-flex items-center gap-1">
                    {{ $trick->views }}

                    <x-heroicon-s-eye class="w-3 h-3 text-gray-500" />
                </span>
            </div>

            <p class="text-sm text-gray-500">
                by {{ $trick->getAuthorName() }}
            </p>
        </div>
    </a>
</div>
