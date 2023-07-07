<div
    x-on:click="
        selectedCategory.has('{{ $category }}')
            ? selectedCategory.delete('{{ $category }}')
            : selectedCategory.add('{{ $category }}')
    "
    class="select-none py-1 transition duration-300 ease-out will-change-transform hover:translate-x-1.5"
>
    <div
        class="inline-flex cursor-pointer items-center gap-4 rounded-full py-1.5 pl-1.5 pr-6 shadow-lg shadow-black/[0.02] transition duration-200 ease-out"
        :class="{
            'bg-fair-pink': selectedCategory.has('{{ $category }}'),
            'bg-white': !selectedCategory.has('{{ $category }}'),
        }"
    >
        <div
            class="grid h-8 w-8 place-items-center rounded-full transition duration-200 ease-out"
            :class="{
            'bg-salmon text-white': selectedCategory.has('{{ $category }}'),
            'bg-dawn-pink text-hurricane': !selectedCategory.has('{{ $category }}'),
        }"
        >
            {{ $icon }}
        </div>
        <div
            class="text-sm transition duration-200 ease-out"
            :class="{
            'text-salmon': selectedCategory.has('{{ $category }}'),
            'text-hurricane': !selectedCategory.has('{{ $category }}'),
        }"
        >
            {{ $category }}
        </div>
    </div>
</div>
