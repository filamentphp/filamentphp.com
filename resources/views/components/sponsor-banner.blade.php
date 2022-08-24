@props([
    'logos' => null,
])

<section {{ $attributes->class(['bg-rose-400 bg-cover bg-center']) }} style="background-image: url(/images/backgrounds/rose-tornado.svg)">
    <div class="max-w-7xl relative text-center mx-auto px-8 py-16">
        <h2 class="font-heading text-rose-50 text-4xl">
            Sponsoring our work
        </h2>

        <p class="mt-8 text-xl text-rose-50">
            Filament is <strong>open source</strong> at heart. Our sponsors fund <strong>new features</strong>, <strong>bug fixes</strong>, and our <strong>community support</strong>.
        </p>

        <a
            href="https://github.com/sponsors/danharrin"
            target="_blank"
            class="mt-8 group inline-flex items-center justify-center px-6 text-lg sm:text-xl font-semibold tracking-tight text-rose-50 transition rounded-lg h-11 ring-2 ring-inset ring-rose-50 hover:bg-primary-200 hover:text-rose-500 hover:ring-primary-200 focus:ring-primary-200 focus:text-rose-500 focus:bg-primary-200 focus:outline-none"
        >
            Sponsor Filament on GitHub

            <x-heroicon-o-heart class="ml-2 -mr-3 w-7 h-7 transition-all group-hover:scale-125" />
        </a>

        @if ($logos)
            <div class="mt-16 mb-8 flex flex-wrap justify-around gap-8">
                {{ $logos }}
            </div>
        @endif

        <img
            src="/images/heart.svg"
            alt="Heart"
            class="absolute top-12 right-12 scale-x-[-1] h-8 h-8 hidden text-white sm:block"
        />
    </div>
</section>
