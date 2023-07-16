@php
    seo()
    ->title('Consulting')
    ->description('Looking for expert help with your Filament project? Schedule a consulting call with a Filament team member.')
@endphp

<x-layouts.app>
    <header
        class="relative mx-auto max-w-8xl overflow-hidden px-8 py-20 md:pb-32"
    >
        <div class="max-w-screen-sm space-y-12">
            <div class="space-y-4">
                <h1
                    class="font-heading text-4xl font-bold leading-tight text-gray-900 md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight"
                >
                    Get
                    <span class="text-primary-500">expert help</span>
                    from the Filament team.
                </h1>

                <h3 class="text-2xl text-gray-700 md:max-w-md lg:max-w-none">
                    If you're looking for dedicated help with your Filament
                    project, we're here for you. Schedule a consulting call with
                    one of our team members.
                </h3>
            </div>
        </div>

        <div class="absolute bottom-0 right-0 hidden md:block">
            <img
                src="{{ asset('images/bulb.svg') }}"
                alt="Bulb"
                class="h-[20rem] lg:h-[28rem]"
            />
        </div>
    </header>

    <section class="bg-gray-900">
        <div class="mx-auto max-w-7xl space-y-16 px-8 py-32">
            <h2 class="text-center font-heading text-4xl font-bold text-white">
                Choose your expert
            </h2>

            <div class="grid gap-16 md:grid-cols-3">
                <x-consultant
                    avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
                    name="Dan Harrin"
                    url="https://www.ringerhq.com/experts/danharrin"
                />

                <x-consultant
                    avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
                    name="Zep Fietje"
                    url="https://zepfietje.com/consult?ref=filamentphp.com"
                />

                <x-consultant
                    avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
                    name="Ryan Chandler"
                    url="https://www.ringerhq.com/experts/ryangjchandler"
                />
            </div>
        </div>
    </section>
</x-layouts.app>
