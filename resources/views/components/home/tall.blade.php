<div
    x-cloak
    x-data="{
        downloadCounterTarget: @js(app('package-download-stats')()),
        githubStarsCounterTarget: @js(app('package-github-stars-stats')()),
    }"
    class="mx-auto w-full max-w-screen-lg overflow-x-clip px-5 pt-20"
>
    <div
        x-data="{
            downloadCounter: { val: reducedMotion ? downloadCounterTarget : 1 },
            githubStarsCounter: {
                val: reducedMotion ? githubStarsCounterTarget : 1,
            },
        }"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.speedometer,
                        start: 'top bottom-=200px',
                    },
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
                        $refs.downloads,
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
                    .to(
                        downloadCounter,
                        {
                            val: downloadCounterTarget,
                            duration: 1.5,
                            roundProps: 'val',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.github_stars,
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
                        '<0.2',
                    )
                    .to(
                        githubStarsCounter,
                        {
                            val: githubStarsCounterTarget,
                            duration: 1.5,
                            roundProps: 'val',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.orange_speed_decoration,
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
                        $refs.gray_speed_decoration,
                        {
                            autoAlpha: 0,
                            x: -50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '<0.2',
                    )
            }
        "
    >
        <div
            x-ref="speedometer"
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
            {{-- Orange Speed Decoration --}}
            <div
                x-ref="orange_speed_decoration"
                class="relative top-10 hidden self-start justify-self-start [grid-area:1/-1] min-[700px]:block md:-top-32 md:self-end"
            >
                <svg
                    width="129"
                    height="102"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <rect
                        x="27"
                        y="26.161"
                        width="80"
                        height="80"
                        rx="20"
                        transform="rotate(-19 27 26.161)"
                        fill="#FFF0E8"
                    />
                    <path
                        d="M2 38h76M55 51.115h33"
                        stroke="#FFD1BB"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                </svg>
            </div>
            {{-- Gray Speed Decoration --}}
            <div
                x-ref="gray_speed_decoration"
                class="relative hidden self-end justify-self-end [grid-area:1/-1] min-[700px]:block md:-top-10"
            >
                <svg
                    width="105"
                    height="102"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <rect
                        x="3"
                        y="26.161"
                        width="80"
                        height="80"
                        rx="20"
                        transform="rotate(-19 3 26.161)"
                        fill="#FAF4F4"
                    />
                    <path
                        d="M2 59.115h60M44 72.115h27"
                        stroke="#E6D1D1"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                </svg>
            </div>
            {{-- Stats --}}
            <div
                class="relative flex w-full flex-wrap items-center justify-center gap-x-10 gap-y-7 self-start justify-self-start pt-14 min-[600px]:pt-60 min-[700px]:pt-0 md:top-20 md:w-auto md:flex-col md:[grid-area:1/-1]"
            >
                {{-- Downloads --}}
                <div
                    x-ref="downloads"
                    class="min-w-[12rem] space-y-3 rounded-2xl bg-seashell-peach p-5"
                >
                    <div
                        x-text="downloadCounter.val.toLocaleString('en-US') + '+'"
                        class="text-center font-roboto-mono text-2xl font-medium"
                    ></div>
                    <div
                        class="flex items-center justify-center gap-3 text-butter"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <g
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-width="1.5"
                            >
                                <path
                                    d="M6.286 19C3.919 19 2 17.104 2 14.765c0-2.34 1.919-4.236 4.286-4.236c.284 0 .562.028.83.08m7.265-2.582a5.765 5.765 0 0 1 1.905-.321c.654 0 1.283.109 1.87.309m-11.04 2.594a5.577 5.577 0 0 1-.354-1.962C6.762 5.528 9.32 3 12.476 3c2.94 0 5.361 2.194 5.68 5.015m-11.04 2.594a4.29 4.29 0 0 1 1.55.634m9.49-3.228C20.392 8.78 22 10.881 22 13.353c0 2.707-1.927 4.97-4.5 5.52"
                                />
                                <path
                                    stroke-linejoin="round"
                                    d="M12 22v-6m0 6l2-2m-2 2l-2-2"
                                />
                            </g>
                        </svg>
                        <div class="min-w-[5.5rem] text-sm font-medium">
                            Downloads
                        </div>
                    </div>
                </div>
                {{-- Github Stars --}}
                <div
                    x-ref="github_stars"
                    class="min-w-[12rem] space-y-3 rounded-2xl bg-seashell-peach p-5"
                >
                    <div
                        x-text="githubStarsCounter.val.toLocaleString('en-US') + '+'"
                        class="text-center font-roboto-mono text-2xl font-medium"
                    ></div>
                    <div
                        class="flex items-center justify-center gap-3 text-butter"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                            />
                        </svg>
                        <div class="min-w-[5.5rem] text-sm font-medium">
                            Github Stars
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
