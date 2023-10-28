<section
    x-cloak
    x-data
    x-ref="section"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
                $refs.section,
                {
                    autoAlpha: 0,
                },
                {
                    autoAlpha: 1,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    class="mx-auto w-full max-w-5xl px-5 pt-14"
>
    {{-- Download Count --}}
    <div class="grid text-center [container-type:inline-size]">
        <div
            class="bg-gradient-to-t from-[#EFEFEF]/20 to-[#ABF4F6] bg-clip-text text-[47cqw] font-black leading-none text-transparent [grid-area:1/-1]"
        >
            10M
        </div>

        <div
            class="self-center justify-self-center text-lg font-extrabold leading-normal min-[400px]:text-xl min-[500px]:[grid-area:1/-1] sm:text-[3.5cqw] sm:leading-[4.5cqw]"
        >
            <span class="inline min-[500px]:block">
                Filament has served users with over
            </span>
            <span
                class="bg-gradient-to-r from-[#51D7DB] to-[#B4ABA4] bg-clip-text text-transparent"
            >
                10 million downloads
            </span>
            <span>across all packages.</span>
        </div>
    </div>
</section>
