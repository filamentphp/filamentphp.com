@props([
    'heading' => null,
    'previewify' => null,
    'previewifyData' => [],
])

<x-layouts.base {{ $attributes }} :previewify="$previewify" :previewify-data="$previewifyData">
    <x-nav />

    <aside
        x-data="{}"
        x-cloak
        :aria-hidden="$store.sidebar.isOpen.toString()"
        :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
        class="fixed w-full max-w-xs p-8 space-y-8 inset-y-0 left-0 z-10 overflow-y-auto transition-transform duration-500 ease-in-out transform bg-gray-100"
    >
        <ul class="space-y-2 -mx-3">
            @foreach ([
                route('docs') => 'Documentation',
                route('plugins') => 'Plugins',
                route('links') => 'Links',
            ] as $url => $label)
                <li>
                    <a
                        href="{{ $url }}"
                        class="block px-4 py-2 w-full rounded-lg transition hover:bg-gray-500/10 focus:bg-gray-500/10"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    {{ $slot }}

    <x-footer />
</x-layouts.base>
