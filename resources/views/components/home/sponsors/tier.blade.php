@props([
    'heading',
])

<section class="mx-auto grid w-full max-w-xl">
    <h3 class="text-2xl font-semibold">{{ $heading }}</h3>

    <div class="mt-6 flex flex-wrap gap-8">
        {{ $slot }}
    </div>
</section>
