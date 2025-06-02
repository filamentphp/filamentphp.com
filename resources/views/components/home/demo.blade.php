<section
    class="mx-auto mt-20 w-full max-w-(--breakpoint-lg) px-10 sm:mt-32 lg:mt-44 lg:px-5"
>
    <div
        x-init="
            () => {
                if (reducedMotion) return
                gsap.fromTo(
                    $el,
                    {
                        autoAlpha: 0,
                        y: 10,
                    },
                    {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.5,
                        ease: 'power1.out',
                    },
                )
            }
        "
        class="@container relative isolate z-0 grid place-items-center"
    >
        {{-- Version number --}}
        <div
            x-init="
                () => {
                    if (reducedMotion) return
                    gsap.fromTo(
                        $el,
                        {
                            autoAlpha: 0,
                            y: -10,
                        },
                        {
                            autoAlpha: 0.3,
                            y: 0,
                            duration: 0.8,
                            ease: 'power1.in',
                        },
                    )
                }
            "
            class="relative -z-50 -mt-[18cqw] self-start justify-self-center truncate bg-linear-to-r from-[#D8DBEE] via-[#C4C9E9] to-[#DDDBD1] bg-clip-text text-[16cqw] font-semibold tracking-wide text-transparent opacity-30 [grid-area:1/-1]"
        >
            Version 4
        </div>

        {{-- Screenshot --}}
        <img
            src="{{ Vite::asset('resources/images/home/filament-demo.webp') }}"
            alt="Filament demo"
            loading="lazy"
            width="2984"
            height="1610"
            class="relative z-0 w-full rounded-xl mask-b-from-50% [grid-area:1/-1]"
        />

        {{-- White box bottom --}}
        <div
            class="relative -z-10 -mt-4 h-1/4 w-[96%] self-start rounded-xl bg-gray-50/80 ring-1 ring-black/[0.025] [grid-area:1/-1]"
        ></div>

        {{-- White box top --}}
        <div
            class="relative -z-20 -mt-8 hidden h-1/4 w-[90%] self-start rounded-xl bg-gray-50/50 ring-1 ring-black/[0.025] [grid-area:1/-1] sm:block"
        ></div>

        {{-- Button --}}
        <a
            href="https://demo.filamentphp.com"
            class="group relative z-20 inline-flex items-center gap-3 self-center justify-self-center rounded-2xl bg-[#ffe8ce] py-2 pr-2 pl-5 font-medium transition duration-300 ease-in-out [grid-area:1/-1]"
        >
            <div
                class="transition duration-300 ease-in-out will-change-transform group-hover:-translate-x-px"
            >
                Visit the demo
            </div>
            <div
                class="isolate grid size-11 place-items-center rounded-xl bg-[#ffdeb3] transition duration-300 ease-in-out"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 12"
                    fill="none"
                    class="h-3 transition duration-300 ease-in-out will-change-transform group-hover:translate-x-px"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.0381 7.36407C13.6556 6.5515 13.6539 5.42531 13.0335 4.61482C11.6929 2.86344 10.2936 1.27364 8.57415 0.326571C7.87624 -0.0578285 7.14008 0.0681162 6.60975 0.482662C6.09024 0.888756 5.76689 1.56733 5.8111 2.31051C5.83588 2.72711 5.87076 3.14792 5.92567 3.56034C4.72749 3.50805 3.53531 3.54171 2.33 3.66123C1.44553 3.74894 0.621722 4.38869 0.529937 5.36349C0.490021 5.78741 0.490021 6.2214 0.529937 6.64532C0.621722 7.62012 1.44553 8.25987 2.33 8.34757C3.53846 8.46741 4.73372 8.50093 5.93505 8.44806C5.88216 8.86051 5.84903 9.28107 5.82589 9.69736C5.78454 10.4411 6.11081 11.1186 6.6323 11.5224C7.16468 11.9347 7.90168 12.057 8.59792 11.6689C10.3115 10.7136 11.7045 9.11875 13.0381 7.36407Z"
                        fill="#D9B88F"
                    />
                </svg>
            </div>
        </a>
    </div>
</section>
