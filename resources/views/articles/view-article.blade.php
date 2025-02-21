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
                href="{{ route('articles') }}"
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
                <div class="text-xl font-medium">Community</div>
            </a>
            <div
                class="flex flex-wrap items-center gap-3 transition duration-300 will-change-transform"
                :class="{
                'opacity-60 translate-x-2': back_button_is_hovering,
            }"
            >
                <livewire:star-record :record="$article" />
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
                {{-- Article Type --}}
                <div class="flex">
                    <x-articles.type-badge :type="$article->type" />
                </div>

                {{-- Title --}}
                <div class="pt-5">
                    <h1 class="text-3xl font-extrabold">
                        {{ $article->title }}
                    </h1>
                </div>

                <div class="pt-2">
                    <div class="text-base text-dolphin">
                        {{ $article->publish_date->toFormattedDateString() }}
                    </div>
                </div>

                @if ($article->isCompatibleWithLatestVersion() !== null)
                    {{-- Features and Health Checks --}}
                    <div
                        class="grid grid-cols-[repeat(auto-fill,minmax(315px,1fr))] gap-x-16 gap-y-10 pt-7"
                    >
                        {{-- Latest Version Compatibility --}}
                        <div class="flex items-center gap-3">
                            @if ($article->isCompatibleWithLatestVersion())
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
                                    {{ $article->isCompatibleWithLatestVersion() ? 'Compatible with the latest version' : 'Not compatible with the latest version' }}
                                </div>

                                <div class="text-xs text-dolphin/80">
                                    Supported versions:
                                    {{ implode(' - ', array_map(fn (int $version): string => $version . '.x', $article->versions)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Categories --}}
                <div class="flex flex-wrap items-center gap-3.5 pt-6">
                    @foreach ($article->getCategories() as $category)
                        <div
                            class="select-none rounded-full bg-stone-200/50 px-5 py-2.5 text-sm"
                        >
                            <div class="text-sm">
                                {{ $category->name }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Content --}}
                <div class="pt-8">
                    <div
                        class="prose selection:bg-stone-500/30 prose-a:break-words prose-blockquote:not-italic prose-code:break-words prose-code:rounded prose-code:bg-merino prose-code:px-1.5 prose-code:py-0.5 prose-code:font-normal prose-code:before:hidden prose-code:after:hidden [&_p]:before:hidden [&_p]:after:hidden"
                    >
                        {!! \App\Support\Markdown::parse($article->content) !!}
                    </div>
                </div>
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
                                    background-image: url({{ $article->author->getAvatarUrl() }});
                                "
                                class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                            ></div>
                        </div>

                        {{-- Name --}}
                        <div class="pt-3.5 text-lg font-bold">
                            {{ $article->author->name }}
                        </div>

                        {{-- Social Links --}}
                        <div class="flex items-center gap-4 pt-3">
                            {{-- Twitter --}}
                            @if (filled($article->author->twitter_url))
                                <a
                                    target="_blank"
                                    href="{{ $article->author->twitter_url }}"
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

                            {{-- GitHub --}}
                            <a
                                target="_blank"
                                href="{{ $article->author->github_url }}"
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
                            @if ($article->author->getBio())
                                <div class="prose">
                                    {!! str($article->author->getBio())->markdown()->sanitizeHtml() !!}
                                </div>
                            @endif

                            {{-- Stats --}}
                            <div class="flex justify-center">
                                <div class="grid grid-cols-2 gap-10">
                                    {{-- Articles --}}
                                    <div class="space-y-0.5">
                                        <div class="text-lg font-extrabold">
                                            {{ number_format($article->author->articles()->published()->count(),) }}
                                        </div>
                                        <div
                                            class="text-sm font-medium text-hurricane/80"
                                        >
                                            Articles
                                        </div>
                                    </div>

                                    {{-- Stars --}}
                                    <div class="space-y-0.5">
                                        <div class="text-lg font-extrabold">
                                            {{ number_format($article->author->getStarsCount()) }}
                                        </div>
                                        <div
                                            class="text-sm font-medium text-hurricane/80"
                                        >
                                            Stars
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (filled($article->author->sponsor_url))
                                {{-- Sponsor Button --}}
                                <div class="flex justify-center pb-1.5">
                                    <a
                                        href="{{ $article->author->sponsor_url }}"
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

                @if (count($otherArticles = $article->author->articles()->with(['type'])->published()->where('slug', '!=', $article->slug)->inRandomOrder()->limit(3)->get()))
                    {{-- More From This Author --}}
                    <div class="mx-auto w-full max-w-md">
                        <div class="text-lg font-extrabold">
                            More from this author
                        </div>

                        <div class="w-full space-y-5 pt-7">
                            @foreach ($otherArticles as $otherArticle)
                                <a
                                    href="{{ route('articles.view', ['article' => $otherArticle]) }}"
                                    class="relative block w-full rounded-2xl bg-white px-5 py-3 shadow-lg shadow-hurricane/5 transition duration-300 ease-out will-change-transform hover:translate-x-2"
                                >
                                    <div
                                        class="flex w-full items-center justify-between gap-5"
                                    >
                                        {{-- Article Type --}}
                                        <x-articles.type-badge
                                            :type="$otherArticle->type"
                                            size="sm"
                                        />

                                        {{-- Stars --}}
                                        <div
                                            class="flex items-center gap-1.5 pr-2"
                                        >
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
                                            >
                                                {{ number_format($otherArticle->getStarsCount()) }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Title --}}
                                    <div class="px-1 pb-1 pt-4 font-medium">
                                        <div class="line-clamp-2">
                                            {{ $otherArticle->title }}
                                        </div>
                                        <div
                                            class="pt-1 text-xs text-dolphin/80"
                                        >
                                            {{ $otherArticle->publish_date->diffForHumans() }}
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-wrap gap-x-2.5 gap-y-3 pt-3"
                                    >
                                        @foreach ($otherArticle->getCategories() as $category)
                                            <div
                                                class="rounded-full bg-slate-100 px-5 py-2.5 text-xs"
                                            >
                                                {{ $category->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-layouts.app>
