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
            avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
            name="Ryan Chandler"
            title="Co-Founder"
            website="https://ryangjchandler.co.uk?ref=filamentphp.com"
            twitter="https://twitter.com/ryangjchandler"
            github="https://github.com/ryangjchandler"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/3833889?v=4"
            name="Leandro Ferreira"
            title="Community Support & Developer"
            website="https://leandroferreira.dev.br?ref=filamentphp.com"
            twitter="https://twitter.com/leandrocfe"
            github="https://github.com/leandrocfe"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
            name="Zep Fietje"
            title="Lead UI Designer & Developer"
            website="https://zepfietje.com?ref=filamentphp.com"
            twitter="https://twitter.com/zepfietje"
            github="https://github.com/zepfietje"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
            name="Dan Harrin"
            title="Co-Founder & Lead Developer"
            website="https://danharrin.com?ref=filamentphp.com"
            twitter="https://twitter.com/danjharrin"
            github="https://github.com/danharrin"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/22632550?v=4"
            name="Dennis Koch"
            title="Community Manager & Developer"
            website="https://denniskoch.dev?ref=filamentphp.com"
            mastodon="https://phpc.social/@denniskoch"
            github="https://github.com/pxlrbt"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/14329460?v=4"
            name="Guilherme Saade"
            title="Plugin Support & Developer"
            website="https://saade.dev?ref=filamentphp.com"
            twitter="https://twitter.com/saadeguilherme"
            github="https://github.com/saade"
        />
        <x-team.member
            avatar="/images/kenneth-hq.jpeg"
            name="Kenneth Sese"
            title="Developer"
            website="https://www.padmission.com/kenneth-sese/?ref=filamentphp.com"
            twitter="https://twitter.com/archilex"
            github="https://github.com/archilex"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/11881203?v=4"
            name="Alex Six"
            title="Head of Developer Relations"
            website="https://alexandersix.com?ref=filamentphp.com"
            twitter="https://twitter.com/alexandersix_"
            github="https://github.com/alexandersix"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/3596800?v=4"
            name="Adam Weston"
            title="Head of Plugin Support & Developer"
            website="https://aw.codes?ref=filamentphp.com"
            twitter="https://twitter.com/awcodes1"
            github="https://github.com/awcodes"
        />
        <x-team.member
            avatar="https://avatars.githubusercontent.com/u/15275787?v=4"
            name="Hassan Zahirnia"
            title="Lead Marketing Designer"
            website="https://zahirnia.com?ref=filamentphp.com"
            twitter="https://twitter.com/HassanZahirnia"
            github="https://github.com/HassanZahirnia"
        />
    </div>
</section>
