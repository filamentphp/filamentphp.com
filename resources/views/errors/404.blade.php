<x-layouts.app>
    <div
        x-data
        class="grid place-items-center px-5 pt-20 text-center"
    >
        <img
            src="{{ Vite::asset('resources/images/errors/404_page_not_found.webp') }}"
            alt=""
            width="384"
            height="138"
            class="w-96 mix-blend-darken"
        />
        <div class="text-evening pt-10 text-5xl font-black">Oops!</div>
        <div class="text-butter pt-2 text-2xl font-black">
            Something went wrong.
        </div>
        <div class="text-evening pt-3 font-medium">
            The page you are looking for does not exist.
        </div>
        <div class="flex flex-wrap items-center justify-center gap-5 pt-14">
            <a
                href="{{ route('home') }}"
                class="group/button bg-dawn-pink text-hurricane hover:bg-dawn-pink/70 flex items-center justify-center gap-3 rounded-xl py-3 pr-6 pl-5 transition duration-200 motion-reduce:transition-none"
            >
                <div
                    class="transition duration-300 group-hover/button:-translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/button:transform-none"
                >
                    <svg
                        width="24"
                        height="25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="-scale-x-100"
                    >
                        <path
                            d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
                <div>Go home</div>
            </a>
            <a
                href="{{ route('docs') }}"
                class="group/button bg-dawn-pink text-hurricane hover:bg-dawn-pink/70 flex items-center justify-center gap-3 rounded-xl py-3 pr-5 pl-6 transition duration-200 motion-reduce:transition-none"
            >
                <div>Read the documentation</div>
                <div
                    class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/button:transform-none"
                >
                    <svg
                        width="24"
                        height="25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
