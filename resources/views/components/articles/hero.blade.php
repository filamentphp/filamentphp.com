<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-8xl px-10 pt-20"
>
    <div
        class="relative flex max-w-screen-lg items-start justify-center gap-10 md:gap-20 min-[840px]:justify-between"
    >
        {{-- Left Side --}}
        <div
            x-data="{}"
            x-init="
                () => {
                    if (reducedMotion) return
                    gsap.timeline()
                        .fromTo(
                            $refs.plugins,
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
                            $refs.plugins_star,
                            {
                                autoAlpha: 0,
                                x: -10,
                                scale: 0.8,
                                rotate: -10,
                            },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                x: 0,
                                rotate: 0,
                                duration: 0.7,
                                ease: 'back.out',
                            },
                            '>-0.4',
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
                            $refs.stats.querySelectorAll('.gsap-stat'),
                            {
                                autoAlpha: 0,
                                scale: 0.5,
                            },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                duration: 0.6,
                                ease: 'back.out(2)',
                                stagger: 0.1,
                            },
                            '<',
                        )
                }
            "
        >
            {{-- Header --}}
            <div class="flex items-start gap-3">
                {{-- Title --}}
                <div
                    class="text-5xl font-black"
                    x-ref="plugins"
                >
                    Content
                </div>

                {{-- Star --}}
                <div
                    x-ref="plugins_star"
                    class="relative -top-3.5"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        viewBox="0 0 512 512"
                    >
                        <path
                            fill="currentColor"
                            d="m278.574 20.672l-28.246 43.463c-36.452-29.484-87.944-38.624-127.96-30.428c-54.457 11.15-100.166 60.347-97.895 131.46c2.394 74.955 54.71 129.71 104.89 174.823c25.09 22.554 50.84 43.086 69.928 61.535c37.685 34.062 55.942 92.366 55.942 92.366s24.534-59.502 55.942-89.572c19.692-18.7 45.676-39.61 71.324-62.93c51.298-46.644 104.404-104.034 102.094-177.618c0-122.308-121.2-121.013-167.883-78.495c19.323-10.226 40.12-12.397 58.798-8.214c34.297 7.683 62.693 35.935 64.332 88.108c1.562 49.92-39.09 98.088-88.11 142.654c-24.508 22.28-49.752 42.445-71.324 62.93c-11.456 10.884-16.74 20.514-25.174 31.795c-8.437-11.983-13.663-22.066-25.173-33.192C174.715 306.4 86.784 238.475 83.27 163.77c-.72-62.22 72.103-78.604 111.246-51.04l-45.924 25.258c67.393 11.144 124.746 37.36 185.597 75.588L278.573 20.672z"
                        />
                    </svg>
                </div>
            </div>

            {{-- Message --}}
            <div
                x-ref="message"
                class="w-[23rem] pt-10 text-lg font-medium text-dolphin"
            >
                A collection of articles written by the Filament team and our
                community.
            </div>

            {{-- Stats --}}
            <div
                x-ref="stats"
                class="flex flex-wrap items-center gap-20 pt-10"
            >
                {{-- Articles --}}
                <div class="group/stat gsap-stat will-change-transform">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span>{{ number_format($articlesCount) }}</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-[#85D1A0] transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-dolphin">Articles</div>
                </div>

                {{-- Authors --}}
                <div class="group/stat gsap-stat will-change-transform">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span>{{ number_format($authorsCount) }}</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-[#897AD7] transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-dolphin">Authors</div>
                </div>

                {{-- Stars --}}
                <div class="group/stat gsap-stat will-change-transform">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span>{{ number_format($starsCount) }}</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-butter transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-dolphin">Stars</div>
                </div>
            </div>
        </div>

        {{-- Right Side --}}
        <div
            x-data="{}"
            x-init="
                () => {
                    if (reducedMotion) return
                    gsap.timeline()
                        .fromTo(
                            $refs.communitylightbulbs,
                            {
                                autoAlpha: 0,
                                x: -20,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.7,
                                ease: 'circ.out',
                            },
                        )
                        .fromTo(
                            $refs.circle1,
                            {
                                autoAlpha: 0,
                                scale: 0,
                            },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                duration: 0.5,
                                ease: 'back.out(2)',
                            },
                            '>-0.6',
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
                                duration: 0.5,
                                ease: 'back.out(2)',
                            },
                            '>-0.6',
                        )
                }
            "
            class="absolute -bottom-[1.65rem] -right-5 -z-10 hidden w-72 shrink-0 md:relative md:right-auto md:top-auto md:w-80 min-[840px]:block"
        >
            {{-- Illustration --}}
            <img
                x-ref="communitylightbulbs"
                src="{{ Vite::asset('resources/images/articles/handsholdinglightbulbs.webp') }}"
                alt="Hands holding light bulbs"
                class="block w-full"
            />

            {{-- Decoration Circles --}}
            <div
                x-ref="circle1"
                class="absolute -right-24 bottom-10 hidden h-3 w-3 rounded-full bg-blue-200 md:-left-40 md:right-auto md:h-3 md:w-3 min-[900px]:block"
            ></div>
            <div
                x-ref="circle2"
                class="absolute -right-14 bottom-32 hidden h-3 w-3 rounded-full bg-emerald-200 md:-left-24 md:right-auto md:h-3 md:w-3 min-[900px]:block"
            ></div>
        </div>
    </div>
</div>
