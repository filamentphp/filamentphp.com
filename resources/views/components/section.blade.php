@props([
    'doodles' => null,
])

<div {{ $attributes->class(['relative max-w-7xl px-8 py-16 space-y-8 mx-auto']) }}>
    {{ $slot }}

    {{ $doodles }}
</div>
