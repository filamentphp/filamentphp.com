<section
    class="isolate mx-auto w-full max-w-screen-lg overflow-x-clip px-5 pt-20 min-[630px]:pb-60 min-[700px]:pb-0"
>
    <div
        x-init="
            () => {
                if (reducedMotion) return

                const timeline = gsap
                    .timeline({
                        paused: true,
                    })
                    .fromTo(
                        $refs.inner_circle,
                        {
                            autoAlpha: 0,
                            scale: 1.5,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.middle_circle,
                        {
                            autoAlpha: 0,
                            scale: 1.5,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.outer_circle,
                        {
                            autoAlpha: 0,
                            scale: 1.5,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.speedometer_circle,
                        {
                            autoAlpha: 0,
                            scale: 1.5,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.speed_lines.querySelectorAll('path'),
                        {
                            autoAlpha: 0,
                            scale: 5,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.4,
                            ease: 'power4.out',
                            stagger: 0.03,
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.speedometer_circle.querySelectorAll('.tall-link-wrapper'),
                        {
                            autoAlpha: 0,
                            x: 50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.6,
                            ease: 'circ.out',
                            stagger: 0.15,
                        },
                        '<0.4',
                    )
                    .fromTo(
                        $refs.fade_arc,
                        {
                            clipPath: 'polygon(0 0, 0 0, 100% 0, 0 0)',
                        },
                        {
                            clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
                            duration: 0.2,
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.orange_arc,
                        {
                            clipPath: 'polygon(0 0, 100% 0, 100% 0, 0 0)',
                        },
                        {
                            clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.05',
                    )
                    .fromTo(
                        $refs.tall_stack_description,
                        {
                            autoAlpha: 0,
                            x: -30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 1,
                            ease: 'circ.out',
                        },
                        '<0.3',
                    )
                    .fromTo(
                        $refs.leaf_deocration_1,
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
                        '<0.3',
                    )
                    .fromTo(
                        $refs.leaf_deocration_2,
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
                        '<',
                    )
                    .fromTo(
                        $refs.leaf_deocration_3,
                        {
                            autoAlpha: 0,
                            x: 10,
                            y: 10,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '<0.2',
                    )
                    .fromTo(
                        $refs.dragonfly_decoration,
                        {
                            autoAlpha: 0,
                            x: -10,
                            y: 10,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '<',
                    )
                motion.inView(
                    $el,
                    (element) => {
                        timeline.play()
                    },
                    {
                        amount: 0.3,
                    },
                )
            }
        "
        class="relative min-[630px]:grid"
    >
        {{-- Outer Circle --}}
        <div
            x-ref="outer_circle"
            class="hidden h-[50rem] w-[50rem] self-center justify-self-center rounded-full ring-1 ring-[#F1E3E3]/40 [grid-area:1/-1] min-[800px]:block"
        ></div>
        {{-- Middle Circle --}}
        <div
            x-ref="middle_circle"
            class="hidden h-[40rem] w-[40rem] self-center justify-self-center rounded-full ring-1 ring-[#F1E3E3]/60 [grid-area:1/-1] min-[700px]:block"
        ></div>
        {{-- Inner Circle --}}
        <div
            x-ref="inner_circle"
            class="hidden h-[30rem] w-[30rem] self-center justify-self-center rounded-full ring-1 ring-[#F1E3E3]/80 [grid-area:1/-1] min-[700px]:block"
        ></div>
        {{-- Speedometer Circle --}}
        <div
            x-ref="speedometer_circle"
            class="absolute right-1/2 top-32 hidden h-[18rem] w-[18rem] translate-x-1/3 self-center justify-self-center rounded-full bg-gradient-to-bl from-[#FFF1E9] to-[#FBF0EF]/0 min-[630px]:block min-[700px]:relative min-[700px]:right-0 min-[700px]:top-0 min-[700px]:translate-x-0 min-[700px]:[grid-area:1/-1]"
        >
            {{-- Tailwind --}}
            <div
                class="tall-link-wrapper group/tall-link absolute -right-36 -top-16 z-20"
            >
                <a
                    href="https://tailwindcss.com"
                    target="_blank"
                    class="flex items-center gap-3 transition duration-300 group-hover/tall-link:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/tall-link:transform-none"
                >
                    {{-- Logo --}}
                    <svg
                        class="w-7"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 54 33"
                    >
                        <g clip-path="url(#prefix__clip0)">
                            <path
                                fill="#38bdf8"
                                fill-rule="evenodd"
                                d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z"
                                clip-rule="evenodd"
                            />
                        </g>
                        <defs>
                            <clipPath id="prefix__clip0">
                                <path
                                    fill="#fff"
                                    d="M0 0h54v32.4H0z"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                    {{-- Title --}}
                    <div class="flex items-end">
                        <span class="text-2xl font-bold">T</span>
                        <span
                            class="relative -left-0.5 text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            ailwind CSS
                        </span>
                    </div>
                </a>
            </div>
            {{-- Alpine --}}
            <div
                class="tall-link-wrapper group/tall-link absolute -right-[11.5rem] top-7 z-20"
            >
                <a
                    href="https://alpinejs.dev"
                    target="_blank"
                    class="flex items-center gap-3 transition duration-300 group-hover/tall-link:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/tall-link:transform-none"
                >
                    {{-- Logo --}}
                    <svg
                        class="scale-90"
                        width="32"
                        height="16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="m24.657.653 7.045 7.066-7.045 7.066-7.044-7.066L24.657.653Z"
                            fill="#77C1D2"
                        />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="m7.045.653 14.605 14.65H7.56L0 7.718 7.045.653Z"
                            fill="#2D3441"
                        />
                    </svg>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">A</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            lpine.js
                        </span>
                    </div>
                </a>
            </div>
            {{-- Laravel --}}
            <div
                class="tall-link-wrapper group/tall-link absolute -right-48 top-[8.5rem] z-20"
            >
                <a
                    href="https://laravel.com"
                    target="_blank"
                    class="flex items-center gap-3 transition duration-300 group-hover/tall-link:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/tall-link:transform-none"
                >
                    {{-- Logo --}}
                    <svg
                        width="23"
                        height="25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M22.37 6.03a.38.38 0 0 1 .013.095v5.045a.375.375 0 0 1-.181.319l-4.151 2.438v4.831a.376.376 0 0 1-.181.32l-8.665 5.088c-.02.012-.041.018-.062.026-.009.003-.017.008-.025.01a.355.355 0 0 1-.185 0c-.01-.002-.019-.008-.028-.012a.322.322 0 0 1-.06-.024L.181 19.078a.375.375 0 0 1-.18-.32V3.625c0-.033.003-.065.012-.096.002-.012.009-.021.012-.031.007-.02.014-.04.024-.058.006-.012.016-.021.024-.032.01-.015.02-.03.032-.043.01-.011.024-.019.036-.028.013-.01.024-.022.04-.031L4.513.76a.357.357 0 0 1 .36 0l4.332 2.544h.001c.015.01.026.022.04.032.012.01.025.017.035.028.013.012.022.028.032.043.008.01.018.02.025.032.01.018.016.038.023.058.004.01.01.02.013.03a.38.38 0 0 1 .012.097v9.452l3.61-2.12V6.125a.38.38 0 0 1 .013-.096c.003-.011.009-.02.013-.03.007-.02.013-.04.023-.058.007-.012.017-.022.025-.032.01-.015.02-.03.032-.043.01-.011.023-.019.035-.028.013-.01.025-.023.04-.031l4.333-2.545a.356.356 0 0 1 .36 0l4.332 2.544c.015.01.027.021.04.031.012.01.025.018.036.028.012.013.021.029.032.043.008.011.018.02.024.033.01.018.017.038.024.057.004.01.01.02.012.031Zm-.709 4.927V6.762l-1.516.89-2.094 1.23v4.195l3.61-2.12Zm-4.332 7.588v-4.197l-2.06 1.2-5.883 3.424v4.237l7.943-4.664ZM.722 4.261v14.285l7.942 4.664v-4.237l-4.149-2.395v-.001h-.003c-.014-.009-.025-.02-.038-.031-.012-.01-.025-.017-.035-.027v-.001c-.012-.012-.02-.026-.03-.039-.01-.012-.02-.023-.027-.035v-.002c-.009-.014-.014-.03-.02-.046-.006-.014-.013-.026-.017-.041-.005-.018-.005-.037-.007-.055-.002-.014-.006-.027-.006-.041V6.38L2.24 5.151l-1.517-.89Zm3.971-2.756-3.608 2.12 3.608 2.119 3.609-2.12-3.609-2.119ZM6.57 14.73l2.094-1.23V4.262l-1.516.89-2.094 1.23v9.24l1.516-.89ZM17.69 4.006l-3.609 2.12 3.609 2.118 3.608-2.119-3.608-2.119Zm-.361 4.876-2.094-1.23-1.516-.89v4.195l2.094 1.23 1.516.89V8.882Zm-8.304 9.453 5.293-3.082 2.646-1.54-3.606-2.118-4.153 2.438-3.784 2.222 3.604 2.08Z"
                            fill="#FF2D20"
                        />
                    </svg>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">L</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            aravel
                        </span>
                    </div>
                </a>
            </div>
            {{-- Livewire --}}
            <div
                class="tall-link-wrapper group/tall-link absolute -right-[10rem] top-64 z-20"
            >
                <a
                    href="https://livewire.laravel.com"
                    target="_blank"
                    class="flex items-center gap-3 transition duration-300 group-hover/tall-link:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/tall-link:transform-none"
                >
                    {{-- Logo --}}
                    <svg
                        width="24"
                        height="27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M22.415 17.96c-.438.662-.77 1.478-1.66 1.478-1.5 0-1.58-2.31-3.08-2.31-1.498 0-1.417 2.31-2.916 2.31-1.498 0-1.579-2.31-3.078-2.31-1.5 0-1.418 2.31-2.916 2.31-1.499 0-1.58-2.31-3.079-2.31s-1.418 2.31-2.916 2.31c-.471 0-.802-.228-1.081-.541A12.796 12.796 0 0 1 0 12.507C0 5.663 5.287.115 11.809.115c6.521 0 11.808 5.548 11.808 12.392 0 1.957-.432 3.807-1.202 5.453Z"
                            fill="#FB70A9"
                        />
                        <path
                            d="M7.093 16.737v5.132a1.668 1.668 0 1 1-3.336 0v-6.196c.312-.571.667-1.066 1.308-1.066 1.044 0 1.408 1.31 2.028 2.13Zm6.3.267v8.117a1.853 1.853 0 0 1-3.706 0v-9.187c.35-.673.709-1.327 1.446-1.327 1.167 0 1.485 1.64 2.26 2.397Zm5.93-.149v5.892a1.668 1.668 0 0 1-3.335 0v-7.242c.29-.497.636-.898 1.213-.898 1.096 0 1.443 1.445 2.122 2.248Z"
                            fill="#4E56A6"
                        />
                        <path
                            d="M7.093 18.31c-.296-.362-.646-.631-1.152-.631-1.203 0-1.424 1.515-2.183 2.199V13.34a1.668 1.668 0 1 1 3.335 0v4.97Zm6.3.117c-.315-.42-.684-.748-1.244-.748-1.337 0-1.46 1.876-2.462 2.394v-2.89a1.853 1.853 0 1 1 3.707 0v1.244Zm5.93-.325c-.256-.253-.56-.423-.965-.423-1.296 0-1.451 1.76-2.37 2.342v-5.869a1.668 1.668 0 0 1 3.335 0v3.95Z"
                            fill="#000"
                            fill-opacity=".299"
                        />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M22.415 17.96c-.438.662-.77 1.478-1.66 1.478-1.5 0-1.58-2.31-3.08-2.31-1.498 0-1.417 2.31-2.916 2.31-1.498 0-1.579-2.31-3.078-2.31-1.5 0-1.418 2.31-2.916 2.31-1.499 0-1.58-2.31-3.079-2.31s-1.418 2.31-2.916 2.31c-.471 0-.802-.228-1.081-.541A12.796 12.796 0 0 1 0 12.507C0 5.663 5.287.115 11.809.115c6.521 0 11.808 5.548 11.808 12.392 0 1.957-.432 3.807-1.202 5.453Z"
                            fill="#FB70A9"
                        />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M19.86 19.191c3.094-4.603 3.174-9.71.24-15.319a12.36 12.36 0 0 1 3.517 8.66c0 1.95-.448 3.794-1.246 5.434-.454.66-.799 1.472-1.721 1.472-.316 0-.571-.095-.79-.247Z"
                            fill="#E24CA6"
                        />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M11.175 15.598c4.107 0 5.836-2.382 5.836-5.765 0-3.384-2.613-6.498-5.835-6.498-3.223 0-5.836 3.114-5.836 6.498 0 3.383 1.73 5.765 5.835 5.765Z"
                            fill="#fff"
                        />
                        <path
                            d="M9.607 10.024c1.208 0 2.188-1.081 2.188-2.415s-.98-2.416-2.188-2.416c-1.21 0-2.189 1.082-2.189 2.416 0 1.334.98 2.415 2.189 2.415Z"
                            fill="#030776"
                        />
                        <path
                            d="M9.242 8.166c.604 0 1.094-.499 1.094-1.115 0-.615-.49-1.114-1.094-1.114-.605 0-1.095.499-1.095 1.114 0 .616.49 1.115 1.095 1.115Z"
                            fill="#fff"
                        />
                    </svg>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">L</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            ivewire
                        </span>
                    </div>
                </a>
            </div>
            {{-- Orange Arc --}}
            <svg
                x-ref="orange_arc"
                width="64"
                class="absolute right-[0rem] top-[1.2rem] z-20 -rotate-[3deg]"
                height="204"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M38.922 201.284A162.725 162.725 0 0 0 55.179 77.807C49.648 57.166 40.5 40.5 27.096 24.5 20.5 17.5 10 7.5 2.5 2.5"
                    stroke="#FF7323"
                    stroke-width="5"
                    stroke-linecap="round"
                />
            </svg>
            {{-- Fade Arc --}}
            <svg
                x-ref="fade_arc"
                width="28"
                class="absolute -top-[3.2rem] right-[7.2rem] -rotate-[92deg]"
                height="129"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M19.179 2.807A162.722 162.722 0 0 1 2.923 126.284"
                    stroke="url(#a)"
                    stroke-width="5"
                    stroke-linecap="round"
                />
                <defs>
                    <linearGradient
                        id="a"
                        x1="4"
                        y1="129.5"
                        x2="-51.33"
                        y2="73.589"
                        gradientUnits="userSpaceOnUse"
                    >
                        <stop stop-color="#F1E3E3" />
                        <stop
                            offset="1"
                            stop-color="#F1E3E3"
                            stop-opacity="0"
                        />
                    </linearGradient>
                </defs>
            </svg>
            {{-- Speed Lines --}}
            <svg
                x-ref="speed_lines"
                class="absolute -right-16 -top-16 w-72 rotate-2"
                width="311"
                height="333"
                viewBox="0 0 311 333"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M4.5657 39.2978L1.02603 32.2428"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M21.0291 32.4878L18.0974 25.1593"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M38.3956 26.6808L36.0169 19.1546"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M56.1667 22.3201L55.1266 14.4958"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M73.0567 21.2073L72.7763 13.3191"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M90.426 19.2023V1.55276"
                    stroke="#F1E3E3"
                    stroke-width="2"
                    stroke-linecap="round"
                />
                <path
                    d="M106.899 20.379L108.076 12.1426"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M124.832 22.7794L126.635 15.095"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M142.198 26.7314L144.568 19.2024"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M158.671 32.0909L161.024 25.0856"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M173.967 38.7672L177.497 32.1453"
                    stroke="#F1E3E3"
                    stroke-linecap="round"
                />
                <path
                    d="M190.44 47.4417L199.853 32.1454"
                    stroke="#FF7323"
                    stroke-width="2"
                    stroke-linecap="round"
                />
                <path
                    d="M204.129 57.0277L208.582 49.9995"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M219.497 66.5752L224.295 60.3074"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M231.622 79.2213L236.872 73.3276"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M243.389 91.6934L249.272 86.2707"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M253.979 104.98L259.915 100.39"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M264.569 120.393L278.688 112.157"
                    stroke="#FF7323"
                    stroke-width="2"
                    stroke-linecap="round"
                />
                <path
                    d="M270.978 134.731L278.559 131.303"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M278.576 151.15L286.028 148.548"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M283.394 168.323L291.019 166.282"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M286.924 185.232L294.819 183.932"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M289.278 203.333L296.76 202.758"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M290.454 220.407L309.281 220.407"
                    stroke="#FF7323"
                    stroke-width="2"
                    stroke-linecap="round"
                />
                <path
                    d="M289.277 238.057L297.578 238.62"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M287.481 255.814L295.278 257.043"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M283.611 272.049L291.295 273.854"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M278.73 288.618L286.302 291.204"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M272.249 304.505L279.114 307.535"
                    stroke="#FF7323"
                    stroke-linecap="round"
                />
                <path
                    d="M264.569 321.598L279.865 331.011"
                    stroke="#FF7323"
                    stroke-width="2"
                    stroke-linecap="round"
                />
            </svg>
        </div>
        {{-- TALL Stack --}}
        <div
            class="flex flex-wrap items-start gap-14 self-center pt-10 min-[600px]:gap-10 min-[630px]:pt-0 min-[700px]:justify-self-center min-[700px]:[grid-area:1/-1]"
        >
            <div
                class="flex w-full flex-wrap items-start justify-around gap-10 min-[600px]:w-auto min-[600px]:flex-col min-[630px]:hidden"
            >
                {{-- Tailwind --}}
                <a
                    href="https://tailwindcss.com"
                    target="_blank"
                    class="group/tall-link flex items-center gap-3 transition duration-300 motion-reduce:transition-none"
                >
                    {{-- Logo --}}
                    <div class="grid w-8 place-items-center">
                        <svg
                            class="w-7"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 54 33"
                        >
                            <g clip-path="url(#prefix__clip0)">
                                <path
                                    fill="#38bdf8"
                                    fill-rule="evenodd"
                                    d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z"
                                    clip-rule="evenodd"
                                />
                            </g>
                            <defs>
                                <clipPath id="prefix__clip0">
                                    <path
                                        fill="#fff"
                                        d="M0 0h54v32.4H0z"
                                    />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    {{-- Title --}}
                    <div class="flex items-end">
                        <span class="text-2xl font-bold">T</span>
                        <span
                            class="relative -left-0.5 text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            ailwind CSS
                        </span>
                    </div>
                </a>
                {{-- Alpine --}}
                <a
                    href="https://alpinejs.dev"
                    target="_blank"
                    class="group/tall-link flex items-center gap-3 transition duration-300 motion-reduce:transition-none"
                >
                    {{-- Logo --}}
                    <div class="grid w-8 place-items-center">
                        <svg
                            class="scale-90"
                            width="32"
                            height="16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="m24.657.653 7.045 7.066-7.045 7.066-7.044-7.066L24.657.653Z"
                                fill="#77C1D2"
                            />
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="m7.045.653 14.605 14.65H7.56L0 7.718 7.045.653Z"
                                fill="#2D3441"
                            />
                        </svg>
                    </div>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">A</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            lpine.js
                        </span>
                    </div>
                </a>
                {{-- Laravel --}}
                <a
                    href="https://laravel.com"
                    target="_blank"
                    class="group/tall-link flex items-center gap-3 transition duration-300 motion-reduce:transition-none"
                >
                    {{-- Logo --}}
                    <div class="grid w-8 place-items-center">
                        <svg
                            width="23"
                            height="25"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M22.37 6.03a.38.38 0 0 1 .013.095v5.045a.375.375 0 0 1-.181.319l-4.151 2.438v4.831a.376.376 0 0 1-.181.32l-8.665 5.088c-.02.012-.041.018-.062.026-.009.003-.017.008-.025.01a.355.355 0 0 1-.185 0c-.01-.002-.019-.008-.028-.012a.322.322 0 0 1-.06-.024L.181 19.078a.375.375 0 0 1-.18-.32V3.625c0-.033.003-.065.012-.096.002-.012.009-.021.012-.031.007-.02.014-.04.024-.058.006-.012.016-.021.024-.032.01-.015.02-.03.032-.043.01-.011.024-.019.036-.028.013-.01.024-.022.04-.031L4.513.76a.357.357 0 0 1 .36 0l4.332 2.544h.001c.015.01.026.022.04.032.012.01.025.017.035.028.013.012.022.028.032.043.008.01.018.02.025.032.01.018.016.038.023.058.004.01.01.02.013.03a.38.38 0 0 1 .012.097v9.452l3.61-2.12V6.125a.38.38 0 0 1 .013-.096c.003-.011.009-.02.013-.03.007-.02.013-.04.023-.058.007-.012.017-.022.025-.032.01-.015.02-.03.032-.043.01-.011.023-.019.035-.028.013-.01.025-.023.04-.031l4.333-2.545a.356.356 0 0 1 .36 0l4.332 2.544c.015.01.027.021.04.031.012.01.025.018.036.028.012.013.021.029.032.043.008.011.018.02.024.033.01.018.017.038.024.057.004.01.01.02.012.031Zm-.709 4.927V6.762l-1.516.89-2.094 1.23v4.195l3.61-2.12Zm-4.332 7.588v-4.197l-2.06 1.2-5.883 3.424v4.237l7.943-4.664ZM.722 4.261v14.285l7.942 4.664v-4.237l-4.149-2.395v-.001h-.003c-.014-.009-.025-.02-.038-.031-.012-.01-.025-.017-.035-.027v-.001c-.012-.012-.02-.026-.03-.039-.01-.012-.02-.023-.027-.035v-.002c-.009-.014-.014-.03-.02-.046-.006-.014-.013-.026-.017-.041-.005-.018-.005-.037-.007-.055-.002-.014-.006-.027-.006-.041V6.38L2.24 5.151l-1.517-.89Zm3.971-2.756-3.608 2.12 3.608 2.119 3.609-2.12-3.609-2.119ZM6.57 14.73l2.094-1.23V4.262l-1.516.89-2.094 1.23v9.24l1.516-.89ZM17.69 4.006l-3.609 2.12 3.609 2.118 3.608-2.119-3.608-2.119Zm-.361 4.876-2.094-1.23-1.516-.89v4.195l2.094 1.23 1.516.89V8.882Zm-8.304 9.453 5.293-3.082 2.646-1.54-3.606-2.118-4.153 2.438-3.784 2.222 3.604 2.08Z"
                                fill="#FF2D20"
                            />
                        </svg>
                    </div>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">L</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            aravel
                        </span>
                    </div>
                </a>
                {{-- Livewire --}}
                <a
                    href="https://laravel-livewire.com"
                    target="_blank"
                    class="group/tall-link flex items-center gap-3 transition duration-300 motion-reduce:transition-none"
                >
                    {{-- Logo --}}
                    <div class="grid w-8 place-items-center">
                        <svg
                            width="24"
                            height="27"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M22.415 17.96c-.438.662-.77 1.478-1.66 1.478-1.5 0-1.58-2.31-3.08-2.31-1.498 0-1.417 2.31-2.916 2.31-1.498 0-1.579-2.31-3.078-2.31-1.5 0-1.418 2.31-2.916 2.31-1.499 0-1.58-2.31-3.079-2.31s-1.418 2.31-2.916 2.31c-.471 0-.802-.228-1.081-.541A12.796 12.796 0 0 1 0 12.507C0 5.663 5.287.115 11.809.115c6.521 0 11.808 5.548 11.808 12.392 0 1.957-.432 3.807-1.202 5.453Z"
                                fill="#FB70A9"
                            />
                            <path
                                d="M7.093 16.737v5.132a1.668 1.668 0 1 1-3.336 0v-6.196c.312-.571.667-1.066 1.308-1.066 1.044 0 1.408 1.31 2.028 2.13Zm6.3.267v8.117a1.853 1.853 0 0 1-3.706 0v-9.187c.35-.673.709-1.327 1.446-1.327 1.167 0 1.485 1.64 2.26 2.397Zm5.93-.149v5.892a1.668 1.668 0 0 1-3.335 0v-7.242c.29-.497.636-.898 1.213-.898 1.096 0 1.443 1.445 2.122 2.248Z"
                                fill="#4E56A6"
                            />
                            <path
                                d="M7.093 18.31c-.296-.362-.646-.631-1.152-.631-1.203 0-1.424 1.515-2.183 2.199V13.34a1.668 1.668 0 1 1 3.335 0v4.97Zm6.3.117c-.315-.42-.684-.748-1.244-.748-1.337 0-1.46 1.876-2.462 2.394v-2.89a1.853 1.853 0 1 1 3.707 0v1.244Zm5.93-.325c-.256-.253-.56-.423-.965-.423-1.296 0-1.451 1.76-2.37 2.342v-5.869a1.668 1.668 0 0 1 3.335 0v3.95Z"
                                fill="#000"
                                fill-opacity=".299"
                            />
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M22.415 17.96c-.438.662-.77 1.478-1.66 1.478-1.5 0-1.58-2.31-3.08-2.31-1.498 0-1.417 2.31-2.916 2.31-1.498 0-1.579-2.31-3.078-2.31-1.5 0-1.418 2.31-2.916 2.31-1.499 0-1.58-2.31-3.079-2.31s-1.418 2.31-2.916 2.31c-.471 0-.802-.228-1.081-.541A12.796 12.796 0 0 1 0 12.507C0 5.663 5.287.115 11.809.115c6.521 0 11.808 5.548 11.808 12.392 0 1.957-.432 3.807-1.202 5.453Z"
                                fill="#FB70A9"
                            />
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M19.86 19.191c3.094-4.603 3.174-9.71.24-15.319a12.36 12.36 0 0 1 3.517 8.66c0 1.95-.448 3.794-1.246 5.434-.454.66-.799 1.472-1.721 1.472-.316 0-.571-.095-.79-.247Z"
                                fill="#E24CA6"
                            />
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M11.175 15.598c4.107 0 5.836-2.382 5.836-5.765 0-3.384-2.613-6.498-5.835-6.498-3.223 0-5.836 3.114-5.836 6.498 0 3.383 1.73 5.765 5.835 5.765Z"
                                fill="#fff"
                            />
                            <path
                                d="M9.607 10.024c1.208 0 2.188-1.081 2.188-2.415s-.98-2.416-2.188-2.416c-1.21 0-2.189 1.082-2.189 2.416 0 1.334.98 2.415 2.189 2.415Z"
                                fill="#030776"
                            />
                            <path
                                d="M9.242 8.166c.604 0 1.094-.499 1.094-1.115 0-.615-.49-1.114-1.094-1.114-.605 0-1.095.499-1.095 1.114 0 .616.49 1.115 1.095 1.115Z"
                                fill="#fff"
                            />
                        </svg>
                    </div>
                    {{-- Title --}}
                    <div class="flex items-end gap-px">
                        <span class="text-2xl font-bold">L</span>
                        <span
                            class="text-lg transition duration-500 motion-reduce:transition-none"
                        >
                            ivewire
                        </span>
                    </div>
                </a>
            </div>
            <div
                x-ref="tall_stack_description"
                class="relative z-30 w-full min-[600px]:w-auto min-[630px]:top-40 min-[630px]:pl-5 min-[630px]:pt-10 min-[700px]:top-0 min-[700px]:pl-0 min-[700px]:pr-36"
            >
                <div
                    class="flex justify-center min-[600px]:justify-start min-[700px]:justify-end"
                >
                    <div>
                        <div class="text-2xl tracking-widest">
                            Built with the
                        </div>
                        <div class="grid">
                            <div
                                class="text-3xl font-black tracking-wide [grid-area:1/-1]"
                            >
                                TALL Stack
                            </div>
                            <div
                                class="-z-10 h-5 w-16 self-end justify-self-start bg-peach-orange [grid-area:1/-1]"
                            ></div>
                        </div>
                    </div>
                </div>
                <div
                    class="pt-5 text-center text-xs text-dolphin min-[600px]:text-left min-[700px]:text-right"
                >
                    /tɔːl stæk/
                </div>
                <div
                    class="pt-5 text-center text-dolphin min-[600px]:text-left min-[700px]:text-right"
                >
                    A set of frameworks that combine into
                    <br />
                    dynamic, maintainable, full-stack
                    <br />
                    applications with little effort.
                </div>
            </div>
        </div>
        {{-- Leaf decoration --}}
        <div
            class="relative left-32 top-32 hidden self-start justify-self-start [grid-area:1/-1] min-[700px]:block"
        >
            <div class="flex flex-col items-center gap-20">
                <svg
                    x-ref="leaf_deocration_1"
                    xmlns="http://www.w3.org/2000/svg"
                    width="49"
                    height="28"
                    viewBox="0 0 49 28"
                    fill="none"
                >
                    <path
                        opacity="0.5"
                        d="M6.13379 8.09327C6.13379 8.09327 17.8115 -7.55783 37.0105 6.74613C44.4714 12.3077 47.762 18.2763 49 23.5011C49 23.5011 11.6538 38.5207 6.13379 8.09327Z"
                        fill="#D6856E"
                    />
                    <path
                        d="M37.8808 18.0565C37.8808 18.0565 19.3566 7.95298 1 7.77991"
                        stroke="#3C252F"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                <svg
                    x-ref="leaf_deocration_2"
                    xmlns="http://www.w3.org/2000/svg"
                    width="37"
                    height="28"
                    viewBox="0 0 37 28"
                    fill="none"
                    class="-ml-32"
                >
                    <path
                        opacity="0.3"
                        d="M31.778 24.8012C31.778 24.8012 17.6461 34.6078 5.49924 17.3422C0.778316 10.6332 -0.332489 4.73593 0.0789204 0.0406773C0.0789204 0.0406773 35.5732 -2.10661 31.778 24.8012Z"
                        fill="#D6856E"
                    />
                    <path
                        d="M7.90077 7.67432C7.90077 7.67432 20.6442 21.2464 36 26.4913"
                        stroke="#3C252F"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>
        </div>
        {{-- Dragonfly decoration --}}
        <div
            class="relative hidden self-end justify-self-end [grid-area:1/-1] min-[700px]:block md:right-20 min-[800px]:-top-10"
        >
            <div class="flex flex-col items-center gap-20">
                <svg
                    x-ref="leaf_deocration_3"
                    xmlns="http://www.w3.org/2000/svg"
                    width="39"
                    height="25"
                    viewBox="0 0 39 25"
                    fill="none"
                >
                    <path
                        opacity="0.5"
                        d="M34.7916 4.53376C34.7916 4.53376 37.7557 20.5285 17.532 24.1658C9.67324 25.5803 3.99747 24.2124 0 22.0129C0 22.0129 12.4811 -9.3159 34.7916 4.53376Z"
                        fill="#D6796E"
                    />
                    <path
                        d="M9.93359 18.3018C9.93359 18.3018 27.1251 12.6982 38 1.57263"
                        stroke="#3C252F"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                <svg
                    x-ref="dragonfly_decoration"
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="36"
                    viewBox="0 0 40 36"
                    fill="none"
                    class="-ml-32"
                >
                    <g clip-path="url(#clip0_299_29361)">
                        <path
                            d="M23.7738 11.2155C23.7116 11.3135 23.5624 11.338 23.3883 11.3135C24.1095 11.9019 24.4701 12.576 24.2214 12.9438C23.9603 13.3237 23.1397 13.2379 22.2942 12.7722C22.3439 12.8089 22.3812 12.8335 22.4309 12.8825C22.4309 12.8825 23.0651 14.1327 22.5677 14.954C22.0703 15.7752 19.397 18.8764 18.6634 19.3299C18.3153 19.5505 18.0417 19.6363 17.8428 19.6363C17.5817 20.1143 16.7984 21.5485 16.4502 22.0633C16.0399 22.6761 8.81576 32.9233 7.82104 33.9897C6.83876 35.0684 5.98082 36.0122 5.85648 35.5709C5.73214 35.1297 6.8885 33.3278 7.70914 32.0408C8.52978 30.7538 14.9706 22.1368 15.555 21.5852C16.1394 21.0337 17.4449 19.3299 17.4449 19.3299C17.3703 18.9744 17.1962 17.6506 17.9671 15.812C18.7381 13.9734 19.3846 13.0909 19.9193 12.7599C20.3669 12.4902 20.7772 11.9509 21.7471 12.4412C20.914 11.8283 20.4664 11.0684 20.7399 10.6761C20.9513 10.3575 21.5854 10.3697 22.2942 10.6639C22.145 10.4678 22.0828 10.2839 22.1698 10.1613C22.3066 9.96522 22.7791 10.0388 23.2267 10.3329C23.6743 10.6271 23.923 11.0194 23.7862 11.2277L23.7738 11.2155Z"
                            fill="#263238"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M18.999 16.2411C18.999 16.2411 14.5601 14.3412 12.2971 13.5444C10.0341 12.7477 5.91848 9.73239 3.25761 9.53627C0.596746 9.3279 0.161558 9.73239 0.534576 10.9336C0.907595 12.1348 5.63249 17.6752 9.87247 19.0725C14.1124 20.4699 15.6418 19.8693 16.2138 19.3422C16.7857 18.8151 16.6117 18.7538 17.1712 17.8468C17.7307 16.9397 18.141 16.7314 18.5638 16.7436C18.9866 16.7436 19.459 16.5353 19.0114 16.2411H18.999Z"
                            fill="white"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M19.4217 15.763C19.4217 15.763 16.4376 14.5986 13.5653 13.0909C10.6931 11.5832 7.98248 9.37691 6.62718 5.78549C5.27187 2.19407 5.43352 1.23799 6.14225 1.22573C6.85099 1.21347 8.69121 1.04187 10.5563 3.1624C12.409 5.28293 12.9436 6.90091 15.2812 9.18079C17.6188 11.4607 18.9368 13.4341 19.2601 14.2308C19.5833 15.0276 20.0061 15.8366 19.4093 15.763H19.4217Z"
                            fill="white"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M20.2425 15.5056C20.2425 15.5056 23.5872 14.7824 26.4594 15.481C29.3192 16.192 29.4187 16.0449 31.3833 16.2655C33.3354 16.4862 36.0211 15.052 38.595 16.8416C41.1688 18.6312 39.055 19.4279 34.4669 20.0898C29.8788 20.7517 29.17 20.5066 26.7952 19.7957C24.4203 19.0847 20.9761 16.8294 20.3419 16.4126C19.7078 15.9959 20.2549 15.5056 20.2549 15.5056H20.2425Z"
                            fill="white"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M19.7699 17.0133C19.7699 17.0133 20.1056 17.0746 23.5995 19.0971C27.0935 21.1195 26.3599 21.1686 29.543 22.3575C32.7261 23.5465 34.7155 24.6864 35.648 26.2554C36.5806 27.8243 36.0459 28.6946 33.5591 28.2288C31.0723 27.7631 23.4752 26.4025 21.5106 24.5884C19.5585 22.7743 18.5389 21.3157 18.6633 20.4944C18.7876 19.6732 19.6331 19.857 19.658 19.1829C19.6828 18.5087 19.5585 17.8958 19.3969 17.4178C19.2352 16.9398 19.3098 16.8295 19.7699 17.0256V17.0133Z"
                            fill="white"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M26.7329 28.192C26.7329 28.192 23.4255 26.8683 21.9334 25.9857"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M23.2141 27.763C23.2141 27.763 21.4112 27.0521 20.3046 25.5812"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M38.6819 15.8365C38.6819 15.8365 36.0583 14.5005 33.5591 14.8191"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M35.8967 14.1941C35.8967 14.1941 34.1808 14.1941 32.4401 14.378"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M7.58472 19.3054C7.58472 19.3054 3.41934 16.5842 1.9397 14.3901"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M3.4939 17.4668C3.4939 17.4668 1.06928 15.4076 0.323241 13.6915"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M15.1321 6.41067C15.1321 6.41067 13.3665 3.08891 11.8247 1.98575C10.2828 0.88258 8.98971 0.404541 8.98971 0.404541"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M13.9136 2.99077C13.9136 2.99077 12.4091 0.980554 10.6807 0.306396"
                            stroke="#263238"
                            stroke-width="0.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </g>
                    <defs>
                        <clipPath id="clip0_299_29361">
                            <rect
                                width="40"
                                height="36"
                                fill="white"
                                transform="matrix(-1 0 0 1 40 0)"
                            />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
</section>
