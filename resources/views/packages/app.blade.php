@php
    seo()
    ->title('Filament App Framework')
    ->description('An Admin Panel Framework for Laravel.');
@endphp

<x-layouts.app>
    <x-packages.app.introduction />
    <x-packages.app.downloads />
    <x-packages.app.components />
    <x-packages.app.plugins :$pluginsCategories />
</x-layouts.app>
