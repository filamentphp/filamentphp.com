<section
    x-cloak
    x-data
    x-ref="section"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
                $refs.section,
                {
                    autoAlpha: 0,
                },
                {
                    autoAlpha: 1,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    class="mx-auto w-full max-w-5xl px-5 pt-32"
>
    {{-- Scaling --}}
    <div class="flex flex-wrap items-center justify-center gap-x-20 gap-y-10">
        <img
            src="{{ Vite::asset('resources/images/use-cases/admin-panel/shuttlelaunch.webp') }}"
            alt=""
            class="w-80"
        />

        <div class="text-center min-[950px]:text-left">
            {{-- Title --}}
            <div class="text-3xl font-black">The possibilities are endless</div>

            {{-- Description --}}
            <div class="max-w-lg pt-5 text-lg font-medium text-dolphin">
                If you’re building something big, whether it’s a SaaS app or an
                online shop, and you need multiple "admin" panels, with
                multi-tenant teams and a billing integration, we’ve got
                everything you’ll needl!
            </div>
        </div>
    </div>

    {{-- Saas --}}
    <div class="pt-32 text-center">
        <div class="text-2xl font-black sm:text-3xl">
            Turn your panel into a SaaS
        </div>
        <div class="pt-1 font-medium text-dolphin sm:text-lg">
            You can have as many panels as you want!
        </div>
    </div>

    {{-- Stack --}}
    <div
        class="flex flex-col items-center justify-center gap-x-10 gap-y-7 py-20 text-center min-[500px]:flex-row"
    >
        {{-- Admin Panel --}}
        <div
            class="grid place-items-center gap-3 rounded-xl bg-[#f6eeee]/80 px-14 py-10 text-[#B7A1A1]"
        >
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 52 52"
                    fill="none"
                >
                    <path
                        d="M6.5 22.5703C6.5 15.6413 6.5 12.1768 7.319 11.0112C8.13583 9.84766 11.3923 8.73183 17.9075 6.50233L19.149 6.07766C22.5442 4.91416 24.2407 4.3335 26 4.3335C27.7572 4.3335 29.4558 4.91416 32.851 6.07766L34.0925 6.50233C40.6077 8.73183 43.8642 9.84766 44.681 11.0112C45.5 12.1768 45.5 15.6435 45.5 22.5703V25.9807C45.5 38.1963 36.3155 44.1265 30.5522 46.642C28.99 47.3245 28.21 47.6668 26 47.6668C23.79 47.6668 23.01 47.3245 21.4478 46.642C15.6845 44.1243 6.5 38.1985 6.5 25.9807V22.5703Z"
                        stroke="currentColor"
                        stroke-width="3"
                    />
                    <path
                        d="M26 23.8337C28.3932 23.8337 30.3333 21.8936 30.3333 19.5003C30.3333 17.1071 28.3932 15.167 26 15.167C23.6067 15.167 21.6666 17.1071 21.6666 19.5003C21.6666 21.8936 23.6067 23.8337 26 23.8337Z"
                        stroke="currentColor"
                        stroke-width="3"
                    />
                    <path
                        d="M34.6667 32.5003C34.6667 34.8945 34.6667 36.8337 26 36.8337C17.3334 36.8337 17.3334 34.8945 17.3334 32.5003C17.3334 30.1062 21.2117 28.167 26 28.167C30.7884 28.167 34.6667 30.1062 34.6667 32.5003Z"
                        stroke="currentColor"
                        stroke-width="3"
                    />
                </svg>
            </div>
            <div class="font-medium">Admin Panel</div>
        </div>

        {{-- Plus --}}
        <div class="text-3xl text-[#B7A1A1]">+</div>

        {{-- SaaS Panel --}}
        <div
            class="grid place-items-center gap-3 rounded-xl bg-seashell-peach px-14 py-10 text-[#E7A586]"
        >
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 52 52"
                    fill="none"
                >
                    <path
                        d="M47.6667 47.6668H4.33337M43.3334 47.6668V23.8335M8.66671 47.6668V23.8335"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                    <path
                        d="M35.8107 4.3335H16.1893C13.5828 4.3335 12.2807 4.3335 11.2342 4.98133C10.1855 5.627 9.60265 6.79266 8.43915 9.124L5.39499 16.8135C4.69299 18.5902 4.07765 20.6832 5.26065 22.1847C5.81796 22.8932 6.58236 23.4103 7.4474 23.664C8.31244 23.9176 9.23505 23.8951 10.0867 23.5997C10.9384 23.3043 11.6768 22.7506 12.1989 22.0158C12.7211 21.281 13.0011 20.4016 13 19.5002C13 20.6494 13.4565 21.7516 14.2692 22.5643C15.0818 23.3769 16.184 23.8335 17.3333 23.8335C18.4826 23.8335 19.5848 23.3769 20.3974 22.5643C21.2101 21.7516 21.6667 20.6494 21.6667 19.5002C21.6667 20.6494 22.1232 21.7516 22.9359 22.5643C23.7485 23.3769 24.8507 23.8335 26 23.8335C27.1493 23.8335 28.2515 23.3769 29.0641 22.5643C29.8768 21.7516 30.3333 20.6494 30.3333 19.5002C30.3333 20.6494 30.7899 21.7516 31.6025 22.5643C32.4152 23.3769 33.5174 23.8335 34.6667 23.8335C35.8159 23.8335 36.9181 23.3769 37.7308 22.5643C38.5434 21.7516 39 20.6494 39 19.5002C38.9999 20.4009 39.2804 21.2793 39.8027 22.0132C40.3249 22.7471 41.0629 23.3 41.9139 23.595C42.765 23.8901 43.6868 23.9126 44.5512 23.6594C45.4157 23.4063 46.1797 22.89 46.7371 22.1825C47.9201 20.681 47.3048 18.588 46.6028 16.8113L43.5608 9.124C42.3973 6.79266 41.8145 5.627 40.7658 4.98133C39.7193 4.3335 38.4171 4.3335 35.8107 4.3335Z"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M20.5834 46.5837V40.0837C20.5834 38.0578 20.5834 37.046 21.0189 36.292C21.3041 35.798 21.7144 35.3877 22.2084 35.1025C22.9624 34.667 23.9742 34.667 26 34.667C28.0259 34.667 29.0377 34.667 29.7917 35.1025C30.2857 35.3877 30.696 35.798 30.9812 36.292C31.4167 37.046 31.4167 38.0578 31.4167 40.0837V46.5837"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                </svg>
            </div>
            <div class="font-medium">SaaS Panel</div>
        </div>
    </div>

    {{-- Teams --}}
    <div class="grid place-items-center">
        <div class="relative text-center">
            <div class="text-2xl font-black sm:text-3xl">
                Allow users to join teams
                <br />
                and collaborate with others
            </div>
            <div class="pt-1 font-medium text-dolphin sm:text-lg">
                Filament has a suite of features for building multi-tenant apps
            </div>
            {{-- Arrow --}}
            <div class="absolute -right-20 -top-10 hidden md:block">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="37.16"
                    height="186.4"
                    viewBox="0 0 47 219"
                    fill="none"
                >
                    <path
                        d="M1.19652 1.87263C11.6717 13.7241 16.3218 23.2582 16.3747 39.1023C16.4224 53.4104 10.3838 69.2654 6.07725 82.7809C0.745295 99.5142 -2.49372 132.016 17.4367 140.639C32.9122 147.334 50.4625 135.351 44.7053 118.089C42.4858 111.434 33.3139 108.379 27.2091 111.665C20.6155 115.215 17.8235 125.018 16.5856 131.764C13.2609 149.883 30.6165 161.019 34.3394 177.092C37.8176 192.109 31.5694 203.682 22.9404 215.592C22.2013 216.612 27.4074 215.859 28.7155 215.796C33.5109 215.567 31.4284 216.627 27.8026 216.801C25.4707 216.912 20.5715 218.377 21.7457 215.168C22.5928 212.853 22.5811 208.072 22.4593 205.525"
                        stroke="#6C6489"
                        stroke-width="2"
                        stroke-linecap="round"
                    />
                </svg>
            </div>
        </div>
    </div>

    {{-- SaaS Panel Box --}}
    <div class="pt-20">
        <div
            class="mx-auto max-w-3xl rounded-xl border-2 border-dashed border-dolphin/30 p-7 text-center"
        >
            <div class="text-[#E7A586]">
                <div class="text-xl font-semibold">Teams</div>
                <div
                    class="grid grid-cols-[repeat(auto-fill,minmax(12rem,1fr))] gap-7 pt-5"
                >
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-seashell-peach p-10"
                    >
                        <div class="truncate font-medium">Sales</div>
                    </div>
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-seashell-peach p-10"
                    >
                        <div class="truncate font-medium">Marketing</div>
                    </div>
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-seashell-peach p-10"
                    >
                        <div class="truncate font-medium">Customer Support</div>
                    </div>
                </div>
            </div>

            <div class="pt-10 text-[#69CCCC]">
                <div class="text-xl font-semibold">SaaS Features</div>
                <div
                    class="grid grid-cols-[repeat(auto-fill,minmax(12rem,1fr))] gap-7 pt-5"
                >
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-[#E8F6F6] p-10"
                    >
                        <div class="truncate font-medium">Billing</div>
                    </div>
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-[#E8F6F6] p-10"
                    >
                        <div class="truncate font-medium">Team Switching</div>
                    </div>
                    <div
                        class="grid place-items-center gap-3 rounded-xl bg-[#E8F6F6] p-10"
                    >
                        <div class="truncate font-medium">Team Management</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
