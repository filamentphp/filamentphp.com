@props([
    'doodles' => null,
    'subheading' => null,
])

<div {{ $attributes->class(['bg-primary-300']) }}>
    <div class="relative mx-auto max-w-8xl px-8 py-24">
        <div class="space-y-4">
            <h1 class="text-center font-heading text-4xl">
                {{ $slot }}
            </h1>

            @if ($subheading)
                <h2
                    class="mx-auto max-w-lg text-center leading-7 text-primary-700"
                >
                    {{ $subheading }}
                </h2>
            @endif
        </div>

        {{ $doodles }}
    </div>
</div>
