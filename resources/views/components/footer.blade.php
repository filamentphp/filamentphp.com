<footer class="mx-auto w-full max-w-screen-lg px-5 pb-5 pt-10">
    {{-- Sponsor list --}}
    <div
        x-init="
            () => {
                if (reducedMotion) return
                motion.inView($el, (element) => {
                    motion.animate(
                        Array.from($el.children),
                        {
                            y: [10, 0],
                            opacity: [0, 1],
                        },
                        {
                            duration: 0.7,
                            ease: motion.backOut,
                            delay: motion.stagger(0.1),
                        },
                    )
                })
            }
        "
        class="grid grid-cols-[repeat(auto-fill,minmax(10rem,1fr))] gap-5 text-dolphin"
        aria-label="Our sponsors"
        role="region"
    >
        <div
            class="flex h-24 flex-col place-items-center items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.kirschbaum footer />
        </div>
        <div
            class="flex h-24 flex-col place-items-center items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.whizzy footer />
        </div>
        <div
            class="flex h-24 flex-col place-items-center items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.cms-max footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.netstudio footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.sevalla footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.vormkracht10 footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.lunar footer />
        </div>
        <div class="opacity-0 motion-reduce:opacity-100">
            <div
                class="transition duration-300 will-change-transform hover:scale-105 motion-reduce:transition-none"
            >
                <a
                    href="https://github.com/filamentphp/filament?sponsor=1"
                    target="_blank"
                    x-init="
                        () => {
                            if (reducedMotion) return
                            motion.animate(
                                $el,
                                {
                                    backgroundColor: ['#ede9fe', '#fbcfe8'],
                                },
                                {
                                    duration: 1.5,
                                    repeat: Infinity,
                                    repeatType: 'mirror',
                                    ease: 'linear',
                                },
                            )
                        }
                    "
                    class="flex h-24 flex-col items-center justify-center gap-2 rounded-xl px-5"
                    aria-label="Become a sponsor"
                    rel="noopener"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        class="size-6"
                        viewBox="0 0 14 14"
                        overflow="visible"
                        aria-hidden="true"
                    >
                        <path
                            x-init="
                                () => {
                                    if (reducedMotion) return
                                    motion.animate(
                                        $el,
                                        {
                                            scale: [1, 1.25, 1],
                                        },
                                        {
                                            duration: 1.5,
                                            repeat: Infinity,
                                            times: [0, 0.2, 1],
                                            ease: motion.easeOut,
                                        },
                                    )
                                }
                            "
                            id="Vector"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M0.5 4.99946C0.543629 2.23201 3.85949 -0.335259 6.99999 3.27784 10.1405 -0.335259 13.4564 2.23201 13.5 4.99946c0 4.11997 -5.25729 7.50164 -6.50001 7.50164 -0.83621 0 -3.49008 -1.5311 -5.13686 -3.78804"
                            stroke-width="0.9"
                        ></path>
                        <path
                            x-init="
                                () => {
                                    if (reducedMotion) return
                                    motion.animate(
                                        $el,
                                        {
                                            pathLength: [1, 0],
                                            pathOffset: [1, 0],
                                        },
                                        {
                                            duration: 1.5,
                                            repeat: Infinity,
                                            repeatType: 'loop',
                                            ease: motion.easeOut,
                                        },
                                    )
                                }
                            "
                            id="Vector_2"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.5 6.5H8l-1.5 2 -2 -3.5L3 7H0.5625"
                            stroke-width="1"
                        ></path>
                    </svg>
                    <div
                        x-init="
                            () => {
                                if (reducedMotion) return
                                motion.animate(
                                    $el,
                                    {
                                        y: -2,
                                    },
                                    {
                                        duration: 1.2,
                                        repeat: Infinity,
                                        repeatType: 'reverse',
                                        ease: motion.easeOut,
                                    },
                                )
                            }
                        "
                        class="text-sm will-change-transform"
                    >
                        Your logo here?
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div
        class="flex flex-col items-stretch gap-x-20 gap-y-5 px-6 pt-10 lg:flex-row lg:items-start lg:justify-between min-[1060px]:px-0"
    >
        {{-- Left side --}}
        <div class="flex flex-col items-center gap-3.5 lg:items-start">
            {{-- Logo --}}
            <x-nav.logo />

            {{-- Description --}}
            <p
                class="text-center font-afacad text-lg lg:max-w-[22rem] lg:text-left"
            >
                A collection of tools for rapidly building beautiful TALL stack
                applications. It includes a powerful admin panel, dynamic forms,
                tables, and more.
            </p>

            {{-- Social links --}}
            <div
                x-init="
                    () => {
                        if (reducedMotion) return
                        motion.inView($el, (element) => {
                            motion.animate(
                                Array.from($el.children),
                                {
                                    y: [10, 0],
                                    opacity: [0, 1],
                                },
                                {
                                    duration: 0.7,
                                    ease: motion.backOut,
                                    delay: motion.stagger(0.1),
                                },
                            )
                        })
                    }
                "
                class="flex flex-wrap items-center gap-3.5 text-hurricane"
            >
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://twitter.com/filamentphp"
                        class="group/twitter-link relative grid h-[2.6rem] w-[2.6rem] place-items-center rounded-xl bg-merino hover:text-black motion-reduce:transition-none"
                    >
                        <svg
                            width="40"
                            height="40"
                            class="scale-[.6] transition duration-300 group-hover/twitter-link:scale-0 group-hover/twitter-link:opacity-0"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M37.02 9.427c-1.272.562-2.62.932-4.002 1.096a6.991 6.991 0 0 0 3.064-3.856 13.935 13.935 0 0 1-4.425 1.691 6.97 6.97 0 0 0-11.877 6.357A19.79 19.79 0 0 1 5.412 7.432a6.947 6.947 0 0 0-.944 3.505 6.973 6.973 0 0 0 3.1 5.801 6.947 6.947 0 0 1-3.156-.871v.084a6.975 6.975 0 0 0 5.591 6.837 7.008 7.008 0 0 1-3.15.12 6.975 6.975 0 0 0 6.514 4.842 13.99 13.99 0 0 1-10.32 2.887A19.719 19.719 0 0 0 13.73 33.77c12.823 0 19.833-10.622 19.833-19.834 0-.3-.006-.603-.02-.901a14.17 14.17 0 0 0 3.477-3.608Z"
                                fill="currentColor"
                            />
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            class="absolute right-1/2 top-1/2 -translate-y-1/2 translate-x-1/2 scale-0 opacity-0 transition duration-300 group-hover/twitter-link:scale-100 group-hover/twitter-link:opacity-100"
                            fill="none"
                        >
                            <path
                                d="M12.6182 0.80542H15.0592L9.72628 6.90056L16 15.1947H11.0877L7.24026 10.1643L2.83789 15.1947H0.395405L6.09945 8.67524L0.0810547 0.80542H5.11803L8.5958 5.40334L12.6182 0.80542ZM11.7614 13.7336H13.114L4.38307 2.18974H2.9316L11.7614 13.7336Z"
                                fill="currentColor"
                            />
                        </svg>
                    </a>
                </div>
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://filamentphp.com/discord"
                        class="grid h-[2.6rem] w-[2.6rem] place-items-center rounded-xl bg-merino transition duration-300 hover:text-black motion-reduce:transition-none"
                    >
                        <svg
                            class="w-[1.3rem]"
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
                    </a>
                </div>
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://github.com/filamentphp/filament"
                        class="grid h-[2.6rem] w-[2.6rem] place-items-center rounded-xl bg-merino transition duration-300 hover:text-black motion-reduce:transition-none"
                    >
                        <svg
                            class="w-[1.6rem]"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Right side links --}}
        <div
            class="flex flex-1 flex-wrap justify-center gap-x-10 gap-y-3 lg:justify-around"
        >
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <div class="font-afacad text-xl font-medium text-midnight">
                    Explore
                </div>
                <div
                    class="flex flex-col items-start text-sm *:inline-block *:px-px *:py-1.5 *:text-hurricane *:transition *:duration-300 *:will-change-transform hover:*:translate-x-1 hover:*:text-black motion-reduce:*:transition-none motion-reduce:*:hover:transform-none"
                >
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('docs') }}">Documentation</a>
                    <a href="{{ route('api-docs') }}">PHP API Documentation</a>
                    <a href="{{ route('use-cases.admin-panel') }}">
                        Build an Admin Panel
                    </a>
                </div>
            </div>
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <div class="font-afacad text-xl font-medium text-midnight">
                    Community
                </div>
                <div
                    class="flex flex-col items-start text-sm *:inline-block *:px-px *:py-1.5 *:text-hurricane *:transition *:duration-300 *:will-change-transform hover:*:translate-x-1 hover:*:text-black motion-reduce:*:transition-none motion-reduce:*:hover:transform-none"
                >
                    <a href="{{ route('plugins') }}">Plugins</a>
                    <a href="{{ route('articles') }}">Content</a>
                    <a href="{{ route('team') }}">Meet Our Team</a>
                    <a
                        href="https://github.com/filamentphp/filament?sponsor=1"
                        target="_blank"
                    >
                        Sponsor
                    </a>
                </div>
            </div>
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <div class="font-afacad text-xl font-medium text-midnight">
                    Support
                </div>
                <div
                    class="flex flex-col items-start text-sm *:inline-block *:px-px *:py-1.5 *:text-hurricane *:transition *:duration-300 *:will-change-transform hover:*:translate-x-1 hover:*:text-black motion-reduce:*:transition-none motion-reduce:*:hover:transform-none"
                >
                    <a href="https://shop.filamentphp.com">Shop</a>
                    <a
                        href="https://status.filamentphp.com"
                        target="_blank"
                    >
                        Status
                    </a>
                    <a
                        href="https://github.com/filamentphp/filament/discussions/new"
                        target="_blank"
                    >
                        Help
                    </a>
                    <a href="{{ route('consulting') }}">Consulting</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Divider --}}
    <div
        x-init="
            () => {
                if (reducedMotion) return
                motion.inView($el, (element) => {
                    motion.animate(
                        $el,
                        {
                            opacity: [0, 1],
                            x: [-10, 0],
                        },
                        {
                            duration: 0.7,
                            ease: motion.circOut,
                        },
                    )
                })
            }
        "
        class="flex items-center py-1 text-hurricane/25 opacity-0 motion-reduce:opacity-100 lg:pt-2 min-[1060px]:-mx-7"
        aria-hidden="true"
    >
        {{-- Left flower --}}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8"
            viewBox="0 0 22 31"
            fill="none"
        >
            <path
                d="M20.98 14.9902C21.49 15.1602 20.12 5.13023 7.05005 0.740234C7.05005 0.740234 8.76005 10.8102 20.98 14.9902Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M13.2401 14.9703C13.6201 14.9803 10.5801 8.49027 0.830078 8.28027C0.830078 8.28027 4.11008 14.7203 13.2401 14.9703Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M20.98 15.5505C21.49 15.3805 20.12 25.4105 7.05005 29.8005C7.05005 29.8005 8.76005 19.7305 20.98 15.5505Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M13.2401 14.9902C13.6201 14.9802 10.5801 21.4702 0.830078 21.6802C0.830078 21.6802 4.11008 15.2402 13.2401 14.9902Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
        </svg>

        {{-- Center line --}}
        <div class="-mx-[9px] -mt-px h-[1.3px] w-full bg-current"></div>

        {{-- Right flower --}}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8"
            viewBox="0 0 23 31"
            fill="none"
        >
            <path
                d="M1.23995 14.9902C0.729946 15.1602 2.09994 5.13023 15.1699 0.740234C15.1699 0.740234 13.4599 10.8102 1.23995 14.9902Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M8.97985 14.9703C8.59985 14.9803 11.6399 8.49027 21.3899 8.28027C21.3899 8.28027 18.1099 14.7203 8.97985 14.9703Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M1.23995 15.5505C0.729946 15.3805 2.09994 25.4105 15.1699 29.8005C15.1699 29.8005 13.4599 19.7305 1.23995 15.5505Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
            <path
                d="M8.97985 14.9902C8.59985 14.9802 11.6399 21.4702 21.3899 21.6802C21.3899 21.6802 18.1099 15.2402 8.97985 14.9902Z"
                stroke="currentColor"
                stroke-miterlimit="10"
            />
        </svg>
    </div>

    {{-- Copyright --}}
    <section
        class="flex flex-col flex-wrap items-center gap-x-5 gap-y-3 text-center text-sm text-hurricane/80 sm:flex-row sm:justify-between sm:px-6 sm:text-left min-[1060px]:px-0"
        aria-label="Credits and copyright information"
    >
        {{-- Left side --}}
        <div
            x-init="
                () => {
                    if (reducedMotion) return
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [-10, 0],
                            },
                            {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }
            "
            class="flex flex-col flex-wrap items-center gap-2 opacity-0 motion-reduce:opacity-100 md:flex-row"
        >
            <div class="flex gap-1">
                <div>Website designed by</div>
                <a
                    href="https://zahirnia.com"
                    target="_blank"
                    class="font-medium text-black/80 transition duration-200 hover:text-black"
                    aria-label="Hassan's website"
                >
                    Hassan Zahirnia
                </a>
            </div>
        </div>

        {{-- Right side --}}
        <div
            x-init="
                () => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [10, 0],
                            },
                            {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }
            "
            class="opacity-0 motion-reduce:opacity-100"
        >
            <span>© {{ date('Y') }} Filament. All rights reserved.</span>
        </div>
    </section>
</footer>
