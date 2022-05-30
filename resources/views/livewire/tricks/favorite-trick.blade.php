<button
    wire:click="toggleFavorite"
    type="button"
    class="group inline-flex items-center gap-1 transition hover:font-medium hover:scale-105"
>
    <span class="transition group-hover:hidden">
        {{ $trick->favorites ?: 0 }} {{ str('favorite')->plural($trick->favorites) }}
    </span>

    <span class="hidden transition group-hover:inline">
        {{ $trick->isFavorite() ? '😴 Remove from favorites' : '🎉 Favorite this trick' }}
    </span>

    <x-heroicon-s-star class="w-3 h-3 text-yellow-500 transition group-hover:hidden" />
</button>
