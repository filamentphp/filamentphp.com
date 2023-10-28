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
    class="mx-auto w-full max-w-6xl px-5 pt-40"
>
    <div class="relative grid min-h-[55rem] lg:min-h-full">
        <div class="relative z-50 self-center [grid-area:1/-1]">
            {{-- Title --}}
            <div class="grid place-items-center text-center">
                <div class="text-3xl font-extrabold">
                    Plugins, plugins, plugins...
                </div>
                <div
                    class="pt-3 text-lg font-medium text-dolphin"
                    style="text-wrap: balance"
                >
                    Filament has an extensive ecosystem of official and third
                    party plugins, which are easily installable as Composer
                    packages
                </div>
            </div>

            {{-- Plugins --}}
            <div
                class="grid grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] gap-6 pt-20"
            >
                @foreach ($plugins as $plugin)
                    <div
                        x-data="{ plugin: @js([...$plugin->getDataArray(), 'stars_count' => $pluginStars[$plugin->getKey()] ?? 0]) }"
                    >
                        <x-plugins.card />
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Link --}}
        <div class="grid place-items-center pt-7">
            <a
                href="{{ route('plugins') }}"
                class="rounded-full bg-[#ffba86] px-7 py-3 text-white transition duration-300 hover:bg-[#ffba86]/80"
            >
                View all Plugins
            </a>
        </div>
    </div>
</section>
