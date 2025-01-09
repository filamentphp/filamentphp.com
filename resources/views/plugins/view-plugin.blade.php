<x-layouts.app>
    <section
        x-cloak
        x-data="{
            back_button_is_hovering: false,
        }"
        x-ref="section"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.fromTo(
                    $refs.section,
                    {
                        autoAlpha: 0,
                        y: 50,
                    },
                    {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
            }
        "
        class="mx-auto w-full max-w-8xl px-5 sm:px-10"
    >
        <div class="flex flex-wrap items-center justify-between gap-5 pt-20">
            {{-- Back Button --}}
            <a
                x-on:mouseenter="back_button_is_hovering = true"
                x-on:mouseleave="back_button_is_hovering = false"
                href="/plugins"
                class="flex items-center gap-3 p-1 text-dolphin transition duration-300 hover:-translate-x-2 hover:text-evening"
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
            <div
                class="flex flex-wrap items-center gap-3 transition duration-300 will-change-transform"
                :class="{
                'opacity-60 translate-x-2': back_button_is_hovering,
            }"
            >
                @if (filled($plugin->discord_url))
                    {{-- Discord --}}
                    <a
                        href="{{ $plugin->discord_url }}"
                        target="_blank"
                        class="flex select-none items-center gap-2.5 rounded-lg bg-white py-2.5 pl-5 pr-6 text-center text-sm font-medium text-evening shadow-lg shadow-black/[0.01] transition duration-300 hover:-translate-y-0.5 hover:bg-white/80"
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
                        <div>Support</div>
                    </a>
                @endif

                <livewire:star-record :record="$plugin" />

                @if (filled($plugin->url))
                    {{-- Link --}}
                    <a
                        href="{{ $plugin->url }}"
                        target="_blank"
                        class="block select-none rounded-bl-lg rounded-br-2xl rounded-tl-lg rounded-tr-lg bg-salmon py-2.5 pl-5 pr-6 text-center text-sm font-medium text-white shadow-xl shadow-black/[0.02] transition duration-300 hover:-translate-y-0.5 hover:bg-[#ff8868]"
                    >
                        Visit website
                    </a>
                @endif

                @if ($plugin->isFree())
                    {{-- GitHub Link --}}
                    <a
                        href="https://github.com/{{ $plugin->github_repository }}"
                        target="_blank"
                        class="block select-none rounded-bl-lg rounded-br-2xl rounded-tl-lg rounded-tr-lg bg-salmon py-2.5 pl-5 pr-6 text-center text-sm font-medium text-white shadow-xl shadow-black/[0.02] transition duration-300 hover:-translate-y-0.5 hover:bg-[#ff8868]"
                    >
                        Visit GitHub
                    </a>
                @elseif ($checkoutUrl = $plugin->getCheckoutUrl())
                    {{-- Price --}}
                    <a
                        href="{{ $checkoutUrl }}"
                        target="_blank"
                        @class([
                            'block select-none rounded-bl-lg rounded-br-2xl rounded-tl-lg rounded-tr-lg bg-salmon px-6 py-2.5 text-center text-sm font-medium text-white shadow-xl shadow-black/[0.02] transition duration-300 hover:-translate-y-0.5 hover:bg-[#ff8868]',
                            'lemonsqueezy-button' => $plugin->is_lemon_squeezy_embedded,
                        ])
                    >
                        {{ $plugin->is_presale ? 'Preorder' : 'Buy' }} for
                        {{ $plugin->getPrice() }}
                    </a>
                    @if ($plugin->is_lemon_squeezy_embedded)
                        <script
                            src="https://assets.lemonsqueezy.com/lemon.js"
                            defer
                        ></script>
                    @endif
                @endif
            </div>
        </div>

        {{-- Main Content --}}
        <div
            class="flex flex-col items-start gap-20 pt-7 transition duration-300 will-change-transform lg:flex-row"
            :class="{
                'opacity-60 translate-x-2': back_button_is_hovering,
            }"
        >
            {{-- Left Side --}}
            <div class="w-full">
                {{-- Name & Description --}}
                <div>
                    <div class="text-3xl font-extrabold">
                        {{ $plugin->name }}
                    </div>
                    <div class="pt-4 font-medium text-dolphin/80">
                        {{ $plugin->description }}
                    </div>
                </div>

                {{-- Categories --}}
                <div class="flex flex-wrap items-center gap-3.5 pt-10">
                    @foreach ($plugin->getCategories() as $category)
                        <div
                            class="flex select-none items-center gap-4 rounded-full bg-white py-1.5 pl-1.5 pr-6"
                        >
                            <div
                                class="grid h-8 w-8 place-items-center rounded-full bg-dawn-pink text-hurricane"
                            >
                                {!! $category->getIcon() !!}
                            </div>
                            <div class="text-sm text-hurricane">
                                {{ $category->name }}
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($imageUrl = $plugin->getImageUrl())
                    {{-- Image --}}
                    <div class="pt-5">
                        <div
                            style="
                                background-image: url({{ $plugin->getImageUrl() }});
                            "
                            class="aspect-[16/9] h-full w-full rounded-2xl bg-cover bg-center bg-no-repeat ring-1 ring-dawn-pink/70"
                        ></div>
                    </div>
                @endif

                {{-- Features and Health Checks --}}
                <div
                    class="grid grid-cols-[repeat(auto-fill,minmax(315px,1fr))] gap-x-16 gap-y-10 pt-7"
                >
                    {{-- Dark Mode --}}
                    <div class="flex items-center gap-3">
                        <div
                            @class([
                                'grid h-9 w-9 place-items-center rounded-full bg-white text-salmon shadow-lg shadow-black/[0.02]',
                                'grayscale' => ! $plugin->has_dark_theme,
                            ])
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
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

                        <div>
                            <div class="text-xs text-dolphin/80">
                                Dark theme support
                            </div>

                            <div class="font-medium">
                                {{ $plugin->has_dark_theme ? 'Yes' : 'No' }}
                            </div>
                        </div>
                    </div>

                    {{-- Multi Language --}}
                    <div class="flex items-center gap-3">
                        <div
                            @class([
                                'grid h-9 w-9 place-items-center rounded-full bg-white text-salmon shadow-lg shadow-black/[0.02]',
                                'grayscale' => ! $plugin->has_translations,
                            ])
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
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

                        <div>
                            <div class="text-xs text-dolphin/80">
                                Multi language support
                            </div>

                            <div class="font-medium">
                                {{ $plugin->has_translations ? 'Yes' : 'No' }}
                            </div>
                        </div>
                    </div>

                    {{-- Latest Version Compatibility --}}
                    <div class="flex items-center gap-3">
                        @if ($plugin->isCompatibleWithLatestVersion())
                            <div
                                class="grid h-9 w-9 place-items-center rounded-full bg-lime-200/50 text-lime-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M9 16.17L5.53 12.7a.996.996 0 1 0-1.41 1.41l4.18 4.18c.39.39 1.02.39 1.41 0L20.29 7.71a.996.996 0 1 0-1.41-1.41L9 16.17z"
                                    />
                                </svg>
                            </div>
                        @else
                            <div
                                class="grid h-9 w-9 place-items-center rounded-full bg-rose-200/50 text-rose-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v8m.05 4v.1h-.1V18h.1Z"
                                    />
                                </svg>
                            </div>
                        @endif

                        <div>
                            <div class="font-medium">
                                {{ $plugin->isCompatibleWithLatestVersion() ? 'Compatible with the latest version' : 'Not compatible with the latest version' }}
                            </div>

                            <div class="text-xs text-dolphin/80">
                                Supported versions:
                                {{ implode(' - ', array_map(fn (int $version): string => $version . '.x', $plugin->versions)) }}
                            </div>
                        </div>
                    </div>
                </div>

                @if (filled($docs = $plugin->getDocs(request()->query('v'))))
                    {{-- Documentation --}}
                    <div class="pt-10">
                        <div
                            class="flex flex-wrap items-center justify-between gap-5"
                        >
                            <div
                                id="documentation"
                                class="scroll-mt-10 text-3xl font-extrabold"
                            >
                                Documentation
                            </div>
                            @if (filled($plugin->docs_urls))
                                <div class="flex flex-wrap items-center gap-3">
                                    <div>Version:</div>
                                    <select
                                        x-data="{
                                            selected: @js(request()->query('v')),
                                            init() {
                                                this.$watch('selected', () => {
                                                    const url = new URL(window.location)
                                                    url.searchParams.set('v', this.selected)
                                                    url.hash = 'documentation'
                                                    window.location.href = url
                                                })
                                            },
                                        }"
                                        x-model="selected"
                                        class="block w-32 rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-salmon focus:ring-salmon"
                                    >
                                        @foreach ($plugin->docs_urls as $key => $value)
                                            <option value="{{ $key }}">
                                                {{ $key }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div
                            class="prose selection:bg-stone-500/30 prose-a:break-words prose-blockquote:not-italic prose-code:break-words prose-code:rounded prose-code:bg-merino prose-code:px-1.5 prose-code:py-0.5 prose-code:font-normal prose-code:before:hidden prose-code:after:hidden [&_p]:before:hidden [&_p]:after:hidden"
                        >
                            {!!
                                \App\Support\Markdown::parse($docs)
                                    ->convertVideoToHtml()
                                    ->absoluteImageUrls(
                                        baseUrl: str($plugin->getDocUrl(request()->query('v')))
                                            ->lower()
                                            ->before('readme.md'),
                                    )
                            !!}
                        </div>
                    </div>
                @endif
            </div>

            {{-- Right Side --}}
            <div
                class="flex w-full flex-wrap items-center gap-12 lg:max-w-sm xl:max-w-md"
            >
                {{-- Author --}}
                <div class="w-full pt-10 text-evening">
                    <div class="grid w-full place-items-center">
                        {{-- Avatar --}}
                        <div
                            class="h-24 w-24 shrink-0 overflow-hidden rounded-full"
                        >
                            <div
                                style="
                                    background-image: url({{ $plugin->author->getAvatarUrl() }});
                                "
                                class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                            ></div>
                        </div>

                        {{-- Name --}}
                        <div class="pt-3.5 text-lg font-bold">
                            {{ $plugin->author->name }}
                        </div>

                        {{-- Social Links --}}
                        <div class="flex items-center gap-4 pt-3">
                            {{-- Twitter --}}
                            @if (filled($plugin->author->twitter_url))
                                <a
                                    target="_blank"
                                    href="{{ $plugin->author->twitter_url }}"
                                    class="grid h-8 w-8 place-items-center rounded-full bg-merino text-hurricane transition duration-200 hover:scale-110 hover:text-salmon"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="currentColor"
                                            fill-rule="evenodd"
                                            d="M15.021 3.343c.509-.087 1.078-.116 1.614-.025a4.85 4.85 0 0 1 2.54 1.273c.456.01.905-.08 1.302-.208a5.36 5.36 0 0 0 1.098-.501l.009-.006a.75.75 0 0 1 1.042 1.037c-.207.315-.496.877-.819 1.507l-.155.301c-.185.36-.375.724-.552 1.036c-.111.196-.23.395-.35.567v.274A12.34 12.34 0 0 1 8.287 21.03a12.32 12.32 0 0 1-6.694-1.97a.75.75 0 0 1 .5-1.374a7.471 7.471 0 0 0 4.033-.642a4.858 4.858 0 0 1-2.61-2.922a.75.75 0 0 1 .147-.722l.01-.01A4.848 4.848 0 0 1 2.05 9.793v-.052a.75.75 0 0 1 .553-.724A4.84 4.84 0 0 1 2.09 6.84a4.9 4.9 0 0 1 .65-2.442a.75.75 0 0 1 1.232-.1a10.89 10.89 0 0 0 7.006 3.93a4.85 4.85 0 0 1 2.562-4.406c.402-.214.934-.385 1.482-.479ZM3.743 10.891a3.35 3.35 0 0 0 2.503 2.164a.75.75 0 0 1 .072 1.453c-.272.083-.551.14-.834.173a3.358 3.358 0 0 0 2.59 1.3a.75.75 0 0 1 .45 1.339a8.97 8.97 0 0 1-3.548 1.695a10.82 10.82 0 0 0 3.313.515h.009A10.838 10.838 0 0 0 19.25 8.607v-.535a.75.75 0 0 1 .186-.495c.07-.079.19-.261.36-.56c.16-.282.338-.622.523-.981l.033-.066a4.992 4.992 0 0 1-1.593.097a.75.75 0 0 1-.47-.237a3.35 3.35 0 0 0-1.904-1.032a3.42 3.42 0 0 0-1.11.025a3.605 3.605 0 0 0-1.028.323a3.35 3.35 0 0 0-1.678 3.74a.75.75 0 0 1-.767.925a12.39 12.39 0 0 1-8.149-3.627a3.41 3.41 0 0 0-.063.657v.002a3.34 3.34 0 0 0 1.486 2.785A.75.75 0 0 1 4.64 11a4.798 4.798 0 0 1-.897-.11Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </a>
                            @endif

                            {{-- Mastodon --}}
                            @if (filled($plugin->author->mastodon_url))
                                <a
                                    target="_blank"
                                    href="{{ $plugin->author->mastodon_url }}"
                                    class="grid h-8 w-8 place-items-center rounded-full bg-merino text-hurricane transition duration-200 hover:scale-110 hover:text-salmon"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 48 48"
                                        width="24"
                                        height="24"
                                    >
                                        <g
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="3"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path
                                                d="m41.0662 20.4015c0 6.2578-.9723 8.3975-2.8838 10.19-3.8743 3.6342-14.1824 3.3518-14.1824 3.3518a40.2923 40.2923 0 0 1 -7.0141-.5285s-1.1259 7.4142 13.1041 3.7783l-.1445 4.2408c-2.1685.29-22.807 7.92-22.956-18.657l-.056-2.3759c0-6.2578.05-8.4823 2.8838-11.611 3.5658-3.9373 14.1827-3.4353 14.1827-3.4353s10.617-.502 14.182 3.4353c2.8336 3.129 2.8838 5.3535 2.8838 11.611"
                                            />
                                            <path
                                                d="m24 23.3125v-5.9774a4.6542 4.6542 0 0 0 -4.6543-4.6542 4.6542 4.6542 0 0 0 -4.6542 4.6542v9.6463"
                                            />
                                            <path
                                                d="m24 17.3351a4.6542 4.6542 0 0 1 4.6543-4.6542 4.6542 4.6542 0 0 1 4.6542 4.6542v9.6463"
                                            />
                                        </g>
                                    </svg>
                                </a>
                            @endif

                            {{-- GitHub --}}
                            <a
                                target="_blank"
                                href="{{ $plugin->author->github_url }}"
                                class="grid h-8 w-8 place-items-center rounded-full bg-merino text-hurricane transition duration-200 hover:scale-110 hover:text-salmon"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <g
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                    >
                                        <path
                                            d="M16 22.027v-2.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7a5.44 5.44 0 0 0-1.5-3.75a5.07 5.07 0 0 0-.09-3.77s-1.18-.35-3.91 1.48a13.38 13.38 0 0 0-7 0c-2.73-1.83-3.91-1.48-3.91-1.48A5.07 5.07 0 0 0 5 5.797a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7a3.37 3.37 0 0 0-.94 2.58v2.87"
                                        />
                                        <path d="M9 20.027c-3 .973-5.5 0-7-3" />
                                    </g>
                                </svg>
                            </a>
                        </div>

                        <div
                            class="mt-4 space-y-4 rounded-2xl bg-merino/50 p-6 text-center shadow-lg shadow-black/[0.01]"
                        >
                            {{-- Bio --}}
                            @if ($plugin->author->getBio())
                                <div class="prose">
                                    {!! str($plugin->author->getBio())->markdown()->sanitizeHtml() !!}
                                </div>
                            @endif

                            {{-- Stats --}}
                            <div class="flex justify-center">
                                <div class="grid grid-cols-2 gap-10">
                                    {{-- Plugins --}}
                                    <div class="space-y-0.5">
                                        <div class="text-lg font-extrabold">
                                            {{ number_format($plugin->author->plugins()->count()) }}
                                        </div>
                                        <div
                                            class="text-sm font-medium text-hurricane/80"
                                        >
                                            Plugins
                                        </div>
                                    </div>

                                    {{-- Stars --}}
                                    <div class="space-y-0.5">
                                        <div class="text-lg font-extrabold">
                                            {{ number_format($plugin->author->getStarsCount()) }}
                                        </div>
                                        <div
                                            class="text-sm font-medium text-hurricane/80"
                                        >
                                            Stars
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (filled($plugin->author->sponsor_url))
                                {{-- Sponsor Button --}}
                                <div class="flex justify-center pb-1.5">
                                    <a
                                        href="{{ $plugin->author->sponsor_url }}"
                                        class="group relative z-10 block text-white"
                                    >
                                        {{-- Button --}}
                                        <div
                                            class="flex items-center justify-center gap-3 rounded-bl-3xl rounded-tr-3xl bg-midnight px-9 py-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:translate-x-0.5 motion-reduce:transition-none motion-reduce:group-hover:transform-none"
                                        >
                                            <div>Sponsor</div>
                                            <div>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="22"
                                                    height="22"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="m12 5.5l-.54.52l.01.011l.53-.53ZM8.962 18.91l-.465.59l.465-.59Zm6.076 0l-.464-.588l.464.589Zm-8.037-2.49a.75.75 0 0 0-.954 1.16l.954-1.16Zm-4.659-3.009a.75.75 0 1 0 1.316-.72l-1.316.72Zm11.128-5.38a.75.75 0 1 0 1.06-1.062L13.47 8.03ZM2.75 9.136c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137h1.5ZM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043L8.497 19.5Zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.197-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842l.929 1.178ZM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713h1.5Zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16l-.929-1.178Zm-5.148 0c-.796-.627-1.605-1.226-2.425-1.901l-.954 1.158c.83.683 1.708 1.335 2.45 1.92l.93-1.177Zm-5.768-5.63a7.252 7.252 0 0 1-.908-3.555h-1.5c0 1.638.42 3.046 1.092 4.274l1.316-.72Zm7.812-6.66l2 1.998l1.06-1.06l-2-2l-1.06 1.061Z"
                                                    />
                                                </svg>
                                            </div>
                                        </div>

                                        {{-- Shadow --}}
                                        <div
                                            class="absolute inset-0 -z-10 h-full w-full -translate-x-1.5 translate-y-1.5 rounded-bl-3xl rounded-tr-3xl bg-rose-300 transition duration-300 group-hover:-translate-x-2 group-hover:translate-y-2 group-hover:bg-butter motion-reduce:transition-none motion-reduce:group-hover:transform-none"
                                        ></div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if (count($otherPlugins = $plugin->author->plugins()->draft(false)->where('slug', '!=', $plugin->slug)->inRandomOrder()->limit(3)->get()))
                    {{-- More From This Author --}}
                    <div>
                        <div class="text-lg font-extrabold">
                            More from this author
                        </div>
                        <div class="space-y-5 pt-7">
                            @foreach ($otherPlugins as $otherPlugin)
                                <a
                                    href="{{ route('plugins.view', ['plugin' => $otherPlugin]) }}"
                                    class="group/author-plugin-link relative flex items-center gap-5 transition duration-300 ease-out will-change-transform hover:translate-x-2"
                                >
                                    {{-- Thumbnail --}}
                                    <div
                                        style="
                                            background-image: url({{ $otherPlugin->getThumbnailUrl() }});
                                        "
                                        class="aspect-[16/9] w-36 min-w-[9rem] shrink-0 rounded-xl bg-cover bg-center bg-no-repeat ring-1 ring-dawn-pink"
                                    ></div>

                                    {{-- Detail --}}
                                    <div>
                                        {{-- Name --}}
                                        <div class="line-clamp-1 font-semibold">
                                            {{ $otherPlugin->name }}
                                        </div>

                                        {{-- Description --}}
                                        <div
                                            class="line-clamp-2 pt-1 text-sm text-dolphin"
                                        >
                                            {{ $otherPlugin->description }}
                                        </div>

                                        {{-- Stats --}}
                                        <div
                                            class="flex flex-wrap items-center justify-start gap-4 pt-1"
                                        >
                                            {{-- Stars --}}
                                            <div
                                                class="flex items-center gap-1.5"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="text-butter"
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
                                                >
                                                    {{ $otherPlugin->getStarsCount() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Arrow --}}
                                    <div
                                        class="absolute -right-3 top-0 grid h-full w-52 items-center justify-end bg-gradient-to-r from-transparent to-cream opacity-0 transition duration-200 will-change-transform group-hover/author-plugin-link:-translate-x-3 group-hover/author-plugin-link:opacity-100"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="text-salmon"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M4 12h2.5M20 12l-6-6m6 6l-6 6m6-6H9.5"
                                            />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-plugins.featured-plugins
        :$featuredPlugins
        class="mt-16"
    />
</x-layouts.app>
