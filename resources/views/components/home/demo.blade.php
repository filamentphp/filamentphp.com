<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg px-10 pt-40 lg:px-5"
>
    <div
        x-data="{}"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.timeline({
                    delay: 0.2,
                    scrollTrigger: {
                        trigger: $refs.header,
                        start: 'top bottom',
                    },
                })
                    .fromTo(
                        $refs.header,
                        {
                            autoAlpha: 0,
                        },
                        {
                            autoAlpha: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                    )
                    .fromTo(
                        $refs.mockup,
                        {
                            autoAlpha: 0,
                        },
                        {
                            autoAlpha: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
            }
        "
        class="flex flex-col items-center justify-center gap-20 md:flex-row md:gap-10 lg:justify-between"
    >
        <div x-ref="header">
            {{-- Live Demo --}}
            <div class="text-3xl">
                <span>Try our</span>
                <span class="font-bold">Live Demo</span>
            </div>

            {{-- Description --}}
            <div
                class="min-w-[18rem] max-w-[22rem] pt-7 font-medium text-dolphin"
            >
                We've put together a feature-rich demo application to showcase
                many features.
                <br />
                It's completely open-source!
            </div>

            {{-- Links --}}
            <div class="flex flex-wrap items-center gap-5 pt-20">
                <a
                    href="https://demo.filamentphp.com"
                    class="group/button flex items-center justify-center gap-3 rounded-xl bg-butter px-7 py-3 text-white transition duration-200 motion-reduce:transition-none"
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
                <a
                    target="_blank"
                    href="https://github.com/filamentphp/demo"
                    class="flex items-center justify-center gap-3 rounded-xl bg-dawn-pink px-7 py-3 text-hurricane transition duration-300 hover:bg-dawn-pink/70 motion-reduce:transition-none"
                >
                    <div>Source Code</div>
                </a>
            </div>
        </div>

        {{-- Demo Mockup --}}
        <div
            x-ref="mockup"
            class="group/mockup relative grid w-full max-w-lg"
        >
            {{-- Mockup --}}
            <div
                class="w-[95%] self-center justify-self-center overflow-hidden rounded-bl-xl rounded-br-xl rounded-tl-lg rounded-tr-lg shadow-lg shadow-black/5 transition-all duration-1000 [grid-area:1/-1] [transform-style:preserve-3d] group-hover/mockup:[transform:perspective(1500px)_rotateY(0deg)_rotateX(0deg)_translateZ(0)] motion-reduce:transition-none motion-reduce:group-hover/mockup:transform-none md:[transform:perspective(1500px)_rotateY(-10deg)_rotateX(5deg)_translateZ(0)]"
            >
                {{-- Window Header --}}
                <div
                    class="flex h-6 w-full items-center gap-5 bg-[#262B2F]/80 px-3"
                >
                    <div class="flex items-center gap-1">
                        <div class="h-1.5 w-1.5 rounded-full bg-red-400"></div>
                        <div
                            class="h-1.5 w-1.5 rounded-full bg-yellow-400"
                        ></div>
                        <div
                            class="h-1.5 w-1.5 rounded-full bg-emerald-400"
                        ></div>
                    </div>
                    <div
                        class="flex-1 pr-10 text-center text-[0.6rem] text-white/40"
                    >
                        demo.filamentphp.com
                    </div>
                </div>

                {{-- Screenshot --}}
                <img
                    src="{{ Vite::asset('resources/images/home/filament-demo.webp') }}"
                    alt="Filament demo"
                    class="w-full"
                />
            </div>

            {{-- Decoration Background --}}
            <div
                class="relative -z-10 h-[120%] w-full self-center justify-self-center rounded-[3rem] bg-gradient-to-br from-dawn-pink to-transparent [grid-area:1/-1] md:left-10 md:rotate-2 md:justify-self-start lg:h-[25rem] lg:w-[110%]"
            ></div>
        </div>
    </div>
</div>
