<footer class="mx-auto w-full max-w-(--breakpoint-lg) px-5 pb-5 pt-10">
    {{-- Sponsor list --}}
    <section
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
                            delay: motion.stagger(0.05),
                        },
                    )
                })
            }
        "
        class="grid grid-cols-[repeat(auto-fill,minmax(10rem,1fr))] gap-5 text-dolphin"
        aria-labelledby="sponsors-heading"
    >
        <!-- Added visually hidden heading for better document structure -->
        <h2
            id="sponsors-heading"
            class="sr-only"
        >
            Our Sponsors
        </h2>

        <div
            class="flex h-24 flex-col place-items-center items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.kirschbaum footer />
        </div>
        <div
            class="flex h-24 flex-col place-items-center items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.cms-max footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.nativephp footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.sevalla footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
        >
            <x-sponsors.titan footer />
        </div>
        <div
            class="flex h-24 flex-col items-center justify-center rounded-xl bg-[#F4E7E2]/50 px-5 opacity-0 motion-reduce:opacity-100"
            aria-label="Lunar - Sponsor"
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
                    aria-label="Become a sponsor of Filament"
                    rel="noopener noreferrer"
                    title="Support Filament by becoming a sponsor"
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
    </section>

    <div
        class="flex flex-col items-stretch gap-x-20 gap-y-5 px-6 pt-10 lg:flex-row lg:items-start lg:justify-between min-[1060px]:px-0"
    >
        {{-- Left side --}}
        <div
            x-init="
                () => {
                    if (reducedMotion) return
                    motion.inView($el, (element) => {
                        motion.animate(
                            Array.from($el.children),
                            {
                                x: [-10, 0],
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
            class="flex flex-col items-center gap-3.5 lg:items-start"
            aria-labelledby="footer-about-heading"
        >
            {{-- Logo --}}
            <div class="opacity-0 motion-reduce:opacity-100">
                <x-nav.logo />
            </div>

            {{-- Description --}}
            <h2
                id="footer-about-heading"
                class="sr-only"
            >
                About Filament
            </h2>
            <p
                class="text-center font-afacad text-lg opacity-0 motion-reduce:opacity-100 lg:max-w-88 lg:text-left"
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
                class="flex flex-wrap items-center gap-3.5 text-hurricane opacity-0 motion-reduce:opacity-100"
                aria-label="Social media links"
            >
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://twitter.com/filamentphp"
                        class="grid size-10 place-items-center rounded-xl bg-merino transition duration-200 hover:bg-[#ffe8ce] hover:text-black motion-reduce:transition-none"
                        aria-label="Follow Filament on Twitter"
                        title="Filament on Twitter/X"
                        rel="noopener"
                    >
                        <x-icons.twitter-x class="size-4" />
                    </a>
                </div>
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://filamentphp.com/discord"
                        class="grid size-10 place-items-center rounded-xl bg-merino transition duration-200 hover:bg-[#ffe8ce] hover:text-black motion-reduce:transition-none"
                        aria-label="Join the Filament Discord community"
                        title="Filament on Discord"
                        rel="noopener"
                    >
                        <x-icons.discord class="size-5" />
                    </a>
                </div>
                <div class="opacity-0 motion-reduce:opacity-100">
                    <a
                        target="_blank"
                        href="https://github.com/filamentphp/filament"
                        class="grid size-10 place-items-center rounded-xl bg-merino transition duration-200 hover:bg-[#ffe8ce] hover:text-black motion-reduce:transition-none"
                        aria-label="View Filament on GitHub"
                        title="Filament on GitHub"
                        rel="noopener"
                    >
                        <x-icons.github class="size-5" />
                    </a>
                </div>
            </div>
        </div>

        {{-- Right side links --}}
        <nav
            x-init="
                () => {
                    if (reducedMotion) return
                    motion.inView($el, (element) => {
                        motion.animate(
                            $refAll('linkItem'),
                            {
                                x: [-10, 0],
                                opacity: [0, 1],
                            },
                            {
                                duration: 0.7,
                                ease: motion.backOut,
                                delay: motion.stagger(0.05),
                            },
                        )
                    })
                }
            "
            class="flex flex-1 flex-wrap justify-center gap-x-10 gap-y-3 lg:justify-around"
            aria-label="Footer navigation"
        >
            {{-- First column --}}
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <h2
                    x-ref="linkItem"
                    class="font-afacad text-xl font-medium text-midnight opacity-0 motion-reduce:opacity-100"
                >
                    Explore
                </h2>
                <ul
                    x-ref="linkItem"
                    class="flex flex-col items-start text-sm opacity-0 motion-reduce:opacity-100"
                >
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('home') }}"
                            aria-label="Go to homepage"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Home
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('docs') }}"
                            aria-label="View documentation"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Documentation
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('api-docs') }}"
                            aria-label="View PHP API documentation"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            PHP API Documentation
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('use-cases.admin-panel') }}"
                            aria-label="Learn how to build an admin panel"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Build an Admin Panel
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Second column --}}
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <h2
                    x-ref="linkItem"
                    class="font-afacad text-xl font-medium text-midnight opacity-0 motion-reduce:opacity-100"
                >
                    Community
                </h2>
                <ul
                    x-ref="linkItem"
                    class="flex flex-col items-start text-sm opacity-0 motion-reduce:opacity-100"
                >
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('plugins') }}"
                            aria-label="Browse available plugins"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Plugins
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('articles') }}"
                            aria-label="Read articles and tutorials"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Content
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('team') }}"
                            aria-label="Learn about the Filament team members"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Meet Our Team
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="https://github.com/filamentphp/filament?sponsor=1"
                            target="_blank"
                            rel="noopener"
                            aria-label="Sponsor Filament on GitHub"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Sponsor
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Third column --}}
            <div class="flex grow flex-col items-start gap-1 sm:grow-0">
                <h2
                    x-ref="linkItem"
                    class="font-afacad text-xl font-medium text-midnight opacity-0 motion-reduce:opacity-100"
                >
                    Support
                </h2>
                <ul
                    x-ref="linkItem"
                    class="flex flex-col items-start text-sm opacity-0 motion-reduce:opacity-100"
                >
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="https://shop.filamentphp.com"
                            aria-label="Visit the Filament shop"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Shop
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="https://status.filamentphp.com"
                            target="_blank"
                            rel="noopener"
                            aria-label="Check Filament service status"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Status
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="https://github.com/filamentphp/filament/discussions/new"
                            target="_blank"
                            rel="noopener"
                            aria-label="Get help with Filament"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Help
                        </a>
                    </li>
                    <li
                        x-ref="linkItem"
                        class="opacity-0 motion-reduce:opacity-100"
                    >
                        <a
                            href="{{ route('consulting') }}"
                            aria-label="Learn about consulting services"
                            class="inline-block px-px py-1.5 text-hurricane transition duration-300 will-change-transform hover:translate-x-1 hover:text-black motion-reduce:transition-none motion-reduce:hover:transform-none"
                        >
                            Consulting
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
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
        class="flex flex-col flex-wrap items-center gap-x-5 gap-y-3 text-center text-sm text-hurricane sm:flex-row sm:justify-between sm:px-6 sm:text-left min-[1060px]:px-0"
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
                    class="group relative font-medium text-black/80 transition duration-200 hover:text-black"
                    aria-label="Hassan's website"
                >
                    Hassan Zahirnia
                    <div
                        class="absolute -bottom-0.5 left-0 h-px w-full origin-right scale-x-0 bg-black transition duration-300 ease-out will-change-transform group-hover:origin-left group-hover:scale-x-100"
                    ></div>
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
