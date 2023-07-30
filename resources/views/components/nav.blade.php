<nav
    x-cloak
    x-data="{}"
    x-ref="nav"
    x-init="
        () => {
            if (reducedMotion) return
            const navTimeline = gsap
                .timeline({
                    paused: true,
                })
                .fromTo(
                    $refs.nav.querySelectorAll('.gsap-fadein'),
                    {
                        autoAlpha: 0,
                        y: -10,
                    },
                    {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.5,
                        stagger: 0.05,
                    },
                )

            if ($refs.nav.querySelectorAll('.gsap-popout').length) {
                navTimeline.fromTo(
                    $refs.nav.querySelectorAll('.gsap-popout'),
                    {
                        autoAlpha: 0,
                        y: -30,
                        rotate: 360,
                    },
                    {
                        autoAlpha: 1,
                        y: 0,
                        rotate: -45,
                        duration: 0.6,
                        ease: 'back.out(1.5)',
                    },
                    '<0.2',
                )
            }

            navTimeline.play()
        }
    "
    class="relative mx-auto flex max-w-8xl items-center justify-between overflow-x-clip px-8 py-10 sm:overflow-x-visible"
>
    {{-- Background Blob --}}
    <img
        src="{{ Vite::asset('resources/svg/background-blob.svg') }}"
        alt=""
        class="absolute -right-[5rem] -top-[10rem,clamp(50vw),40rem] z-[-100] sm:-right-[10rem] lg:-right-[10rem]"
    />

    {{-- Mobile Menu Button --}}
    <button
        x-data="{}"
        aria-controls="main-menu"
        aria-haspopup="true"
        x-on:click.prevent="$store.sidebar.isOpen = ! $store.sidebar.isOpen"
        x-on:click.away="$store.sidebar.isOpen = false"
        class="lg:hidden"
    >
        <x-heroicon-o-bars-3 class="h-6 w-6" />

        <span class="sr-only">Toggle Menu</span>
    </button>

    {{-- Filament Logo --}}
    <a
        href="/"
        class="group/filament gsap-fadein relative"
    >
        <div class="text-black">
            <svg
                fill="currentColor"
                viewBox="0 0 128 26"
                class="h-auto w-24 overflow-visible min-[400px]:w-28 md:w-36"
            >
                {{-- F --}}
                <path
                    class="transition duration-300 will-change-transform group-hover/filament:-translate-x-[1.2rem] motion-reduce:transition-none"
                    d="M4.97547 25.0814C5.22893 23.8838 5.47136 22.7255 5.70278 21.6063C5.89563 20.6736 6.11143 19.6399 6.3502 18.5051L6.49621 17.8122L7.67688 12.1042H12.199L12.9924 8.32689H8.2649C8.29796 8.15901 8.34755 7.90998 8.41367 7.57982C8.47979 7.24965 8.53489 6.97265 8.57897 6.74881C8.75529 5.88702 9.07486 5.24068 9.5377 4.80978C10.0005 4.37889 10.6397 4.16344 11.4552 4.16344C11.918 4.16344 12.3753 4.2194 12.8271 4.33132C13.2789 4.44325 13.7087 4.59993 14.1165 4.80139L15.3066 0.772252C14.954 0.615563 14.5435 0.47846 14.0751 0.360944C13.6068 0.243427 13.1136 0.153891 12.5957 0.0923344C12.0778 0.0307782 11.5598 0 11.0419 0C10.2264 0 9.44403 0.0979305 8.69468 0.293791C7.94532 0.489652 7.26209 0.819818 6.64498 1.28429C6.02787 1.74876 5.49065 2.37831 5.03332 3.17295C4.576 3.96758 4.22612 4.95808 3.98368 6.14444C3.8294 6.8943 3.66135 7.70853 3.47952 8.5871L3.53341 8.32689H0.793431L0 12.1042H2.7438L2.70361 12.2966C2.63044 12.6453 2.55815 12.9905 2.48674 13.3321L2.38029 13.8418C2.20397 14.6868 2.04419 15.4562 1.90093 16.1501L1.5538 17.8289C1.26728 19.2168 1.00556 20.4731 0.768636 21.5979C0.531709 22.7227 0.292026 23.8838 0.0495894 25.0814H4.97547Z"
                    fill="black"
                />
                {{-- I --}}
                <path
                    class="transition duration-300 will-change-transform group-hover/filament:scale-90 motion-reduce:transition-none"
                    d="M19.0468 8.29404L18.5751 9.50848L20.7854 11.0626C20.9046 11.1457 20.9681 11.3013 20.9506 11.4576L20.9429 11.5045L20.7943 12.1851C20.7569 12.3565 20.627 12.4804 20.4737 12.4907L18.5227 12.6217L20.1912 13.785C20.3103 13.8681 20.3739 14.0236 20.3564 14.18L20.3487 14.2269L20.2001 14.9075C20.1627 15.0789 20.0328 15.2028 19.8795 15.2131L17.9285 15.3444L19.597 16.5074C19.7161 16.5905 19.7797 16.746 19.7622 16.9024L19.7545 16.9493L19.6059 17.6299C19.5685 17.8013 19.4385 17.9252 19.2853 17.9355L17.3346 18.0667L19.0028 19.2298C19.1219 19.3129 19.1855 19.4684 19.168 19.6248L19.1602 19.6717L19.0117 20.3523C18.9743 20.5237 18.8443 20.6476 18.6911 20.6579L16.7403 20.789L18.4086 21.9522C18.5277 22.0353 18.5913 22.1908 18.5738 22.3472L18.566 22.3941L18.4175 23.0747C18.3801 23.2461 18.2501 23.37 18.0969 23.3803L15.3609 23.6216L15.0204 25.0814H12.8359L13.5114 22.3993C13.5488 22.2279 13.6787 22.104 13.832 22.0937L15.7828 21.962L14.1145 20.7994C13.9954 20.7163 13.9318 20.5607 13.9493 20.4044L13.957 20.3575L14.1056 19.6769C14.143 19.5055 14.2729 19.3816 14.4262 19.3713L16.3767 19.2397L14.7087 18.077C14.5896 17.9939 14.526 17.8384 14.5435 17.682L14.5513 17.6351L14.6998 16.9545C14.7372 16.7831 14.8672 16.6592 15.0204 16.6489L16.971 16.5174L15.3029 15.3546C15.1838 15.2715 15.1202 15.116 15.1377 14.9596L15.1455 14.9127L15.294 14.2321C15.3314 14.0607 15.4614 13.9368 15.6146 13.9265L17.5652 13.7951L15.8971 12.6322C15.778 12.5491 15.7144 12.3936 15.7319 12.2372L15.7397 12.1903L15.8882 11.5097C15.9256 11.3383 16.0556 11.2144 16.2088 11.2041L18.1595 11.0728L16.4913 9.90977C16.3722 9.82672 16.3086 9.67117 16.3262 9.51478L16.3339 9.46791L16.6376 8.38675L19.0468 8.29404ZM20.7269 0.151123C21.6226 0.151123 22.2863 0.456106 22.7179 1.06607C23.1496 1.67604 23.2791 2.40632 23.1064 3.25692C22.9122 4.23063 22.5102 4.88816 21.9005 5.22952C21.2907 5.57087 20.5326 5.74155 19.6261 5.74155C18.7412 5.74155 18.0749 5.47574 17.627 4.94412C17.1792 4.4125 17.0524 3.65424 17.2466 2.66934C17.4301 1.77397 17.832 1.13043 18.4526 0.738706C19.0731 0.346984 19.8312 0.151123 20.7269 0.151123Z"
                    fill="black"
                />
                {{-- L --}}
                <path
                    class="transition duration-300 will-change-transform group-hover/filament:translate-x-3 motion-reduce:transition-none"
                    d="M27.1244 21.6063C26.893 22.7255 26.656 23.8838 26.4136 25.0814H21.4712C21.7246 23.8838 21.9671 22.7227 22.1985 21.5979C22.4299 20.4731 22.6944 19.2167 22.9919 17.8289L24.9094 8.52834C25.2069 7.16291 25.4934 5.81427 25.7689 4.48241C26.0444 3.15056 26.3199 1.81311 26.5954 0.470059L31.6205 0.0335693C31.345 1.35423 31.0612 2.71127 30.7692 4.10468C30.4772 5.49809 30.1714 6.96705 29.8518 8.51155L27.9178 17.8121C27.6203 19.2223 27.3558 20.487 27.1244 21.6063Z"
                    fill="black"
                />
                {{-- AMENT --}}
                <path
                    class="transition duration-300 will-change-transform group-hover/filament:translate-x-3 motion-reduce:transition-none"
                    d="M40.1595 7.8736C41.7464 7.8736 43.0522 8.14221 44.0771 8.67943C45.1019 9.21665 45.8127 9.9805 46.2094 10.971C46.6061 11.9615 46.6557 13.1395 46.3582 14.5049C46.248 15.0645 46.1323 15.6325 46.011 16.2089C45.8898 16.7853 45.7631 17.3868 45.6309 18.0136L45.3333 19.4238C45.157 20.2632 44.9724 21.1474 44.7796 22.0763C44.5867 23.0053 44.3746 24.0069 44.1432 25.0814H39.8785L40.0934 22.8486H39.7132C39.3055 23.4417 38.8564 23.9314 38.366 24.3175C37.8756 24.7036 37.3439 24.9946 36.7709 25.1905C36.1979 25.3864 35.5807 25.4843 34.9195 25.4843C33.8727 25.4843 32.9966 25.2241 32.2913 24.7036C31.586 24.1832 31.0957 23.4921 30.8202 22.6303C30.5447 21.7685 30.5171 20.8284 30.7375 19.8099C30.9028 19.0265 31.17 18.3717 31.5392 17.8457C31.9084 17.3197 32.3547 16.8888 32.8781 16.553C33.4016 16.2173 33.9801 15.9515 34.6137 15.7556C35.2474 15.5597 35.9058 15.4114 36.5891 15.3107L41.7629 14.4881C41.8731 13.9845 41.8318 13.5452 41.6389 13.1702C41.4461 12.7953 41.1017 12.5043 40.6058 12.2973C40.1099 12.0902 39.4763 11.9867 38.7049 11.9867C38.3082 11.9867 37.8866 12.0175 37.4403 12.079C36.994 12.1406 36.5284 12.2301 36.0436 12.3476C35.5587 12.4651 35.06 12.6106 34.5476 12.7841C34.0352 12.9576 33.509 13.1618 32.969 13.3969L33.7459 8.9984C34.1426 8.8641 34.5945 8.73259 35.1014 8.60388C35.6083 8.47517 36.1428 8.35486 36.7048 8.24294C37.2668 8.13102 37.8426 8.04148 38.4321 7.97433C39.0217 7.90718 39.5975 7.8736 40.1595 7.8736ZM41.1513 16.7545C40.997 16.8664 40.8097 16.9755 40.5893 17.0819C40.3689 17.1882 40.0658 17.2945 39.6801 17.4008C39.2944 17.5072 38.771 17.6331 38.1098 17.7786C37.68 17.8793 37.2888 17.9968 36.9362 18.1311C36.5835 18.2654 36.2915 18.4557 36.0601 18.7019C35.8287 18.9481 35.6744 19.2671 35.5973 19.6588C35.4871 20.2744 35.5918 20.7529 35.9113 21.0942C36.2309 21.4356 36.6662 21.6062 37.2172 21.6062C37.6139 21.6062 38.0134 21.5195 38.4156 21.346C38.8178 21.1726 39.2035 20.9235 39.5727 20.599C39.9419 20.2744 40.2807 19.8883 40.5893 19.4406L41.1513 16.7545ZM65.1814 10.8634C65.0078 10.0209 64.6549 9.34892 64.1227 8.84731C63.4339 8.19817 62.4724 7.8736 61.2382 7.8736C60.4778 7.8736 59.7478 8.0079 59.048 8.27651C58.3482 8.54512 57.7036 8.91166 57.114 9.37613C56.5245 9.8406 56.0258 10.3582 55.6181 10.929H55.2048L55.5519 8.07506L51.3864 8.32688C51.0999 9.72589 50.8189 11.0773 50.5434 12.3812C50.2679 13.6851 50.009 14.9414 49.7665 16.1501L49.4194 17.8289C49.1219 19.2167 48.8574 20.4731 48.626 21.5979C48.3945 22.7227 48.1521 23.8838 47.8987 25.0814H52.8411C53.0835 23.8838 53.3204 22.731 53.5518 21.623C53.7833 20.515 54.0312 19.3343 54.2957 18.0808L55.0065 14.6056C55.3591 14.1915 55.7145 13.8222 56.0726 13.4976C56.4308 13.173 56.8055 12.9156 57.1967 12.7254C57.5879 12.5351 58.0039 12.44 58.4447 12.44C59.2161 12.44 59.7092 12.7449 59.9241 13.3549C60.139 13.9649 60.1417 14.7735 59.9324 15.7808L59.453 18.0975C59.1885 19.351 58.9461 20.5262 58.7257 21.623C58.5053 22.7199 58.2683 23.8726 58.0149 25.0814H62.9408C63.1942 23.8838 63.4394 22.7227 63.6764 21.5979C63.9133 20.4731 64.175 19.2167 64.4615 17.8289C64.5938 17.1798 64.7232 16.553 64.85 15.9487C64.9767 15.3443 65.0896 14.8071 65.1888 14.337L65.1654 14.4463L65.2003 14.4074C65.4366 14.1475 65.6754 13.905 65.9166 13.6799L66.098 13.5144C66.4616 13.1898 66.8391 12.9296 67.2303 12.7337C67.6215 12.5379 68.0375 12.44 68.4783 12.44C69.2496 12.44 69.7428 12.7449 69.9577 13.3549C70.1726 13.9649 70.1753 14.7735 69.9659 15.7808L69.4866 18.0975C69.2331 19.3622 68.9934 20.5402 68.7675 21.6314C68.5416 22.7227 68.3019 23.8726 68.0485 25.0814H72.9909C73.2333 23.8838 73.4703 22.7255 73.7017 21.6062C73.9331 20.487 74.1976 19.2279 74.4951 17.8289C74.6273 17.1798 74.7568 16.553 74.8836 15.9487C75.0103 15.3443 75.1232 14.8071 75.2224 14.337C75.6412 12.3784 75.5089 10.8115 74.8257 9.63635C74.1425 8.46118 72.9578 7.8736 71.2718 7.8736C70.5114 7.8736 69.7786 8.0107 69.0733 8.28491C68.3681 8.55911 67.7151 8.93125 67.1145 9.40132C66.514 9.87138 65.9988 10.403 65.569 10.9962H65.2065L65.1814 10.8634ZM86.5493 7.8736C88.2795 7.8736 89.69 8.19257 90.781 8.83052C91.8719 9.46847 92.6103 10.3638 92.9959 11.5166C93.3816 12.6694 93.3872 14.0124 93.0125 15.5458C92.9243 15.9151 92.8334 16.262 92.7397 16.5866C92.6695 16.83 92.5946 17.0672 92.515 17.298L92.4339 17.5267H82.3145L82.3113 17.593C82.288 18.2334 82.3811 18.7905 82.5904 19.2643C82.9045 19.975 83.4252 20.5066 84.1525 20.8592C84.8798 21.2117 85.7724 21.388 86.8303 21.388C87.2932 21.388 87.8083 21.346 88.3759 21.2621C88.9434 21.1782 89.5082 21.0494 90.0702 20.876C90.6322 20.7025 91.1501 20.4814 91.624 20.2128L90.9628 24.477C90.6652 24.6561 90.2575 24.824 89.7396 24.9807C89.2216 25.1373 88.6238 25.2661 87.9461 25.3668C87.2684 25.4675 86.5383 25.5179 85.7559 25.5179C83.7723 25.5179 82.1166 25.1289 80.7887 24.3511C79.4608 23.5733 78.5241 22.468 77.9786 21.0355C77.4331 19.6029 77.3588 17.9017 77.7555 15.9319C78.0861 14.309 78.6481 12.8932 79.4415 11.6845C80.2349 10.4758 81.2322 9.53842 82.4334 8.87249C83.6346 8.20656 85.0065 7.8736 86.5493 7.8736ZM86.6485 11.4159C86.0865 11.4159 85.5383 11.567 85.0038 11.8692C84.4693 12.1713 83.9927 12.6414 83.574 13.2794C83.3227 13.6621 83.1072 14.1114 82.9273 14.6271L82.8777 14.7744L88.8514 14.6478L88.8702 14.5036C88.9521 13.767 88.8452 13.1071 88.5494 12.5239C88.1748 11.7852 87.5411 11.4159 86.6485 11.4159ZM99.102 25.0814C99.3445 23.8838 99.5814 22.7338 99.8128 21.6314C100.044 20.529 100.292 19.3455 100.557 18.0808L101.267 14.6056C101.62 14.1915 101.981 13.8222 102.35 13.4976C102.719 13.173 103.105 12.9156 103.507 12.7254C103.909 12.5351 104.347 12.44 104.821 12.44C105.692 12.44 106.243 12.7449 106.474 13.3549C106.706 13.9649 106.711 14.7735 106.491 15.7808L106.011 18.0975C105.758 19.351 105.518 20.5262 105.292 21.623C105.067 22.7199 104.827 23.8726 104.573 25.0814H109.516C109.769 23.8838 110.014 22.7227 110.251 21.5979C110.488 20.4731 110.745 19.2167 111.02 17.8289C111.163 17.1798 111.298 16.553 111.425 15.9487C111.552 15.3443 111.665 14.8071 111.764 14.337C112.172 12.3784 112.028 10.8115 111.334 9.63635C110.64 8.46118 109.4 7.8736 107.615 7.8736C106.832 7.8736 106.08 8.0079 105.359 8.27651C104.637 8.54512 103.978 8.91166 103.383 9.37613C102.788 9.8406 102.287 10.3582 101.879 10.929H101.466L101.813 8.07506L97.6474 8.32688C97.3609 9.72589 97.0799 11.0801 96.8044 12.3896C96.5289 13.6991 96.2699 14.9526 96.0275 16.1501L95.6804 17.8289C95.3938 19.2056 95.1321 20.4591 94.8952 21.5895C94.6583 22.7199 94.4131 23.8838 94.1596 25.0814H99.102ZM120.965 25.5347C121.362 25.5347 121.791 25.4983 122.254 25.4255C122.717 25.3528 123.15 25.2577 123.552 25.1401C123.954 25.0226 124.271 24.8855 124.502 24.7288L125.031 20.6158C124.601 20.9179 124.174 21.1306 123.75 21.2537C123.326 21.3768 122.937 21.4384 122.585 21.4384C121.78 21.4384 121.232 21.1586 120.94 20.599C120.648 20.0394 120.618 19.2223 120.849 18.1479L122.097 12.1042H127.015L127.808 8.32688H122.884L122.917 8.16949C122.989 7.83058 123.057 7.50308 123.123 7.18699L123.188 6.87471C123.359 6.05209 123.527 5.25186 123.692 4.47401C123.858 3.69617 124.028 2.87075 124.205 1.99777L119.147 2.88754C118.915 3.99555 118.692 5.06999 118.477 6.11085C118.348 6.73537 118.208 7.40219 118.058 8.11132L118.012 8.32688H115.345L114.551 12.1042H117.227L117.206 12.2058L117.146 12.4987C116.97 13.3661 116.802 14.1775 116.642 14.933C116.483 15.6885 116.331 16.4159 116.188 17.1154C116.044 17.8149 115.896 18.5284 115.741 19.2559C115.444 20.6773 115.477 21.8525 115.841 22.7814C116.204 23.7104 116.83 24.4015 117.717 24.8547C118.604 25.308 119.687 25.5347 120.965 25.5347Z"
                    fill="black"
                />
            </svg>

            {{-- Bulb --}}
            <div
                class="absolute -left-2 -top-3.5 -z-10 opacity-0 transition duration-300 will-change-transform group-hover/filament:opacity-100 motion-reduce:transition-none min-[400px]:-left-1 md:-left-px md:-top-2.5"
            >
                <svg
                    width="37"
                    height="52"
                    class="scale-[.65] min-[400px]:scale-75 md:scale-100"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <circle
                        cx="18.697"
                        cy="17.903"
                        r="12.731"
                        class="text-yellow-400"
                        fill="currentColor"
                    />
                    <path
                        d="M12.287 51.322a.992.992 0 0 1-.983-.842 1.003 1.003 0 0 1 .672-1.107l11.732-3.871a1.064 1.064 0 0 0 .147-1.952 1.05 1.05 0 0 0-.804-.06l-7.764 2.56a3.03 3.03 0 0 1-2.3-.2 3.054 3.054 0 0 1-1.498-1.767 3.072 3.072 0 0 1 .167-2.314c.356-.72.98-1.27 1.736-1.53l11.415-3.765c1.064-1.526 2.293-3.003 3.484-4.435 3.457-4.154 6.725-8.077 6.725-13.448 0-9.15-7.407-16.593-16.511-16.593S1.987 9.443 1.987 18.593c0 5.37 3.266 9.294 6.725 13.448 1.264 1.519 2.571 3.09 3.678 4.715a1.003 1.003 0 0 1-.612 1.551.99.99 0 0 1-1.029-.422c-1.053-1.546-2.272-3.01-3.563-4.562C3.653 29.078 0 24.69 0 18.593 0 8.34 8.299 0 18.5 0S37 8.34 37 18.593c0 6.097-3.653 10.485-7.186 14.73-1.29 1.551-2.51 3.016-3.563 4.562a.995.995 0 0 1-.511.385l-11.731 3.871c-.262.09-.477.281-.6.53a1.065 1.065 0 0 0 .46 1.412c.246.128.532.153.796.07l7.768-2.56a3.029 3.029 0 0 1 2.3.2 3.054 3.054 0 0 1 1.498 1.767 3.072 3.072 0 0 1-.168 2.314c-.355.72-.98 1.27-1.735 1.53l-11.732 3.871a.975.975 0 0 1-.31.047Z"
                        fill="#000"
                    />
                    <path
                        d="M11.568 38.32a.992.992 0 0 1-.981-.842 1.005 1.005 0 0 1 .67-1.107l4.236-1.397a.99.99 0 0 1 1.255.639 1.004 1.004 0 0 1-.635 1.261l-4.235 1.396a1 1 0 0 1-.31.05Z"
                        fill="#000"
                    />
                </svg>
            </div>
        </div>
    </a>

    {{-- Nav Links --}}
    <div class="flex items-center justify-end gap-8 font-semibold sm:gap-14">
        {{-- <div class="group/packages relative"> --}}
        {{-- <div --}}
        {{-- class="peer hidden text-evening opacity-80 transition delay-75 duration-300 group-hover/packages:opacity-100 motion-reduce:transition-none lg:block" --}}
        {{-- > --}}
        {{-- <div class="gsap-fadein flex items-center gap-2"> --}}
        {{-- <div>Packages</div> --}}
        {{-- <div --}}
        {{-- class="transition duration-200 group-hover/packages:rotate-180 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="24" --}}
        {{-- height="24" --}}
        {{-- class="scale-90" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="m19 9l-7 6l-7-6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}

        {{--  --}}
        {{-- Packages Menu --}}
        {{-- <div --}}
        {{-- class="invisible absolute -right-[40rem] top-6 z-[100] w-screen max-w-4xl -translate-y-2 p-5 opacity-0 transition delay-75 duration-300 hover:visible hover:translate-y-0 hover:opacity-100 peer-hover:visible peer-hover:translate-y-0 peer-hover:opacity-100 motion-reduce:transition-none min-[1100px]:-right-[30rem] min-[1400px]:right-1/2 min-[1400px]:translate-x-1/2" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="flex items-start rounded-xl bg-cream px-8 pb-8 pt-7 shadow-xl shadow-black/10 ring-1 ring-merino" --}}
        {{-- > --}}
        {{--  --}}
        {{-- Left Side --}}
        {{-- <div class="space-y-4"> --}}
        {{-- <div class="text-sm font-medium text-hurricane/70"> --}}
        {{-- Essentials --}}
        {{-- </div> --}}
        {{-- <div class="grid gap-7"> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="37" --}}
        {{-- height="37" --}}
        {{-- viewBox="0 0 21 21" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- d="m17.498 15.498l-.01-10a2 2 0 0 0-2-1.998h-10a2 2 0 0 0-1.995 1.85l-.006.152l.01 10a2 2 0 0 0 2 1.998h10a2 2 0 0 0 1.995-1.85zM7.5 7.5v9.817m10-9.817h-14" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Panel Builder --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Build a Laravel admin panel, customer-facing --}}
        {{-- app, SaaS, or anything you can imagine! --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="37" --}}
        {{-- height="37" --}}
        {{-- viewBox="0 0 48 48" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="currentColor" --}}
        {{-- d="M21 21.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0Zm-2.5 0a2 2 0 1 0-4 0a2 2 0 0 0 4 0Zm-2 15.5a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm0-2.5a2 2 0 1 1 0-4a2 2 0 0 1 0 4ZM13.25 12a1.25 1.25 0 1 0 0 2.5h21.5a1.25 1.25 0 1 0 0-2.5h-21.5ZM23 21.75c0-.69.56-1.25 1.25-1.25h10.5a1.25 1.25 0 1 1 0 2.5h-10.5c-.69 0-1.25-.56-1.25-1.25ZM24.25 31a1.25 1.25 0 1 0 0 2.5h10.5a1.25 1.25 0 1 0 0-2.5h-10.5Zm-12-25A6.25 6.25 0 0 0 6 12.25v23.5A6.25 6.25 0 0 0 12.25 42h23.5A6.25 6.25 0 0 0 42 35.75v-23.5A6.25 6.25 0 0 0 35.75 6h-23.5ZM8.5 12.25a3.75 3.75 0 0 1 3.75-3.75h23.5a3.75 3.75 0 0 1 3.75 3.75v23.5a3.75 3.75 0 0 1-3.75 3.75h-23.5a3.75 3.75 0 0 1-3.75-3.75v-23.5Z" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Form Builder --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Easily build stunning Livewire-powered forms --}}
        {{-- with over 25 components out of the box. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="37" --}}
        {{-- height="37" --}}
        {{-- viewBox="0 0 28 28" --}}
        {{-- > --}}
        {{-- <path fill="currentColor" d="M3 6.75A3.75 3.75 0 0 1 6.75 3h14.5A3.75 3.75 0 0 1 25 6.75v14.5A3.75 3.75 0 0 1 21.25 25H6.75A3.75 3.75 0 0 1 3 21.25V6.75ZM4.5 18.5v2.75a2.25 2.25 0 0 0 2.25 2.25H9.5v-5h-5Zm5-1.5v-6h-5v6h5Zm1.5 1.5v5h6v-5h-6Zm6-1.5v-6h-6v6h6Zm1.5 1.5v5h2.75a2.25 2.25 0 0 0 2.25-2.25V18.5h-5Zm5-1.5v-6h-5v6h5Zm0-10.25a2.25 2.25 0 0 0-2.25-2.25H18.5v5h5V6.75ZM17 4.5h-6v5h6v-5Zm-7.5 0H6.75A2.25 2.25 0 0 0 4.5 6.75V9.5h5v-5Z"/> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Table Builder --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- ></path> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Craft beautiful, optimized, and interactive --}}
        {{-- Livewire-powered datatables for any situation. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="31" --}}
        {{-- height="31" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <g --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-width="1.5" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- d="M18.75 9.71v-.705C18.75 5.136 15.726 2 12 2S5.25 5.136 5.25 9.005v.705a4.4 4.4 0 0 1-.692 2.375L3.45 13.81c-1.011 1.575-.239 3.716 1.52 4.214a25.775 25.775 0 0 0 14.06 0c1.759-.498 2.531-2.639 1.52-4.213l-1.108-1.725a4.4 4.4 0 0 1-.693-2.375Z" --}}
        {{-- /> --}}
        {{-- <path --}}
        {{-- stroke-linecap="round" --}}
        {{-- d="M7.5 19c.655 1.748 2.422 3 4.5 3s3.845-1.252 4.5-3" --}}
        {{-- /> --}}
        {{-- </g> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Notifications --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Notify your users of important events by --}}
        {{-- delivering real-time messages using Livewire. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{--  --}}
        {{-- Seperator --}}
        {{-- <div class="pl-4 pr-6 pt-10"> --}}
        {{-- <div --}}
        {{-- class="h-80 w-px rounded-full bg-hurricane/10" --}}
        {{-- ></div> --}}
        {{-- </div> --}}

        {{--  --}}
        {{-- Right Side --}}
        {{-- <div class="space-y-4"> --}}
        {{-- <div class="text-sm font-medium text-hurricane/70"> --}}
        {{-- New in Version 3 --}}
        {{-- </div> --}}
        {{-- <div class="grid gap-7"> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="32" --}}
        {{-- height="32" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M15.414 10.941c.781.462.781 1.656 0 2.118l-4.72 2.787C9.934 16.294 9 15.71 9 14.786V9.214c0-.924.934-1.507 1.694-1.059l4.72 2.787Z"/></g> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Actions --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="rounded-full bg-peach-orange px-3 py-0.5 text-xs text-evening" --}}
        {{-- > --}}
        {{-- New --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- ></path> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Open interactive modals and slide-overs - a --}}
        {{-- great way to keep the user in the flow of the --}}
        {{-- application. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="34" --}}
        {{-- height="34" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <g --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-width="1.5" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- d="M16 4.002c2.175.012 3.353.109 4.121.877C21 5.758 21 7.172 21 10v6c0 2.829 0 4.243-.879 5.122C19.243 22 17.828 22 15 22H9c-2.828 0-4.243 0-5.121-.878C3 20.242 3 18.829 3 16v-6c0-2.828 0-4.242.879-5.121c.768-.768 1.946-.865 4.121-.877" --}}
        {{-- /> --}}
        {{-- <path --}}
        {{-- stroke-linecap="round" --}}
        {{-- d="M10.5 14H17M7 14h.5M7 10.5h.5m-.5 7h.5m3-7H17m-6.5 7H17" --}}
        {{-- /> --}}
        {{-- <path --}}
        {{-- d="M8 3.5A1.5 1.5 0 0 1 9.5 2h5A1.5 1.5 0 0 1 16 3.5v1A1.5 1.5 0 0 1 14.5 6h-5A1.5 1.5 0 0 1 8 4.5v-1Z" --}}
        {{-- /> --}}
        {{-- </g> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Infolist Builder --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="rounded-full bg-peach-orange px-3 py-0.5 text-xs text-evening" --}}
        {{-- > --}}
        {{-- New --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Display read-only information to users about a --}}
        {{-- particular record, with a fully flexible layout. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- <a --}}
        {{-- href="#" --}}
        {{-- class="group/package-link flex items-center gap-5 transition duration-300 will-change-transform hover:translate-x-0.5 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <div --}}
        {{-- class="grid h-[3.25rem] w-[3.25rem] shrink-0 place-items-center rounded-xl bg-merino text-hurricane" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="32" --}}
        {{-- height="32" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <g fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 22h18"/><path d="M3 11c0-.943 0-1.414.293-1.707C3.586 9 4.057 9 5 9c.943 0 1.414 0 1.707.293C7 9.586 7 10.057 7 11v6c0 .943 0 1.414-.293 1.707C6.414 19 5.943 19 5 19c-.943 0-1.414 0-1.707-.293C3 18.414 3 17.943 3 17v-6Zm7-4c0-.943 0-1.414.293-1.707C10.586 5 11.057 5 12 5c.943 0 1.414 0 1.707.293C14 5.586 14 6.057 14 7v10c0 .943 0 1.414-.293 1.707C13.414 19 12.943 19 12 19c-.943 0-1.414 0-1.707-.293C10 18.414 10 17.943 10 17V7Zm7-3c0-.943 0-1.414.293-1.707C17.586 2 18.057 2 19 2c.943 0 1.414 0 1.707.293C21 2.586 21 3.057 21 4v13c0 .943 0 1.414-.293 1.707C20.414 19 19.943 19 19 19c-.943 0-1.414 0-1.707-.293C17 18.414 17 17.943 17 17V4Z"/></g> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- <div class="space-y-0.5"> --}}
        {{-- <div class="flex items-center gap-2"> --}}
        {{-- <div --}}
        {{-- class="text-base font-bold text-evening" --}}
        {{-- > --}}
        {{-- Widgets --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="rounded-full bg-peach-orange px-3 py-0.5 text-xs text-evening" --}}
        {{-- > --}}
        {{-- New --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="-translate-x-1 scale-x-90 text-butter opacity-0 transition duration-300 group-hover/package-link:translate-x-0 group-hover/package-link:scale-x-100 group-hover/package-link:opacity-100 motion-reduce:transition-none" --}}
        {{-- > --}}
        {{-- <svg --}}
        {{-- xmlns="http://www.w3.org/2000/svg" --}}
        {{-- width="22" --}}
        {{-- height="22" --}}
        {{-- viewBox="0 0 24 24" --}}
        {{-- > --}}
        {{-- <path --}}
        {{-- fill="none" --}}
        {{-- stroke="currentColor" --}}
        {{-- stroke-linecap="round" --}}
        {{-- stroke-linejoin="round" --}}
        {{-- stroke-width="2" --}}
        {{-- d="M4 12h16m0 0l-6-6m6 6l-6 6" --}}
        {{-- /> --}}
        {{-- </svg> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{-- class="max-w-xs text-sm font-medium text-dolphin" --}}
        {{-- > --}}
        {{-- Build a dashboard for your application, complete --}}
        {{-- with real-time charts and stats. --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}

        <a
            href="{{ route('docs') }}"
            @class([
                'hidden transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none lg:block',
                'text-evening opacity-80' => ! request()->routeIs('docs*'),
                'text-butter' => request()->routeIs('docs*'),
            ])
        >
            <div class="gsap-fadein">Documentation</div>
        </a>

        <a
            href="{{ route('plugins') }}"
            @class([
                'group/nav-link relative hidden text-evening transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('plugins*'),
                'font-bold' => request()->routeIs('plugins*'),
            ])
        >
            <div class="gsap-fadein">Plugins</div>

            @if (request()->routeIs('plugins*'))
                <div
                    class="gsap-popout absolute -bottom-4 right-1/2 translate-x-1/2"
                >
                    <div
                        class="h-2 w-2 bg-butter transition duration-300 group-hover/nav-link:rotate-90 group-hover/nav-link:bg-purple-400 motion-reduce:transition-none"
                    ></div>
                </div>
            @endif
        </a>

        <a
            href="{{ route('articles') }}"
            @class([
                'group/nav-link relative hidden text-evening transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('articles*'),
                'font-bold' => request()->routeIs('articles*'),
            ])
        >
            <div class="gsap-fadein">Community</div>

            @if (request()->routeIs('articles*'))
                <div
                    class="gsap-popout absolute -bottom-4 right-1/2 translate-x-1/2"
                >
                    <div
                        class="h-2 w-2 bg-butter transition duration-300 group-hover/nav-link:rotate-90 group-hover/nav-link:bg-purple-400 motion-reduce:transition-none"
                    ></div>
                </div>
            @endif
        </a>

        <a
            href="{{ route('consulting') }}"
            @class([
                'group/nav-link relative hidden text-evening transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('consulting*'),
                'font-bold' => request()->routeIs('consulting*'),
            ])
        >
            <div class="gsap-fadein">Consulting</div>

            @if (request()->routeIs('consulting*'))
                <div
                    class="gsap-popout absolute -bottom-4 right-1/2 translate-x-1/2"
                >
                    <div
                        class="h-2 w-2 bg-butter transition duration-300 group-hover/nav-link:rotate-90 group-hover/nav-link:bg-purple-400 motion-reduce:transition-none"
                    ></div>
                </div>
            @endif
        </a>

        {{-- Github --}}
        <div class="group/github relative">
            {{-- Github Icon --}}
            <a
                href="https://github.com/filamentphp/filament"
                target="_blank"
                class="peer text-evening opacity-80 transition delay-75 duration-300 group-hover/github:opacity-100 motion-reduce:transition-none"
            >
                <div class="gsap-fadein">
                    <svg
                        fill="currentColor"
                        viewBox="0 0 29 29"
                        class="h-7 w-7"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M1372.32,16.8097415 C1372.32,23.1517351 1376.33105,28.5314586 1381.89427,30.4295626 C1382.59472,30.5617425 1382.84997,30.1184991 1382.84997,29.7378209 C1382.84997,29.3976778 1382.83794,28.4944483 1382.83107,27.296898 C1378.9369,28.1639984 1378.11527,25.3723581 1378.11527,25.3723581 C1377.47841,23.7139404 1376.56052,23.2724594 1376.56052,23.2724594 C1375.2894,22.3824478 1376.65678,22.4000718 1376.65678,22.4000718 C1378.06198,22.5014098 1378.80111,23.8796059 1378.80111,23.8796059 C1380.04989,26.0729117 1382.07819,25.4393292 1382.87576,25.071869 C1383.00296,24.144847 1383.36478,23.5121457 1383.76443,23.1534975 C1380.6558,22.7913244 1377.38731,21.5594074 1377.38731,16.0589595 C1377.38731,14.4921866 1377.93306,13.2100411 1378.82861,12.207236 C1378.68422,11.8441818 1378.20379,10.384034 1378.96612,8.40838451 C1378.96612,8.40838451 1380.14099,8.02241909 1382.8156,9.87998785 C1383.93202,9.56099359 1385.13009,9.40237767 1386.32043,9.39620927 C1387.50991,9.40237767 1388.70712,9.56099359 1389.82526,9.87998785 C1392.49815,8.02241909 1393.6713,8.40838451 1393.6713,8.40838451 C1394.43535,10.384034 1393.95492,11.8441818 1393.81139,12.207236 C1394.70866,13.2100411 1395.25011,14.4921866 1395.25011,16.0589595 C1395.25011,21.5735066 1391.97647,22.7869184 1388.85838,23.1420419 C1389.3603,23.5852853 1389.80808,24.4611977 1389.80808,25.8006211 C1389.80808,27.7189926 1389.79089,29.2672603 1389.79089,29.7378209 C1389.79089,30.1220239 1390.04356,30.5687921 1390.75347,30.4286814 C1396.31239,28.5261714 1400.32,23.1499727 1400.32,16.8097415 C1400.32,8.8815887 1394.05118,2.455 1386.31871,2.455 C1378.58882,2.455 1372.32,8.8815887 1372.32,16.8097415 Z"
                            transform="translate(-1372 -2)"
                        ></path>
                    </svg>
                </div>
            </a>

            {{-- Star Count --}}
            <div
                class="invisible absolute right-1/2 top-7 -translate-y-2 translate-x-1/3 p-3 opacity-0 transition delay-75 duration-300 hover:visible hover:translate-y-0 hover:opacity-100 peer-hover:visible peer-hover:translate-y-0 peer-hover:opacity-100 motion-reduce:transition-none min-[1400px]:translate-x-1/2"
            >
                <div
                    class="flex items-center justify-center gap-2 whitespace-nowrap rounded-xl bg-cream py-2.5 pl-2.5 pr-4 shadow-xl shadow-black/5"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="scale-90 text-butter"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="currentColor"
                            d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                        />
                    </svg>
                    <div class="text-sm text-evening">
                        {{ number_format(floor(app('package-github-stars-stats')() / 100) / 10, 1) }}k
                        Stars
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
