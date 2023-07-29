<a
    x-bind:href="'/articles/' + record.slug"
    class="rounded-2xl bg-white p-3 shadow-lg shadow-hurricane/5 transition duration-300 will-change-transform hover:-translate-y-1 hover:shadow-xl hover:shadow-hurricane/10"
>
    <div class="px-1.5 pb-1 pt-2.5">
        <div class="flex flex-wrap items-center justify-between gap-5">
            {{-- Type --}}
            <div
                class="flex items-center justify-center gap-2 rounded-full py-1.5 pl-3.5 pr-[1.1rem] text-sm"
                x-bind:class="{
                    'bg-violet-100/80 text-violet-700': record.type === 'Trick',
                    'bg-[#D4FFF0] text-[#4BA284]': record.type === 'Article',
                }"
            >
                {{-- Stars --}}
                <svg
                    x-show="record.type === 'Trick'"
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    class="text-violet-500"
                >
                    <path
                        fill="currentColor"
                        d="m9 4l2.5 5.5L17 12l-5.5 2.5L9 20l-2.5-5.5L1 12l5.5-2.5L9 4m0 4.83L8 11l-2.17 1L8 13l1 2.17L10 13l2.17-1L10 11L9 8.83M19 9l-1.26-2.74L15 5l2.74-1.25L19 1l1.25 2.75L23 5l-2.75 1.26L19 9m0 14l-1.26-2.74L15 19l2.74-1.25L19 15l1.25 2.75L23 19l-2.75 1.26L19 23Z"
                    />
                </svg>

                {{-- Article --}}
                <svg
                    x-show="record.type === 'Article'"
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 28 28"
                    class="text-[#47C6A0]"
                >
                    <path
                        fill="currentColor"
                        d="M8 10.25a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm.75 3.75a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM14 2a.75.75 0 0 1 .75.75V4h3.75V2.75a.75.75 0 0 1 1.5 0V4h.75A2.25 2.25 0 0 1 23 6.25v12.996a.75.75 0 0 1-.22.53l-5.504 5.504a.75.75 0 0 1-.53.22H6.75a2.25 2.25 0 0 1-2.25-2.25v-17A2.25 2.25 0 0 1 6.75 4H8V2.75a.75.75 0 0 1 1.5 0V4h3.75V2.75A.75.75 0 0 1 14 2ZM6 6.25v17c0 .414.336.75.75.75h9.246v-3.254a2.25 2.25 0 0 1 2.25-2.25H21.5V6.25a.75.75 0 0 0-.75-.75h-14a.75.75 0 0 0-.75.75Zm12.246 13.746a.75.75 0 0 0-.75.75v2.193l2.943-2.943h-2.193Z"
                    />
                </svg>

                {{-- Type Name --}}
                <div x-text="record.type"></div>
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
                    x-text="record.stars_count"
                ></div>
            </div>
        </div>

        {{-- Ttile --}}
        <div
            x-text="record.title"
            class="line-clamp-2 pt-3 text-base font-medium text-evening"
        ></div>

        {{-- Author --}}
        <div class="flex items-center gap-3 pt-3">
            <div class="h-9 w-9 shrink-0 overflow-hidden rounded-full">
                <template x-if="record.author.avatar">
                    <div
                        x-bind:style="'background-image: url(' + record.author.avatar + ')'"
                        class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                    ></div>
                </template>
                <template x-if="! record.author.avatar">
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
                    x-text="record.author.name"
                ></div>
                <div
                    class="text-dolphin/80"
                    x-text="record.created_at"
                ></div>
            </div>
        </div>

        {{-- Tags --}}
        <div class="flex flex-wrap gap-x-2.5 gap-y-3 pt-5">
            <template
                x-for="tag in record.tags"
                :key="tag"
            >
                <div
                    class="rounded-full bg-slate-100 px-5 py-2.5 text-xs"
                    x-text="tag"
                ></div>
            </template>
        </div>
    </div>
</a>
