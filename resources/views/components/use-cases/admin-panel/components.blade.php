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
        <img
            src="{{ Vite::asset('resources/images/use-cases/admin-panel/components-3d.webp') }}"
            alt=""
            class="mx-auto w-44"
        />

        {{-- Title --}}
        <div
            class="pt-8 text-2xl font-extrabold sm:text-3xl"
            style="text-wrap: balance"
        >
            Our components are versatile, customizable, and a great fit for your
            next project.
        </div>

        {{-- Subtitle --}}
        <div
            class="pt-4 text-lg font-semibold text-dolphin sm:text-xl"
            style="text-wrap: balance"
        >
            Fully featured, simply intuitive and insanely attractive: the
            ultimate Livewire admin panel.
        </div>
    </div>

    {{-- Components List --}}
    <div class="space-y-12 pt-12">
        {{-- <div --}}
        {{-- class="aspect-[1.3/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 text-center shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink min-[500px]:aspect-[1.5/1] md:aspect-[2.1/1]" --}}
        {{-- > --}}
        {{--  --}}
        {{-- Name --}}
        {{-- <div class="text-2xl font-extrabold text-evening"> --}}
        {{-- Panel Builder --}}
        {{-- </div> --}}

        {{--  --}}
        {{-- Description --}}
        {{-- <div class="pt-3 font-medium text-dolphin"> --}}
        {{-- Build a Laravel admin panel, customer-facing app, SaaS, or --}}
        {{-- anything you can imagine! --}}
        {{-- </div> --}}

        {{--  --}}
        {{-- Image --}}
        {{-- <div class="px-3 pt-8"> --}}
        {{-- <img --}}
        {{-- src="{{ Vite::asset('resources/images/home/filament-demo.webp') }}" --}}
        {{-- alt="Filament demo" --}}
        {{-- class="w-full rounded-xl" --}}
        {{-- /> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <div class="grid gap-12 md:grid-cols-2">
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
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
                <div class="w-[150%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/form-builder.webp') }}"
                        alt="Filament Form Builder"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">
                    Table Builder
                </div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Craft beautiful, optimized, and interactive Livewire-powered
                    data tables for any situation.
                </div>

                {{-- Image --}}
                <div class="w-[155%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/table-builder.webp') }}"
                        alt="Filament Table Builder"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">
                    Notifications
                </div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Notify your users of important events by delivering
                    real-time messages using Livewire.
                </div>

                {{-- Image --}}
                <div class="w-[130%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/notifications.webp') }}"
                        alt="Filament Notifications"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">Actions</div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Open interactive modals & slide-overs. a great way to keep
                    the user in the flow of the application.
                </div>

                {{-- Image --}}
                <div class="w-[120%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/actions.webp') }}"
                        alt="Filament Actions"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">
                    Infolist Builder
                </div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Display read-only information to users about a particular
                    record, with a fully flexible layout.
                </div>

                {{-- Image --}}
                <div class="w-[140%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/infolist-builder.webp') }}"
                        alt="Filament Infolist Builder"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
            <div
                class="aspect-[1.2/1] overflow-hidden rounded-2xl bg-gradient-to-tr from-[#F2E7DD] to-[#F1F4FF] p-10 shadow-lg shadow-black/[0.04] ring-1 ring-dawn-pink"
            >
                {{-- Name --}}
                <div class="text-2xl font-extrabold text-evening">Widgets</div>

                {{-- Description --}}
                <div class="pt-3 font-medium text-dolphin">
                    Build a dashboard for your application, complete with
                    real-time charts and stats.
                </div>

                {{-- Image --}}
                <div class="w-[140%] px-3 pt-8">
                    <img
                        src="{{ Vite::asset('resources/images/use-cases/admin-panel/widgets.webp') }}"
                        alt="Filament Widgets"
                        class="w-full rounded-xl"
                    />
                </div>
            </div>
        </div>
    </div>
</section>
