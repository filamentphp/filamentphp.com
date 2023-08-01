<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg overflow-x-clip px-5 pt-20 min-[550px]:px-10 sm:overflow-x-visible"
>
    <div
        class="relative flex items-start justify-center min-[550px]:justify-start lg:gap-40 xl:justify-between"
    >
        {{-- Left Side --}}
        <div class="min-[500px]:pl-10 sm:shrink-0 sm:pl-14 xl:pl-0">
            {{-- Accelerated --}}
            <div
                class="relative translate-x-10 text-3xl font-black italic min-[500px]:translate-x-0 lg:text-4xl"
                x-data="{}"
                x-init="
                    () => {
                        if (reducedMotion) return
                        gsap.timeline()
                            .fromTo(
                                $refs.supercar,
                                {
                                    autoAlpha: 1,
                                    x: -450,
                                },
                                {
                                    autoAlpha: 0,
                                    x: 0,
                                    duration: 1.1,
                                    ease: 'circ.in',
                                },
                            )
                            .fromTo(
                                $refs.accelerated,
                                {
                                    autoAlpha: 0,
                                    x: -100,
                                },
                                {
                                    autoAlpha: 1,
                                    x: 0,
                                    duration: 0.5,
                                    ease: 'circ.out',
                                },
                                '>-0.1',
                            )
                            .fromTo(
                                $refs.shadow,
                                {
                                    autoAlpha: 0,
                                    x: -100,
                                },
                                {
                                    autoAlpha: 1,
                                    x: 0,
                                    duration: 0.7,
                                    ease: 'circ.out',
                                },
                                '<0.01',
                            )
                            .fromTo(
                                $refs.line1,
                                {
                                    autoAlpha: 0,
                                    x: -50,
                                },
                                {
                                    autoAlpha: 1,
                                    x: 0,
                                    duration: 0.3,
                                    ease: 'circ.out',
                                },
                                '<0.2',
                            )
                            .fromTo(
                                $refs.line2,
                                {
                                    autoAlpha: 0,
                                    x: -50,
                                },
                                {
                                    autoAlpha: 1,
                                    x: 0,
                                    duration: 0.3,
                                    ease: 'circ.out',
                                },
                                '<0.02',
                            )
                            .fromTo(
                                $refs.line3,
                                {
                                    autoAlpha: 0,
                                    x: -50,
                                },
                                {
                                    autoAlpha: 1,
                                    x: 0,
                                    duration: 0.3,
                                    ease: 'circ.out',
                                },
                                '<0.02',
                            )
                    }
                "
            >
                {{-- Title --}}
                <div
                    x-ref="accelerated"
                    class="bg-gradient-to-r from-[#FFB46F] to-[#B9C0B9] bg-clip-text text-transparent"
                >
                    Accelerated
                </div>

                {{-- Shadow --}}
                <div
                    x-ref="shadow"
                    class="absolute -left-2 top-1 -z-10 select-none text-[#FFEFE1]"
                >
                    Accelerated
                </div>

                {{-- Speed Lines --}}
                <div
                    class="absolute -left-12 top-1/2 -translate-y-1/2 space-y-1"
                >
                    <div class="translate-x-5">
                        <div
                            x-ref="line1"
                            class="h-0.5 w-7 rounded-full bg-gradient-to-r from-transparent to-[#FFC089]"
                        ></div>
                    </div>
                    <div>
                        <div
                            x-ref="line2"
                            class="h-0.5 w-10 rounded-full bg-gradient-to-r from-transparent to-[#FFC089]"
                        ></div>
                    </div>
                    <div class="-translate-x-4">
                        <div
                            x-ref="line3"
                            class="h-0.5 w-12 rounded-full bg-gradient-to-r from-transparent to-[#FFC089]"
                        ></div>
                    </div>
                </div>

                {{-- Supercar --}}
                <div class="absolute right-0 top-1/2 -translate-y-1/2">
                    <img
                        x-ref="supercar"
                        src="{{ Vite::asset('resources/images/home/supercar.webp') }}"
                        alt="Car"
                        class="w-28 opacity-0"
                    />
                </div>
            </div>

            {{-- Header --}}
            <div
                class="group/header pt-3"
                x-data="{}"
                x-init="
                    () => {
                        if (reducedMotion) return
                        gsap.fromTo(
                            $refs.title,
                            {
                                autoAlpha: 0,
                                x: 20,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.5,
                            },
                        )
                        gsap.fromTo(
                            $refs.description,
                            {
                                autoAlpha: 0,
                                x: -20,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.5,
                            },
                        )
                        gsap.fromTo(
                            $refs.star1,
                            {
                                autoAlpha: 0,
                                scale: 0,
                                rotate: 200,
                                x: 50,
                            },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                rotate: 0,
                                x: 0,
                                duration: 0.8,
                                ease: 'expo.out',
                            },
                        )
                        gsap.fromTo(
                            $refs.star2,
                            {
                                autoAlpha: 0,
                                scale: 0,
                                rotate: -200,
                                x: -60,
                            },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                rotate: 0,
                                x: 0,
                                duration: 0.8,
                                ease: 'expo.out',
                            },
                        )
                    }
                "
            >
                <div class="relative space-y-3 font-black">
                    {{-- Title --}}
                    <div x-ref="title">
                        <div class="relative max-w-fit text-6xl lg:text-7xl">
                            Laravel

                            {{-- Heart Shapes --}}
                            <div
                                class="absolute -right-7 -top-5 -translate-x-1 rotate-12 text-rose-500 opacity-0 duration-200 ease-out group-hover/header:translate-x-0 group-hover/header:opacity-100 motion-reduce:transition-none min-[500px]:-right-5 min-[500px]:-top-7"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M2 9.137C2 14 6.02 16.591 8.962 18.911C10 19.729 11 20.5 12 20.5s2-.77 3.038-1.59C17.981 16.592 22 14 22 9.138c0-4.863-5.5-8.312-10-3.636C7.5.825 2 4.274 2 9.137Z"
                                    />
                                </svg>
                            </div>
                            <div
                                class="absolute -right-12 top-2 -translate-x-1 -rotate-12 text-rose-500 opacity-0 transition delay-75 duration-200 ease-out group-hover/header:translate-x-0 group-hover/header:opacity-100 motion-reduce:transition-none min-[500px]:-right-10 min-[500px]:top-0"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="scale-75"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M2 9.137C2 14 6.02 16.591 8.962 18.911C10 19.729 11 20.5 12 20.5s2-.77 3.038-1.59C17.981 16.592 22 14 22 9.138c0-4.863-5.5-8.312-10-3.636C7.5.825 2 4.274 2 9.137Z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="text-4xl lg:text-5xl">
                            Development
                            <span
                                class="inline-block -translate-x-2 text-butter"
                            >
                                .
                            </span>
                        </div>
                    </div>

                    {{-- Star --}}
                    <div
                        x-ref="star1"
                        class="absolute -left-14 top-1 lg:-left-20"
                    >
                        <svg
                            width="31"
                            height="31"
                            fill="none"
                            class="hidden scale-75 min-[450px]:block min-[500px]:scale-100"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="m17.664 29.354 3.06-8.755 8.679-3.27a2.183 2.183 0 0 0-.05-4.092l-8.754-3.06-3.27-8.679a2.183 2.183 0 0 0-4.092.05l-3.06 8.754-8.68 3.27a2.183 2.183 0 0 0 .05 4.092l8.755 3.06 3.27 8.679a2.183 2.183 0 0 0 4.092-.05Zm-5.325-9.391a2.142 2.142 0 0 0-1.325-1.294l-8.741-3.06 8.665-3.27a2.143 2.143 0 0 0 1.294-1.325l3.06-8.741 3.27 8.665a2.142 2.142 0 0 0 1.325 1.294l8.74 3.06-8.664 3.27a2.141 2.141 0 0 0-1.294 1.325l-3.06 8.741-3.27-8.665Z"
                                fill="#0F033A"
                            />
                        </svg>
                    </div>
                </div>
                <div class="relative pt-5">
                    {{-- Description --}}
                    <div
                        x-ref="description"
                        class="text-xl font-medium leading-normal opacity-90 lg:text-2xl"
                    >
                        A collection of beautiful full-stack
                        <br />
                        components. The perfect starting
                        <br />
                        point for your next app.
                    </div>

                    {{-- Star --}}
                    <div
                        x-ref="star2"
                        class="absolute -right-10 top-1 min-[500px]:right-10 lg:-right-5"
                    >
                        <svg
                            width="31"
                            height="31"
                            fill="none"
                            class="hidden scale-[0.65] min-[450px]:block"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="m17.664 29.354 3.06-8.755 8.679-3.27a2.183 2.183 0 0 0-.05-4.092l-8.754-3.06-3.27-8.679a2.183 2.183 0 0 0-4.092.05l-3.06 8.754-8.68 3.27a2.183 2.183 0 0 0 .05 4.092l8.755 3.06 3.27 8.679a2.183 2.183 0 0 0 4.092-.05Zm-5.325-9.391a2.142 2.142 0 0 0-1.325-1.294l-8.741-3.06 8.665-3.27a2.143 2.143 0 0 0 1.294-1.325l3.06-8.741 3.27 8.665a2.142 2.142 0 0 0 1.325 1.294l8.74 3.06-8.664 3.27a2.141 2.141 0 0 0-1.294 1.325l-3.06 8.741-3.27-8.665Z"
                                fill="#0F033A"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Links --}}
            <div
                x-data="{}"
                x-init="
                    () => {
                        if (reducedMotion) return
                        gsap.fromTo(
                            $refs.getstarted,
                            {
                                autoAlpha: 0,
                                x: -10,
                                y: 10,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                y: 0,
                                duration: 0.5,
                            },
                        )
                        gsap.fromTo(
                            $refs.discord,
                            {
                                autoAlpha: 0,
                                x: 10,
                                y: -10,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                y: 0,
                                duration: 0.5,
                            },
                        )
                    }
                "
                class="flex flex-col gap-5 pt-10 text-white min-[500px]:flex-row min-[500px]:items-center"
            >
                <a
                    x-ref="getstarted"
                    href="{{ route('docs') }}"
                    class="group relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-bl-3xl rounded-tr-3xl bg-midnight px-9 py-4 transition duration-200 will-change-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5 motion-reduce:transition-none"
                    >
                        <div>Get Started</div>
                        <div
                            class="transition duration-300 will-change-transform group-hover:translate-x-1 motion-reduce:transition-none"
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
                    </div>

                    {{-- Shadow --}}
                    <div
                        class="absolute inset-0 -z-10 h-full w-full -translate-x-1.5 translate-y-1.5 rounded-bl-3xl rounded-tr-3xl bg-butter transition duration-300 will-change-transform group-hover:-translate-x-2 group-hover:translate-y-2 group-hover:bg-rose-300 motion-reduce:transition-none"
                    ></div>
                </a>
                <a
                    x-ref="discord"
                    href="{{ route('discord') }}"
                    class="group relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-br-3xl rounded-tl-3xl bg-butter px-9 py-4 transition duration-200 will-change-transform group-hover:-translate-x-0.5 group-hover:-translate-y-0.5 motion-reduce:transition-none"
                    >
                        <div>Join Discord</div>
                        <div
                            class="transition duration-300 will-change-transform group-hover:scale-105 motion-reduce:transition-none"
                        >
                            <svg
                                class="w-5"
                                fill="none"
                                viewBox="0 0 71 55"
                                aria-hidden="true"
                            >
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z"
                                        fill="currentColor"
                                    />
                                </g>
                            </svg>
                        </div>
                    </div>

                    {{-- Shadow --}}
                    <div
                        class="absolute inset-0 -z-10 h-full w-full translate-x-1.5 translate-y-1.5 rounded-br-3xl rounded-tl-3xl bg-[#F1E3E3] transition duration-300 will-change-transform group-hover:translate-x-2 group-hover:translate-y-2 group-hover:bg-stone-200 motion-reduce:transition-none"
                    ></div>
                </a>
            </div>

            {{-- Decoration Arrow --}}
            <div
                x-data="{}"
                x-init="
                    () => {
                        if (reducedMotion) return
                        gsap.fromTo(
                            $refs.arrow,
                            {
                                autoAlpha: 0,
                                x: -10,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.5,
                                ease: 'circ.out',
                                delay: 0.2,
                            },
                        )
                    }
                "
                class="hidden -translate-x-16 pt-2 min-[500px]:block lg:-translate-x-32"
            >
                <img
                    x-ref="arrow"
                    src="{{ Vite::asset('resources/svg/home/decoration-up-arrow-red.svg') }}"
                    alt="Up arrow"
                    class="w-32"
                />
            </div>
        </div>

        {{-- Right Side --}}
        <div
            class="absolute -top-10 right-10 -z-10 hidden min-[500px]:block md:relative md:right-auto md:top-auto"
        >
            <div
                x-data="{}"
                x-init="
                    () => {
                        if (reducedMotion) return
                        gsap.timeline()
                            .fromTo(
                                $refs.rocket,
                                {
                                    autoAlpha: 0,
                                    scale: 0.9,
                                    x: -50,
                                    y: 50,
                                },
                                {
                                    autoAlpha: 1,
                                    scale: 1,
                                    x: 0,
                                    y: 0,
                                    duration: 0.8,
                                    ease: 'circ.out',
                                },
                            )
                            .to($refs.rocket, {
                                keyframes: {
                                    x: [0, 20],
                                    y: [0, -20],
                                },
                                duration: 5,
                                repeat: -1,
                                yoyo: true,
                            })
                        gsap.timeline()
                            .fromTo(
                                $refs.circle1,
                                {
                                    autoAlpha: 0,
                                    scale: 0,
                                },
                                {
                                    autoAlpha: 1,
                                    scale: 1,
                                    duration: 0.7,
                                    ease: 'back.out',
                                },
                            )
                            .fromTo(
                                $refs.circle2,
                                {
                                    autoAlpha: 0,
                                    scale: 0,
                                },
                                {
                                    autoAlpha: 1,
                                    scale: 1,
                                    duration: 0.7,
                                    ease: 'back.out',
                                },
                                '<0.1',
                            )
                    }
                "
                class="relative"
            >
                {{-- Rocket --}}
                <div class="w-32 min-[550px]:w-40 md:w-60 lg:w-80">
                    <img
                        x-ref="rocket"
                        src="{{ Vite::asset('resources/images/home/rocket.webp') }}"
                        alt="Rocket"
                        class="w-full"
                    />
                </div>

                {{-- Decoration Circles --}}
                <div
                    x-ref="circle1"
                    class="absolute -right-4 bottom-0 hidden h-3 w-3 rounded-full bg-[#FFCEA0] min-[550px]:block md:h-4 md:w-4"
                ></div>
                <div
                    x-ref="circle2"
                    class="absolute -bottom-20 right-20 hidden h-5 w-5 rounded-full bg-[#FFE69A] min-[550px]:block md:h-7 md:w-7"
                ></div>
            </div>
        </div>
    </div>
</div>
