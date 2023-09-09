<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline()
                .fromTo(
                    $refs.title,
                    {
                        autoAlpha: 0,
                        x: -30,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
                .fromTo(
                    $refs.list,
                    {
                        autoAlpha: 0,
                        x: 20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                    '<',
                )
        }
    "
    class="mx-auto w-full max-w-5xl px-10 pt-20"
>
    {{-- Consultant List --}}
    <div
        x-ref="list"
        class="grid grid-cols-2 gap-y-10 gap-x-20"
    >
        <x-consulting.consultant
            avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
            name="Dan Harrin"
            title="Creator of Filament"
        >
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore labore repudiandae qui facilis natus. Soluta, sed sequi minus voluptatem distinctio et architecto.
        </x-consulting.consultant>
        <x-consulting.consultant
            avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
            name="Zep Fietje"
            title="Lead UI Designer & Developer"
        >
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore labore repudiandae qui facilis natus. Soluta, sed sequi minus voluptatem distinctio et architecto.
        </x-consulting.consultant>
    </div>
</section>
