@props([
    'featuredPlugins',
])

<div
    x-cloak
    x-data="{
        plugins: @js($featuredPlugins),
    }"
    {{ $attributes->class(['mx-auto w-full max-w-8xl px-5 pt-10 sm:px-10']) }}
>
    {{-- Header --}}
    <div class="flex items-center gap-5">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 32 32"
            fill="none"
        >
            <path
                d="M16.0018 5.625C15.4836 5.625 15.0643 5.20569 15.0643 4.6875V0.9375C15.0643 0.419312 15.4836 0 16.0018 0C16.52 0 16.9393 0.419312 16.9393 0.9375V4.6875C16.9393 5.20569 16.52 5.625 16.0018 5.625Z"
                fill="#DFD7D5"
            />
            <path
                d="M11.1935 5.86306L8.54209 4.14918C8.10721 3.86812 7.98271 3.28768 8.26377 2.85281C8.54577 2.41793 9.1244 2.29162 9.56015 2.5745L12.2115 4.28837C12.6464 4.56943 12.7709 5.14987 12.4898 5.58475C12.2087 6.01931 11.6283 6.14368 11.1935 5.86306Z"
                fill="#DFD7D5"
            />
            <path
                d="M24.4393 7.5625H16.0018H7.5643C7.38542 7.5625 7.22042 7.62256 7.07349 7.71456L7.59361 13.9492L10.3768 16L15.0936 13.5976L21.6268 16L24.4393 13.8027L24.9301 7.71462C24.7833 7.62256 24.6182 7.5625 24.4393 7.5625Z"
                fill="#FFD400"
            />
            <path
                d="M21.6268 16L24.4393 13.8027L24.9302 7.71462C24.7834 7.62262 24.6182 7.56256 24.4393 7.56256H16.0018V13.9317L21.6268 16Z"
                fill="#FDBF00"
            />
            <path
                d="M19.5138 5.58469C19.2327 5.14981 19.3572 4.56938 19.7921 4.28831L22.4435 2.57444C22.8783 2.29063 23.4578 2.41788 23.7398 2.85275C24.0209 3.28763 23.8964 3.86806 23.4615 4.14913L20.8101 5.863C20.3753 6.14369 19.7949 6.01931 19.5138 5.58469Z"
                fill="#DFD7D5"
            />
            <path
                d="M30.0215 15.5029L25.234 8.00288C25.1575 7.88063 25.0486 7.78887 24.9302 7.71462L21.6268 16L16.0018 7.5625L10.3768 16L7.07348 7.71456C6.95504 7.78881 6.84611 7.88062 6.76967 8.00281L1.99467 15.5028C1.90186 15.6509 1.87579 15.8263 1.88023 15.9999L4.63467 18.8124H26.119L30.1201 15.9999C30.122 15.8202 30.1054 15.6366 30.0215 15.5029Z"
                fill="#FDBF00"
            />
            <path
                d="M26.119 18.8125L30.12 16C30.1221 15.8202 30.1054 15.6366 30.0215 15.5029L25.234 8.00288C25.1576 7.88063 25.0486 7.78887 24.9302 7.71462L21.6268 16L16.0018 7.5625V18.8125H26.119Z"
                fill="#FF9F00"
            />
            <path
                d="M21.6268 16H10.3768L9.26349 22.3281L16.0018 32L22.3006 23.6172L21.6268 16Z"
                fill="#FFD400"
            />
            <path
                d="M21.6268 16H16.0018V32L22.3006 23.6172L21.6268 16Z"
                fill="#FDBF00"
            />
            <path
                d="M1.88019 16C1.88681 16.2578 1.97494 16.5113 2.12644 16.6628L15.3389 31.7253C15.5221 31.9084 15.7619 32 16.0018 32L10.3768 16H1.88019Z"
                fill="#FF9F00"
            />
            <path
                d="M21.6268 16L16.0018 32C16.2417 32 16.4816 31.9084 16.6646 31.7253L29.8896 16.6628C30.057 16.4955 30.1171 16.2476 30.12 16H21.6268Z"
                fill="#FF7816"
            />
        </svg>
        <div class="text-2xl font-bold">Featured Plugins</div>
    </div>

    {{-- Plugin List --}}
    <div class="flex">
        <div
            x-data
            x-init="
                () => {
                    const swiper = new Swiper($el, {
                        direction: 'horizontal',
                        loop: false,
                        slidesPerView: 1,
                        spaceBetween: 0,

                        breakpoints: {
                            768: {
                                slidesPerView: 2,
                            },
                            1024: {
                                slidesPerView: 3,
                            },
                        },

                        navigation: {
                            nextEl: $refs.swiperButtonNext,
                            prevEl: $refs.swiperButtonPrev,
                        },

                        pagination: {
                            el: $refs.swiperPagination,
                        },
                    })
                }
            "
            class="swiper [--swiper-navigation-sides-offset:0] [--swiper-navigation-size:30px] [--swiper-theme-color:#F89377]"
        >
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <template
                    x-for="plugin in plugins"
                    :key="plugin.id"
                >
                    <div class="swiper-slide">
                        <div class="px-5 py-5 sm:pl-0"><x-plugins.card /></div>
                    </div>
                </template>
            </div>
            <div class="pt-7">
                <div
                    x-ref="swiperButtonPrev"
                    class="swiper-button-prev"
                ></div>
                <div
                    x-ref="swiperButtonNext"
                    class="swiper-button-next"
                ></div>

                <div
                    x-ref="swiperPagination"
                    class="swiper-pagination"
                ></div>
            </div>
        </div>
    </div>
</div>
