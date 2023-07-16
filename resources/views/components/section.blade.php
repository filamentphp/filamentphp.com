@props([
    'doodles' => null,
])

<div
    {{ $attributes->class(['relative mx-auto max-w-8xl space-y-8 px-8 py-16']) }}
>
    {{ $slot }}

    {{ $doodles }}
</div>
