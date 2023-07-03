@props([
    'sponsors' => false,
])

<div
    {{
        $attributes->class([
            'relative max-w-8xl px-8 py-16 space-y-8 mx-auto',
            'lg:grid lg:grid-cols-6 ml-8' => $sponsors,
        ])
    }}
>
    <div @class(['lg:col-span-5' => $sponsors])>
        {{ $slot }}
    </div>

    @if ($sponsors)
        <aside class="space-y-8 lg:col-span-1 lg:!mt-0 w-full">
            <h4 class="font-heading text-center text-3xl">
                Sponsors
            </h4>

            <div class="space-y-4">
                <a
                    href="https://tappnetwork.com"
                    target="__blank"
                    class="block bg-white rounded-xl mx-auto max-w-xs"
                >
                    <img
                        src="https://github.com/filamentphp/filament/assets/44533235/cd8be68b-59f3-4b93-8b25-f82c6f2d7864"
                        alt="Tapp Network"
                        class="block"
                    />
                </a>

                <a
                    href="https://github.com/sponsors/danharrin"
                    target="__blank"
                    class="block mx-auto max-w-xs font-medium text-sm text-center rounded-xl bg-gray-50 dark:bg-gray-800 p-4 transition hover:bg-pink-100 dark:hover:bg-pink-900 hover:scale-105"
                >
                    Your logo here? <span class="hover:scale-105">💖</span>
                </a>
            </div>
        </aside>
    @endif
</div>
