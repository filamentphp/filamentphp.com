<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
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
        }
    "
    class="mx-auto w-full max-w-7xl px-5 pt-20"
>
    {{-- Team member List --}}
    <div
        x-ref="list"
        class="grid grid-cols-1 place-items-center gap-x-10 gap-y-14 pb-20 md:grid-cols-2 min-[1100px]:grid-cols-3"
    >
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
            name="Dan Harrin"
            title="Co-Founder & Lead Developer"
            website="https://danharrin.com"
            twitter="https://twitter.com/danjharrin"
            github="https://github.com/danharrin"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
            name="Ryan Chandler"
            title="Co-Founder"
            website="https://ryangjchandler.co.uk"
            twitter="https://twitter.com/ryangjchandler"
            github="https://github.com/ryangjchandler"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
            name="Zep Fietje"
            title="Lead UI Designer & Developer"
            website="https://zepfietje.com"
            twitter="https://twitter.com/zepfietje"
            github="https://github.com/zepfietje"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/22632550?v=4"
            name="Dennis Koch"
            title="Developer & Community Manager"
            website="https://pixelarbeit.de"
            twitter="https://twitter.com/pixelarbeit"
            github="https://github.com/pxlrbt"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/3596800?v=4"
            name="Adam Weston"
            title="Developer & Plugin Support"
            website="https://aw.codes"
            twitter="https://twitter.com/awcodes1"
            github="https://github.com/awcodes"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/15275787?v=4"
            name="Hassan Zahirnia"
            title="Lead UI/UX Marketing Designer"
            website="https://zahirnia.com/"
            twitter="https://twitter.com/HassanZahirnia"
            github="https://github.com/HassanZahirnia"
        />
    </div>
</section>
