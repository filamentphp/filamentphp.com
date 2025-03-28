<section class="mx-auto w-full max-w-screen-lg px-5 pt-32">
    <div
        x-init="
            () => {
                if (reducedMotion) return
                const timeline = gsap
                    .timeline({
                        paused: true,
                    })
                    .fromTo(
                        $el,
                        {
                            autoAlpha: 0,
                            y: -20,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power2.out',
                        },
                    )
                motion.inView(
                    $el,
                    (element) => {
                        timeline.play()
                    },
                    {
                        amount: 1,
                    },
                )
            }
        "
        class="isolate grid place-items-center"
    >
        <div class="grid self-center justify-self-center [grid-area:1/-1]">
            <h2
                class="self-center justify-self-center font-afacad text-6xl font-bold text-slate-800 [grid-area:1/-1]"
            >
                V3 Features
            </h2>

            {{-- Star --}}
            <div
                class="-ml-10 hidden self-start justify-self-start [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 21 22"
                    fill="none"
                >
                    <path
                        d="M11.852 20.3562L13.8954 14.5101L19.6908 12.3268C19.9685 12.2199 20.2068 12.0306 20.3737 11.7843C20.5407 11.538 20.6282 11.2465 20.6247 10.949C20.6211 10.6515 20.5265 10.3622 20.3537 10.12C20.1809 9.87774 19.9381 9.69422 19.6579 9.59403L13.8118 7.55066L11.6285 1.7553C11.5216 1.47762 11.3323 1.2393 11.086 1.07236C10.8397 0.905419 10.5482 0.817855 10.2507 0.82143C9.9532 0.825006 9.6639 0.919549 9.42168 1.09236C9.17947 1.26517 8.99594 1.50797 8.89576 1.78814L6.85239 7.63429L1.05703 9.81757C0.779345 9.92446 0.541025 10.1138 0.374085 10.3601C0.207145 10.6064 0.119581 10.8978 0.123157 11.1954C0.126732 11.4929 0.221276 11.7822 0.394086 12.0244C0.566897 12.2666 0.809698 12.4501 1.08987 12.5503L6.93602 14.5937L9.1193 20.3891C9.22618 20.6667 9.41549 20.9051 9.66179 21.072C9.90808 21.2389 10.1996 21.3265 10.4971 21.3229C10.7946 21.3194 11.0839 21.2248 11.3261 21.052C11.5683 20.8792 11.7519 20.6364 11.852 20.3562ZM8.29648 14.0854C8.22303 13.8843 8.10538 13.7023 7.95221 13.5528C7.79904 13.4033 7.61426 13.29 7.4115 13.2214L1.57445 11.1779L7.3607 8.99476C7.56176 8.9213 7.74376 8.80365 7.89329 8.65048C8.04282 8.49731 8.15607 8.31253 8.22467 8.10977L10.2682 2.27272L12.4513 8.05897C12.5248 8.26003 12.6424 8.44203 12.7956 8.59157C12.9488 8.7411 13.1336 8.85434 13.3363 8.92295L19.1734 10.9664L13.3871 13.1496C13.1861 13.2231 13.004 13.3407 12.8545 13.4939C12.705 13.647 12.5917 13.8318 12.5231 14.0346L10.4797 19.8716L8.29648 14.0854Z"
                        fill="#0F033A"
                    />
                </svg>
            </div>

            {{-- Plus --}}
            <div
                class="-ml-14 mt-7 hidden self-start justify-self-start [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="13"
                    height="13"
                    viewBox="0 0 13 13"
                    fill="none"
                >
                    <path
                        d="M6.0708 1.51538L7.10285 11.6571"
                        stroke="#FFB36B"
                        stroke-width="2.5"
                        stroke-linecap="round"
                    />
                    <path
                        d="M1.51587 7.10254L11.6576 6.07049"
                        stroke="#FFB36B"
                        stroke-width="2.5"
                        stroke-linecap="round"
                    />
                </svg>
            </div>

            {{-- Rocket --}}
            <div
                class="-mr-[4.5rem] hidden self-end justify-self-end [grid-area:1/-1] sm:block"
            >
                <img
                    src="{{ Vite::asset('resources/images/home/rocket.webp') }}"
                    alt=""
                    loading="lazy"
                    class="w-16"
                />
            </div>

            {{-- Circles --}}
            <div
                class="-mr-24 mt-5 hidden self-end justify-self-end [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="28"
                    height="28"
                    viewBox="0 0 32 32"
                    fill="none"
                >
                    <circle
                        cx="28.7178"
                        cy="3.28181"
                        r="3.28205"
                        fill="#FFCEA0"
                    />
                    <circle
                        cx="4.92308"
                        cy="27.0766"
                        r="4.92308"
                        fill="#FFE69A"
                    />
                </svg>
            </div>
        </div>

        {{-- Watercolor --}}
        <img
            x-init="
                () => {
                    if (reducedMotion) return
                    gsap.fromTo(
                        $el,
                        {
                            autoAlpha: 0,
                        },
                        {
                            autoAlpha: 1,
                            duration: 0.5,
                            ease: 'power1.in',
                        },
                    )
                }
            "
            src="{{ Vite::asset('resources/images/home/v3_orange_watercolor.webp') }}"
            alt=""
            class="relative -z-50 w-[22rem] self-center justify-self-center [grid-area:1/-1]"
        />
    </div>
    <h3
        x-init="
            () => {
                if (reducedMotion) return
                const timeline = gsap
                    .timeline({
                        paused: true,
                    })
                    .fromTo(
                        $el,
                        {
                            autoAlpha: 0,
                            y: 20,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power2.out',
                        },
                    )
                motion.inView(
                    $el,
                    (element) => {
                        timeline.play()
                    },
                    {
                        amount: 1,
                    },
                )
            }
        "
        class="mx-auto max-w-3xl pt-3 text-center font-afacad text-2xl leading-normal text-gray-500"
    >
        Discover the enhancements and features in Filament V3, designed to
        elevate your development experience.
    </h3>
    <div
        x-init="
            () => {
                if (reducedMotion) return
                const timeline = gsap
                    .timeline({
                        paused: true,
                    })
                    .fromTo(
                        $refAll('slide-in-left'),
                        {
                            autoAlpha: 0,
                            x: -20,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            stagger: 0.1,
                            ease: 'power2.out',
                        },
                    )
                motion.inView(
                    $el,
                    (element) => {
                        timeline.play()
                    },
                    {
                        amount: 0.25,
                    },
                )
            }
        "
        class="grid grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-center gap-5 pt-10 *:flex *:items-center *:gap-5 *:rounded-2xl *:bg-white *:px-5 *:py-7 *:ring-1 *:ring-black/5"
    >
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M19.5 9.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M7 12.5H5.5a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h13a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3H17"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="m9.654 23.5 -3.807 -4.582A1.5 1.5 0 1 1 8.154 17l2.346 2.824V10a1.5 1.5 0 0 1 3 0v6.5h3a4 4 0 0 1 4 4v3"
                    fill="#ffeedf"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Action modals, everywhere.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Open modals and slide-overs from any button, even nest them
                    with full state preservation.
                </p>
            </div>
        </div>
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M21.207 4.5a1 1 0 0 1 0.293 0.707V22.5a1 1 0 0 1 -1 1h-17a1 1 0 0 1 -1 -1v-21a1 1 0 0 1 1 -1h13.293a1 1 0 0 1 0.707 0.291Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M19.321 2.613 17.5 0.791A1 1 0 0 0 16.793 0.5H3.5a1 1 0 0 0 -1 1v17.933Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M15.522 16.72A5.495 5.495 0 0 1 6.5 12.5H12Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M17.5 12.5a5.46 5.46 0 0 1 -1.98 4.22L12 12.5l3.1 -4.54a5.481 5.481 0 0 1 2.4 4.54Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M12 14.882A5.492 5.492 0 0 1 7.472 12.5H6.5a5.495 5.495 0 0 0 9.02 4.22l-1.779 -2.134a5.423 5.423 0 0 1 -1.741 0.296Z"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="M15.522 13.6a5.524 5.524 0 0 1 -1.779 0.984l1.779 2.134a5.455 5.455 0 0 0 1.748 -5.779 5.449 5.449 0 0 1 -1.748 2.661Z"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="M15.522 16.72A5.495 5.495 0 0 1 6.5 12.5H12Z"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M17.5 12.5a5.46 5.46 0 0 1 -1.98 4.22L12 12.5l3.1 -4.54a5.481 5.481 0 0 1 2.4 4.54Z"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M15.1 7.96 12 12.5H6.5a5.5 5.5 0 0 1 8.6 -4.54Z"
                    fill="#ffd19f"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M21.207 4.5a1 1 0 0 1 0.293 0.707V22.5a1 1 0 0 1 -1 1h-17a1 1 0 0 1 -1 -1v-21a1 1 0 0 1 1 -1h13.293a1 1 0 0 1 0.707 0.291Z"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Powerful table reporting.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Summarize table rows with aggregates, calculate statistics,
                    and group data by attributes.
                </p>
            </div>
        </div>
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M21.207 4.5a1 1 0 0 1 0.293 0.707V22.5a1 1 0 0 1 -1 1h-17a1 1 0 0 1 -1 -1v-21a1 1 0 0 1 1 -1h13.293a1 1 0 0 1 0.707 0.3Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M19.352 2.648 17.5 0.8a1 1 0 0 0 -0.707 -0.3H3.5a1 1 0 0 0 -1 1v18Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="m10 9.004 -3.5 3.5 3.5 3.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m14 9.004 3.5 3.5 -3.5 3.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M21.207 4.5a1 1 0 0 1 0.293 0.707V22.5a1 1 0 0 1 -1 1h-17a1 1 0 0 1 -1 -1v-21a1 1 0 0 1 1 -1h13.293a1 1 0 0 1 0.707 0.3Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Multi-tenancy built for SaaS.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Build multi-tenant apps with subscription billing quickly.
                    Switch tenants without leaving the panel.
                </p>
            </div>
        </div>
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M6.5 0.5h16s1 0 1 1v12s0 1 -1 1h-16s-1 0 -1 -1v-12s0 -1 1 -1"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M6.5 0.5a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h0.249l14 -14Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M13 14.5h9.5a1 1 0 0 0 1 -1v-12a1 1 0 0 0 -1 -1h-12"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M19 4.5h1s0.5 0 0.5 0.5v6s0 0.5 -0.5 0.5h-1s-0.5 0 -0.5 -0.5V5s0 -0.5 0.5 -0.5"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="M15 6.5h1s0.5 0 0.5 0.5v4s0 0.5 -0.5 0.5h-1s-0.5 0 -0.5 -0.5V7s0 -0.5 0.5 -0.5"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="m7.5 23.5 0.5 -6h2.5V14a5 5 0 0 0 -10 0v3.5H3l0.5 6Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 9a5 5 0 0 0 -5 5v2.5a5 5 0 0 1 10 0V14a5 5 0 0 0 -5 -5Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="m7.5 23.5 0.5 -6h2.5V14a5 5 0 0 0 -10 0v3.5H3l0.5 6Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M2 4a3.5 3.5 0 1 0 7 0 3.5 3.5 0 1 0 -7 0"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 2.5A3.488 3.488 0 0 1 8.837 5 3.444 3.444 0 0 0 9 4a3.5 3.5 0 0 0 -7 0 3.444 3.444 0 0 0 0.163 1A3.488 3.488 0 0 1 5.5 2.5Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M2 4a3.5 3.5 0 1 0 7 0 3.5 3.5 0 1 0 -7 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M19 4.5h1s0.5 0 0.5 0.5v6s0 0.5 -0.5 0.5h-1s-0.5 0 -0.5 -0.5V5s0 -0.5 0.5 -0.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M15 6.5h1s0.5 0 0.5 0.5v4s0 0.5 -0.5 0.5h-1s-0.5 0 -0.5 -0.5V7s0 -0.5 0.5 -0.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Beautiful read-only "View" pages.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Embed infolists for flexible, responsive read-only data
                    layouts. Customizable with your components.
                </p>
            </div>
        </div>
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M2 12a10 10 0 1 0 20 0 10 10 0 1 0 -20 0"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M13 14.5s2 3 5 3a5.5 5.5 0 0 0 0 -11c-5 0 -7 11 -12 11a5.5 5.5 0 0 1 0 -11c3 0 4.5 3.5 4.5 3.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Unlimited panels in one app.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Create multiple Filament panels with unique configurations,
                    dashboards, and resources.
                </p>
            </div>
        </div>
        <div x-ref="slide-in-left">
            {{-- Icon --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-12 shrink-0"
                viewBox="0 0 24 24"
            >
                <path
                    d="M12.347 16.084c-3.247 -0.156 -7.717 -1.051 -8.622 -4.077a1.8 1.8 0 0 0 -1.71 -1.284 1.494 1.494 0 0 0 -1.481 1.7A11.19 11.19 0 0 0 9.605 22c2.495 0.548 5.175 -2.032 3.129 -5.9Z"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="M16.843 13.529 23.3 3.707a1.16 1.16 0 0 0 -1.884 -1.348l-7.26 9.374"
                    fill="#ffd19f"
                    stroke-width="1"
                ></path>
                <path
                    d="M8.715 15.594c-2.294 -0.547 -4.4 -1.614 -4.99 -3.587a1.8 1.8 0 0 0 -1.71 -1.284 1.494 1.494 0 0 0 -1.481 1.7A11.19 11.19 0 0 0 9.605 22a3.142 3.142 0 0 0 3.2 -1.2"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M9.374 17.688a0.59 0.59 0 0 0 0.067 1.112c3.932 1.131 6.965 -1.417 7.514 -3.382a2.9 2.9 0 0 0 -5.587 -1.56c-0.505 1.805 -0.263 3.096 -1.994 3.83Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M16.234 12.605a2.814 2.814 0 0 0 -0.288 -0.224 2.851 2.851 0 0 1 -0.073 1.034 5.856 5.856 0 0 1 -5.57 3.654 2.683 2.683 0 0 1 -0.929 0.619 0.59 0.59 0 0 0 0.067 1.112c3.932 1.131 6.965 -1.417 7.514 -3.382a2.9 2.9 0 0 0 -0.721 -2.813Z"
                    fill="#ffeedf"
                    stroke-width="1"
                ></path>
                <path
                    d="M16.843 13.529 23.3 3.707a1.16 1.16 0 0 0 -1.884 -1.348l-7.26 9.374"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M9.374 17.688a0.59 0.59 0 0 0 0.067 1.112c3.932 1.131 6.965 -1.417 7.514 -3.382a2.9 2.9 0 0 0 -5.587 -1.56c-0.505 1.805 -0.263 3.096 -1.994 3.83Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Improved theme customization.
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Customize panel colors and typography without compiling
                    Tailwind. Integrate your branding easily.
                </p>
            </div>
        </div>
    </div>
</section>
