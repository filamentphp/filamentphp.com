@php
    seo()
    ->title('Team')
    ->description('Meet the team behind Filament.')
@endphp

<x-layouts.app>
    <x-team.hero />
    <x-team.member-list />
</x-layouts.app>
