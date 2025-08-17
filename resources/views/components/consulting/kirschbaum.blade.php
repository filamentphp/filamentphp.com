<section
    x-cloak
    x-data="{}"
    id="kirschbaum"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
                $refs.kirschbaum,
                {
                    autoAlpha: 0,
                    x: 20,
                },
                {
                    autoAlpha: 1,
                    x: 0,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    class="mx-auto w-full max-w-5xl px-10 pt-10"
>
    <div
        x-ref="kirschbaum"
        class="rounded-xl bg-gradient-to-tr from-[#323544] to-[#6B6D92] p-10 text-white"
    >
        {{-- Title --}}
        <div class="text-lg font-medium">Official development agency</div>

        {{-- Logo --}}
        <div class="pt-5">
            <svg
                class="w-full fill-current sm:w-96"
                viewBox="0 0 126.98 18.53"
            >
                <path
                    d="M127 189l-6.31-7.82V189h-4v-17h4v6.91h.07l6.08-6.91H132l-7.32 7.83 7.75 9.16zM135.74 175.36a2.16 2.16 0 112.26-2.16 2.2 2.2 0 01-2.26 2.16zm-2 13.6V177h3.93v12zM148.58 180.23a3.63 3.63 0 00-1-.12 2.7 2.7 0 00-2.81 2.71V189h-3.94v-12h3.79v1.73a3.61 3.61 0 013.24-2.06 2.87 2.87 0 01.84.09zM157.37 180.54a3.75 3.75 0 00-2.5-1.08c-.74 0-1.49.26-1.49 1s.65.86 2.19 1.2c1.82.41 3.81 1.32 3.81 3.65 0 3-2.66 4.08-5.11 4.08a7.73 7.73 0 01-5.21-1.85l2.21-2.33a4.07 4.07 0 002.93 1.35c.65 0 1.41-.27 1.41-1s-.74-1-2.37-1.36-3.48-1.23-3.48-3.48c0-2.86 2.69-4 5-4a7.17 7.17 0 014.8 1.68zM169.9 180.88a2.74 2.74 0 00-2.09-1 3.06 3.06 0 102.18 5.23l2.18 2.66a6.46 6.46 0 01-4.41 1.54c-3.77 0-6.7-2.4-6.7-6.36s2.95-6.36 6.68-6.36a6.55 6.55 0 014.43 1.61zM181.61 189v-6.48c0-1.34-.34-2.52-1.76-2.52s-2.13 1.13-2.13 2.55V189h-3.94v-18.18h3.94v7.7h.05a3.87 3.87 0 013.43-1.84c3.24 0 4.37 2.49 4.37 4.89V189zM190.37 187.07V189h-1.64v-18.18h1.64v8.86a5.1 5.1 0 014.25-2.24 5.91 5.91 0 010 11.81 5.17 5.17 0 01-4.25-2.18zm4.12-8.26a4.53 4.53 0 000 9.05c2.72 0 4.25-2 4.25-4.51s-1.53-4.54-4.25-4.54zM209.85 181.72c0-1.95-1-2.91-3-2.91a4.77 4.77 0 00-3.33 1.32l-.91-1.08a6.28 6.28 0 014.41-1.61c2.43 0 4.37 1.35 4.37 4.08v4.93a15.28 15.28 0 00.19 2.51h-1.46a10.7 10.7 0 01-.17-1.82 4.51 4.51 0 01-4.08 2.11c-1.7 0-3.89-.91-3.89-3.41 0-3.45 3.82-3.76 7.92-3.76zm-.48 1.63c-2.66 0-5.76.29-5.76 2.42 0 1.61 1.37 2.14 2.64 2.14a3.5 3.5 0 003.6-3.72v-.84zM222.31 189c-.05-.59-.1-1.43-.1-1.92a4.39 4.39 0 01-3.84 2.21c-2.86 0-4.28-1.84-4.28-4.63v-6.89h1.64V184c0 2.35.69 3.93 3 3.93 1.73 0 3.41-1.39 3.41-4.39v-5.76h1.63v8.76c0 .6 0 1.71.1 2.47zM232 177.44a3.47 3.47 0 013.45 2.38 4.16 4.16 0 013.94-2.38c2.86 0 4.27 1.85 4.27 4.64V189H242v-6.21c0-2.35-.79-3.94-2.9-3.94-2.36 0-3.2 2.09-3.2 4.18v6h-1.63v-6.55c0-2.18-.53-3.6-2.71-3.6-1.56 0-3.27 1.39-3.27 4.39V189h-1.63v-8.8c0-.6 0-1.7-.09-2.47h1.56c0 .6.09 1.44.09 1.92a4.17 4.17 0 013.78-2.21z"
                    transform="translate(-116.64 -170.82)"
                ></path>
            </svg>
        </div>

        {{-- Description --}}
        <div class="pt-8 text-white/80">
            As Laravel experts, we get products and services to market quickly
            while anticipating the need to scale and change as business
            requirements evolve. The companies we work with appreciate our
            ability to work seamlessly with their technical and nontechnical
            teams.
        </div>

        {{-- Services --}}
        <div
            class="grid max-w-xl grid-cols-[repeat(auto-fill,minmax(15rem,1fr))] gap-x-20 gap-y-4 pt-10"
        >
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Technical Leadership</div>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Team Augmentation</div>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Support & Training</div>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Ground-up Development</div>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Code Review</div>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-2 w-2 rotate-45 rounded-sm bg-[#6D72DD]"></div>
                <div class="font-medium">Rescue Projects</div>
            </div>
        </div>

        {{-- Experts List --}}
        <div class="flex flex-wrap justify-between gap-10 pt-10">
            <a
                href="https://kirschbaumdevelopment.com/contact?ref=filamentphp.com"
                target="_blank"
                class="flex rounded-full bg-[#58597E] p-1.5 text-white shadow shadow-black/5 transition duration-300 hover:bg-[#6D72DD]"
            >
                <img
                    src="{{ Vite::asset('resources/images/consulting/kirschbaum/kirschbaum.webp') }}"
                    alt="Kirschbaum logo"
                    class="h-10 w-10 rounded-full ring-1 ring-white"
                    loading="lazy"
                />
                <div class="px-5 py-2">
                    <span class="inline-block">Contact</span>
                    <strong>Kirschbaum</strong>
                    <span class="hidden min-[530px]:inline-block">
                        About Your Project
                    </span>
                </div>
            </a>
            <div class="flex flex-wrap items-center gap-4">
                <div>and</div>
                <div class="flex items-center gap-3">
                    <div class="group/overlapping-experts flex">
                        <img
                            src="{{ Vite::asset('resources/images/consulting/kirschbaum/grant.webp') }}"
                            alt="Grant"
                            class="h-10 w-10 rounded-full bg-[#58597E] ring-1 ring-white"
                            loading="lazy"
                        />
                        <img
                            src="{{ Vite::asset('resources/images/consulting/kirschbaum/wilker.webp') }}"
                            alt="Wilker"
                            class="-ml-4 h-10 w-10 rounded-full bg-[#58597E] ring-1 ring-white transition-all duration-300 group-hover/overlapping-experts:-ml-2"
                            loading="lazy"
                        />
                        <img
                            src="{{ Vite::asset('resources/images/consulting/kirschbaum/derek.webp') }}"
                            alt="Derek"
                            class="-ml-4 h-10 w-10 rounded-full bg-[#58597E] ring-1 ring-white transition-all duration-300 group-hover/overlapping-experts:-ml-2"
                            loading="lazy"
                        />
                        <img
                            src="{{ Vite::asset('resources/images/consulting/kirschbaum/erin.webp') }}"
                            alt="Erin"
                            class="-ml-4 h-10 w-10 rounded-full bg-[#58597E] ring-1 ring-white transition-all duration-300 group-hover/overlapping-experts:-ml-2"
                            loading="lazy"
                        />
                        <img
                            src="{{ Vite::asset('resources/images/consulting/kirschbaum/babacar.webp') }}"
                            alt="Babacar"
                            class="-ml-4 h-10 w-10 rounded-full bg-[#58597E] ring-1 ring-white transition-all duration-300 group-hover/overlapping-experts:-ml-2"
                            loading="lazy"
                        />
                    </div>
                </div>
                <div>
                    <div class="text-2xl font-black">30+</div>
                    <div class="text-xs">Other Laravel Experts</div>
                </div>
            </div>
        </div>
    </div>
</section>
