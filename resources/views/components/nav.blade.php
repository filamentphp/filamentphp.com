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
        alt="Blob"
        class="absolute -top-[10rem,clamp(50vw),40rem] right-0 z-[-100] lg:-right-[10rem]"
    />

    {{-- Mobile Menu Button --}}
    <button
        x-data="{}"
        aria-controls="main-menu"
        aria-haspopup="true"
        x-on:click.prevent="$store.sidebar.isOpen = ! $store.sidebar.isOpen"
        x-on:click.away="$store.sidebar.isOpen = false"
        class="transition duration-300 hover:scale-110 lg:hidden"
    >
        <x-heroicon-o-bars-3 class="h-7 w-7" />

        <span class="sr-only">Toggle Menu</span>
    </button>

    @php
        $today = \Carbon\Carbon::now();
        $isHalloween = $today->between(\Carbon\Carbon::parse('October 25'), \Carbon\Carbon::parse('November 1'));
        $isChristmas = $today->between(\Carbon\Carbon::parse('December 01'), \Carbon\Carbon::parse('December 30'));
    @endphp

    {{-- Conditionally display the logos --}}
    @if ($isHalloween)
        {{-- Halloween Logo --}}
        <x-nav.halloween-logo />
    @elseif ($isChristmas)
        {{-- Christmas Logo --}}
        <x-nav.christmas-logo />
    @else
        {{-- Normal Logo --}}
        <x-nav.logo />
    @endif

    {{-- Nav Links --}}
    <div class="flex items-center justify-end gap-8 font-semibold sm:gap-14">
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
            <div class="gsap-fadein">Content</div>

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

        <a
            href="https://shop.filamentphp.com"
            class="group/nav-link relative hidden text-evening opacity-80 transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none lg:block"
        >
            <div class="gsap-fadein">Shop</div>
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
