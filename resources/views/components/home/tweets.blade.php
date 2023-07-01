<div
    x-cloak
    x-data="{}"
    class="mx-auto w-full max-w-screen-lg px-5"
>
    <div
        x-data="{}"
        x-init=""
        class="relative z-[1] overflow-hidden rounded-3xl bg-gradient-to-t from-transparent via-[#F1F3FF] to-[#F1F3FF] px-5 pb-5"
    >
        {{-- Title --}}
        <div class="grid place-items-center pt-14">
            {{-- Twitter Icon --}}
            <div class="">
                <svg
                    width="40"
                    height="40"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M37.02 9.427c-1.272.562-2.62.932-4.002 1.096a6.991 6.991 0 0 0 3.064-3.856 13.935 13.935 0 0 1-4.425 1.691 6.97 6.97 0 0 0-11.877 6.357A19.79 19.79 0 0 1 5.412 7.432a6.947 6.947 0 0 0-.944 3.505 6.973 6.973 0 0 0 3.1 5.801 6.947 6.947 0 0 1-3.156-.871v.084a6.975 6.975 0 0 0 5.591 6.837 7.008 7.008 0 0 1-3.15.12 6.975 6.975 0 0 0 6.514 4.842 13.99 13.99 0 0 1-10.32 2.887A19.719 19.719 0 0 0 13.73 33.77c12.823 0 19.833-10.622 19.833-19.834 0-.3-.006-.603-.02-.901a14.17 14.17 0 0 0 3.477-3.608Z"
                        fill="#1C96E8"
                    />
                </svg>
            </div>
            <div
                x-ref="premium"
                class="relative mt-3 text-xl font-medium tracking-wider"
            >
                Community
                <div
                    x-ref="premium_heart"
                    class="absolute -right-7 -top-2"
                >
                    <svg
                        width="21"
                        height="15"
                        class="scale-[.85]"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g
                            clip-path="url(#a)"
                            fill="currentColor"
                        >
                            <path
                                d="m6.185 2.742-.124.238-1.422 1.04.075-.038-1.41.375h.088l-1.26-.037c-.548-.075-.748-.388-.573-.927.524-.413.636-.525.324-.325l3.741-.501c-.15-.075-.187-.075-.1 0 .088.075.063.063-.062-.063-.125-.263 0 .113-.087-.212L.312 4.044c.112.1.137.113.062.05-.125-.1-.112-.237.025-.438l4.913-.976c.125.175-.012-.126-.025-.188.025.188 0-.013.025-.113.038-.163 0-.288 0-.087.113-.15.113-.163 0-.038a.907.907 0 0 1-.324.25l-1.397.476c-.15.025-.299.025-.449.013-.112 0-.46-.138-.112.012.162.075.275.15.487.4.773.902.96 2.405 1.085 3.57.124 1.164.05 2.303-.225 3.48-.075.3-.162.614-.274.902-.038.112-.088.213-.125.313-.187.463.137-.213-.112.225-.137.238-.262.488-.412.726a4.651 4.651 0 0 1-.287.4c-.05.063-.374.427-.112.139-.262.275-.61.65-.499 1.076.113.401.611.627.973.69 1.172.212 2.619-.151 3.53-.953C9.95 11.432 10.45 7.375 9.576 3.782c-.224-.914-.598-1.904-1.272-2.592C7.42.288 6.11-.062 4.838 0 3.28.088 1.434.701.486 2.054-.112 2.918-.187 3.869.4 4.758c.424.651 1.883.476 2.444.363.86-.175 1.958-.563 2.457-1.34.374-.575.449-1.314-.1-1.802-.823-.727-2.22-.489-3.155-.176-.686.238-2.182.927-1.92 1.916.735 2.83 5.337 1.615 6.447-.35.586-1.04-.187-1.741-1.172-1.929-.923-.188-1.983.013-2.831.4-.624.276-1.571.79-1.659 1.578-.112 1.165 1.46 1.252 2.282 1.14.686-.1 1.41-.288 1.996-.676.374-.25.947-.626.997-1.115v-.025ZM17.197 2.742l-.125.238-1.422 1.04.075-.038-1.41.375h.088l-1.26-.037c-.548-.075-.748-.388-.573-.927.524-.413.636-.525.324-.325l3.741-.501c-.15-.075-.187-.075-.1 0 .088.075.063.063-.062-.063-.124-.263 0 .113-.087-.212l-5.088 1.752c.112.1.137.113.062.05-.124-.1-.112-.237.025-.438L16.3 2.68c.124.175-.013-.126-.025-.188.025.188 0-.013.025-.113.037-.163 0-.288 0-.087.112-.15.112-.163 0-.038a.907.907 0 0 1-.325.25l-1.396.476c-.15.025-.3.025-.45.013-.111 0-.46-.138-.111.012.162.075.274.15.486.4.773.902.96 2.405 1.085 3.57.125 1.164.05 2.303-.225 3.48a7.51 7.51 0 0 1-.274.902c-.037.112-.087.213-.125.313-.187.463.137-.213-.112.225-.137.238-.262.488-.412.726a4.643 4.643 0 0 1-.286.4c-.05.063-.374.427-.113.139-.261.275-.61.65-.498 1.076.112.401.61.627.972.69 1.173.212 2.62-.151 3.53-.953 2.893-2.541 3.391-6.598 2.518-10.191-.224-.914-.598-1.904-1.271-2.592C18.418.288 17.108-.062 15.85 0c-1.572.088-3.405.689-4.352 2.054-.599.864-.674 1.815-.088 2.704.424.651 1.883.476 2.444.363.86-.175 1.958-.563 2.457-1.34.374-.575.449-1.314-.1-1.802-.823-.727-2.22-.489-3.155-.176-.698.238-2.194.927-1.945 1.916.736 2.83 5.337 1.615 6.447-.35.586-1.04-.187-1.741-1.172-1.929-.923-.188-1.983.013-2.83.4-.624.276-1.572.79-1.66 1.578-.112 1.165 1.46 1.252 2.283 1.14.685-.1 1.409-.288 1.995-.676.374-.25.948-.626.998-1.115l.024-.025Z"
                            />
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path
                                    fill="#fff"
                                    d="M0 0h21v15H0z"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="relative z-10 inline-grid">
                <div
                    x-ref="sponsors_header"
                    class="text-2xl font-extrabold [grid-area:1/-1] lg:text-3xl"
                >
                    Feedback
                </div>
                <div
                    x-ref="sponsors_header_underline"
                    class="relative -left-1 -z-10 h-5 w-[98%] self-end justify-self-start bg-sky-300/50 [grid-area:1/-1]"
                ></div>
            </div>
        </div>

        {{-- Testimonial Tweets --}}
        <div
            class="grid grid-cols-1 gap-6 px-5 pt-10 sm:grid-cols-2 lg:grid-cols-3"
        >
            {{-- Column 1 --}}
            <div class="space-y-10">
                <x-home.testimonial
                    url="https://twitter.com/shocm/status/1487841457088045059"
                >
                    Filament has become
                    <strong>one of my required packages</strong>
                    for all my new projects. I talk about it almost as much as I
                    talk about Livewire and
                    <strong>that is a lot</strong>
                    . Thanks for the
                    <strong>great work</strong>
                    .

                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/89408?v=4"
                        twitter-handle="@shocm"
                        title="Cofounder at phparch"
                    >
                        Eric Van Johnson
                    </x-slot>
                </x-home.testimonial>

                <x-home.testimonial
                    url="https://twitter.com/ChrisHardie/status/1507793007470428167"
                >
                    I’ve built a few Laravel admin tools/sites now with Filament
                    and just have to remark on how
                    <strong>well designed</strong>
                    it is, and how quickly one can create
                    <strong>powerful, friendly</strong>
                    application interfaces with it.
                    <strong>Impressive stuff.</strong>

                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/311772?v=4"
                        twitter-handle="@ChrisHardie"
                        title="Software developer. Newspaper publisher"
                    >
                        Chris Hardie
                    </x-slot>
                </x-home.testimonial>
            </div>

            {{-- Column 2 --}}
            <div class="space-y-10"></div>

            {{-- Column 3 --}}
            <div class="space-y-10"></div>
        </div>
    </div>
</div>
