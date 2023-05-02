@props([
    'avatar',
    'name',
    'url',
])

<div class="grid gap-y-4 justify-items-center">
    <img
        src="{{ $avatar }}"
        alt="{{ $name }}"
        class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
    />

    <h3 class="font-medium text-white text-2xl">
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
