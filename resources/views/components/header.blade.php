@props([
    'doodles' => null,
])

<div {{ $attributes->class(['bg-primary-300']) }}>
    <div class="relative max-w-7xl px-8 py-24 mx-auto">
        <h1 class="text-4xl text-center font-heading">
            {{ $slot }}
        </h1>

        {{ $doodles }}
    </div>
</div>
