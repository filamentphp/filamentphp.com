<x-layouts.app>
    <x-header>
        {{ $plugin->name }}

        <x-slot name="subheading">
            by {{ $plugin->author->name }}
        </x-slot>
    </x-header>

    <x-section>
        {{ $plugin->description }}
    </x-section>
</x-layouts.app>
