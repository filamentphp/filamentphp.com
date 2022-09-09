@props([
    'icon',
    'heading',
])

<div {{ $attributes->class(['col-span-1 rounded-2xl p-6']) }}>
    <div class="inline-block bg-white shadow-lg shadow-black/5 ring-1 ring-black/5 text-primary-500 rounded-lg p-3">
        <x-dynamic-component :component="$icon" class="w-6 h-6" />
    </div>

    <div class="mt-2 flex-1">
        <h2 class="text-black-900/80 font-medium text-lg">
            {{ $heading }}
        </h2>

        {{ $slot }}
    </div>
</div>
