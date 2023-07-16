@php
    seo()
        ->title('Consulting')
        ->description('Looking for expert help with your Filament project? Schedule a consulting call with a Filament team member.')
@endphp

<x-layouts.app>
    <header class="relative overflow-hidden max-w-8xl mx-auto py-20 md:pb-32 px-8">
        <div class="space-y-12 max-w-screen-sm">
            <div class="space-y-4">
                <h1 class="font-heading font-bold text-gray-900 text-4xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight">
                    Get
                    <span class="text-primary-500">expert help</span>
                    from the Filament team.
                </h1>

                <h3 class="text-gray-700 text-2xl md:max-w-md lg:max-w-none">
                    If you're looking for dedicated help with your Filament project, we're here for you.
                    Schedule a consulting call with one of our team members.
                </h3>
            </div>
        </div>

        <div class="hidden absolute right-0 bottom-0 md:block">
            <img
                src="{{ asset('images/bulb.svg') }}"
                alt="Bulb"
                class="h-[20rem] lg:h-[28rem]"
            />
        </div>
    </header>

    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-8 py-32 space-y-16">
            <h2 class="font-heading font-bold text-white text-4xl text-center">
                Choose your expert
            </h2>

            <div class="grid md:grid-cols-3 gap-16">
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
