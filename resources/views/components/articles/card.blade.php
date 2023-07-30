<a
    x-bind:href="'/community/' + article.slug"
    class="rounded-2xl bg-white p-3 shadow-lg shadow-hurricane/5 transition duration-300 will-change-transform hover:-translate-y-1 hover:shadow-xl hover:shadow-hurricane/10"
>
    <div class="px-1.5 pb-1 pt-2.5">
        <div class="flex flex-wrap items-center justify-between gap-5">
            <div
                class="flex select-none items-center justify-center gap-2 rounded-full py-2.5 pl-4 pr-5 text-xs"
                x-bind:class="{
                    'bg-amber-100/80 text-amber-700': types[article.type].color === 'amber',
                    'bg-blue-100/80 text-blue-700': types[article.type].color === 'blue',
                    'bg-violet-100/80 text-violet-700': types[article.type].color === 'violet',
                }"
            >
                {{-- Type Icon --}}
                <div
                    x-html="types[article.type].icon"
                    class="-my-4"
                    x-bind:class="{
                        'text-amber-500': types[article.type].color === 'amber',
                        'text-blue-500': types[article.type].color === 'blue',
                        'text-violet-500': types[article.type].color === 'violet',
                    }"
                ></div>
                {{-- Type Name --}}
                <div x-text="types[article.type].name"></div>
            </div>

            {{-- Stars --}}
            <div class="flex items-center gap-1.5 pr-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="text-peach-orange"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="currentColor"
                        d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                    />
                </svg>
                <div
                    class="pt-0.5 text-sm font-medium text-dolphin"
                    x-text="article.stars_count"
                ></div>
            </div>
        </div>

        {{-- Title --}}
        <div
            x-text="article.title"
            class="line-clamp-2 pt-3.5 text-base font-medium text-evening"
        ></div>

        {{-- Author --}}
        <div class="flex items-center gap-3 pt-3.5">
            <div class="h-9 w-9 shrink-0 overflow-hidden rounded-full">
                <template x-if="article.author.avatar">
                    <div
                        x-bind:style="'background-image: url(' + article.author.avatar + ')'"
                        class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                    ></div>
                </template>
                <template x-if="! article.author.avatar">
                    <div
                        class="grid h-full w-full place-items-center bg-fair-pink text-salmon/50"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="22"
                            height="22"
                            viewBox="0 0 24 24"
                        >
                            <g fill="currentColor">
                                <circle
                                    cx="12"
                                    cy="6"
                                    r="4"
                                />
                                <path
                                    d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z"
                                />
                            </g>
                        </svg>
                    </div>
                </template>
            </div>
            <div class="space-y-0.5 text-xs">
                <div
                    class="font-semibold capitalize"
                    x-text="article.author.name"
                ></div>
                <div
                    class="text-dolphin/80"
                    x-text="article.publish_date"
                ></div>
            </div>
        </div>

        {{-- Categories --}}
        <div class="flex flex-wrap gap-x-2.5 gap-y-3 pt-4">
            <template
                x-for="category in article.categories"
                :key="category"
            >
                <div
                    class="rounded-full bg-slate-100 px-5 py-2.5 text-xs"
                    x-text="categories[category].name"
                ></div>
            </template>
        </div>
    </div>
</a>
