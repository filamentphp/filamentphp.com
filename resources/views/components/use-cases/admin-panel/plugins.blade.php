<section
    x-cloak
    x-data
    x-ref="section"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
                $refs.section,
                {
                    autoAlpha: 0,
                },
                {
                    autoAlpha: 1,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    class="mx-auto w-full max-w-5xl px-5 pt-40"
>
    <div class="relative grid min-h-[55rem] lg:min-h-full">
        <div class="relative z-50 self-center [grid-area:1/-1]">
            {{-- Title --}}
            <div class="grid place-items-center text-center">
                <div class="text-3xl font-extrabold">Plugins Ecosystem</div>
                <div class="pt-3 text-lg font-medium text-dolphin">
                    Extensive plugin ecosystem which encourages extension of the
                    core features.
                </div>
            </div>

            {{-- Link --}}
            <div class="grid place-items-center pt-7">
                <a
                    href="{{ route('plugins') }}"
                    class="rounded-full bg-[#ffba86] px-7 py-3 text-white transition duration-300 hover:bg-[#ffba86]/80"
                >
                    View Plugins
                </a>
            </div>

            {{-- Plugin Categories --}}
            <div
                class="grid grid-cols-[repeat(auto-fill,minmax(10rem,1fr))] gap-x-10 gap-y-14 pt-20"
            >
                @foreach ($pluginsCategories as $category)
                    <x-use-cases.admin-panel.plugin-category
                        :name="$category->name"
                        :slug="$category->slug"
                    >
                        <x-slot name="icon">
                            {!! $category->getIcon() !!}
                        </x-slot>
                    </x-use-cases.admin-panel.plugin-category>
                @endforeach
            </div>
        </div>

        {{-- Circles --}}
        <div
            class="absolute right-1/2 grid translate-x-1/2 [grid-area:1/-1] lg:relative lg:h-full lg:w-full"
        >
            {{-- Biggest Cicle --}}
            <div
                class="h-[60rem] w-[60rem] self-center justify-self-center rounded-full bg-[#FFEBDB]/20 ring-1 ring-[#FF9E51]/10 [grid-area:1/-1]"
            ></div>
            {{-- Outer Cicle --}}
            <div
                class="h-[50rem] w-[50rem] self-center justify-self-center rounded-full bg-[#FFEBDB]/40 ring-1 ring-[#FF9E51]/10 [grid-area:1/-1]"
            ></div>
            {{-- Middle Cicle --}}
            <div
                class="h-[40rem] w-[40rem] self-center justify-self-center rounded-full bg-[#FFEBDB]/60 ring-1 ring-[#FF9E51]/10 [grid-area:1/-1]"
            ></div>
            {{-- Inner Cicle --}}
            <div
                class="h-[30rem] w-[30rem] self-center justify-self-center rounded-full bg-[#FFEBDB] ring-1 ring-[#FF9E51]/10 [grid-area:1/-1]"
            ></div>
        </div>
    </div>
</section>
