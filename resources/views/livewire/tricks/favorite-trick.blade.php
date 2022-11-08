<button
    wire:click="toggleFavorite"
    type="button"
    class="group flex items-center gap-2"
>
    <dt>
        <x-heroicon-o-star class="w-5 h-5 text-amber-500" />
    </dt>

    <dd class="font-medium">
        <span class="group-hover:hidden">
            {{ $trick->favorites ?: 0 }} {{ str('favorite')->plural($trick->favorites) }}
        </span>

        <span
            @class([
                'hidden group-hover:inline group-hover:underline',
                'text-danger-600' => $trick->isFavorite(),
            ])
        >
            {{ $trick->isFavorite() ? 'Remove from favorites' : 'Favorite this trick' }}
        </span>
    </dd>
</button>
