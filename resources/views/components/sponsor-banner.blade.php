@props([
    'logos' => null,
])

<section
    {{ $attributes->class(['bg-rose-400 bg-cover bg-center']) }}
    style="background-image: url(/images/backgrounds/rose-tornado.svg)"
>
    <div class="relative mx-auto max-w-7xl px-8 py-16 text-center">
        <h2 class="font-heading text-4xl text-rose-50">Sponsoring our work</h2>

        <p class="mt-8 text-xl text-rose-50">
            Filament is
            <strong>open source</strong>
            at heart. Our sponsors fund
            <strong>new features</strong>
            ,
            <strong>bug fixes</strong>
            , and our
            <strong>community support</strong>
            .
        </p>

        <a
            href="https://github.com/sponsors/danharrin"
            target="_blank"
            class="group mt-8 inline-flex h-11 items-center justify-center rounded-lg px-6 text-lg font-semibold tracking-tight text-rose-50 ring-2 ring-inset ring-rose-50 transition hover:bg-primary-200 hover:text-rose-500 hover:ring-primary-200 focus:bg-primary-200 focus:text-rose-500 focus:outline-none focus:ring-primary-200 sm:text-xl"
        >
            Sponsor Filament on GitHub

            <x-heroicon-o-heart
                class="-mr-3 ml-2 h-7 w-7 transition-all group-hover:scale-125"
            />
        </a>

        @if ($logos)
            <div class="mb-4 mt-16 flex flex-wrap justify-around gap-8">
                {{ $logos }}
            </div>
        @endif

        <img
            src="/images/heart.svg"
            alt="Heart"
            class="absolute right-12 top-12 hidden h-8 h-8 scale-x-[-1] text-white sm:block"
        />
    </div>
</section>
