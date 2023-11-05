@props([
    'avatar',
    'name',
    'title',
])

<div
    x-data="{
        book_is_hovered: false,
    }"
    class="flex flex-col items-center rounded-xl bg-merino/50 p-7 text-center"
>
    {{-- Avatar --}}
    <img
        src="{{ $avatar }}"
        alt="{{ $name }}"
        height="144"
        width="144"
        class="aspect-square w-28 rounded-full transition duration-300 lg:w-36"
        :class="{
                'scale-105': book_is_hovered,
            }"
        loading="lazy"
    />
    {{-- Information --}}
    <div
        class="pt-5 transition duration-300"
        :class="{
            'translate-x-1': book_is_hovered,
        }"
    >
        {{-- Name --}}
        <div class="text-2xl font-bold lg:text-3xl">
            {{ $name }}
        </div>

        {{-- Title --}}
        <div class="pt-1 text-base font-medium text-dolphin lg:text-lg">
            {{ $title }}
        </div>

        {{-- Divider --}}
        <div
            class="mx-auto my-4 h-px w-full max-w-[23rem] rounded-full bg-dolphin/20"
        ></div>

        {{-- Description --}}
        <div
            class="prose px-3 text-dolphin prose-a:text-burnt-dolphin prose-strong:text-burnt-dolphin"
        >
            {{ $slot }}
        </div>
    </div>
</div>
