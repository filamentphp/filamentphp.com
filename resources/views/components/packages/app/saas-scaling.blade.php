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
    class="mx-auto w-full max-w-5xl px-5 pt-32"
>
    {{-- Scaling --}}
    <div class="flex flex-wrap items-center justify-center gap-x-20 gap-y-10">
        <img
            src="{{ Vite::asset('resources/images/packages/app/shuttlelaunch.webp') }}"
            alt=""
            class="w-80"
        />

        <div class="">
            {{-- Title --}}
            <div class="text-3xl font-black">Scaling</div>

            {{-- Description --}}
            <div class="max-w-lg pt-5 text-lg font-medium text-dolphin">
                If you’re building something big, whether it’s a SaaS app or an
                online shop, and you need multiple panels, with multiple teams
                and a billing integration, we’ve included everything you’d need
                to achieve that goal!
            </div>
        </div>
    </div>
</section>
