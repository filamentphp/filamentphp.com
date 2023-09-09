<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline()
                .fromTo(
                    $refs.consulting,
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
                .fromTo(
                    $refs.phone,
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
    {{-- Header --}}
    <div
        class="flex flex-wrap-reverse items-center justify-start gap-x-20 gap-y-10 md:flex-nowrap md:justify-between"
    >
        <div>
            {{-- Title --}}
            <div
                class="text-5xl font-black"
                x-ref="consulting"
            >
                Consulting
            </div>
            {{-- Message --}}
            <div
                x-ref="message"
                class="max-w-lg pt-10 text-lg font-medium text-dolphin"
            >
                If you're looking for dedicated help with your Filament project, we're here for you. Whether you’re a solo developer or running a big business, we have different consulting choices for you to choose from!
            </div>
        </div>

        {{-- Phone Illustration --}}
        <img
            x-ref="phone"
            src="{{ Vite::asset('resources/images/consulting/phone.webp') }}"
            alt="Phone"
            class="block w-40 md:w-60"
        />
    </div>
</section>
