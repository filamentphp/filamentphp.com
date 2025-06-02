<section
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
            class="to-evening h-px max-w-40 grow rounded-full bg-linear-to-r from-transparent"
        ></div>
        <div class="text-evening text-2xl">
            Introducing
            <span class="font-bold">Filament</span>
        </div>
        <div
            class="to-evening h-px max-w-40 grow rounded-full bg-linear-to-l from-transparent"
        ></div>
    </div>
    <div class="pt-14 text-center">
        {{-- Title --}}
        <header class="font-black">
            <div class="text-4xl">Build a</div>
            <div
                class="from-butter/80 inline-block bg-linear-to-r to-sky-400/60 bg-clip-text pt-4 pb-3 text-5xl text-transparent"
            >
                Beautiful & Powerful
            </div>
            <div class="text-4xl">Laravel Admin Panel In Minutes.</div>
        </header>

        {{-- Description --}}
        <div
            class="text-dolphin pt-5 text-xl"
            style="text-wrap: balance"
        >
            Filament is a full-stack UI framework built using the TALL stack,
            which gives you a set of interactive pre-built components that are
            perfect for building your next CMS or administration area.
        </div>

        {{-- Link --}}
        <div class="grid place-items-center pt-10">
            <a
                href="{{ route('docs', ['slug' => 'panels/getting-started']) }}"
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
                class="from-cream h-40 w-full self-end bg-linear-to-t to-transparent [grid-area:1/-1]"
            ></div>
            <a
                href="https://demo.filamentphp.com"
                class="group/button bg-evening z-10 flex items-center justify-center gap-3 self-center justify-self-center rounded-xl px-7 py-3 text-white transition duration-200 [grid-area:1/-1] motion-reduce:transition-none"
            >
                <div>Visit the Demo</div>
                <div
                    class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/button:transform-none"
                >
                    <svg
                        width="24"
                        height="25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                            stroke="#fff"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>
