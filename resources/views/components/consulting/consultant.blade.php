@props([
    'avatar',
    'name',
    'url',
])

<div class="grid justify-items-center gap-y-4">
    <img
        src="{{ $avatar }}"
        alt="{{ $name }}"
        class="mx-auto h-40 w-40 rounded-full xl:h-56 xl:w-56"
    />

    <h3 class="text-2xl font-medium text-white">
        {{ $name }}
    </h3>

    <x-button
        href="{{ $url }}"
        size="lg"
        tag="a"
        target="_blank"
    >
        Book a call with {{ str($name)->before(' ') }} &rarr;
    </x-button>
</div>
