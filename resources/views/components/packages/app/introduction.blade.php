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
    class="mx-auto w-full max-w-5xl px-5 pt-20"
>
    {{-- Package Name --}}
    <div class="flex items-center justify-center gap-5">
        <div
            class="h-px max-w-[10rem] grow rounded-full bg-gradient-to-r from-transparent to-evening"
        ></div>
        <div class="text-2xl font-bold text-evening">Filament Framework</div>
        <div
            class="h-px max-w-[10rem] grow rounded-full bg-gradient-to-l from-transparent to-evening"
        ></div>
    </div>
    <div class="pt-14 text-center">
        {{-- Title --}}
        <header class="font-black">
            <div class="text-4xl">Build</div>
            <div
                class="inline-block bg-gradient-to-r from-butter/80 to-sky-400/60 bg-clip-text pb-3 pt-4 text-5xl text-transparent"
            >
                Powerful & Scalable
            </div>
            <div class="text-4xl">Web Apps In Seconds.</div>
        </header>

        {{-- Description --}}
        <div class="pt-5 text-xl text-dolphin">
            A UI framework build using the TALL stack, which gives you a set of
            interactive pre-built components that encompass both the frontend
            and backend.
        </div>

        {{-- Link --}}
        <div class="grid place-items-center pt-10">
            <a
                href="{{ route('docs') }}"
                class="rounded-full bg-[#ffbc74] px-7 py-3 text-white transition duration-300 hover:bg-[#ffbc74]/80"
            >
                Get Started
            </a>
        </div>
    </div>

    {{-- Demo Screenshot --}}
    <div class="pt-12">
        <div class="grid">
            <img
                src="{{ Vite::asset('resources/images/home/filament-demo.webp') }}"
                alt="Filament demo"
                class="w-full [grid-area:1/-1]"
            />
            <div
                class="h-40 w-full self-end bg-gradient-to-t from-cream to-transparent [grid-area:1/-1]"
            ></div>
        </div>
    </div>
</section>
