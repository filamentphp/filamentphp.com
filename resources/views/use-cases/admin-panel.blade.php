@php
    seo()
    ->title('Filament - Laravel Admin Panel')
    ->description('An admin panel built with Laravel and Livewire.');
@endphp

<x-layouts.app>
    <x-use-cases.admin-panel.introduction />
    <x-use-cases.admin-panel.downloads />
    <x-use-cases.admin-panel.components />
    <x-use-cases.admin-panel.plugins
        :$plugins
        :$pluginStars
    />
    <x-use-cases.admin-panel.saas-scaling />
    <x-use-cases.admin-panel.pricing />
    <x-sunset>
        <x-slot name="button">Build a Laravel admin panel</x-slot>
    </x-sunset>
</x-layouts.app>
