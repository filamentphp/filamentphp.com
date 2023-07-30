<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline()
                .fromTo(
                    $refs.title,
                    {
                        autoAlpha: 0,
                        x: -30,
                    },
                    {
                        autoAlpha: 1,
                        x: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
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
                    '<',
                )
        }
    "
    class="mx-auto w-full max-w-6xl px-10 pt-20"
>
    {{-- Title --}}
    <div
        x-ref="title"
        class="flex items-center gap-5"
    >
        <div class="shrink-0 text-2xl font-semibold text-evening">
            Choose your expert
        </div>
        <div
            class="h-0.5 w-full rounded-full bg-evening md:max-w-[15rem]"
        ></div>
    </div>

    {{-- Consultant List --}}
    <div
        x-ref="list"
        class="space-y-5 pb-20"
    >
        <x-consulting.consultant
            number="01"
            avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
            name="Dan Harrin"
            title="Lead Developer"
            url="https://www.ringerhq.com/experts/danharrin"
        />
        <x-consulting.consultant
            number="02"
            avatar="https://avatars.githubusercontent.com/u/44533235?v=4"
            name="Zep Fietje"
            title="Lead UI Designer & Developer"
            url="https://zepfietje.com/consult?ref=filamentphp.com"
        />
        <x-consulting.consultant
            number="03"
            avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
            name="Ryan Chandler"
            title="Co-Founder & Developer"
            url="https://www.ringerhq.com/experts/ryangjchandler"
        />
    </div>
</section>
