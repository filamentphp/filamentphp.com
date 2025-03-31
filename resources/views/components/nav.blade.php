<nav
    x-ref="nav"
    x-init="
        () => {
            if (reducedMotion) return

            motion.inView($el, (element) => {
                motion.animate(
                    $refAll('navItem'),
                    {
                        y: [-10, 0],
                        opacity: [0, 1],
                    },
                    {
                        duration: 0.7,
                        ease: motion.circOut,
                        delay: motion.stagger(0.05),
                    },
                )
            })
        }
    "
    class="relative mx-auto flex max-w-8xl items-center justify-between overflow-x-clip px-8 pb-12 pt-5 sm:overflow-x-visible"
    aria-label="Primary navigation"
>
    {{-- Mobile Menu Button --}}
    <button
        aria-controls="main-menu"
        aria-expanded="false"
        aria-haspopup="true"
        x-on:click.prevent="$store.sidebar.isOpen = ! $store.sidebar.isOpen"
        x-on:click.away="$store.sidebar.isOpen = false"
        class="transition duration-300 hover:scale-110 lg:hidden"
        id="mobile-menu-button"
    >
        <x-heroicon-o-bars-3
            class="size-7"
            aria-hidden="true"
        />
        <span class="sr-only">Toggle Main Navigation Menu</span>
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
    <div class="flex items-center justify-end gap-8 text-sm">
        {{-- Home --}}
        <a
            href="{{ route('home') }}"
            @class([
                'group relative hidden text-evening transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('home*'),
                'font-semibold' => request()->routeIs('home*'),
            ])
            @if(request()->routeIs('home*')) aria-current="page" @endif
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Home
            </div>

            @if (request()->routeIs('home*'))
                <x-nav.indicator />
            @endif
        </a>

        {{-- Documentation --}}
        <a
            href="{{ route('docs') }}"
            @class([
                'hidden transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block',
                'text-evening opacity-80' => ! request()->routeIs('docs*'),
                'text-butter' => request()->routeIs('docs*'),
            ])
            @if(request()->routeIs('docs*')) aria-current="page" @endif
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Documentation
            </div>
        </a>

        {{-- Plugins --}}
        <a
            href="{{ route('plugins') }}"
            @class([
                'group relative hidden text-evening transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('plugins*'),
                'font-semibold' => request()->routeIs('plugins*'),
            ])
            @if(request()->routeIs('plugins*')) aria-current="page" @endif
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Plugins
            </div>

            @if (request()->routeIs('plugins*'))
                <x-nav.indicator />
            @endif
        </a>

        {{-- Content --}}
        <a
            href="{{ route('articles') }}"
            @class([
                'group relative hidden text-evening transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('articles*'),
                'font-semibold' => request()->routeIs('articles*'),
            ])
            @if(request()->routeIs('articles*')) aria-current="page" @endif
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Content
            </div>

            @if (request()->routeIs('articles*'))
                <x-nav.indicator />
            @endif
        </a>

        {{-- Consulting --}}
        <a
            href="{{ route('consulting') }}"
            @class([
                'group relative hidden text-evening transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block',
                'opacity-80' => ! request()->routeIs('consulting*'),
                'font-semibold' => request()->routeIs('consulting*'),
            ])
            @if(request()->routeIs('consulting*')) aria-current="page" @endif
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Consulting
            </div>

            @if (request()->routeIs('consulting*'))
                <x-nav.indicator />
            @endif
        </a>

        {{-- Shop --}}
        <a
            href="https://shop.filamentphp.com"
            class="group relative hidden text-evening opacity-80 transition duration-300 hover:opacity-100 motion-reduce:transition-none lg:block"
            aria-label="Filament Shop"
        >
            <div
                x-ref="navItem"
                class="opacity-0 motion-reduce:opacity-100"
            >
                Shop
            </div>
        </a>

        {{-- Github --}}
        <div class="group/github relative">
            {{-- Github Icon --}}
            <a
                href="https://github.com/filamentphp/filament"
                target="_blank"
                rel="noopener noreferrer"
                class="peer text-evening opacity-80 transition delay-75 duration-300 group-hover/github:opacity-100 motion-reduce:transition-none"
                aria-label="Filament GitHub repository"
            >
                <div
                    x-ref="navItem"
                    class="opacity-0 motion-reduce:opacity-100"
                >
                    <x-icons.github
                        class="size-6"
                        aria-hidden="true"
                    />
                    <span class="sr-only">GitHub</span>
                </div>
            </a>

            {{-- Star Count --}}
            <div
                class="invisible absolute right-1/2 top-6 -translate-y-2 translate-x-1/3 p-3 opacity-0 transition delay-75 duration-300 hover:visible hover:translate-y-0 hover:opacity-100 peer-hover:visible peer-hover:translate-y-0 peer-hover:opacity-100 motion-reduce:transition-none min-[1400px]:translate-x-1/2"
                aria-hidden="true"
            >
                <div
                    class="flex items-center justify-center gap-2 whitespace-nowrap rounded-xl bg-black/5 py-3 pl-3 pr-4 backdrop-blur-md"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="-mt-0.5 size-5 text-butter"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                            fill="currentColor"
                            d="M9.153 5.408C10.42 3.136 11.053 2 12 2c.947 0 1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182c.28.213.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506c-.766.582-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452c-.347 0-.674.15-1.329.452l-.595.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882c.293-.941 1.523-1.22 3.983-1.776l.636-.144c.699-.158 1.048-.237 1.329-.45c.28-.213.46-.536.82-1.182l.328-.588Z"
                        />
                    </svg>
                    <div class="font-medium text-evening">
                        {{ number_format(floor(app('package-github-stars-stats')() / 100) / 10, 1) }}k
                        Stars
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
