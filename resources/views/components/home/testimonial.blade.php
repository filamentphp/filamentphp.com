<a
    @if ($url ?? null) href="{{ $url }}" @endif
    x-data="{}"
    x-ref="testimonial"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline({
                delay: Math.random() * 0.1,
                scrollTrigger: {
                    trigger: $refs.testimonial,
                    start: 'top bottom-=50px',
                },
            }).fromTo(
                $refs.testimonial,
                {
                    autoAlpha: 0,
                    y: Math.random() < 0.5 ? -30 : 30,
                    x: Math.random() < 0.5 ? -30 : 30,
                },
                {
                    autoAlpha: 1,
                    y: 0,
                    x: 0,
                    duration: 0.7,
                    ease: 'circ.out',
                },
            )
        }
    "
    target="_blank"
    class="group/testimonial mt-8 inline-block w-full"
>
    <div
        class="testimonial-component text-sm transition duration-300 motion-reduce:transition-none"
    >
        <div
            class="relative rounded-2xl bg-white p-7 shadow-lg shadow-slate-200/50 transition duration-300 ease-in-out will-change-transform group-hover/testimonial:-translate-y-2 group-hover/testimonial:translate-x-2 group-hover/testimonial:scale-105 motion-reduce:transition-none motion-reduce:group-hover/testimonial:transform-none"
        >
            {{-- Quote --}}
            <blockquote>"{{ $slot }}"</blockquote>
            {{-- Blue Quote Icon --}}
            <img
                src="{{ Vite::asset('resources/svg/home/blue-quote.svg') }}"
                alt="Quote"
                class="absolute -top-1.5 left-4 w-6"
            />
            {{-- Corner --}}
            <div class="absolute -bottom-3 left-10 text-white">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="26"
                    height="26"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="currentColor"
                        d="M21.409 9.353a2.998 2.998 0 0 1 0 5.294L8.597 21.614C6.534 22.736 4 21.276 4 18.968V5.033c0-2.31 2.534-3.769 4.597-2.648l12.812 6.968Z"
                    />
                </svg>
            </div>
        </div>
        <div
            class="flex items-center gap-4 px-2 pt-5 transition duration-300 will-change-transform group-hover/testimonial:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/testimonial:transform-none"
        >
            <img
                src="{{ $author->attributes->get('avatar') }}"
                alt="{{ $author }}"
                class="h-10 w-10 rounded-full"
                loading="lazy"
            />
            <div class="space-y-px truncate">
                <div class="font-bold">
                    {{ $author }}
                </div>
                <div class="grid text-xs text-dolphin/80">
                    <div
                        class="self-center justify-self-start transition duration-300 will-change-transform [grid-area:1/-1] group-hover/testimonial:translate-x-5 group-hover/testimonial:opacity-0 motion-reduce:transition-none motion-reduce:group-hover/testimonial:transform-none"
                    >
                        {{ $author->attributes->get('title') }}
                    </div>
                    <div
                        class="-translate-x-5 self-center justify-self-start text-sky-400 opacity-0 transition duration-300 will-change-transform [grid-area:1/-1] group-hover/testimonial:translate-x-0 group-hover/testimonial:opacity-100 motion-reduce:transition-none motion-reduce:group-hover/testimonial:transform-none"
                    >
                        @
                        {{ $author->attributes->get('twitter-handle') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
