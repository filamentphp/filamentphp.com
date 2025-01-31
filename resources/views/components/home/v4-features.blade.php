<section class="mx-auto w-full max-w-screen-lg px-5 pt-20">
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
        <div
            class="isolate grid self-center justify-self-center [grid-area:1/-1]"
        >
            <h2
                class="relative z-10 self-center justify-self-center font-afacad text-5xl font-bold text-slate-800 [grid-area:1/-1] sm:text-6xl"
            >
                New V4 Features
            </h2>

            {{-- Left star --}}
            <div
                class="-mb-5 -ml-14 hidden self-end justify-self-start [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 16 16"
                    fill="none"
                >
                    <path
                        d="M8.05254 0C8.05254 0 6.3711 5.57155 0 8.11249C0 8.11249 6.3711 10.6534 8.05254 15.9868C9.70772 10.6534 15.9869 8.11249 15.9869 8.11249C9.72085 5.57155 8.05254 0 8.05254 0Z"
                        fill="#1E293B"
                    />
                </svg>
            </div>

            {{-- Right star --}}
            <div
                class="-mr-10 -mt-5 hidden self-start justify-self-end [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 16 16"
                    fill="none"
                >
                    <path
                        d="M8.05254 0C8.05254 0 6.3711 5.57155 0 8.11249C0 8.11249 6.3711 10.6534 8.05254 15.9868C9.70772 10.6534 15.9869 8.11249 15.9869 8.11249C9.72085 5.57155 8.05254 0 8.05254 0Z"
                        fill="#1E293B"
                    />
                </svg>
            </div>

            {{-- Three lines --}}
            <div
                class="-ml-3 hidden self-start justify-self-start [grid-area:1/-1] sm:block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="19"
                    height="18"
                    viewBox="0 0 19 18"
                    fill="none"
                >
                    <path
                        d="M6.04236 3.36397C5.88476 2.89621 5.6703 2.51382 5.6971 2.1491C5.7176 1.8701 5.99155 1.5084 6.25 1.38152C6.44217 1.28712 6.81871 1.46281 7.05885 1.60796C7.22482 1.70832 7.31158 1.95486 7.41107 2.14773C8.99228 5.21276 10.5954 8.26711 12.1197 11.3603C12.3401 11.8074 12.3973 12.7646 12.1522 12.9319C11.3883 13.4531 11.029 12.7101 10.7141 12.1204C9.17176 9.2329 7.63077 6.34477 6.04236 3.36397Z"
                        fill="#1E293B"
                    />
                    <path
                        d="M2.87112 13.2079C2.16981 12.7081 0.865215 12.5236 1.3805 11.499C1.98514 10.2964 2.94597 11.3009 3.58506 11.7148C5.04932 12.6631 6.45576 13.7129 7.79956 14.8254C8.09998 15.0742 8.04638 15.7505 8.15576 16.23C7.6942 16.1642 7.14036 16.2391 6.78753 16.0076C5.47313 15.1453 4.2247 14.1823 2.87112 13.2079Z"
                        fill="#1E293B"
                    />
                    <path
                        d="M14.8502 8.55961C15.1748 6.96207 15.4362 5.45623 15.845 3.99165C15.9481 3.62221 16.5223 3.38421 16.88 3.08579C17.0657 3.51561 17.4642 3.97993 17.4012 4.36951C17.0887 6.29938 16.6892 8.21784 16.2314 10.119C16.1474 10.4678 15.6522 10.7176 15.3468 11.0131C15.1162 10.6619 14.7673 10.3353 14.6876 9.95255C14.6042 9.55196 14.7794 9.09751 14.8502 8.55961Z"
                        fill="#1E293B"
                    />
                </svg>
            </div>

            {{-- Blue butterfly --}}
            <div class="-mt-16 self-start justify-self-center [grid-area:1/-1]">
                <img
                    src="{{ Vite::asset('resources/svg/home/blue-butterfly.svg') }}"
                    alt=""
                    loading="lazy"
                    class="w-7 rotate-[70deg]"
                />
            </div>

            {{-- Right Three leaf --}}
            <div class="-mr-7 self-center justify-self-end [grid-area:1/-1]">
                <img
                    src="{{ Vite::asset('resources/images/home/v4_three_blue_leafs.webp') }}"
                    alt=""
                    loading="lazy"
                    class="w-8"
                />
            </div>

            {{-- Right leaf --}}
            <div
                class="-mb-10 -mr-20 hidden self-center justify-self-end [grid-area:1/-1] sm:block"
            >
                <img
                    src="{{ Vite::asset('resources/images/home/v4_blue_leaf.webp') }}"
                    alt=""
                    loading="lazy"
                    class="w-8"
                />
            </div>

            {{-- Left feather --}}
            <div
                class="-ml-20 -mt-5 hidden self-start justify-self-start [grid-area:1/-1] sm:block"
            >
                <img
                    src="{{ Vite::asset('resources/images/home/v4_blue_feather.webp') }}"
                    alt=""
                    loading="lazy"
                    class="w-10"
                />
            </div>

            {{-- Left berries --}}
            <div
                class="-mb-2 -ml-6 self-end justify-self-start [grid-area:1/-1]"
            >
                <img
                    src="{{ Vite::asset('resources/images/home/v4_blue_berries.webp') }}"
                    alt=""
                    loading="lazy"
                    class="w-9"
                />
            </div>
        </div>

        {{-- Watercolor --}}
        <img
            src="{{ Vite::asset('resources/images/home/v4_blue_watercolor.webp') }}"
            alt=""
            class="relative -z-50 -my-14 -ml-10 w-[28rem] self-center justify-self-center [grid-area:1/-1]"
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
        Filament 4 brings powerful new tools and flexibility, simplifying
        development and enabling more dynamic, efficient, and customizable web
        applications.
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
                    d="M15.5 20H13a0.5 0.5 0 0 1 -0.5 -0.5v-15A0.5 0.5 0 0 1 13 4h2.5"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M9.5 12h3"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M20 4.5a1.75 1.75 0 1 0 -1.75 -1.75A1.75 1.75 0 0 0 20 4.5Z"
                    fill="#dff6ff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 8a3.612 3.612 0 0 0 -7 0Z"
                    fill="#dff6ff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M20 19.5a1.75 1.75 0 1 0 -1.75 -1.75A1.75 1.75 0 0 0 20 19.5Z"
                    fill="#dff6ff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 23a3.612 3.612 0 0 0 -7 0Z"
                    fill="#dff6ff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M0.5 17a4.5 4.5 0 0 1 9 0Z"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m2.642 7.35 -0.01 -0.01"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M7.722 8.36a4.577 4.577 0 0 1 -5.08 -1.01 2.744 2.744 0 0 1 5.08 1.01Z"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M7.752 8.75a2.75 2.75 0 0 1 -5.5 0 2.68 2.68 0 0 1 0.39 -1.4 4.577 4.577 0 0 0 5.08 1.01 2.466 2.466 0 0 1 0.03 0.39Z"
                    fill="#dff6ff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Nested resources
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
                    d="M23.5 5.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 3.5v-1a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v1Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 13.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 11.5v-1a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v1Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 21.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 19.505v-1a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v1Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 13.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 21.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 5.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="m0.794 6.206 4.414 -4.414A1 1 0 0 0 4.5 1.5h-3a1 1 0 0 0 -1 1v3a1 1 0 0 0 0.294 0.706Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 13.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="m0.794 14.208 4.414 -4.414A0.994 0.994 0 0 0 4.5 9.5h-3a1 1 0 0 0 -1 1v3a1 1 0 0 0 0.294 0.708Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 21.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="M0.794 22.211 5.208 17.8a0.994 0.994 0 0 0 -0.708 -0.3h-3a1 1 0 0 0 -1 1v3a1 1 0 0 0 0.294 0.711Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 5.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 13.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M5.5 21.5a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M23.5 5.5a1 1 0 0 1 -1 1h-13a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h13a1 1 0 0 1 1 1Z"
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
                    Static table data
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Displays non-database or pre-defined data directly in tables
                    for easy customization.
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
                    d="M5 3a0.5 0.5 0 0 1 0.5 -0.5h14a1 1 0 0 1 1 1v16a1 1 0 0 1 -1 1h-14A0.5 0.5 0 0 1 5 20Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="m0.5 0.497 0 22"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m5.5 0.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10.5 0.497 2 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 0.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m5.5 22.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10.5 22.497 2 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 22.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m5.5 11.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10.5 11.497 2 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 11.497 2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m11.5 0.497 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m11.5 5.497 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m11.5 14.997 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m11.5 19.997 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m11.5 10.497 0 2"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m22.5 5.497 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m22.5 14.997 0 2.5"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M20 0.5h1.5a1 1 0 0 1 1 1V3"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M22.5 20v1.5a1 1 0 0 1 -1 1H20"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m22.5 11.497 -2.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m22.5 10.497 0 2"
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
                    Partial rendering
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Improves performance by rendering only portions of the
                    interface when changes occur.
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
                    d="M21.5 6.47V22.5a1 1 0 0 1 -1 1h-17a1 1 0 0 1 -1 -1v-21a1 1 0 0 1 1 -1h12.03a5.226 5.226 0 0 1 0.97 0.09V4.5a1 1 0 0 0 1 1h3.91a5.226 5.226 0 0 1 0.09 0.97Z"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="M16.85 5.26 2.5 19.62V1.5a1 1 0 0 1 1 -1h12.03a5.226 5.226 0 0 1 0.97 0.09V4.5a1.03 1.03 0 0 0 0.35 0.76Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M21.41 5.5H17.5a1 1 0 0 1 -1 -1V0.59a5.923 5.923 0 0 1 4.91 4.91Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M20.5 23.5a1 1 0 0 0 1 -1V6.478A5.975 5.975 0 0 0 15.525 0.5H3.5a1 1 0 0 0 -1 1v21a1 1 0 0 0 1 1Z"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M10.5 12.5V17a1.5 1.5 0 0 1 -3 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M15.5 12.5h-1.7a1.3 1.3 0 0 0 -0.723 2.386l1.84 1.227A1.3 1.3 0 0 1 14.2 18.5h-1.7"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M19.75 2.254A5.974 5.974 0 0 0 16.5 0.584V4.5a1 1 0 0 0 1 1h3.92a5.98 5.98 0 0 0 -1.67 -3.246Z"
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
                    JavaScript interactions
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Adds dynamic client-side behaviors with easier integration
                    of JavaScript components.
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
                    d="M1.5 22.5a1 1 0 0 1 -1 -1v-20a1 1 0 0 1 1 -1h11.586a1 1 0 0 1 0.707 0.293l3.414 3.414a1 1 0 0 1 0.293 0.707V21.5a1 1 0 0 1 -1 1Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M16.75 3.75 13.793 0.793A1 1 0 0 0 13.086 0.5H1.5a1 1 0 0 0 -1 1V20Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M13.5 5.5h4v-0.586a1 1 0 0 0 -0.293 -0.707L13.793 0.793A1 1 0 0 0 13.086 0.5H12.5v4a1 1 0 0 0 1 1Z"
                    fill="#ffffff"
                    stroke-width="1"
                ></path>
                <path
                    d="M10.5 22.5h-9a1 1 0 0 1 -1 -1v-20a1 1 0 0 1 1 -1h11.586a1 1 0 0 1 0.707 0.293l3.414 3.414a1 1 0 0 1 0.293 0.707V13"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M12.5 0.5v4a1 1 0 0 0 1 1h4"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="M4 6.5h3s0.5 0 0.5 0.5v3s0 0.5 -0.5 0.5H4s-0.5 0 -0.5 -0.5V7s0 -0.5 0.5 -0.5"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M4 13.5h3s0.5 0 0.5 0.5v3s0 0.5 -0.5 0.5H4s-0.5 0 -0.5 -0.5v-3s0 -0.5 0.5 -0.5"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M7.5 8.5h2a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-2"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="m14 11.5 -3 0"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    stroke-width="1"
                ></path>
                <path
                    d="m13.706 20 5.501 -5.5 2.5 2.5 -5.501 5.501Z"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m12.706 23.501 3.5 -1 -2.5 -2.5 -1 3.5z"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m23.354 14.645 -1.793 -1.792a0.5 0.5 0 0 0 -0.707 0L19.207 14.5l2.5 2.5 1.647 -1.646a0.5 0.5 0 0 0 0 -0.709Z"
                    fill="#9fdaff"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
            </svg>

            <div class="space-y-1">
                {{-- Title --}}
                <h4 class="text-lg font-bold text-gray-700">
                    Schema class structure
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Streamlines the creation and management of actions and
                    schemas with less code.
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
                    d="M22.5 13a0.5 0.5 0 0 1 -0.5 0.5h-7v-2h7.5Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M22.5 19a0.5 0.5 0 0 1 -0.5 0.5h-7v-2h7.5Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M22 7a0.5 0.5 0 0 1 -0.5 0.5H10v-4h12Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M10 19a1.5 1.5 0 1 0 3 0 1.5 1.5 0 1 0 -3 0"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="M11.5 20.5a1.5 1.5 0 0 1 0 -3Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M2 6a2.5 2.5 0 1 0 5 0 2.5 2.5 0 1 0 -5 0"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="M4.5 8.5a2.5 2.5 0 0 1 0 -5Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M2 6a2.5 2.5 0 1 0 5 0 2.5 2.5 0 1 0 -5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10 3.5 12 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10 5.5 7 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m10 7.5 9 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M10 13a1.5 1.5 0 1 0 3 0 1.5 1.5 0 1 0 -3 0"
                    fill="#9fdaff"
                    stroke-width="1"
                ></path>
                <path
                    d="M11.5 14.5a1.5 1.5 0 0 1 0 -3Z"
                    fill="#dff6ff"
                    stroke-width="1"
                ></path>
                <path
                    d="M10 13a1.5 1.5 0 1 0 3 0 1.5 1.5 0 1 0 -3 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 11.5 7.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 13.5 4 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="M10 19a1.5 1.5 0 1 0 3 0 1.5 1.5 0 1 0 -3 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 17.5 7.5 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m15 19.5 4 0"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m7 10.5 0 1"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m7 13.5 0 1"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m7 16.5 0 1"
                    fill="none"
                    stroke="#00303e"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                ></path>
                <path
                    d="m7 19.5 0 1"
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
                    Flexible schema decorations
                </h4>
                {{-- Description --}}
                <p class="font-afacad text-lg leading-snug text-gray-500">
                    Enhances customization of form and table elements with
                    additional styling and layout options.
                </p>
            </div>
        </div>
    </div>
</section>
