<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg px-5 pt-20"
>
    <div
        x-data="{}"
        x-init="
            $nextTick(() => {
                if (reducedMotion) return
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.header,
                        start: 'top bottom-=150px',
                    },
                })
                    .fromTo(
                        $refs.header_introducing,
                        {
                            autoAlpha: 0,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                    )
                    .fromTo(
                        $refs.header_new,
                        {
                            autoAlpha: 0,
                            x: -30,
                            y: 30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.header_version4,
                        {
                            autoAlpha: 0,
                            y: 30,
                        },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.header_features,
                        {
                            autoAlpha: 0,
                            x: 30,
                            y: 30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.6',
                    )
                gsap.fromTo(
                    $refs.feature_1,
                    {
                        autoAlpha: 0,
                        x: -20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                        scrollTrigger: {
                            trigger: $refs.feature_1,
                            start: 'top bottom-=150px',
                        },
                    },
                )
                gsap.fromTo(
                    $refs.feature_2,
                    {
                        autoAlpha: 0,
                        x: 20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                        scrollTrigger: {
                            trigger: $refs.feature_2,
                            start: 'top bottom-=150px',
                        },
                    },
                )
                gsap.fromTo(
                    $refs.feature_3,
                    {
                        autoAlpha: 0,
                        x: -20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                        scrollTrigger: {
                            trigger: $refs.feature_3,
                            start: 'top bottom-=150px',
                        },
                    },
                )
                gsap.fromTo(
                    $refs.feature_4,
                    {
                        autoAlpha: 0,
                        x: 20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                        scrollTrigger: {
                            trigger: $refs.feature_4,
                            start: 'top bottom-=150px',
                        },
                    },
                )
                gsap.fromTo(
                    $refs.feature_5,
                    {
                        autoAlpha: 0,
                        x: -20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                        scrollTrigger: {
                            trigger: $refs.feature_5,
                            start: 'top bottom-=150px',
                        },
                    },
                )
                gsap.to($refs.geometric_shape_1, {
                    yPercent: -100,
                    rotate: 100,
                    scrollTrigger: {
                        trigger: $refs.feature_1,
                        scrub: 1.5,
                        start: 'top bottom-=200px',
                        end: 'bottom+=300px center',
                    },
                })
                gsap.to($refs.geometric_shape_2, {
                    yPercent: -100,
                    xPercent: -50,
                    rotate: 180,
                    scrollTrigger: {
                        trigger: $refs.feature_2,
                        scrub: 1.5,
                        start: 'top bottom-=200px',
                        end: 'bottom+=300px center',
                    },
                })
                gsap.to($refs.geometric_shape_3, {
                    yPercent: -100,
                    xPercent: -30,
                    rotate: 100,
                    scrollTrigger: {
                        trigger: $refs.feature_3,
                        scrub: 1.5,
                        start: 'top bottom-=200px',
                        end: 'bottom+=300px center',
                    },
                })
                gsap.to($refs.geometric_shape_4, {
                    yPercent: -100,
                    xPercent: -30,
                    rotate: 100,
                    scrollTrigger: {
                        trigger: $refs.feature_4,
                        scrub: 1.5,
                        start: 'top bottom-=200px',
                        end: 'bottom+=300px center',
                    },
                })
                gsap.to($refs.geometric_shape_5, {
                    yPercent: -100,
                    xPercent: -50,
                    rotate: 100,
                    scrollTrigger: {
                        trigger: $refs.feature_5,
                        scrub: 1.5,
                        start: 'top bottom-=200px',
                        end: 'bottom+=300px center',
                    },
                })
            })
        "
    >
        <div
            x-ref="header"
            class="text-center"
        >
            <div
                x-ref="header_introducing"
                class="font-medium text-dolphin"
            >
                Introducing some
            </div>
            <div class="pt-2 text-2xl sm:text-3xl">
                <span
                    x-ref="header_new"
                    class="inline-block"
                >
                    New
                </span>
                <span
                    x-ref="header_version4"
                    class="inline-block font-black"
                >
                    Version 4
                </span>
                <span
                    x-ref="header_features"
                    class="inline-block"
                >
                    Features!
                </span>
            </div>
        </div>

        <div
            x-ref="features"
            class="space-y-32 pt-20"
        >
            {{-- Feature 1 --}}
            <div
                x-ref="feature_1"
                class="relative flex flex-wrap items-center justify-around gap-10 lg:justify-center lg:gap-x-32"
            >
                <div class="absolute -left-10 top-40 hidden lg:block">
                    <img
                        x-ref="geometric_shape_5"
                        src="{{ Vite::asset('resources/images/home/geometric-shape-5.webp') }}"
                        alt="Shape"
                        class="block w-14"
                    />
                </div>

                {{-- Screenshot --}}
                <div
                    class="relative h-80 w-full max-w-[23rem] shrink-0 overflow-hidden rounded-3xl bg-gradient-to-tl from-orange-400 to-orange-200 shadow-xl shadow-black/5"
                >
                    <div
                        class="absolute left-5 top-5 w-[30rem] overflow-hidden rounded-lg shadow-xl"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/features/panels.webp') }}"
                            alt="Multiple panels"
                            class="w-full"
                        />
                    </div>
                </div>

                {{-- Feature Notes --}}
                <div>
                    <div class="relative inline-block">
                        <img
                            src="{{ Vite::asset('resources/images/home/infinity.webp') }}"
                            alt="Infinity"
                            class="w-16"
                        />
                        <div
                            class="absolute -bottom-4 left-4 -z-10 h-7 w-7 rounded-full bg-black/50 blur-md"
                        ></div>
                    </div>
                    {{-- Title --}}
                    <div class="max-w-[15rem] pt-5 text-2xl font-bold">
                        Nested resources
                    </div>

                    {{-- Description --}}
                    <div class="max-w-xs pt-3 font-medium text-dolphin">
                        Deeply nested Filament resources now reflect their
                        hierarchy in URLs and breadcrumbs, letting you manage
                        child items (e.g., Lessons within Courses) contextually.
                    </div>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div
                x-ref="feature_2"
                class="relative flex flex-wrap items-center justify-around gap-10 lg:justify-center lg:gap-x-32"
            >
                <div class="absolute -right-16 top-40 hidden lg:block">
                    <img
                        x-ref="geometric_shape_3"
                        src="{{ Vite::asset('resources/images/home/geometric-shape-3.webp') }}"
                        alt="Shape"
                        class="block w-16"
                    />
                </div>

                {{-- Screenshot --}}
                <div
                    class="relative h-80 w-full max-w-[23rem] shrink-0 overflow-hidden rounded-3xl bg-gradient-to-tl from-orange-400 to-orange-200 shadow-xl shadow-black/5"
                >
                    <div
                        class="absolute left-5 top-5 w-[30rem] overflow-hidden rounded-lg shadow-xl"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/features/action-modals.webp') }}"
                            alt="Action modals"
                            class="w-full"
                        />
                    </div>
                </div>

                {{-- Feature Notes --}}
                <div>
                    <div class="relative inline-block">
                        <img
                            src="{{ Vite::asset('resources/images/home/cloud.webp') }}"
                            alt="Cloud"
                            class="w-20"
                        />
                        <div
                            class="absolute -bottom-4 left-4 -z-10 h-7 w-7 rounded-full bg-black/50 blur-md"
                        ></div>
                    </div>
                    {{-- Title --}}
                    <div class="max-w-[15rem] pt-5 text-2xl font-bold">
                        Improved performance
                    </div>

                    {{-- Description --}}
                    <div class="max-w-xs pt-3 font-medium text-dolphin">
                        Expect 2–3× faster rendering for tables, partial
                        component re‑rendering, and new methods to cut down on
                        server calls.
                    </div>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div
                x-ref="feature_3"
                class="relative flex flex-wrap items-center justify-around gap-10 lg:justify-center lg:gap-x-32"
            >
                <div class="absolute -left-5 top-40 hidden lg:block">
                    <img
                        x-ref="geometric_shape_2"
                        src="{{ Vite::asset('resources/images/home/geometric-shape-2.webp') }}"
                        alt="Shape"
                        class="block w-14"
                    />
                </div>

                {{-- Screenshot --}}
                <div
                    class="relative h-80 w-full max-w-[23rem] shrink-0 overflow-hidden rounded-3xl bg-gradient-to-tl from-orange-400 to-orange-200 shadow-xl shadow-black/5"
                >
                    <div
                        class="absolute left-5 top-5 w-[30rem] overflow-hidden rounded-lg shadow-xl"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/features/table-report.webp') }}"
                            alt="Table report"
                            class="w-full"
                        />
                    </div>
                </div>

                {{-- Feature Notes --}}
                <div>
                    <div class="relative inline-block">
                        <img
                            src="{{ Vite::asset('resources/images/home/report.webp') }}"
                            alt="Report"
                            class="w-16"
                        />
                        <div
                            class="absolute -bottom-4 left-4 -z-10 h-7 w-7 rounded-full bg-black/50 blur-md"
                        ></div>
                    </div>
                    {{-- Title --}}
                    <div class="max-w-[15rem] pt-5 text-2xl font-bold">
                        Tables with custom data
                    </div>

                    {{-- Description --}}
                    <div class="max-w-xs pt-3 font-medium text-dolphin">
                        Tables can now be populated from custom or external data
                        sources—such as arrays or APIs—without relying on
                        Eloquent models.
                    </div>
                </div>
            </div>

            {{-- Feature 4 --}}
            <div
                x-ref="feature_4"
                class="relative flex flex-wrap items-center justify-around gap-10 lg:justify-center lg:gap-x-32"
            >
                <div class="absolute -right-10 top-40 hidden lg:block">
                    <img
                        x-ref="geometric_shape_4"
                        src="{{ Vite::asset('resources/images/home/geometric-shape-4.webp') }}"
                        alt="Shape"
                        class="block w-12"
                    />
                </div>

                {{-- Screenshot --}}
                <div
                    class="relative h-80 w-full max-w-[23rem] shrink-0 overflow-hidden rounded-3xl bg-gradient-to-tl from-orange-400 to-orange-200 shadow-xl shadow-black/5"
                >
                    <div
                        class="absolute left-5 top-5 w-[30rem] overflow-hidden rounded-lg shadow-xl"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/features/infolist.webp') }}"
                            alt="Infolist"
                            class="w-full"
                        />
                    </div>
                </div>

                {{-- Feature Notes --}}
                <div>
                    <div class="relative inline-block">
                        <img
                            src="{{ Vite::asset('resources/images/home/featherpaper.webp') }}"
                            alt="Quill on paper"
                            class="w-16"
                        />
                        <div
                            class="absolute -bottom-4 left-4 -z-10 h-7 w-7 rounded-full bg-black/50 blur-md"
                        ></div>
                    </div>
                    {{-- Title --}}
                    <div class="max-w-[15rem] pt-5 text-2xl font-bold">
                        New Rich Editor
                    </div>

                    {{-- Description --}}
                    <div class="max-w-xs pt-3 font-medium text-dolphin">
                        The new TipTap‑based rich editor adds support for custom
                        blocks, merge tags, and temporary private image URLs for
                        more powerful content editing.
                    </div>
                </div>
            </div>

            {{-- Feature 5 --}}
            <div
                x-ref="feature_5"
                class="relative flex flex-wrap items-center justify-around gap-10 lg:justify-center lg:gap-x-32"
            >
                <div class="absolute bottom-0 left-0 hidden lg:block">
                    <img
                        x-ref="geometric_shape_6"
                        src="{{ Vite::asset('resources/images/home/geometric-shape-6.webp') }}"
                        alt="Shape"
                        class="block w-14"
                    />
                </div>

                {{-- Screenshot --}}
                <div
                    class="relative h-80 w-full max-w-[23rem] shrink-0 overflow-hidden rounded-3xl bg-gradient-to-tl from-orange-400 to-orange-200 shadow-xl shadow-black/5"
                >
                    <div
                        class="absolute left-5 top-5 w-[30rem] overflow-hidden rounded-lg shadow-xl"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/features/theme.webp') }}"
                            alt="Theme"
                            class="w-full"
                        />
                    </div>
                </div>

                {{-- Feature Notes --}}
                <div>
                    <div class="relative inline-block">
                        <img
                            src="{{ Vite::asset('resources/images/home/colorpalette.webp') }}"
                            alt="Color palette"
                            class="w-16"
                        />
                        <div
                            class="absolute -bottom-4 left-4 -z-10 h-7 w-7 rounded-full bg-black/50 blur-md"
                        ></div>
                    </div>
                    {{-- Title --}}
                    <div class="max-w-[15rem] pt-5 text-2xl font-bold">
                        Tailwind CSS v4
                    </div>

                    {{-- Description --}}
                    <div class="max-w-xs pt-3 font-medium text-dolphin">
                        Filament now adopts Tailwind CSS v4, which simplifies
                        the styling system and allows for easier style
                        customization and theme creation.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
