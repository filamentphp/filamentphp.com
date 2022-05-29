@props([
    'doodles' => null,
    'subheading' => null,
])

<div {{ $attributes->class(['bg-primary-300']) }}>
    <div class="relative max-w-8xl px-8 py-24 mx-auto">
        <div class="space-y-4">
            <h1 class="text-4xl text-center font-heading">
                {{ $slot }}
            </h1>

            @if ($subheading)
                <h2 class="max-w-lg leading-7 text-primary-700 mx-auto text-center">
                    {{ $subheading }}
                </h2>
            @endif
        </div>

        {{ $doodles }}
    </div>
</div>
