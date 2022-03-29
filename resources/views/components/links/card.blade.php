@props([
    'link',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('links.view', ['link' => $link]) }}" target="_blank" class="block">
        <div class="aspect-w-2 aspect-h-1 rounded-2xl border shadow overflow-hidden bg-gray-100">
            <img
                src="{{ $link->getThumbnailUrl() }}"
                alt="{{ $link->name }}"
                loading="lazy"
                class="object-center object-cover"
            >
        </div>

        <div class="p-2 space-y-1">
            <div class="flex items-start justify-between gap-4">
                <h3 class="flex-1 text-base font-medium text-gray-900">
                    {{ $link->name }}
                </h3>

                <span class="mt-1 shrink-0 text-xs inline-flex items-center gap-1">
                    {{ $link->views }}

                    <x-heroicon-s-eye class="w-3 h-3 text-gray-500" />
                </span>
            </div>

            <p class="text-sm text-gray-500">
                by {{ $link->author->name }}
            </p>
        </div>
    </a>
</div>
