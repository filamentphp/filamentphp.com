<x-layouts.app>
    <section class="mx-auto w-full max-w-8xl px-5 sm:px-10">
        <div class="flex flex-wrap items-center justify-between gap-5 pt-20">
            {{-- Back Button --}}
            <a
                href="/plugins"
                class="flex items-center gap-3 text-dolphin transition duration-300 hover:-translate-x-1 hover:text-evening"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill="currentColor"
                        d="M2.64 11.917h16.591a.78.78 0 0 1 .769.792a.78.78 0 0 1-.769.791H.771c-.688 0-1.03-.857-.541-1.354L5.549 6.73a.754.754 0 0 1 1.087.006a.808.808 0 0 1-.005 1.119l-3.99 4.063Z"
                    />
                </svg>
                <div class="text-xl font-medium">Plugins</div>
            </a>
            <div class="flex flex-wrap items-center gap-4">
                {{-- Discord --}}
                <a
                    href="{{ $plugin['discord_link'] }}"
                    class="flex select-none items-center gap-2.5 rounded-lg bg-fair-pink bg-white py-2.5 pl-5 pr-6 text-center text-sm font-medium text-evening shadow-lg shadow-black/[0.01] transition duration-300 hover:-translate-y-0.5 hover:bg-white/80"
                >
                    <svg
                        class="w-[1.1rem]"
                        fill="none"
                        viewBox="0 0 71 55"
                        aria-hidden="true"
                    >
                        <g clip-path="url(#clip0)">
                            <path
                                d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z"
                                fill="currentColor"
                            />
                        </g>
                    </svg>
                    <div class="">Support</div>
                </a>

                {{-- Share --}}
                <div
                    class="flex cursor-pointer select-none items-center gap-2.5 rounded-lg bg-fair-pink bg-white py-2.5 pl-5 pr-6 text-center text-sm font-medium text-evening shadow-lg shadow-black/[0.01] transition duration-300 hover:-translate-y-0.5 hover:bg-white/80"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="19"
                        height="19"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-width="1.8"
                            d="m2 8l6 2M6 4l2 3m3-.437l3.7-3.625c1.46-1.43 4.063-1.199 5.815.517M18.135 12l2.908-2.848c.59-.578.902-1.338.95-2.152M15 15.587L10.965 20c-1.392 1.524-3.876 1.277-5.548-.552c-1.67-1.828-1.897-4.546-.504-6.07L6.173 12"
                        />
                    </svg>
                    <div class="">Share</div>
                </div>

                @if ($plugin['price'] === 'Free')
                    {{-- Github Link --}}
                    <a
                        href="{{ $plugin['github_link'] }}"
                        target="_blank"
                        class="block select-none rounded-bl-lg rounded-br-2xl rounded-tl-lg rounded-tr-lg bg-salmon px-10 py-2.5 text-center text-sm font-medium text-white shadow-xl shadow-black/[0.02] transition duration-300 hover:-translate-y-0.5 hover:bg-salmon/80"
                    >
                        Visit Github
                    </a>
                @else
                    {{-- Price --}}
                    <a
                        href="{{ $plugin['buy_link'] }}"
                        target="_blank"
                        class="block select-none rounded-bl-lg rounded-br-2xl rounded-tl-lg rounded-tr-lg bg-salmon px-10 py-2.5 text-center text-sm font-medium text-white shadow-xl shadow-black/[0.02] transition duration-300 hover:-translate-y-0.5 hover:bg-salmon/80"
                    >
                        Buy for
                        {{ $plugin['price'] }}
                    </a>
                @endif
            </div>
        </div>
    </section>
</x-layouts.app>
