@props([
    'icon',
    'heading',
])

<div {{ $attributes->class(['col-span-1 rounded-2xl p-6']) }}>
    <div
        class="inline-block rounded-lg bg-white p-3 text-primary-500 shadow-lg shadow-black/5 ring-1 ring-black/5"
    >
        <x-dynamic-component
            :component="$icon"
            class="h-6 w-6"
        />
    </div>

    <div class="mt-2 flex-1">
        <h2 class="text-black-900/80 text-lg font-medium">
            {{ $heading }}
        </h2>

        {{ $slot }}
    </div>
</div>
