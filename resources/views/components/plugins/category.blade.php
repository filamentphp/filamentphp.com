<div
    x-on:click="
        selectedCategories.has('{{ $slug }}')
            ? selectedCategories.delete('{{ $slug }}')
            : selectedCategories.add('{{ $slug }}')
    "
    class="inline-block select-none py-1 transition duration-300 ease-out will-change-transform hover:-translate-y-0.5 sm:hover:translate-x-1.5 sm:hover:translate-y-0"
>
    <div
        class="inline-flex cursor-pointer items-center gap-4 rounded-full py-1.5 pl-1.5 pr-6 shadow-lg shadow-black/[0.02] transition duration-200 ease-out"
        :class="{
            'bg-fair-pink': selectedCategories.has('{{ $slug }}'),
            'bg-white': !selectedCategories.has('{{ $slug }}'),
        }"
    >
        {{-- Icon --}}
        <div
            class="grid h-8 w-8 place-items-center rounded-full transition duration-200 ease-out"
            :class="{
            'bg-salmon text-white': selectedCategories.has('{{ $slug }}'),
            'bg-dawn-pink text-hurricane': !selectedCategories.has('{{ $slug }}'),
        }"
        >
            {{ $icon }}
        </div>

        {{-- Category Name --}}
        <div
            class="truncate text-sm transition duration-200 ease-out"
            :class="{
            'text-salmon': selectedCategories.has('{{ $slug }}'),
            'text-hurricane': !selectedCategories.has('{{ $slug }}'),
        }"
        >
            {{ $name }}
        </div>
    </div>
</div>
