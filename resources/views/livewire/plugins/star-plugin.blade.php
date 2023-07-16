<div>
    <button
        wire:click="toggleStar"
        type="button"
        class="flex select-none items-center gap-2.5 rounded-lg bg-fair-pink bg-white py-2.5 pl-5 pr-6 text-center text-sm font-medium text-evening shadow-lg shadow-black/[0.01] transition duration-300 hover:-translate-y-0.5 hover:bg-white/80"
    >
        <svg
            class="w-[1.1rem] text-peach-orange"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <path
                fill="currentColor"
                d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
            />
        </svg>

        <div>
            {{ $this->isStarred() ? 'Unstar' : 'Star' }}
            {{ $plugin->getStarsCount() }}
        </div>
    </button>
</div>
