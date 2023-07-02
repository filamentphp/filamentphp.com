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
    <div
        x-data="{}"
        x-ref="separator"
        x-init="
            () => {
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.separator,
                        start: 'top bottom-=150px',
                    },
                }).fromTo(
                    $refs.separator,
                    {
                        clipPath: 'polygon(0 0, 100% 0, 100% 0, 0 0)',
                    },
                    {
                        clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
            }
        "
        class="bg-red my-8 grid h-24 place-items-center"
    >
        <div
            class="h-full border-r-[1.5px] border-dashed border-r-black/50"
        ></div>
    </div>
    <x-home.tweets />
    <x-home.sunset />
</x-layouts.app>
