<div
    x-cloak
    x-data="{
        show_more: false,
    }"
    class="relative mx-auto w-full max-w-screen-lg px-5"
>
    {{-- Tweets Section --}}
    <div
        x-data="{}"
        x-ref="tweets_section"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.tweets_section,
                        start: 'top bottom-=200px',
                    },
                })
                    .fromTo(
                        $refs.tweets_section,
                        {
                            autoAlpha: 0,
                        },
                        {
                            autoAlpha: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                    )
                    .fromTo(
                        $refs.twitter_icon,
                        {
                            autoAlpha: 0,
                            x: -30,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.community,
                        {
                            autoAlpha: 0,
                            x: 50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.community_quote,
                        {
                            autoAlpha: 0,
                            scale: 0,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'back.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.feedback_header,
                        {
                            autoAlpha: 0,
                            x: -50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.feedback_header_underline,
                        {
                            autoAlpha: 0,
                            scaleX: 0,
                            transformOrigin: 'left',
                        },
                        {
                            autoAlpha: 1,
                            scaleX: 1,
                            duration: 0.5,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
            }
        "
        class="relative z-[1] overflow-hidden rounded-3xl bg-gradient-to-t from-transparent via-[#F1F3FF] to-[#F1F3FF] px-5 pb-5"
    >
        {{-- Title --}}
        <div
            id="tweets"
            class="grid place-items-center pt-14"
        >
            {{-- Twitter Icon --}}
            <div x-ref="twitter_icon">
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
                x-ref="community"
                class="relative mt-3 text-xl font-medium tracking-wider"
            >
                Community
                <div
                    x-ref="community_quote"
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
                    x-ref="feedback_header"
                    class="text-2xl font-extrabold [grid-area:1/-1] lg:text-3xl"
                >
                    Feedback
                </div>
                <div
                    x-ref="feedback_header_underline"
                    class="relative -left-1 -z-10 h-5 w-[98%] self-end justify-self-start bg-sky-300/50 [grid-area:1/-1]"
                ></div>
            </div>
        </div>

        {{-- Testimonial Tweets --}}
        <div
            class="overflow-hidden"
            :class="{
                'max-h-[45rem]': !show_more,
            }"
        >
            <div
                class="tweets-parent relative gap-8 px-3 pt-10 transition-all motion-reduce:transition-none sm:columns-2 lg:columns-3 [&_.testimonial-component.not-hovered]:opacity-50"
            >
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
                        twitter-handle="shocm"
                        title="php[architect] Team"
                    >
                        Eric Van Johnson
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/ChrisHardie/status/1507793007470428167"
                >
                    I've built a few Laravel admin tools/sites now with Filament
                    and just have to remark on how
                    <strong>well designed</strong>
                    it is, and how quickly one can create
                    <strong>powerful, friendly</strong>
                    application interfaces with it.
                    <strong>Impressive stuff.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/311772?v=4"
                        twitter-handle="ChrisHardie"
                        title="Laravel developer"
                    >
                        Chris Hardie
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/heyjordn/status/1494428799584329730"
                >
                    <strong>Loving the performance</strong>
                    of Filament's datatable, our team at Orba added an Excel
                    export,
                    <strong>so smooth</strong>
                    🔥
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4820517?v=4"
                        twitter-handle="heyjordn"
                        title="Laravel developer"
                    >
                        Jordan Jones
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/ralphjsmit/status/1502305847749357572"
                >
                    Filament is a
                    <strong>GREAT</strong>
                    tool for building admin panels in Laravel. It has a great
                    plugin support and an
                    <strong>active community</strong>
                    . 🚀
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/59207045?v=4"
                        twitter-handle="ralphjsmit"
                        title="Laravel developer"
                    >
                        Ralph J. Smit
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial url="https://twitter.com/larsklopstra">
                    Filament is a
                    <strong>great CMS solution</strong>
                    for both technical and non-technical users, and the fluent
                    API is a
                    <strong>developer's dream!</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/25669876?v=4"
                        twitter-handle="larsklopstra"
                        title="Laravel developer"
                    >
                        Lars Klopstra
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/snellingio/status/1491103335793164290"
                >
                    The more I look at it, the closer it is to being able to
                    build a
                    <strong>full SaaS with Filament alone</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/9887585?v=4"
                        twitter-handle="snellingio"
                        title="Laravel developer"
                    >
                        Sam Snelling
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/roniestein/status/1366526433737068546"
                >
                    Release the hounds!!! This project is going to be
                    <strong>my new go-to</strong>
                    for all back-end work!!! So Excited!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/8517475?v=4"
                        twitter-handle="roniestein"
                        title="Laravel developer"
                    >
                        Roni Estein
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/LabsArtisan/status/1368248886725402625"
                >
                    👍 been using it today and I've got to say
                    <strong>it's brilliant.</strong>
                    <x-slot
                        name="author"
                        avatar="https://pbs.twimg.com/profile_images/1294198577833615360/ifwIsmKp_400x400.jpg"
                        twitter-handle="LabsArtisan"
                        title="Laravel developer"
                    >
                        Artisan Labs
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/alexjustesen/status/1496554096777695233"
                >
                    Hot damn Filament
                    <strong>saves sooooo much time</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1144087?v=4"
                        twitter-handle="alexjustesen"
                        title="Laravel developer"
                    >
                        Alex Justesen
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/HassanZahirnia/status/1669268332418068480"
                >
                    Started my second
                    <strong>Filament</strong>
                    project a while ago. It's the first time in my career that I
                    can sit down and
                    <strong>focus</strong>
                    on
                    <strong>productivity</strong>
                    and what's important, without dealing with
                    <strong>implementation difficulties</strong>
                    and
                    <strong>business logic.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/15275787?v=4"
                        twitter-handle="HassanZahirnia"
                        title="Web designer & developer"
                    >
                        Hassan Zahirnia
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mrchrxs/status/1491159440250540033"
                >
                    6 months ago,
                    @carre
                    _sam recommended Filament. I was put off because I use Vue
                    not Livewire. Just spent 30 minutes with it, and
                    <strong>WOW</strong>
                    . Definitely pitching this at work!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/10789117?v=4"
                        twitter-handle="mrchrxs"
                        title="Laravel Developer"
                    >
                        Chris
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/andreas_kviby/status/1367824016380166144"
                >
                    What else can you wish for?
                    <strong>Filament rocks</strong>
                    ! This will be my
                    <strong>first choice</strong>
                    when creating adminpanels for clients from this day and
                    forward.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1666004?v=4"
                        twitter-handle="andreas_kviby"
                        title="Laravel Developer"
                    >
                        Andreas Kviby
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/adamlee_clx/status/1380910055411748868"
                >
                    I absolutely love developing with TALL stack. Filament is
                    going to
                    <strong>save a lot of time</strong>
                    with the overall development process!!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/53559175?v=4"
                        twitter-handle="adamlee_clx"
                        title="Laravel Developer"
                    >
                        Adam Lee
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/DominikGeimer/status/1416114759179571202"
                >
                    I just started using Filament by Dan Harrin, Ryan Chandler
                    and Ryan Scherler.
                    <strong>I am really impressed</strong>
                    . Thank you for that great tool.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6383607?v=4"
                        twitter-handle="DominikGeimer"
                        title="Laravel Developer"
                    >
                        Dominik Geimer
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/luilliarcec/status/1485764353802608643"
                >
                    Today I tried Filament, and
                    <strong>
                        oh my God, that's fantastic! Amazing! Great job.
                    </strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/27895611?v=4"
                        twitter-handle="luilliarcec"
                        title="Laravel Developer"
                    >
                        Luis Andrés Arce C.
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/nickciolpan/status/1483564450208747520"
                >
                    Filament's admin is, by far,
                    <strong>my favorite Laravel tool</strong>
                    at the moment. Found my gateway drug into Livewire
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/8835763?v=4"
                        twitter-handle="nickciolpan"
                        title="Laravel Developer"
                    >
                        Nick Ciolpan
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/Tiago_Ferat/status/1367996436567179264"
                >
                    An
                    <strong>awesome</strong>
                    Open-Source Admin panel with TALL stack. 👏👏
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/11933789?v=4"
                        twitter-handle="Tiago_Ferat"
                        title="Laravel Developer"
                    >
                        Tiago Rodrigues
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/kiltedup/status/1366526387180482567"
                >
                    Just installed and had a play.
                    <strong>Really great job.</strong>
                    <x-slot
                        name="author"
                        avatar="https://pbs.twimg.com/profile_images/1251922928469446664/IxVNvpzG_400x400.jpg"
                        twitter-handle="kiltedup"
                        title="Laravel Developer"
                    >
                        Dave Walker
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial url="https://twitter.com/iksaku2">
                    Filament is the
                    <strong>
                        Swiss Army Knife dashboard for TALL stack apps
                    </strong>
                    . Just sit down, install and you'll have a full CMS in two
                    shakes.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4632429?v=4"
                        twitter-handle="iksaku2"
                        title="Laravel Developer"
                    >
                        Jorge González
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/DaronSpence/status/1507602035641929729"
                >
                    Big shoutout to Filament for making a
                    <strong>really slick</strong>
                    admin panel kit.
                    <strong>Loving the markdown editor</strong>
                    w/ builtin file uploads!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4062087?v=4"
                        twitter-handle="DaronSpence"
                        title="Laravel Developer"
                    >
                        Daron Spence
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/jacques_van_wyk/status/1507401233937711104"
                >
                    I must say this Filament is
                    <strong>amazing</strong>
                    and such
                    <strong>a pleasure to work with</strong>
                    .
                    @danjharrin
                    you and team have done great job.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/12008702?v=4"
                        twitter-handle="jacques_van_wyk"
                        title="Laravel Developer"
                    >
                        Jacques van Wyk
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/jimmyaldape/status/1504641233871728640"
                >
                    Filament is a
                    <strong>joy to work with</strong>
                    . Just about covers most use cases for an admin panel in
                    Laravel.
                    <strong>Great job.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/59585840?v=4"
                        twitter-handle="jimmyaldape"
                        title="Laravel Developer"
                    >
                        Jimmy Aldape
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mattmngdev/status/1495358748445057025"
                >
                    The
                    <strong>highlight of the weekend</strong>
                    : managed to start a new project using Filament and
                    <strong>I love it</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/373999?v=4"
                        twitter-handle="mattmngdev"
                        title="Laravel Developer"
                    >
                        Matteo Mangoni
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/romaldyminaya/status/1492553584587776004"
                >
                    Filament is a
                    <strong>very fun framework</strong>
                    to play with so far. The support is
                    <strong>very accurate and fast</strong>
                    . 😍
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/2809147?v=4"
                        twitter-handle="romaldyminaya"
                        title="Laravel Developer"
                    >
                        Romaldy Minaya
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/BotezatuDima/status/1491026512111226881"
                >
                    Today I installed and played with Filament. Seems to be an
                    <strong>amazing tool for productivity</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/3392129?v=4"
                        twitter-handle="BotezatuDima"
                        title="Laravel Developer"
                    >
                        Dumitru Botezatu
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/nkornel/status/1547530825117360129"
                >
                    We chose Filament and
                    <strong>clients love it</strong>
                    . It is
                    <strong>consistent</strong>
                    and
                    <strong>clean</strong>
                    so the
                    <strong>learning curve is better</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1298094?v=4"
                        twitter-handle="nkornel"
                        title="Laravel Developer"
                    >
                        nKornel
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/theraloss/status/1367975271949864969"
                >
                    Filament is
                    <strong>damn smooth.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6277291?v=4"
                        twitter-handle="theraloss"
                        title="Laravel Developer"
                    >
                        Danilo Polani
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mskhoshnazar/status/1423181010850746371"
                >
                    Filament was a
                    <strong>joy to use.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6499685?v=4"
                        twitter-handle="mskhoshnazar"
                        title="Laravel Developer"
                    >
                        Mo Khosh
                    </x-slot>
                </x-home.testimonial>
            </div>

            {{-- See More Button --}}
            <div class="flex justify-center pt-10">
                <a
                    href="https://love.filamentphp.com"
                    target="_blank"
                    class="group/button z-10 flex items-center justify-center gap-3 self-center justify-self-center rounded-xl bg-dawn-pink px-7 py-3 text-hurricane transition duration-200 [grid-area:1/-1] hover:bg-dawn-pink/70 motion-reduce:transition-none"
                >
                    <div>View All Testimonials</div>
                    <div
                        class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/button:transform-none"
                    >
                        <svg
                            width="24"
                            height="25"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
        <script>
            // Custom function to blur (opacity-50) all the testimonial tweets except the one being hovered
            const testimonialComponents = document.querySelectorAll(
                '.testimonial-component',
            )

            function handleTestimonialHover(event) {
                if (reducedMotion) return
                testimonialComponents.forEach((component) => {
                    if (component !== event.currentTarget) {
                        component.classList.add('not-hovered')
                    } else {
                        component.classList.remove('not-hovered')
                    }
                })
            }

            testimonialComponents.forEach((component) => {
                component.addEventListener('mouseenter', handleTestimonialHover)
                component.addEventListener('mouseleave', () => {
                    testimonialComponents.forEach((component) => {
                        component.classList.remove('not-hovered')
                    })
                })
            })
        </script>
    </div>

    {{-- Floating Show More/Less Button --}}
    <div
        class="inset-x-0 bottom-0 z-10 grid w-full select-none"
        :class="{
            'absolute bg-gradient-to-t from-cream to-transparent h-60': !show_more,
            'sticky': show_more,
        }"
    >
        <div
            x-on:click="
                () => {
                    show_more = ! show_more
                    if (! show_more) document.getElementById('tweets').scrollIntoView()
                }
            "
            class="relative grid cursor-pointer self-end justify-self-center overflow-hidden rounded-full bg-sky-500 py-4 font-medium text-white transition-all duration-500 ease-in-out hover:bg-sky-400 motion-reduce:transition-none"
            :class="{
                'w-48': !show_more,
                'xl:translate-x-[34rem] -translate-y-10 w-16 rotate-180': show_more,
            }"
        >
            <div
                class="transition duration-500 motion-reduce:transition-none"
                :class="{
                    'translate-x-7': !show_more,
                    'translate-x-5': show_more,
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
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
                        d="m12 20l6-6m-6 6l-6-6m6 6V9.5M12 4v2.5"
                    />
                </svg>
            </div>
            <div
                class="absolute left-16 top-1/2 -translate-y-1/2 truncate transition duration-500"
                :class="{
                    'opacity-0': show_more,
                }"
            >
                Show more
            </div>
        </div>
    </div>
</div>
