@props([
    'avatar',
    'name',
    'title',
    'github',
    'website',
    'twitter' => null,
    'mastodon' => null,
])

<div
    class="flex flex-col items-start gap-x-10 gap-y-5 pt-10 md:flex-row md:items-center"
>
    <div class="flex min-w-[15rem] flex-col items-center space-y-5">
        {{-- Avatar --}}
        <img
            src="{{ $avatar }}"
            alt="{{ $name }}"
            height="144"
            width="144"
            class="aspect-square w-28 rounded-full lg:w-36"
            loading="lazy"
        />
        {{-- Information --}}
        <div class="space-y-1 text-center">
            {{-- Name --}}
            <div class="text-2xl font-black lg:text-3xl">
                {{ $name }}
            </div>
            {{-- Title --}}
            <div class="text-base font-semibold text-dolphin/90 lg:text-lg">
                {{ $title }}
            </div>
        </div>
        {{-- Links --}}
        <div class="flex flex-wrap items-center gap-3.5 text-hurricane">
            @if ($twitter)
                <a
                    target="_blank"
                    href="{{ $twitter }}"
                    class="group/twitter-link relative grid h-9 w-9 place-items-center rounded-xl bg-merino hover:text-black motion-reduce:transition-none"
                >
                    <svg
                        width="40"
                        height="40"
                        class="relative -top-0.5 w-[1.45rem] transition duration-300 group-hover/twitter-link:scale-0 group-hover/twitter-link:opacity-0"
                        fill="none"
                        viewBox="0 0 40 40"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M37.02 9.427c-1.272.562-2.62.932-4.002 1.096a6.991 6.991 0 0 0 3.064-3.856 13.935 13.935 0 0 1-4.425 1.691 6.97 6.97 0 0 0-11.877 6.357A19.79 19.79 0 0 1 5.412 7.432a6.947 6.947 0 0 0-.944 3.505 6.973 6.973 0 0 0 3.1 5.801 6.947 6.947 0 0 1-3.156-.871v.084a6.975 6.975 0 0 0 5.591 6.837 7.008 7.008 0 0 1-3.15.12 6.975 6.975 0 0 0 6.514 4.842 13.99 13.99 0 0 1-10.32 2.887A19.719 19.719 0 0 0 13.73 33.77c12.823 0 19.833-10.622 19.833-19.834 0-.3-.006-.603-.02-.901a14.17 14.17 0 0 0 3.477-3.608Z"
                            fill="currentColor"
                        />
                    </svg>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        class="absolute right-1/2 top-1/2 -translate-y-1/2 translate-x-1/2 scale-0 opacity-0 transition duration-300 group-hover/twitter-link:scale-100 group-hover/twitter-link:opacity-100"
                        fill="none"
                    >
                        <path
                            d="M12.6182 0.80542H15.0592L9.72628 6.90056L16 15.1947H11.0877L7.24026 10.1643L2.83789 15.1947H0.395405L6.09945 8.67524L0.0810547 0.80542H5.11803L8.5958 5.40334L12.6182 0.80542ZM11.7614 13.7336H13.114L4.38307 2.18974H2.9316L11.7614 13.7336Z"
                            fill="currentColor"
                        />
                    </svg>
                </a>
            @endif

            @if ($mastodon)
                <a
                    target="_blank"
                    href="{{ $mastodon }}"
                    class="grid h-9 w-9 place-items-center rounded-xl bg-merino transition duration-300 hover:text-black motion-reduce:transition-none"
                >
                    <svg
                        class="relative w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 231 248"
                        aria-hidden="true"
                    >
                        <path
                            d="M115.833 0c31.639.259 62.092 3.684 79.827 11.83.091.04 35.173 15.805 35.173 69.421.001.126.433 39.653-4.905 67.109-3.394 17.457-30.392 36.562-61.4 40.265-16.169 1.929-32.089 3.703-49.065 2.925-27.763-1.272-49.67-6.627-49.67-6.627 0 2.702.167 5.276.5 7.682 3.61 27.399 27.168 29.041 49.484 29.806 22.524.771 42.58-5.554 42.58-5.554l.925 20.363c-.046.024-15.795 8.463-43.819 10.016-15.476.851-34.692-.389-57.073-6.313C9.848 228.075 1.5 176.332.223 123.831c-.39-15.588-.15-30.287-.15-42.58 0-53.685 35.175-69.422 35.175-69.422C52.984 3.684 83.418.26 115.056 0h.777Zm35.762 41.947c-13.18 0-23.161 5.066-29.758 15.197l-6.416 10.754-6.414-10.753c-6.599-10.132-16.58-15.198-29.758-15.198-11.39 0-20.567 4.004-27.573 11.815-6.795 7.81-10.178 18.368-10.178 31.653v65.005h25.754V87.326c0-13.3 5.596-20.05 16.789-20.05 12.376 0 18.58 8.008 18.58 23.842v34.534h25.602V91.118c0-15.834 6.202-23.842 18.578-23.843 11.193 0 16.79 6.751 16.79 20.051v63.094h25.753V85.415c0-13.285-3.383-23.843-10.176-31.653-7.008-7.81-16.184-11.815-27.573-11.815Z"
                        />
                    </svg>
                </a>
            @endif

            <a
                target="_blank"
                href="{{ $website }}"
                class="grid h-9 w-9 place-items-center rounded-xl bg-merino transition duration-300 hover:text-black motion-reduce:transition-none"
            >
                <svg
                    class="w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 32 32"
                >
                    <path
                        fill="currentColor"
                        d="M16 2a14 14 0 1 0 14 14A14.016 14.016 0 0 0 16 2ZM4.02 16.394l1.338.446L7 19.303v1.283a1 1 0 0 0 .293.707L10 24v2.377a11.994 11.994 0 0 1-5.98-9.983ZM16 28a11.968 11.968 0 0 1-2.572-.285L14 26l1.805-4.512a1 1 0 0 0-.097-.926l-1.411-2.117a1 1 0 0 0-.832-.445h-4.93l-1.248-1.873L9.414 14H11v2h2v-2.734l3.868-6.77l-1.736-.992L14.277 7h-2.742L10.45 5.371A11.861 11.861 0 0 1 20 4.7V8a1 1 0 0 0 1 1h1.465a1 1 0 0 0 .832-.445l.877-1.316A12.033 12.033 0 0 1 26.894 11H22.82a1 1 0 0 0-.98.804l-.723 4.47a1 1 0 0 0 .54 1.055L25 19l.685 4.056A11.98 11.98 0 0 1 16 28Z"
                    />
                </svg>
            </a>
            <a
                target="_blank"
                href="{{ $github }}"
                class="grid h-9 w-9 place-items-center rounded-xl bg-merino transition duration-300 hover:text-black motion-reduce:transition-none"
            >
                <svg
                    class="w-6"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
        </div>
    </div>
</div>
