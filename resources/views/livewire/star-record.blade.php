<div
    x-data="{
        isStarred: @entangle('isStarred'),
        starsCount: @entangle('starsCount'),

        delayedStarsCount: {{ $record->getStarsCount() }},
    }"
    x-init="
        () => {
            $watch('starsCount', (value) => {
                setTimeout(() => {
                    delayedStarsCount = value
                }, 180)
            })
        }
    "
>
    <button
        wire:click="toggleStar"
        type="button"
        class="group/star-button flex h-10 select-none rounded-lg bg-fair-pink bg-white text-center text-sm font-medium text-evening shadow-lg shadow-black/[0.01] transition duration-300 hover:-translate-y-0.5 hover:bg-white/80"
    >
        <div class="flex h-full items-center gap-3 pl-4">
            <svg
                class="w-[1.2rem] transition duration-200"
                :class="{
                    'text-butter': isStarred,
                    'text-peach-orange group-hover/star-button:text-butter translate-x-2 rotate-[71deg]': ! isStarred,
                }"
                viewBox="0 0 24 24"
                aria-hidden="true"
            >
                <path
                    fill="currentColor"
                    d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                />
            </svg>
            <div class="flex w-[3.4rem]">
                <span
                    class="transition duration-200"
                    :class="{
                        'translate-x-2': ! isStarred,
                    }"
                >
                    Star
                </span>
                <span
                    class="transition duration-200"
                    :class="{
                        'translate-y-0': isStarred,
                        'opacity-0 translate-y-2': !isStarred,
                    }"
                >
                    red
                </span>
            </div>
        </div>
        <div class="ml-3 h-full w-full border-l border-dawn-pink px-3.5">
            <div
                class="relative top-2.5 grid h-5 w-full min-w-[1rem] overflow-y-hidden text-center font-medium transition"
            >
                {{-- Will Go Down --}}
                <div
                    class="self-center justify-self-center transition duration-[400ms] [grid-area:1/-1]"
                    x-text="delayedStarsCount"
                    :class="{
                        'translate-y-full opacity-0': isStarred,
                        'opacity-100': !isStarred,
                    }"
                ></div>

                {{-- Will Go Up --}}
                <div
                    class="self-center justify-self-center transition duration-[400ms] [grid-area:1/-1]"
                    x-text="delayedStarsCount"
                    :class="{
                        '-translate-y-full opacity-0': !isStarred,
                        'opacity-100': isStarred,
                    }"
                ></div>
            </div>
        </div>
    </button>
</div>
