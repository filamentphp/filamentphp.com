@php
    seo()
    ->title('Filament App Framework')
    ->description('An Admin Panel Framework for Laravel.');
@endphp

<x-layouts.app>
    <x-use-cases.admin-panel.introduction />
    <x-use-cases.admin-panel.downloads />
    <x-use-cases.admin-panel.components />
    <x-use-cases.admin-panel.plugins :$pluginsCategories />
    <x-use-cases.admin-panel.saas-scaling />
    <x-use-cases.admin-panel.pricing />
</x-layouts.app>
