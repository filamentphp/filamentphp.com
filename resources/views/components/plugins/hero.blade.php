<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-8xl px-10 pt-20"
>
    <div
        class="relative flex max-w-screen-lg items-start gap-10 md:gap-20 xl:justify-between"
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
                        .fromTo(
                            $refs.submit_plugins,
                            {
                                autoAlpha: 0,
                                x: -10,
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
                            $refs.how_to_make_plugins,
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
                            '>-0.4',
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
                    Plugins
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
                        viewBox="0 0 24 24"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                d="M11.811 6.727C12.825 4.909 13.331 4 14.09 4c.757 0 1.264.909 2.277 2.727l.262.47c.288.517.432.775.657.945c.224.17.504.234 1.063.36l.51.116c1.967.445 2.95.667 3.185 1.42c.234.753-.437 1.537-1.778 3.106l-.347.406c-.381.445-.572.668-.658.944c-.086.276-.057.573 0 1.168l.053.541c.203 2.094.305 3.14-.308 3.605c-.613.465-1.534.041-3.377-.807l-.476-.22c-.524-.24-.786-.361-1.063-.361c-.278 0-.54.12-1.063.361l-.477.22c-1.842.848-2.763 1.272-3.376.807c-.613-.465-.511-1.511-.309-3.605l.053-.541c.057-.595.086-.892 0-1.168c-.085-.276-.276-.498-.657-.944l-.347-.406C6.57 11.575 5.9 10.79 6.135 10.038c.234-.753 1.218-.975 3.185-1.42l.51-.116c.559-.126.838-.19 1.063-.36c.224-.17.368-.428.656-.945l.262-.47Z"
                            />
                            <path
                                stroke-linecap="round"
                                d="M2.089 16a4.736 4.736 0 0 1 4-.874m-4-4.626c1-.5 1.29-.44 2-.5M2 5.609l.208-.122c2.206-1.292 4.542-1.64 6.745-1.005l.208.06"
                                opacity=".5"
                            />
                        </g>
                    </svg>
                </div>
            </div>

            {{-- Message --}}
            <div
                x-ref="message"
                class="max-w-sm pt-10 text-lg font-medium text-dolphin"
            >
                Community made packages for Filament projects, which give you
                access to awesome new features.
            </div>

            {{-- Stats --}}
            <div
                x-ref="stats"
                class="flex flex-wrap items-center gap-20 pt-10"
            >
                {{-- Plugins --}}
                <div class="group/stat gsap-stat will-change-transform">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span>{{ number_format($pluginsCount) }}</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-[#85D1A0] transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-dolphin">Plugins</div>
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

            <div class="flex flex-wrap gap-x-5 gap-y-8 pt-10">
                <a
                    x-ref="submit_plugins"
                    href="https://github.com/filamentphp/filamentphp.com/blob/main/README.md#contributing"
                    class="group/button relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-full bg-[#7466BC] px-9 py-3 text-white backdrop-blur transition duration-300 ease-out will-change-transform group-hover/button:-translate-y-2 group-hover/button:translate-x-1 group-hover/button:bg-purple-300/40 motion-reduce:transition-none"
                    >
                        <div class="whitespace-nowrap">Submit Plugins</div>
                        <div
                            class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none"
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
                        class="absolute inset-0 -z-10 h-full w-full rounded-full bg-[#8e7edd] transition duration-300 ease-out will-change-transform group-hover/button:-translate-x-0.5 group-hover/button:translate-y-0.5 motion-reduce:transition-none"
                    ></div>
                </a>
                <a
                    x-ref="how_to_make_plugins"
                    href="/docs/support/plugins/getting-started"
                    class="group/button relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-full bg-cream px-9 py-3 text-midnight text-purple-950 backdrop-blur transition duration-300 ease-out will-change-transform group-hover/button:-translate-y-2 group-hover/button:translate-x-1 group-hover/button:bg-opacity-20 motion-reduce:transition-none"
                    >
                        <div
                            class="transition duration-300 motion-reduce:transition-none"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    fill="currentColor"
                                    d="m368 350.643l-112 63l-112-63v-66.562l-32-17.778v103.054l144 81l144-81V266.303l-32 17.778v66.562z"
                                />
                                <path
                                    fill="currentColor"
                                    d="M256 45.977L32 162.125v27.734L256 314.3l192-106.663V296h32V162.125Zm160 142.831l-32 17.777L256 277.7l-128-71.115l-32-17.777l-22.179-12.322L256 82.023l182.179 94.463Z"
                                />
                            </svg>
                        </div>
                        <div class="whitespace-nowrap">How To Make Plugins</div>
                    </div>

                    {{-- Shadow --}}
                    <div
                        class="absolute inset-0 -z-10 h-full w-full rounded-full bg-purple-200/50 opacity-0 transition duration-300 ease-out will-change-transform group-hover/button:-translate-x-0.5 group-hover/button:translate-y-0.5 group-hover/button:opacity-100 motion-reduce:transition-none"
                    ></div>
                </a>
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
                            $refs.ideapuzzle,
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
                            $refs.geometric_shape_1,
                            {
                                autoAlpha: 0,
                                x: 30,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.7,
                                ease: 'circ.out',
                            },
                            '>-0.4',
                        )
                        .fromTo(
                            $refs.geometric_shape_2,
                            {
                                autoAlpha: 0,
                                x: 30,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.7,
                                ease: 'circ.out',
                            },
                            '>-0.6',
                        )
                        .fromTo(
                            $refs.geometric_shape_3,
                            {
                                autoAlpha: 0,
                                x: 30,
                            },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.7,
                                ease: 'circ.out',
                            },
                            '>-0.6',
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
            class="absolute -right-5 -top-10 -z-10 hidden w-60 min-[660px]:block md:relative md:right-auto md:top-auto md:w-72"
        >
            {{-- Idea Puzzle --}}
            <img
                x-ref="ideapuzzle"
                src="{{ Vite::asset('resources/images/plugins/ideapuzzle.webp') }}"
                alt="Puzzle"
                class="block w-full"
            />

            {{-- Decoration Circles --}}
            <div
                x-ref="circle1"
                class="absolute -bottom-24 right-10 hidden h-3 w-3 rounded-full bg-blue-200 min-[550px]:block md:h-3 md:w-3 lg:-left-14 lg:right-auto"
            ></div>
            <div
                x-ref="circle2"
                class="absolute bottom-0 right-0 hidden h-3 w-3 rounded-full bg-[#FFCEA0] min-[550px]:block md:h-3 md:w-3 lg:-left-4 lg:right-auto"
            ></div>

            {{-- Decoration Geometric Shapes --}}
            <img
                x-ref="geometric_shape_1"
                src="{{ Vite::asset('resources/images/home/geometric-shape-2.webp') }}"
                alt="Shape"
                class="absolute -left-10 -top-5 hidden w-8 md:block lg:-right-16 lg:left-auto"
            />
            <img
                x-ref="geometric_shape_2"
                src="{{ Vite::asset('resources/images/home/geometric-shape-4.webp') }}"
                alt="Shape"
                class="absolute -left-20 bottom-20 hidden w-8 md:block lg:-right-32 lg:left-auto"
            />
            <img
                x-ref="geometric_shape_3"
                src="{{ Vite::asset('resources/images/home/geometric-shape-1.webp') }}"
                alt="Shape"
                class="absolute -bottom-16 -left-10 hidden w-8 md:block lg:-right-14 lg:left-auto"
            />
        </div>
    </div>
</div>
