<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg px-5 pt-60"
>
    <div
        x-data="{}"
        class="text-center"
    >
        <div class="mx-auto grid w-full max-w-4xl">
            {{-- Sun --}}
            <div
                class="relative top-10 z-10 self-center justify-self-center [grid-area:1/-1]"
            >
                <div
                    class="h-40 w-40 rounded-full bg-gradient-to-t from-[#FFBF85]/40 to-[#FF9385]"
                ></div>
            </div>

            {{-- Sun Blur --}}
            <div
                class="relative top-14 z-20 self-end justify-self-center [grid-area:1/-1]"
            >
                <div class="h-28 sm:h-32 w-60 bg-cream/10 backdrop-blur-md"></div>
            </div>

            {{-- Cloud 1 --}}
            <div
                class="relative -top-10 sm:-top-3 left-10 sm:left-5 self-start justify-self-start [grid-area:1/-1]"
            >
                <img
                    src="{{ Vite::asset('resources/svg/home/cloud1.svg') }}"
                    alt=""
                    class="w-[10rem] sm:w-[14rem]"
                />
            </div>

            {{-- Cloud 2 --}}
            <div
                class="relative -right-40 -top-10 sm:-top-3 self-start justify-self-center [grid-area:1/-1]"
            >
                <img
                    src="{{ Vite::asset('resources/svg/home/cloud2.svg') }}"
                    alt=""
                    class="w-[8rem] sm:w-[12rem]"
                />
            </div>

            {{-- Cloud 3 --}}
            <div
                class="relative -top-10 right-20 self-center justify-self-end [grid-area:1/-1] hidden sm:block"
            >
                <img
                    src="{{ Vite::asset('resources/svg/home/cloud3.svg') }}"
                    alt=""
                    class="w-[8rem]"
                />
            </div>

            {{-- Left Birds --}}
            <div
                class="relative right-32 self-start justify-self-center [grid-area:1/-1] hidden sm:block"
            >
                <div class="flex items-center gap-10">
                    <img
                        src="{{ Vite::asset('resources/svg/home/bird.svg') }}"
                        alt=""
                        class="w-[2rem]"
                    />
                    <img
                        src="{{ Vite::asset('resources/svg/home/bird.svg') }}"
                        alt=""
                        class="w-[2rem]"
                    />
                </div>
                <div class="flex justify-center pt-5">
                    <img
                        src="{{ Vite::asset('resources/svg/home/bird.svg') }}"
                        alt=""
                        class="w-[3rem]"
                    />
                </div>
            </div>

            {{-- Right Birds --}}
            <div
                class="relative -right-44 sm:top-20 w-32 self-start justify-self-center [grid-area:1/-1]"
            >
                <div class="flex justify-center">
                    <img
                        src="{{ Vite::asset('resources/svg/home/bird.svg') }}"
                        alt=""
                        class="w-[3rem]"
                    />
                </div>
                <div class="flex justify-start pt-5">
                    <img
                        src="{{ Vite::asset('resources/svg/home/bird.svg') }}"
                        alt=""
                        class="w-[2rem]"
                    />
                </div>
            </div>

            {{-- Left Mountain --}}
            <div class="self-end justify-self-start [grid-area:1/-1] hidden sm:block">
                <img
                    src="{{ Vite::asset('resources/svg/home/mountain1.svg') }}"
                    alt=""
                    class="w-[30rem]"
                />
            </div>

            {{-- Right Mountain --}}
            <div class="self-end justify-self-end [grid-area:1/-1]">
                <img
                    src="{{ Vite::asset('resources/svg/home/mountain2.svg') }}"
                    alt=""
                    class="w-[30rem]"
                />
            </div>
        </div>

        {{-- Supercar --}}
        <div class="relative z-50 grid place-items-center pt-10">
            <img
                x-ref="supercar"
                src="{{ Vite::asset('resources/images/home/supercar.webp') }}"
                alt=""
                class="w-44"
            />
        </div>

        {{-- Takeoff --}}
        <div class="pt-3 text-3xl font-extrabold">Ready To Take Off?</div>
        <div class="mx-auto max-w-md pt-2 text-rum">
            Give Filament a try and we’ll promise you’ll be amazed in the first
            few minutes.
        </div>

        {{-- Get Started Link --}}
        <div class="pt-10">
            <a
                href="#"
                class="group/getstarted relative flex w-full items-center justify-between gap-5 overflow-hidden rounded-2xl px-10 py-8 sm:py-10 ring-2 ring-transparent transition duration-300 hover:ring-peach-orange/40"
            >
                <div class="text-2xl sm:text-3xl font-bold">Get Started</div>
                <div class="pr-4">
                    <svg
                        width="24"
                        height="24"
                        class="scale-[2] sm:scale-[2.5] transition duration-300 will-change-transform group-hover/getstarted:translate-x-3"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                            stroke="currentColor"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>

                <div
                    class="absolute inset-0 -z-10 h-full w-full bg-gradient-to-br from-[#FFEDE3] to-[#FFEBCC] transition duration-300 group-hover/getstarted:opacity-70"
                ></div>
            </a>
        </div>
    </div>
</div>
