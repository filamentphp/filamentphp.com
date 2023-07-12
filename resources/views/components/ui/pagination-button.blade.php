<div
    class="mx-0.5 flex h-[36px] min-w-[36px] cursor-pointer select-none items-center justify-center rounded-xl text-sm text-zinc-700 transition-all duration-300 active:scale-90"
    :class="{
        'bg-zinc-100 hover:bg-zinc-200' : ! whiteBackground,
        'bg-white shadow-lg shadow-black/5 hover:bg-zinc-300/70' : whiteBackground,
    }"
    x-text="page.number ?? page"
    x-on:click="currentPage = page.number ?? page"
></div>
