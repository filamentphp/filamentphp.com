<x-layouts.app
    previewify="757"
    :previewify-data="[
                    'title' => 'Filament',
                    'subtitle' => 'Rapidly build Laravel UIs using the TALL stack.',
                    'code' => 'composer require filament/filament',
        ]"
>
    <x-home.hero />
    <x-home.livedemo />
    <x-home.plugins />
    <x-home.tall />
    <x-home.v3features />
    <x-home.sponsors />
    <div class="grid h-24 place-items-center bg-red my-8">
        <div class="h-full border-r-[1.5px] border-dashed border-r-black/50"></div>
    </div>
    <x-home.tweets />
</x-layouts.app>
