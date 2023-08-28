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
                    $refs.message,
                    {
                        autoAlpha: 0,
                        x: 10,
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
    class="mx-auto w-full max-w-6xl px-10 pt-20"
>
    {{-- Header --}}
    <div class="flex items-center justify-center text-center">
        <div>
            {{-- Title --}}
            <div
                class="text-5xl font-black"
                x-ref="title"
            >
                Meet our team
            </div>
            {{-- Message --}}
            <div
                x-ref="message"
                class="max-w-xl pt-5 text-lg font-medium text-dolphin"
            >
                Discover the people who are passionately working on Filament.
            </div>
        </div>
    </div>
</section>
