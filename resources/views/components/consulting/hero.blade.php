<section
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-6xl px-10 pt-20"
>
    {{-- Header --}}
    <div class="flex flex-wrap-reverse md:flex-nowrap items-center justify-start md:justify-between gap-y-10 gap-x-20">
        <div>
            {{-- Title --}}
            <div
                class="text-5xl font-black"
                x-ref="consulting"
            >
                Consulting
            </div>
            {{-- Message --}}
            <div
                x-ref="message"
                class="max-w-lg pt-10 text-lg font-medium text-dolphin"
            >
                If you're looking for dedicated help with your Filament project,
                we're here for you. Schedule a consulting call with one of our
                team members.
            </div>
        </div>

        {{-- Phone Illustration --}}
        <img
            x-ref="phone"
            src="{{ Vite::asset('resources/images/consulting/phone.webp') }}"
            alt=""
            class="block w-40 md:w-60"
        />
    </div>
</section>
