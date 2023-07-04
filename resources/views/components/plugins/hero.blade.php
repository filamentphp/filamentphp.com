<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-8xl px-5 pt-20 min-[550px]:px-10"
>
    <div class="flex max-w-screen-lg items-start justify-between gap-20">
        {{-- Left Side --}}
        <div class="">
            {{-- Title --}}
            <div class="relative inline text-5xl font-black">
                Plugins
                <div class="absolute -right-10 -top-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        viewBox="0 0 24 24"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                d="M11.811 6.727C12.825 4.909 13.331 4 14.09 4c.757 0 1.264.909 2.277 2.727l.262.47c.288.517.432.775.657.945c.224.17.504.234 1.063.36l.51.116c1.967.445 2.95.667 3.185 1.42c.234.753-.437 1.537-1.778 3.106l-.347.406c-.381.445-.572.668-.658.944c-.086.276-.057.573 0 1.168l.053.541c.203 2.094.305 3.14-.308 3.605c-.613.465-1.534.041-3.377-.807l-.476-.22c-.524-.24-.786-.361-1.063-.361c-.278 0-.54.12-1.063.361l-.477.22c-1.842.848-2.763 1.272-3.376.807c-.613-.465-.511-1.511-.309-3.605l.053-.541c.057-.595.086-.892 0-1.168c-.085-.276-.276-.498-.657-.944l-.347-.406C6.57 11.575 5.9 10.79 6.135 10.038c.234-.753 1.218-.975 3.185-1.42l.51-.116c.559-.126.838-.19 1.063-.36c.224-.17.368-.428.656-.945l.262-.47Z"
                            />
                            <path
                                stroke-linecap="round"
                                d="M2.089 16a4.736 4.736 0 0 1 4-.874m-4-4.626c1-.5 1.29-.44 2-.5M2 5.609l.208-.122c2.206-1.292 4.542-1.64 6.745-1.005l.208.06"
                                opacity=".5"
                            />
                        </g>
                    </svg>
                </div>
            </div>

            {{-- Message --}}
            <div class="max-w-sm pt-10 text-lg font-medium text-rum">
                Community made packages for Filament projects which gives you
                access to awesome new features.
            </div>

            {{-- Stats --}}
            <div class="flex items-center gap-20 pt-10">
                {{-- Plugins --}}
                <div class="group/stat">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span class="">315</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-butter transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-rum">Plugins</div>
                </div>

                {{-- Creators --}}
                <div class="group/stat">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span class="">46</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-[#897AD7] transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-rum">Creators</div>
                </div>

                {{-- Downloads --}}
                <div class="group/stat">
                    <div
                        class="relative inline text-3xl font-black text-evening"
                    >
                        <span class="">2M</span>
                        <span
                            class="absolute -bottom-2 left-0 h-1 w-full origin-left rounded-full bg-[#85D1A0] transition duration-300 will-change-transform group-hover/stat:scale-x-110"
                        ></span>
                    </div>
                    <div class="pt-4 text-sm text-rum">Downloads</div>
                </div>
            </div>

            <div class="flex flex-wrap gap-x-5 gap-y-8 pt-10">
                <a
                    href="#"
                    class="group/button relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-full bg-[#7466BC] px-9 py-3 text-white backdrop-blur transition duration-300 ease-out will-change-transform group-hover/button:-translate-y-2 group-hover/button:translate-x-1 group-hover/button:bg-purple-300/40 motion-reduce:transition-none"
                    >
                        <div class="">Submit Plugins</div>
                        <div
                            class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none"
                        >
                            <svg
                                width="24"
                                height="25"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                                    stroke="#fff"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                    </div>

                    {{-- Shadow --}}
                    <div
                        class="absolute inset-0 -z-10 h-full w-full rounded-full bg-[#8e7edd] transition duration-300 ease-out will-change-transform group-hover/button:-translate-x-0.5 group-hover/button:translate-y-0.5 motion-reduce:transition-none"
                    ></div>
                </a>
                <a
                    href="#"
                    class="group/button relative block"
                >
                    {{-- Button --}}
                    <div
                        class="flex items-center justify-center gap-3 rounded-full bg-cream px-9 py-3 text-midnight text-purple-950 backdrop-blur transition duration-300 ease-out will-change-transform group-hover/button:-translate-y-2 group-hover/button:translate-x-1 group-hover/button:bg-opacity-20 motion-reduce:transition-none"
                    >
                        <div
                            class="transition duration-300 motion-reduce:transition-none"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    fill="currentColor"
                                    d="m368 350.643l-112 63l-112-63v-66.562l-32-17.778v103.054l144 81l144-81V266.303l-32 17.778v66.562z"
                                />
                                <path
                                    fill="currentColor"
                                    d="M256 45.977L32 162.125v27.734L256 314.3l192-106.663V296h32V162.125Zm160 142.831l-32 17.777L256 277.7l-128-71.115l-32-17.777l-22.179-12.322L256 82.023l182.179 94.463Z"
                                />
                            </svg>
                        </div>
                        <div class="">How To Make Plugins</div>
                    </div>

                    {{-- Shadow --}}
                    <div
                        class="absolute inset-0 -z-10 h-full w-full rounded-full bg-purple-200/50 opacity-0 transition duration-300 ease-out will-change-transform group-hover/button:-translate-x-0.5 group-hover/button:translate-y-0.5 group-hover/button:opacity-100 motion-reduce:transition-none"
                    ></div>
                </a>
            </div>
        </div>

        {{-- Right Side --}}
        <div class="relative w-72">
            <img
                src="{{ Vite::asset('resources/images/plugins/ideapuzzle.webp') }}"
                alt=""
                class="w-full"
            />
        </div>
    </div>
</div>
