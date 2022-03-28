@props([
    'plugin',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('plugins.view', ['plugin' => $plugin]) }}" class="block">
        <div class="aspect-w-2 aspect-h-1 rounded-2xl shadow overflow-hidden bg-gray-100">
            <img
                src="{{ $plugin->getThumbnailUrl() }}"
                alt="{{ $plugin->name }}"
                class="object-center object-cover"
            >
        </div>

        <div class="p-2 space-y-1">
            <div class="flex items-start justify-between gap-4">
                <h3 class="flex-1 text-base font-medium text-gray-900">
                    {{ $plugin->name }}
                </h3>

                <div class="mt-1 flex items-center shrink-0 gap-2">
                    @if ($plugin->hasGitHubStars())
                        <span class=" text-xs inline-flex items-center gap-1">
                            @php
                                $stars = $plugin->getGitHubStars();
                            @endphp

                                {{ $stars }}

                            <x-heroicon-s-star class="w-3 h-3 text-yellow-500" />
                        </span>
                    @endif

                    <span class="text-xs inline-flex items-center gap-1">
                        {{ $plugin->views }}

                        <x-heroicon-s-eye class="w-3 h-3 text-gray-500" />
                    </span>
                </div>
            </div>

            <p class="text-sm text-gray-500">
                by {{ $plugin->author->name }}
            </p>
        </div>
    </a>
</div>
