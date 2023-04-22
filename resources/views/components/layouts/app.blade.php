@props([
    'heading' => null,
    'previewify' => null,
    'previewifyData' => [],
])

<x-layouts.base {{ $attributes }} :previewify="$previewify" :previewify-data="$previewifyData">
    <x-nav />

    <button
        x-data="{}"
        x-show="$store.sidebar.isOpen"
        x-transition.opacity
        x-on:click="$store.sidebar.isOpen = false"
        x-cloak
        type="button"
        aria-hidden="true"
        class="fixed inset-0 z-10 w-full h-full bg-black/50 focus:outline-none lg:hidden"
    ></button>

    <aside
        x-data="{}"
        x-cloak
        :aria-hidden="$store.sidebar.isOpen.toString()"
        :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 z-10 w-full max-w-xs p-8 space-y-8 overflow-y-auto transition-transform duration-500 ease-in-out transform start-0 bg-gray-50"
    >
        <ul class="-mx-3 space-y-2">
            @foreach ([
                route('docs') => 'Documentation',
                route('plugins') => 'Plugins',
                route('tricks') => 'Tricks',
                route('blog') => 'Blog',
                route('links') => 'Links',
            ] as $url => $label)
                <li>
                    <a
                        href="{{ $url }}"
                        class="block w-full px-4 py-2 transition rounded-lg hover:bg-gray-500/10 focus:bg-gray-500/10"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
            <li>
                <a
                    href="{{ route('consulting') }}"
                    target="_blank"
                    class="block w-full px-4 py-2 transition rounded-lg hover:bg-gray-500/10 focus:bg-gray-500/10"
                >
                    Consulting
                </a>
            </li>
        </ul>
    </aside>

    {{ $slot }}

    <x-footer />
</x-layouts.base>
