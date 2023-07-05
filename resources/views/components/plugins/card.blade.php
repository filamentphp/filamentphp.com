<div class="rounded-2xl bg-white p-3 shadow-lg shadow-hurricane/5">
    <img
        src="{{ Vite::asset('resources/images/home/imageplaceholder.webp') }}"
        x-bind:alt="plugin.name"
        class="aspect-[3/2] w-full rounded-xl ring-1 ring-dawn-pink"
    />
    <div class="px-1.5 pt-2">
        <div
            x-text="plugin.name"
            class="truncate font-semibold"
        ></div>
        <div
            x-text="plugin.description"
            class="text-sm text-rum"
        ></div>
    </div>
</div>
