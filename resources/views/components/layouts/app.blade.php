@props([
    'heading' => null,
])

<x-layouts.base {{ $attributes }}>
    <x-nav />

    <button
        x-data="{}"
        x-show="$store.sidebar.isOpen"
        x-transition.opacity
        x-on:click="$store.sidebar.isOpen = false"
        x-cloak
        type="button"
        aria-hidden="true"
        class="fixed inset-0 z-10 h-full w-full bg-black/50 focus:outline-none lg:hidden"
    ></button>

    <aside
        x-data="{}"
        x-cloak
        :aria-hidden="$store.sidebar.isOpen.toString()"
        :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-10 w-full max-w-xs transform space-y-8 overflow-y-auto bg-gray-50 p-8 transition-transform duration-500 ease-in-out"
    >
        <ul class="-mx-3 space-y-2">
            @foreach ([
                route('docs') => 'Documentation',
                route('plugins') => 'Plugins',
                route('articles') => 'Community',
                route('consulting') => 'Consulting',
                'https://shop.filamentphp.com' => 'Shop',
            ] as $url => $label)
                <li>
                    <a
                        href="{{ $url }}"
                        class="block w-full rounded-lg px-4 py-2 transition hover:bg-gray-500/10 focus:bg-gray-500/10"
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
