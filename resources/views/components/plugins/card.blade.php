<a
    x-bind:href="'/plugins/' + plugin.slug"
    class="block rounded-2xl bg-white p-3 shadow-lg shadow-hurricane/5 transition duration-300 will-change-transform hover:-translate-y-1 hover:shadow-xl hover:shadow-hurricane/10"
>
    <div
        x-bind:style="'background-image: url(' + plugin.thumbnail_url + ')'"
        class="aspect-[16/9] w-full rounded-xl bg-cover bg-center bg-no-repeat ring-1 ring-dawn-pink"
    ></div>

    <div class="px-1.5 pb-1 pt-2.5">
        <div class="flex flex-wrap items-center justify-between gap-5">
            {{-- Stats --}}
            <div class="flex flex-wrap items-center justify-start gap-4">
                {{-- Stars --}}
                <div class="flex items-center gap-1.5">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="text-peach-orange"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="currentColor"
                            d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                        />
                    </svg>
                    <div
                        class="pt-0.5 text-xs font-medium text-dolphin"
                        x-text="plugin.stars_count"
                    ></div>
                </div>
            </div>

            {{-- Features --}}
            <div class="flex flex-wrap items-center justify-start gap-2.5">
                {{-- Dark Mode --}}
                <div
                    x-data="{
                        tooltip: plugin.features.dark_theme
                            ? 'Supports dark mode'
                            : 'Does not support dark mode',
                    }"
                    x-tooltip.animation.shift-away-subtle.theme.material="tooltip"
                    class="grid h-6 w-6 place-items-center rounded-full bg-fair-pink text-salmon"
                    :class="{
                        'opacity-50 grayscale': ! plugin.features.dark_theme,
                    }"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 24 24"
                    >
                        <g fill="currentColor">
                            <path
                                d="M19.9 2.307a.483.483 0 0 0-.9 0l-.43 1.095a.484.484 0 0 1-.272.274l-1.091.432a.486.486 0 0 0 0 .903l1.091.432a.48.48 0 0 1 .272.273L19 6.81c.162.41.74.41.9 0l.43-1.095a.484.484 0 0 1 .273-.273l1.091-.432a.486.486 0 0 0 0-.903l-1.091-.432a.484.484 0 0 1-.273-.274l-.43-1.095ZM16.033 8.13a.483.483 0 0 0-.9 0l-.157.399a.484.484 0 0 1-.272.273l-.398.158a.486.486 0 0 0 0 .903l.398.157c.125.05.223.148.272.274l.157.399c.161.41.739.41.9 0l.157-.4a.484.484 0 0 1 .272-.273l.398-.157a.486.486 0 0 0 0-.903l-.398-.158a.484.484 0 0 1-.272-.273l-.157-.4Z"
                            />
                            <path
                                d="M12 22c5.523 0 10-4.477 10-10c0-.463-.694-.54-.933-.143a6.5 6.5 0 1 1-8.924-8.924C12.54 2.693 12.463 2 12 2C6.477 2 2 6.477 2 12s4.477 10 10 10Z"
                            />
                        </g>
                    </svg>
                </div>

                {{-- Multi Language --}}
                <div
                    x-data="{
                        tooltip: plugin.features.translations
                            ? 'Supports multi language'
                            : 'Does not support multi language',
                    }"
                    x-tooltip.animation.shift-away-subtle.theme.material="tooltip"
                    class="grid h-6 w-6 place-items-center rounded-full bg-fair-pink text-salmon"
                    :class="{
                        'opacity-50 grayscale': ! plugin.features.translations,
                    }"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 20 20"
                    >
                        <g fill="currentColor">
                            <path
                                d="M7.75 2.75a.75.75 0 0 0-1.5 0v1.258a32.987 32.987 0 0 0-3.599.278a.75.75 0 1 0 .198 1.487A31.545 31.545 0 0 1 8.7 5.545A19.381 19.381 0 0 1 7 9.56a19.418 19.418 0 0 1-1.002-2.05a.75.75 0 0 0-1.384.577a20.935 20.935 0 0 0 1.492 2.91a19.613 19.613 0 0 1-3.828 4.154a.75.75 0 1 0 .945 1.164A21.116 21.116 0 0 0 7 12.331c.095.132.192.262.29.391a.75.75 0 0 0 1.194-.91a18.97 18.97 0 0 1-.59-.815a20.888 20.888 0 0 0 2.333-5.332c.31.031.618.068.924.108a.75.75 0 0 0 .198-1.487a32.832 32.832 0 0 0-3.599-.278V2.75Z"
                            />
                            <path
                                fill-rule="evenodd"
                                d="M13 8a.75.75 0 0 1 .671.415l4.25 8.5a.75.75 0 1 1-1.342.67L15.787 16h-5.573l-.793 1.585a.75.75 0 1 1-1.342-.67l4.25-8.5A.75.75 0 0 1 13 8Zm2.037 6.5L13 10.427L10.964 14.5h4.073Z"
                                clip-rule="evenodd"
                            />
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Name --}}
        <div
            x-text="plugin.name"
            class="line-clamp-1 pt-1.5 text-[.95rem] font-semibold"
        ></div>

        {{-- Description --}}
        <div
            x-text="plugin.description"
            class="line-clamp-2 min-h-[2.9rem] pt-1 text-[.8rem] text-dolphin"
        ></div>

        {{-- Author and Price --}}
        <div class="flex items-center justify-between gap-5 pt-3">
            {{-- Author --}}
            <div class="flex items-center gap-3">
                <div class="h-9 w-9 shrink-0 overflow-hidden rounded-full">
                    <template x-if="plugin.author.avatar">
                        <div
                            x-bind:style="'background-image: url(' + plugin.author.avatar + ')'"
                            class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                        ></div>
                    </template>
                    <template x-if="! plugin.author.avatar">
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
                    <div class="text-dolphin">Author</div>
                    <div
                        class="font-semibold capitalize"
                        x-text="plugin.author.name"
                    ></div>
                </div>
            </div>

            {{-- Link --}}
            <div
                class="block rounded-bl-md rounded-br-2xl rounded-tl-md rounded-tr-md bg-fair-pink px-10 py-2.5 text-center text-sm text-salmon"
                x-text="plugin.price"
                :class="{
                    'bg-fair-pink text-salmon': plugin.price === 'Free',
                    'bg-salmon text-white': plugin.price !== 'Free',
                }"
            ></div>
        </div>
    </div>
</a>
