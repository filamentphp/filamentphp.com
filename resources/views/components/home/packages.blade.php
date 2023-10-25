<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg px-5 pt-20"
>
    <div
        x-data="{}"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.content,
                        start: 'top bottom-=200px',
                    },
                })
                    .fromTo(
                        $refs.arrow,
                        {
                            autoAlpha: 0,
                            y: -20,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power4.out',
                        },
                    )
                    .fromTo(
                        $refs.content,
                        {
                            autoAlpha: 0,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power4.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.decorationbg,
                        {
                            autoAlpha: 0,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'back.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.header,
                        {
                            autoAlpha: 0,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power4.out',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.message,
                        {
                            autoAlpha: 0,
                            x: -30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'power4.out',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.content.querySelectorAll('a > div'),
                        {
                            autoAlpha: 0,
                            x: -20,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.4,
                            ease: 'power4.out',
                            stagger: 0.04,
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.lines,
                        {
                            autoAlpha: 0,
                            y: 20,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'power4.out',
                        },
                        '>-0.5',
                    )
            }
        "
    >
        <div
            x-ref="arrow"
            class="flex justify-end"
        >
            {{-- Decoration Arrow --}}
            <img
                src="{{ Vite::asset('resources/svg/home/decoration-down-arrow-peach.svg') }}"
                alt="Down arrow"
                class="w-[6.5rem]"
            />
        </div>
        <div class="relative mx-auto w-[95%]">
            <div
                x-ref="content"
                class="rounded-[2.5rem] bg-gradient-to-tr from-[#24263A] to-[#2E2F47] p-10 text-white min-[900px]:p-14"
            >
                {{-- Header --}}
                <div
                    x-ref="header"
                    class="flex items-center justify-center gap-7"
                >
                    <div class="relative">
                        {{-- Lighting Bolt --}}
                        <img
                            src="{{ Vite::asset('resources/images/home/lightingbolt.webp') }}"
                            alt="Lightning bolt"
                            class="w-4 md:w-5"
                        />
                        {{-- Blur Background --}}
                        <div
                            class="absolute right-1/2 top-1/2 h-4 w-4 -translate-y-1/2 translate-x-1/2 rounded-full bg-yellow-400 blur-lg md:h-5 md:w-5"
                        ></div>
                    </div>
                    {{-- Batteries Included --}}
                    <div class="text-2xl md:text-3xl">
                        <span class="font-bold">Batteries</span>
                        <span>Included</span>
                    </div>
                </div>

                {{-- Message --}}
                <div
                    x-ref="message"
                    class="truncate bg-gradient-to-r from-dolphin to-transparent bg-clip-text pt-5 text-center text-transparent brightness-[1.8] sm:text-lg"
                >
                    Stop rebuilding the same UI over and over and over and over
                    and over
                </div>

                {{-- Plugins List --}}
                <div
                    class="grid grid-cols-1 gap-x-12 gap-y-10 pb-7 pt-16 min-[450px]:px-5 md:place-items-center min-[900px]:grid-cols-2 lg:px-16"
                >
                    <a
                        href="{{ route('use-cases.admin-panel') }}"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="37"
                                height="37"
                                viewBox="0 0 21 21"
                            >
                                <path
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m17.498 15.498l-.01-10a2 2 0 0 0-2-1.998h-10a2 2 0 0 0-1.995 1.85l-.006.152l.01 10a2 2 0 0 0 2 1.998h10a2 2 0 0 0 1.995-1.85zM7.5 7.5v9.817m10-9.817h-14"
                                />
                            </svg>
                        </div>
                        <div class="space-y-1 md:w-80 min-[900px]:w-auto">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">
                                    Panel Builder
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Build a Laravel admin panel, customer-facing
                                app, SaaS, or anything you can imagine!
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/forms"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="37"
                                height="37"
                                viewBox="0 0 48 48"
                            >
                                <path
                                    fill="currentColor"
                                    d="M21 21.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0Zm-2.5 0a2 2 0 1 0-4 0a2 2 0 0 0 4 0Zm-2 15.5a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm0-2.5a2 2 0 1 1 0-4a2 2 0 0 1 0 4ZM13.25 12a1.25 1.25 0 1 0 0 2.5h21.5a1.25 1.25 0 1 0 0-2.5h-21.5ZM23 21.75c0-.69.56-1.25 1.25-1.25h10.5a1.25 1.25 0 1 1 0 2.5h-10.5c-.69 0-1.25-.56-1.25-1.25ZM24.25 31a1.25 1.25 0 1 0 0 2.5h10.5a1.25 1.25 0 1 0 0-2.5h-10.5Zm-12-25A6.25 6.25 0 0 0 6 12.25v23.5A6.25 6.25 0 0 0 12.25 42h23.5A6.25 6.25 0 0 0 42 35.75v-23.5A6.25 6.25 0 0 0 35.75 6h-23.5ZM8.5 12.25a3.75 3.75 0 0 1 3.75-3.75h23.5a3.75 3.75 0 0 1 3.75 3.75v23.5a3.75 3.75 0 0 1-3.75 3.75h-23.5a3.75 3.75 0 0 1-3.75-3.75v-23.5Z"
                                />
                            </svg>
                        </div>
                        <div class="space-y-1 md:w-80 min-[900px]:w-auto">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">
                                    Form Builder
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Easily build stunning Livewire-powered forms
                                with over 25 components out of the box.
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/tables"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="37"
                                height="37"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    fill="currentColor"
                                    d="M18.44 3.06H5.56a2.507 2.507 0 0 0-2.5 2.5v12.88a2.507 2.507 0 0 0 2.5 2.5h12.88a2.514 2.514 0 0 0 2.5-2.5V5.56a2.514 2.514 0 0 0-2.5-2.5ZM8.71 19.94H5.56a1.5 1.5 0 0 1-1.5-1.5v-3.11h4.65Zm0-5.61H4.06V9.67h4.65Zm0-5.66H4.06V5.56a1.5 1.5 0 0 1 1.5-1.5h3.15Zm11.23 9.77a1.511 1.511 0 0 1-1.5 1.5H9.71v-4.61h10.23Zm0-4.11H9.71V9.67h10.23Zm0-5.66H9.71V4.06h8.73a1.511 1.511 0 0 1 1.5 1.5Z"
                                />
                            </svg>
                        </div>
                        <div class="space-y-1 md:w-80 min-[900px]:w-auto">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">
                                    Table Builder
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Craft beautiful, optimized, and interactive
                                Livewire-powered datatables for any situation.
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/notifications"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="31"
                                height="31"
                                viewBox="0 0 24 24"
                            >
                                <g
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        d="M18.75 9.71v-.705C18.75 5.136 15.726 2 12 2S5.25 5.136 5.25 9.005v.705a4.4 4.4 0 0 1-.692 2.375L3.45 13.81c-1.011 1.575-.239 3.716 1.52 4.214a25.775 25.775 0 0 0 14.06 0c1.759-.498 2.531-2.639 1.52-4.213l-1.108-1.725a4.4 4.4 0 0 1-.693-2.375Z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        d="M7.5 19c.655 1.748 2.422 3 4.5 3s3.845-1.252 4.5-3"
                                    />
                                </g>
                            </svg>
                        </div>
                        <div class="space-y-1 md:w-80 min-[900px]:w-auto">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">
                                    Notifications
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Notify your users of important events by
                                delivering real-time messages using Livewire.
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/actions"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="m16.574 19.2l-3.938-3.938l-1.203 1.202c-1.23 1.232-1.846 1.847-2.508 1.702c-.662-.146-.963-.963-1.565-2.596l-2.007-5.45C4.152 6.861 3.55 5.231 4.39 4.391c.84-.84 2.47-.24 5.73.962l5.45 2.007c1.633.602 2.45.903 2.596 1.565c.145.662-.47 1.277-1.702 2.508l-1.202 1.203l3.938 3.938c.408.408.612.612.706.84c.125.303.125.643 0 .947c-.094.227-.298.431-.706.839s-.612.612-.84.706a1.238 1.238 0 0 1-.947 0c-.227-.094-.43-.298-.839-.706Z"
                                />
                            </svg>
                        </div>
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">Actions</div>
                                <div
                                    class="rounded-full bg-[#C8A3F7] px-3 py-0.5 text-xs font-medium text-black"
                                >
                                    New
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Open interactive modals and slide-overs - a
                                great way to keep the user in the flow of the
                                application.
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/infolists"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="34"
                                height="34"
                                viewBox="0 0 24 24"
                            >
                                <g
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        d="M16 4.002c2.175.012 3.353.109 4.121.877C21 5.758 21 7.172 21 10v6c0 2.829 0 4.243-.879 5.122C19.243 22 17.828 22 15 22H9c-2.828 0-4.243 0-5.121-.878C3 20.242 3 18.829 3 16v-6c0-2.828 0-4.242.879-5.121c.768-.768 1.946-.865 4.121-.877"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        d="M10.5 14H17M7 14h.5M7 10.5h.5m-.5 7h.5m3-7H17m-6.5 7H17"
                                    />
                                    <path
                                        d="M8 3.5A1.5 1.5 0 0 1 9.5 2h5A1.5 1.5 0 0 1 16 3.5v1A1.5 1.5 0 0 1 14.5 6h-5A1.5 1.5 0 0 1 8 4.5v-1Z"
                                    />
                                </g>
                            </svg>
                        </div>
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">
                                    Infolist Builder
                                </div>
                                <div
                                    class="rounded-full bg-[#C8A3F7] px-3 py-0.5 text-xs font-medium text-black"
                                >
                                    New
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Display read-only information to users about a
                                particular record, with a fully flexible layout.
                            </div>
                        </div>
                    </a>
                    <a
                        href="/docs/widgets"
                        class="group/package-link flex flex-col items-start gap-5 transition duration-300 will-change-transform hover:translate-x-1 motion-reduce:transition-none motion-reduce:hover:transform-none min-[450px]:flex-row"
                    >
                        <div
                            class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-[#464762]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 24 24"
                            >
                                <g
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 22h18"
                                    />
                                    <path
                                        d="M3 11c0-.943 0-1.414.293-1.707C3.586 9 4.057 9 5 9c.943 0 1.414 0 1.707.293C7 9.586 7 10.057 7 11v6c0 .943 0 1.414-.293 1.707C6.414 19 5.943 19 5 19c-.943 0-1.414 0-1.707-.293C3 18.414 3 17.943 3 17v-6Zm7-4c0-.943 0-1.414.293-1.707C10.586 5 11.057 5 12 5c.943 0 1.414 0 1.707.293C14 5.586 14 6.057 14 7v10c0 .943 0 1.414-.293 1.707C13.414 19 12.943 19 12 19c-.943 0-1.414 0-1.707-.293C10 18.414 10 17.943 10 17V7Zm7-3c0-.943 0-1.414.293-1.707C17.586 2 18.057 2 19 2c.943 0 1.414 0 1.707.293C21 2.586 21 3.057 21 4v13c0 .943 0 1.414-.293 1.707C20.414 19 19.943 19 19 19c-.943 0-1.414 0-1.707-.293C17 18.414 17 17.943 17 17V4Z"
                                    />
                                </g>
                            </svg>
                        </div>
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-2">
                                <div class="text-base font-medium">Widgets</div>
                                <div
                                    class="rounded-full bg-[#C8A3F7] px-3 py-0.5 text-xs font-medium text-black"
                                >
                                    New
                                </div>
                                <div
                                    class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 12h16m0 0l-6-6m6 6l-6 6"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="max-w-xs text-sm text-dolphin brightness-125"
                            >
                                Build a dashboard for your application, complete
                                with real-time charts and stats.
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Decoration Background --}}
            <div
                x-ref="decorationbg"
                class="absolute -left-2.5 top-2.5 -z-10 h-full w-full rounded-[2.5rem] bg-butter md:rotate-1"
            ></div>
        </div>
        <div
            x-ref="lines"
            class="flex justify-start"
        >
            {{-- Decoration Lines --}}
            <img
                src="{{ Vite::asset('resources/svg/home/decoration-three-lines.svg') }}"
                alt="Decoration lines"
                class="relative -left-7 w-14 md:-left-5 md:-top-2"
            />
        </div>
    </div>
</div>
