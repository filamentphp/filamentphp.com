<section
    x-cloak
    x-data="{}"
    x-init="
        () => {
            if (reducedMotion) return
            gsap.timeline().fromTo(
                $refs.testimonials,
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
            )
        }
    "
    class="mx-auto w-full max-w-5xl px-10 pt-14"
>
    <div x-ref="testimonials">
        {{-- Header --}}
        <div class="text-3xl font-extrabold">Here's what people say...</div>

        {{-- Testimonial List --}}
        <ul class="space-y-10 pt-10">
            <li
                class="flex flex-col items-center gap-4 rounded-xl bg-merino/50 px-10 py-6 text-evening md:flex-row md:gap-8"
            >
                <div class="shrink-0">
                    <div
                        class="h-24 w-24 rounded-full bg-cover bg-center bg-no-repeat ring-1 ring-white"
                        style="
                            background-image: url('{{ Vite::asset('resources/images/consulting/testimonials/michaela.webp') }}');
                        "
                    >
                        <span class="sr-only">Michaela Shiloh</span>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="-ml-2 flex justify-start">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="25"
                            height="18"
                            viewBox="0 0 25 18"
                            fill="none"
                        >
                            <path
                                d="M5.51968 18C4.08831 18.0002 2.71419 17.459 1.69364 16.4932C0.673082 15.5274 0.0878487 14.2143 0.0641289 12.837C-0.0761566 11.5395 -0.0558929 9.6255 0.855963 7.416C1.78808 5.157 3.60556 2.694 6.92253 0.300003C7.08629 0.181812 7.27263 0.0958176 7.47092 0.0469303C7.66922 -0.00195694 7.87557 -0.0127811 8.07821 0.0150757C8.48746 0.0713367 8.85671 0.28174 9.10475 0.6C9.35279 0.918261 9.4593 1.31831 9.40083 1.71214C9.34237 2.10596 9.12373 2.46131 8.79301 2.7C6.35516 4.4595 4.95854 6.1695 4.15891 7.665C4.9086 7.47973 5.69067 7.4501 6.45318 7.57806C7.21568 7.70603 7.94116 7.98868 8.58143 8.40722C9.22169 8.82576 9.76208 9.37061 10.1667 10.0056C10.5713 10.6406 10.8309 11.3511 10.9282 12.0901C11.0255 12.829 10.9583 13.5794 10.731 14.2914C10.5037 15.0035 10.1216 15.6608 9.61008 16.2198C9.09853 16.7788 8.46922 17.2266 7.76398 17.5335C7.05873 17.8405 6.29369 17.9995 5.51968 18ZM19.5482 18C18.1169 18.0002 16.7428 17.459 15.7222 16.4932C14.7016 15.5274 14.1164 14.2143 14.0927 12.837C13.9524 11.5395 13.9727 9.6255 14.8845 7.416C15.8151 5.157 17.6341 2.694 20.9511 0.300003C21.1148 0.181812 21.3012 0.0958176 21.4995 0.0469303C21.6978 -0.00195694 21.9041 -0.0127811 22.1068 0.0150757C22.516 0.0713367 22.8853 0.28174 23.1333 0.6C23.3814 0.918261 23.4879 1.31831 23.4294 1.71214C23.3709 2.10596 23.1523 2.46131 22.8216 2.7C20.3837 4.4595 18.9871 6.1695 18.1875 7.665C18.9372 7.47973 19.7192 7.4501 20.4817 7.57806C21.2442 7.70603 21.9697 7.98868 22.61 8.40722C23.2502 8.82576 23.7906 9.37061 24.1952 10.0056C24.5999 10.6406 24.8594 11.3511 24.9567 12.0901C25.054 12.829 24.9868 13.5794 24.7595 14.2914C24.5323 15.0035 24.1502 15.6608 23.6386 16.2198C23.1271 16.7788 22.4978 17.2266 21.7925 17.5335C21.0873 17.8405 20.3222 17.9995 19.5482 18Z"
                                fill="#EADFD5"
                            />
                        </svg>
                    </div>
                    <div class="px-2 pb-2 pt-5 font-medium">
                        Kirschbaum quickly proved what a well-managed web
                        development experience looks like and feels like. Their
                        team has been excellent with communication, time
                        management, and deliverables. They have gone above and
                        beyond to meet our creative and technical needs.
                    </div>
                    <div class="-mr-2 flex justify-end">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="25"
                            height="18"
                            viewBox="0 0 25 18"
                            class="-scale-x-100 -scale-y-100"
                            fill="none"
                        >
                            <path
                                d="M5.51968 18C4.08831 18.0002 2.71419 17.459 1.69364 16.4932C0.673082 15.5274 0.0878487 14.2143 0.0641289 12.837C-0.0761566 11.5395 -0.0558929 9.6255 0.855963 7.416C1.78808 5.157 3.60556 2.694 6.92253 0.300003C7.08629 0.181812 7.27263 0.0958176 7.47092 0.0469303C7.66922 -0.00195694 7.87557 -0.0127811 8.07821 0.0150757C8.48746 0.0713367 8.85671 0.28174 9.10475 0.6C9.35279 0.918261 9.4593 1.31831 9.40083 1.71214C9.34237 2.10596 9.12373 2.46131 8.79301 2.7C6.35516 4.4595 4.95854 6.1695 4.15891 7.665C4.9086 7.47973 5.69067 7.4501 6.45318 7.57806C7.21568 7.70603 7.94116 7.98868 8.58143 8.40722C9.22169 8.82576 9.76208 9.37061 10.1667 10.0056C10.5713 10.6406 10.8309 11.3511 10.9282 12.0901C11.0255 12.829 10.9583 13.5794 10.731 14.2914C10.5037 15.0035 10.1216 15.6608 9.61008 16.2198C9.09853 16.7788 8.46922 17.2266 7.76398 17.5335C7.05873 17.8405 6.29369 17.9995 5.51968 18ZM19.5482 18C18.1169 18.0002 16.7428 17.459 15.7222 16.4932C14.7016 15.5274 14.1164 14.2143 14.0927 12.837C13.9524 11.5395 13.9727 9.6255 14.8845 7.416C15.8151 5.157 17.6341 2.694 20.9511 0.300003C21.1148 0.181812 21.3012 0.0958176 21.4995 0.0469303C21.6978 -0.00195694 21.9041 -0.0127811 22.1068 0.0150757C22.516 0.0713367 22.8853 0.28174 23.1333 0.6C23.3814 0.918261 23.4879 1.31831 23.4294 1.71214C23.3709 2.10596 23.1523 2.46131 22.8216 2.7C20.3837 4.4595 18.9871 6.1695 18.1875 7.665C18.9372 7.47973 19.7192 7.4501 20.4817 7.57806C21.2442 7.70603 21.9697 7.98868 22.61 8.40722C23.2502 8.82576 23.7906 9.37061 24.1952 10.0056C24.5999 10.6406 24.8594 11.3511 24.9567 12.0901C25.054 12.829 24.9868 13.5794 24.7595 14.2914C24.5323 15.0035 24.1502 15.6608 23.6386 16.2198C23.1271 16.7788 22.4978 17.2266 21.7925 17.5335C21.0873 17.8405 20.3222 17.9995 19.5482 18Z"
                                fill="#EADFD5"
                            />
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold">Michaela Shiloh</div>
                        <div class="flex items-center font-medium text-dolphin">
                            <span>CEO of</span>
                            <a
                                href="https://hrdrv.com"
                                target="_blank"
                            >
                                <svg
                                    class="h-6"
                                    viewBox="0 0 689.79 232.94"
                                    fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="m278.26 100.25c.26-11.65-4.13-22.59-12.35-30.81-7.98-7.98-18.58-12.37-29.84-12.37l-51.68.04c-16.03 0-29.08 13.05-29.08 29.08v20.09h-77.73v-38.91c0-5.66-4.59-10.25-10.25-10.25s-10.26 4.58-10.26 10.25v98.33c0 5.66 4.59 10.25 10.25 10.25s10.25-4.59 10.25-10.25v-38.91h77.74v38.91c0 5.65 4.6 10.25 10.25 10.25s10.25-4.6 10.25-10.25v-76.6c0-6.45 5.25-11.7 11.7-11.7l48.28-.02c5.8 0 11.26 2.26 15.38 6.36 4.11 4.1 6.36 9.57 6.36 15.38-.01 11.77-10.23 21.71-22.31 21.71h-35.27c-5.7 0-10.33 4.64-10.33 10.33 0 5.7 4.64 10.33 10.33 10.33h28.69l18.71 29.67c1.89 3 5.14 4.79 8.69 4.79 1.93 0 3.82-.55 5.46-1.58 2.32-1.46 3.93-3.74 4.53-6.41.61-2.67.13-5.42-1.33-7.74l-13.71-21.73c15.62-6.13 26.88-20.95 27.27-38.24z"
                                    ></path>
                                    <path
                                        d="m397.33 116.45c0 32.76-26.66 59.42-59.43 59.42h-43.73c-5.6 0-10.14-4.54-10.14-10.14 0-5.6 4.54-10.14 10.14-10.14h43.94c10.48 0 20.31-4.09 27.68-11.47 7.39-7.39 11.46-17.21 11.46-27.67 0-6.95-1.85-13.78-5.35-19.73-6.98-11.96-19.93-19.4-33.8-19.4h-43.88c-5.6 0-10.15-4.53-10.15-10.15 0-2.8 1.13-5.33 2.97-7.18 1.85-1.83 4.38-2.97 7.18-2.97h43.67c15.88 0 30.8 6.19 42.02 17.41 7.53 7.53 12.9 16.93 15.55 27.2 1.24 4.84 1.87 9.82 1.87 14.82z"
                                    ></path>
                                    <path
                                        d="m574.15 175.9c-4.32 0-8.47-1.27-12.02-3.67-3.58-2.39-6.32-5.76-7.95-9.77l-29.2-71.94c-3.37-8.13-11.2-13.37-19.96-13.37l-99.65-.01c-5.55 0-10.06-4.51-10.06-10.06s4.51-10.06 10.06-10.06l97.95.01c17 0 32.08 10.19 38.43 25.97l29.73 74.01c1.03 2.55 4.63 2.55 5.67.01l38.33-94.4c1.38-3.37 4.63-5.56 8.29-5.56.51 0 1.02.04 1.53.13 2.82.47 5.07 1.99 6.34 4.27 1.34 2.41 1.44 5.43.26 8.29l-37.8 92.76c-3.33 8.14-11.16 13.39-19.95 13.39z"
                                    ></path>
                                    <path
                                        d="m503.73 91.44h-1.07c-5.02.26-9.1 4.09-9.72 9-.01.31-.04.61-.07.91-1.05 10.85-10.74 19.68-22.1 19.68h-50.48c-5.89 0-10.63 4.97-10.25 10.96.34 5.46 5.12 9.6 10.6 9.6h43.58l18.63 29.53c1.88 2.98 5.11 4.77 8.65 4.77 1.92 0 3.8-.55 5.43-1.58 2.31-1.45 3.91-3.72 4.51-6.38s.13-5.4-1.32-7.7l-13.64-21.62c14.82-5.81 25.7-19.53 26.99-35.72.02-.22.04-.44.05-.67.01-.15.01-.29.01-.44.01-5.54-4.34-10.05-9.8-10.34z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <x-consulting.testimonials.item
                company="Big Sweater Design"
                :image="Vite::asset('resources/images/consulting/testimonials/vincent.webp')"
                name="Vincent Maglione"
                website="https://bigsweater.co"
            >
                Zep grasped my complex issue quickly, and within 15 minutes,
                provided a solution that did exactly what I needed — with less
                code than my initial attempt! Since we had time left on our
                call, Zep generously shared his expertise on Filament's inner
                workings, which has ultimately made me faster and more
                proficient with the framework. Having access to a core Filament
                developer has been invaluable.
            </x-consulting.testimonials.item>

            <x-consulting.testimonials.item
                company="trevorgreenleaf.com"
                :image="Vite::asset('resources/images/consulting/testimonials/trevor.webp')"
                name="Trevor Greenleaf"
                website="https://trevorgreenleaf.com"
            >
                Working with Zep was a fantastic experience! He is extremely
                knowledgeable in Laravel and Filament. He was able to guide us
                through some complex features and offer valuable insights that
                helped us improve our product. I highly recommend Zep for your
                consulting needs.
            </x-consulting.testimonials.item>

            <x-consulting.testimonials.item
                company="DCS Digital"
                :image="Vite::asset('resources/images/consulting/testimonials/scott.webp')"
                name="Scott Bowler"
                website="https://www.dcsdigital.co.uk"
            >
                After discovering Filament, I needed quick insights to evaluate
                its potential for our project. An hour with Zep clarified
                complexities and saved me hours of research. This enabled swift,
                informed decision-making and set our project on the right path
                with Filament as the backbone. I'd highly recommend taking the
                time to speak to the Filament team, and it's great to know
                they're around if we ever need answers to tough questions.
            </x-consulting.testimonials.item>

            <x-consulting.testimonials.item
                company="ZimplerApps"
                :image="Vite::asset('resources/images/consulting/testimonials/daniel.webp')"
                name="Daniel Plomp"
                website="https://www.zimplerapps.com"
            >
                I recently had the opportunity to have a really productive
                session with Zep, tackling some complex challenges that were
                slowing me down. It's clear that spending an hour with Zep is a
                smart choice—it saves so much time compared to trying to figure
                everything out on your own. Zep is not only incredibly
                knowledgeable, but also easy to talk to and approachable. The
                time and resources invested are truly worthwhile. I definitely
                recommend Zep's services.
            </x-consulting.testimonials.item>
        </ul>
    </div>
</section>
