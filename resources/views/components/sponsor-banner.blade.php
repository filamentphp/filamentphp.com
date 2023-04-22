@props([
    'logos' => null,
])

<section {{ $attributes->class(['bg-rose-400 bg-cover bg-center']) }} style="background-image: url({{ asset('images/backgrounds/rose-tornado.svg') }})">
    <div class="relative px-8 py-16 mx-auto text-center max-w-7xl">
        <h2 class="text-4xl font-heading text-rose-50">
            Sponsoring our work
        </h2>

        <p class="mt-8 text-xl text-rose-50">
            Filament is <strong>open source</strong> at heart. Our sponsors fund <strong>new features</strong>, <strong>bug fixes</strong>, and our <strong>community support</strong>.
        </p>

        <a
            href="https://github.com/sponsors/danharrin"
            target="_blank"
            class="inline-flex items-center justify-center px-6 mt-8 text-lg font-semibold tracking-tight transition rounded-lg group sm:text-xl text-rose-50 h-11 ring-2 ring-inset ring-rose-50 hover:bg-primary-200 hover:text-rose-500 hover:ring-primary-200 focus:ring-primary-200 focus:text-rose-500 focus:bg-primary-200 focus:outline-none"
        >
            Sponsor Filament on GitHub

            <x-heroicon-o-heart class="transition-all -me-3 ms-2 w-7 h-7 group-hover:scale-125" />
        </a>

        @if ($logos)
            <div class="flex flex-wrap justify-around gap-8 mt-16 mb-4">
                {{ $logos }}
            </div>
        @endif

        <img
            src="{{ asset('images/heart.svg') }}"
            alt="Heart"
            class="absolute top-12 end-12 scale-x-[-1] h-8 hidden text-white sm:block"
        />
    </div>
</section>
