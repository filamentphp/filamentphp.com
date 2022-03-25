@props([
    'plugin',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('plugins.view', ['plugin' => $plugin]) }}" class="block">
        <div class="aspect-video rounded-2xl overflow-hidden bg-gray-100">
            <img
                src="{{ $plugin->getThumbnailUrl() }}"
                alt="{{ $plugin->name }}"
                class="object-center object-cover"
            >
        </div>

        <div class="p-2 space-y-1">
            <h3 class="text-base font-medium text-gray-900">
                {{ $plugin->name }}
            </h3>

            <p class="text-sm text-gray-500">
                by {{ $plugin->author->name }}
            </p>
        </div>
    </a>
</div>
