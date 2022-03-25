@props([
    'link',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('links.view', ['link' => $link]) }}" target="_blank" class="block">
        <div class="aspect-video rounded-2xl overflow-hidden bg-gray-100">
            <img
                src="{{ $link->getThumbnailUrl() }}"
                alt="{{ $link->name }}"
                class="object-center object-cover"
            >
        </div>

        <div class="p-2 space-y-1">
            <h3 class="text-base font-medium text-gray-900">
                {{ $link->name }}
            </h3>

            <p class="text-sm text-gray-500">
                by {{ $link->author->name }}
            </p>
        </div>
    </a>
</div>
