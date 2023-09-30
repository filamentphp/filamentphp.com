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
    class="mx-auto w-full max-w-5xl px-5 pt-20"
>
    {{-- Header --}}
    <div class="mx-auto max-w-3xl text-center">
        {{-- Title --}}
        <div class="text-3xl font-bold">
            Comprised of pre-built full stack components that are versatile
            enough for many use cases
        </div>

        {{-- Subtitle --}}
        <div class="pt-6 text-xl font-medium text-dolphin">
            Fully featured, simply intuitive and insanely attractive.
        </div>
    </div>

    {{-- Components List --}}
    <div class="space-y-14 pt-12">
        <div
            class="aspect-[1.3/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-5 text-center ring-1 ring-dawn-pink min-[500px]:aspect-[1.5/1] md:aspect-[2.1/1] md:p-10"
        >
            {{-- Name --}}
            <div class="text-2xl font-extrabold text-evening">
                Panel Builder
            </div>

            {{-- Description --}}
            <div class="pt-3 font-medium text-dolphin">
                Build a Laravel admin panel, customer-facing app, SaaS, or
                anything you can imagine!
            </div>

            {{-- Image --}}
            <div class="px-3 pt-8">
                <img
                    src="{{ Vite::asset('resources/images/home/filament-demo.webp') }}"
                    alt="Filament demo"
                    class="w-full rounded-xl"
                />
            </div>
        </div>
        <div class="grid grid-cols-[repeat(auto-fill,minmax(30rem,1fr))]">
            <div
                class="aspect-[1.3/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-5 ring-1 ring-dawn-pink md:p-10"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">
                    Form Builder
                </div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Easily build stunning Livewire-powered forms with over 25
                    components out of the box.
                </div>

                {{-- Image --}}
                <div class="w-[200%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/packages/app/form-builder.webp') }}"
                        alt="Filament Form Builder"
                        class="w-[200%] rounded-xl"
                    />
                </div>
            </div>
        </div>
    </div>
</section>
