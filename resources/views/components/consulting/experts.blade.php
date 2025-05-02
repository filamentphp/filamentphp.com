<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline()
                .fromTo(
                    $refs.list,
                    {
                        autoAlpha: 0,
                        x: 20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
                .fromTo(
                    $refs.quick_question,
                    {
                        autoAlpha: 0,
                        x: -20,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                    '<',
                )
        }
    "
    class="mx-auto w-full max-w-5xl px-10 pt-20"
>
    {{-- Consultant List --}}
    <div
        x-ref="list"
        class="grid grid-cols-1 gap-14 md:grid-cols-2"
    >
        <x-consulting.consultant
            avatar="{{ Vite::asset('resources/images/consulting/kirschbaum/kirschbaum.webp') }}"
            name="Kirschbaum"
            title="Official development agency"
        >
            <strong>Kirschbaum</strong>
            is the
            {{-- format-ignore-start --}}
            <strong>official development agency</strong>
            {{-- format-ignore-end --}}
            trusted by Filament. They are a team full of Filament and Laravel
            experts,
            {{-- format-ignore-start --}}
            <a href="#kirschbaum">ready to take on your projects</a>,
            {{-- format-ignore-end --}}
            whatever the size. With Kirschbaum, you're not just hiring
            developers. You're gaining a long-term partner committed to your
            success.
        </x-consulting.consultant>

        <x-consulting.consultant
            avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
            name="Zep Fietje"
            title="Lead UI Designer & Developer"
        >
            <strong>Zep</strong>
            is the lead UI designer of Filament and founder of
            {{-- format-ignore-start --}}
            <a href="https://whizzy.dev/?utm_source=filament&utm_medium=referral&utm_campaign=consultation&utm_content=bio">Whizzy</a>.
            {{-- format-ignore-end --}}
            In addition to his design skills, he brings a wealth of development
            experience to the Filament team. He's based in
            {{-- format-ignore-start --}}
            <strong>Eindhoven, Netherlands</strong>,
            {{-- format-ignore-end --}}
            and is
            {{-- format-ignore-start --}}
            <a href="https://whizzy.dev/sessions?utm_source=filament&utm_medium=referral&utm_campaign=consultation&utm_content=bio">available to answer your support questions</a>
            {{-- format-ignore-end --}}
            about Filament, on a one-off or recurring basis.
        </x-consulting.consultant>
    </div>

    {{-- Quick Call Section --}}
    <div
        x-ref="quick_question"
        class="pt-10"
    >
        <div
            class="flex flex-wrap items-center justify-center gap-10 rounded-xl bg-[#FFE5C8] p-10 lg:justify-between"
        >
            <div class="space-y-2 text-center lg:text-left">
                <div class="text-2xl font-bold text-[#544945]">
                    Need a private help session?
                </div>
                <div class="font-medium text-[#AA8B7C]">
                    Zep's here to jump on a call and help you with your Filament
                    project.
                </div>
            </div>

            {{-- Call Link --}}
            <div class="flex">
                <a
                    href="https://whizzy.dev/sessions?utm_source=filament&utm_medium=referral&utm_campaign=consultation&utm_content=button"
                    class="group/call relative z-0 grid h-12 w-60 rounded-full bg-dolphin/20 px-1.5 transition duration-300 hover:bg-dolphin/30"
                    x-on:mouseenter="book_is_hovered = true"
                    x-on:mouseleave="book_is_hovered = false"
                >
                    {{-- Icons --}}
                    <div
                        class="relative z-10 grid h-10 w-10 place-items-center self-center rounded-full bg-hurricane text-white transition duration-[400ms] [grid-area:1/-1] group-hover/call:translate-x-[11.7rem] group-hover/call:bg-dolphin"
                    >
                        {{-- Phone Icon --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            class="transition duration-[400ms] [grid-area:1/-1] group-hover/call:rotate-45 group-hover/call:opacity-0"
                        >
                            <path
                                d="M13.5 2C13.5 2 15.834 2.212 18.803 5.182C21.773 8.152 21.985 10.485 21.985 10.485M14.207 5.536C14.207 5.536 15.197 5.818 16.682 7.303C18.167 8.788 18.45 9.778 18.45 9.778"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            />
                            <path
                                d="M15.556 14.547L15.012 14.031L15.556 14.548V14.547ZM19.002 20.254L18.457 19.737L19.001 20.254H19.002ZM17.676 20.964L17.75 21.709L17.676 20.963V20.964ZM3.75199 6.925C3.74668 6.82664 3.72203 6.73029 3.67948 6.64145C3.63693 6.55262 3.57729 6.47303 3.50398 6.40724C3.43067 6.34145 3.34511 6.29074 3.25221 6.25802C3.1593 6.22529 3.06085 6.21118 2.96249 6.2165C2.86413 6.22182 2.76778 6.24646 2.67895 6.28901C2.59011 6.33157 2.51052 6.3912 2.44473 6.46452C2.37894 6.53783 2.32824 6.62338 2.29551 6.71629C2.26278 6.8092 2.24867 6.90764 2.25399 7.006L3.75199 6.925ZM4.71799 3.092C4.58666 3.23714 4.51727 3.42787 4.52464 3.62348C4.53202 3.81908 4.61557 4.00405 4.75746 4.13889C4.89935 4.27373 5.08833 4.34775 5.28405 4.34516C5.47977 4.34256 5.66673 4.26355 5.80499 4.125L4.71799 3.092ZM10.664 19.812C10.7474 19.8657 10.8406 19.9024 10.9383 19.9199C11.036 19.9373 11.1361 19.9352 11.233 19.9137C11.3298 19.8922 11.4214 19.8517 11.5025 19.7945C11.5836 19.7373 11.6525 19.6646 11.7053 19.5806C11.7581 19.4966 11.7937 19.4029 11.81 19.3051C11.8264 19.2072 11.8231 19.1071 11.8005 19.0105C11.7779 18.9139 11.7363 18.8227 11.6782 18.7423C11.6201 18.6619 11.5466 18.5938 11.462 18.542L10.664 19.812ZM15.113 20.058C14.9182 20.0173 14.7152 20.0556 14.5487 20.1646C14.3821 20.2735 14.2657 20.4442 14.225 20.639C14.1843 20.8338 14.2226 21.0368 14.3316 21.2033C14.4405 21.3699 14.6112 21.4863 14.806 21.527L15.113 20.058ZM15.645 15.544L16.1 15.064L15.012 14.031L14.557 14.511L15.645 15.544ZM17.599 14.862L19.509 15.962L20.257 14.662L18.347 13.562L17.599 14.862ZM19.878 18.242L18.457 19.737L19.545 20.771L20.965 19.275L19.878 18.242ZM8.35899 15.959C4.48299 11.878 3.83299 8.435 3.75199 6.925L2.25399 7.006C2.35399 8.856 3.13799 12.64 7.27199 16.992L8.35899 15.959ZM9.73499 9.322L10.021 9.02L8.93399 7.987L8.64699 8.289L9.73499 9.322ZM10.247 5.26L8.98599 3.477L7.76099 4.343L9.02099 6.126L10.247 5.26ZM9.18999 8.805C9.01001 8.63156 8.82834 8.45988 8.64499 8.29L8.64299 8.292L8.63999 8.295C8.62224 8.31337 8.60555 8.33274 8.58999 8.353C8.49197 8.48275 8.4144 8.62676 8.35999 8.78C8.26199 9.055 8.20999 9.419 8.27599 9.873C8.40599 10.765 8.99099 11.964 10.518 13.573L11.606 12.539C10.178 11.036 9.82599 10.111 9.75999 9.655C9.72799 9.435 9.75999 9.32 9.77299 9.283L9.78099 9.264C9.77281 9.27717 9.76344 9.28955 9.75299 9.301C9.74713 9.30779 9.74113 9.31546 9.73499 9.322L9.18999 8.805ZM10.518 13.572C12.041 15.176 13.191 15.806 14.068 15.949C14.519 16.022 14.884 15.963 15.16 15.854C15.3129 15.794 15.4551 15.7095 15.581 15.604L15.617 15.57L15.631 15.556C15.6334 15.554 15.6357 15.552 15.638 15.55L15.641 15.547L15.642 15.545C15.642 15.545 15.644 15.544 15.1 15.027C14.556 14.511 14.557 14.51 14.557 14.509L14.559 14.508L14.561 14.505L14.567 14.5C14.5821 14.4854 14.5978 14.4714 14.614 14.458C14.623 14.452 14.622 14.454 14.609 14.459C14.589 14.467 14.499 14.499 14.309 14.468C13.907 14.402 13.039 14.048 11.606 12.539L10.518 13.572ZM8.98599 3.477C7.97199 2.043 5.94399 1.8 4.71799 3.092L5.80499 4.125C6.32799 3.575 7.24899 3.618 7.76099 4.343L8.98599 3.477ZM18.457 19.737C18.178 20.031 17.887 20.189 17.603 20.217L17.75 21.709C18.497 21.636 19.102 21.238 19.545 20.771L18.457 19.738V19.737ZM10.021 9.02C10.989 8.001 11.057 6.407 10.247 5.26L9.02199 6.126C9.44399 6.723 9.37899 7.519 8.93399 7.987L10.021 9.02ZM19.509 15.962C20.33 16.435 20.491 17.597 19.878 18.242L20.965 19.275C22.27 17.901 21.889 15.602 20.257 14.662L19.509 15.962ZM16.1 15.064C16.485 14.658 17.086 14.567 17.599 14.862L18.347 13.562C17.248 12.93 15.887 13.111 15.012 14.031L16.1 15.064ZM11.462 18.542C10.479 17.924 9.43199 17.088 8.35899 15.959L7.27199 16.992C8.42599 18.207 9.56899 19.124 10.664 19.812L11.462 18.542ZM17.602 20.217C16.7691 20.2901 15.9298 20.2365 15.113 20.058L14.806 21.527C15.7725 21.7363 16.7651 21.7977 17.75 21.709L17.603 20.217H17.602Z"
                                fill="white"
                            />
                        </svg>

                        {{-- Arrow --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            class="-rotate-45 opacity-0 transition duration-[400ms] [grid-area:1/-1] group-hover/call:rotate-0 group-hover/call:opacity-100"
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

                    {{-- Book A Call --}}
                    <div
                        class="self-center justify-self-center font-medium transition duration-300 [grid-area:1/-1] group-hover/call:-translate-x-2"
                    >
                        Book a session
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
