<x-layouts.app previewify="757" :previewify-data="[
    'title' => 'The elegant TALLkit for Laravel artisans.',
    'subtitle' => 'Rapidly build TALL stack interfaces, designed for humans.',
    'code' => 'composer require filament/filament',
]">
    <header class="relative max-w-7xl mx-auto py-20 md:pb-48 px-8">
        <div class="space-y-12 max-w-screen-sm">
            <div class="space-y-4">
                <h1 class="font-heading font-bold text-gray-900 text-4xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight">
                    The elegant <span class="text-primary-500">TALL</span>kit for Laravel artisans.
                </h1>

                <h3 class="text-gray-700 text-2xl">
                    Filament is a collection of tools for rapidly building beautiful TALL stack interfaces, designed for humans.
                </h3>
            </div>

            <div class="flex flex-wrap gap-4">
                <x-button
                    tag="a"
                    href="https://demo.filamentphp.com"
                    target="_blank"
                    size="lg"
                >
                    Admin panel demo
                </x-button>

                <a
                    href="{{ route('discord') }}"
                    target="_blank"
                    class="inline-flex items-center font-medium space-x-4 text-lg px-4 py-2 rounded-lg bg-gray-900 text-white transition hover:text-primary-100 hover:scale-105 hover:-rotate-1"
                >
                    <svg class="w-5" fill="none" viewBox="0 0 71 55" aria-hidden="true">
                        <g clip-path="url(#clip0)">
                            <path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z" fill="currentColor"/>
                        </g>
                    </svg>

                    <span>
                        Join our Discord community
                    </span>
                </a>
            </div>
        </div>

        <div class="hidden absolute right-0 bottom-0 -mb-3 md:block">
            <img
                src="{{ asset('images/dog.svg') }}"
                alt="Dog"
                class="h-[20rem] lg:h-[28rem]"
            />
        </div>
    </header>

    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-8 py-32 space-y-32">
            <div class="grid lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/admin.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Admin Panel
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    A fully-featured <span class="font-medium">TALL-stack admin panel</span>.
                                </p>

                                <p>
                                    Build <a href="/docs/forms/tables" class="font-medium transition hover:text-primary-100">complex and interactive tables</a>, complete with sort, search and filter functionalities, easily.
                                </p>

                                <p>
                                    Craft <a href="/docs/forms/forms" class="font-medium transition hover:text-primary-100">intuitive forms</a> using a wide range of field types, using our simple, class-based form builder.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/filament" />
                            </div>

                            <div class="text-right">
                                <a href="https://demo.filamentphp.com" target="_blank" class="block text-white transition hover:text-primary-100 font-medium text-lg">
                                    Demo &rarr;
                                </a>

                                <a href="/docs/admin" class="block text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-flow-row-dense lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="lg:col-start-2 xl:col-start-3 xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/forms.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="lg:col-start-1 xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Form Builder
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    An intuitive <span class="font-medium">TALL-stack form builder</span>.
                                </p>

                                <p>
                                    Generate <a href="/docs/forms/components#date-time-picker" class="font-medium transition hover:text-primary-100">date pickers</a>, searchable <a href="/docs/forms/components#select" class="font-medium transition hover:text-primary-100">select menus</a>, <a href="/docs/forms/components#rich-editor" class="font-medium transition hover:text-primary-100">rich text editors</a> and <a href="/docs/forms/components#file-upload" class="font-medium transition hover:text-primary-100">file upload</a> fields with just one line of PHP.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/forms" />
                            </div>

                            <div class="text-right">
                                <a href="/docs/forms" class="text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-5 gap-8 lg:gap-16">
                <div class="xl:col-span-3 flex items-center">
                    <img src="{{ asset('images/tables.jpg') }}" class="overflow-hidden rounded-lg" />
                </div>

                <div class="xl:col-span-2 flex items-center">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-white text-4xl">
                                <span>
                                    Table Builder
                                </span>

                                <span class="font-sans text-medium text-xl text-primary-500">
                                    v2
                                </span>
                            </h3>

                            <div class="text-lg text-gray-200 space-y-2">
                                <p>
                                    An interactive <span class="font-medium">TALL-stack table builder</span>.
                                </p>

                                <p>
                                    Build custom datatables, complete with sort, search and filter functionalities, with a simple PHP interface.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-composer-command package="filament/tables" />
                            </div>

                            <div>
                                <a href="/docs/tables" class="text-white transition hover:text-primary-100 font-medium text-lg">
                                    Documentation &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative max-w-7xl mx-auto px-8 py-32">
        <div class="space-y-16">
            <h2 class="font-heading font-bold text-4xl text-center">
                Here's what others say
            </h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-testimonial url="https://twitter.com/iksaku2">
                    Filament is the <strong>Swiss Army Knife dashboard for TALL stack apps</strong>. Just sit down, install and you'll have a full CMS in two shakes.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/4632429?v=4">
                        Jorge González
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/larsklopstra">
                    Filament is a <strong>great CMS solution</strong> for both technical and non-technical users, and the fluent API is a <strong>developer's dream!</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/25669876?v=4">
                        Lars Klopstra
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/andreas_kviby/status/1367824016380166144">
                    What else can you wish for? <strong>Filament rocks</strong>! This will be my <strong>first choice</strong> when creating adminpanels for clients from this day and forward.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/1666004?v=4">
                        Andreas Kviby
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/adamlee_clx/status/1380910055411748868">
                    I absolutely love developing with TALL stack. Filament is going to <strong>save a lot of time</strong> with the overall development process!!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/53559175?v=4">
                        Adam Lee
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/DominikGeimer/status/1416114759179571202">
                    I just started using Filament by Dan Harrin, Ryan Chandler and Ryan Scherler. <strong>I am really impressed</strong>. Thank you for that great tool.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6383607?v=4">
                        Dominik Geimer
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/roniestein/status/1366526433737068546">
                    Release the hounds!!! This project is going to be <strong>my new go-to</strong> for all back-end work!!! So Excited!

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/8517475?v=4">
                        Roni Estein
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/LabsArtisan/status/1368248886725402625">
                    👍 been using it today and I’ve got to say <strong>it's brilliant.</strong>

                    <x-slot name="author" avatar="https://pbs.twimg.com/profile_images/1294198577833615360/ifwIsmKp_400x400.jpg">
                        Artisan Labs
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/Tiago_Ferat/status/1367996436567179264">
                    An <strong>awesome</strong> Open-Source Admin panel with TALL stack. 👏👏

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/11933789?v=4">
                        Tiago Rodrigues
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/AmaurisCid/status/1366803626287579142">
                    Awesome job! It is <strong>sooo cool</strong> to test run it and the <strong>ease of use</strong>. Thank you guys.

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6839739?v=4">
                        Amaury Cid
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/kiltedup/status/1366526387180482567">
                    Just installed and had a play. <strong>Really great job.</strong>

                    <x-slot name="author" avatar="https://pbs.twimg.com/profile_images/1251922928469446664/IxVNvpzG_400x400.jpg">
                        Dave Walker
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/theraloss/status/1367975271949864969">
                    Filament is <strong>damn smooth.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6277291?v=4">
                        Danilo Polani
                    </x-slot>
                </x-testimonial>

                <x-testimonial url="https://twitter.com/mskhoshnazar/status/1423181010850746371">
                    Filament was a <strong>joy to use.</strong>

                    <x-slot name="author" avatar="https://avatars.githubusercontent.com/u/6499685?v=4">
                        Mo Khosh
                    </x-slot>
                </x-testimonial>
            </div>
        </div>

        <div class="hidden absolute top-0 right-0 mt-20 -mr-40 2xl:block">
            <img
                src="{{ asset('images/worm.svg') }}"
                alt="Worm"
                class="h-[8rem]"
            />
        </div>

        <div class="hidden absolute bottom-0 mb-96 -ml-48 2xl:block">
            <img
                src="{{ asset('images/fish.svg') }}"
                alt="Fish"
                class="h-[8rem]"
            />
        </div>
    </section>

    <section class="bg-pink-500">
        <div class="relative lg:flex items-center space-y-16 max-w-7xl mx-auto px-8 py-32 lg:space-y-0 lg:space-x-16">
            <div class="grid grid-cols-8 gap-2 shrink-0">
                @foreach([
                    'https://github.com/calebporzio' => 'https://avatars.githubusercontent.com/u/3670578?s=96&v=4',
                    'https://github.com/larrybarker' => 'https://avatars.githubusercontent.com/u/28734844?s=96&v=4',
                    'https://github.com/jouniikaheimo' => 'https://avatars.githubusercontent.com/u/32259223?s=96&v=4',
                    'https://github.com/jeffgreco13' => 'https://avatars.githubusercontent.com/u/12453974?s=96&v=4',
                    'https://github.com/blinkinglight' => 'https://avatars.githubusercontent.com/u/39296?s=96&v=4',
                    'https://github.com/jhoff' => 'https://avatars.githubusercontent.com/u/627060?s=96&v=4',
                    'https://github.com/buzkall' => 'https://avatars.githubusercontent.com/u/5702?s=96&v=4',
                    'https://github.com/getstagent' => 'https://avatars.githubusercontent.com/u/54575927?s=96&v=4',
                    'https://github.com/intrepidws' => 'https://avatars.githubusercontent.com/u/125735?s=96&v=4',
                    'https://github.com/johncarter-' => 'https://avatars.githubusercontent.com/u/3776888?s=96&v=4',
                    'https://github.com/roni-estein' => 'https://avatars.githubusercontent.com/u/8517475?s=96&v=4',
                    'https://github.com/looxisdev' => 'https://avatars.githubusercontent.com/u/25901673?s=96&v=4',
                    'https://github.com/ssmusoke' => 'https://avatars.githubusercontent.com/u/689900?s=96&v=4',
                    'https://github.com/skoontastic' => 'https://avatars.githubusercontent.com/u/585102?s=96&v=4',
                    'https://github.com/adam-code-labx' => 'https://avatars.githubusercontent.com/u/53559175?s=96&v=4',
                    'https://github.com/joselara' => 'https://avatars.githubusercontent.com/u/1036420?s=96&v=4',
                    'https://github.com/s-sadiq' => 'https://avatars.githubusercontent.com/u/3797475?s=96&v=4',
                    'https://github.com/blackpig' => 'https://avatars.githubusercontent.com/u/1029317?s=96&v=4',
                    'https://github.com/joshuablum' => 'https://avatars.githubusercontent.com/u/3824203?s=96&v=4',
                    'https://github.com/macscr' => 'https://avatars.githubusercontent.com/u/1404944?s=96&v=4',
                    'https://github.com/rabol' => 'https://avatars.githubusercontent.com/u/1177191?s=96&v=4',
                    'https://github.com/rexlManu' => 'https://avatars.githubusercontent.com/u/32296940?s=96&v=4',
                    'https://github.com/gavinhewitt' => 'https://avatars.githubusercontent.com/u/1969103?s=96&v=4',
                    'https://github.com/sebastiaankloos' => 'https://avatars.githubusercontent.com/u/6506510?s=96&v=4',
                    'https://github.com/pxlrbt' => 'https://avatars.githubusercontent.com/u/22632550?s=96&v=4',
                    'https://github.com/lukasleitsch' => 'https://avatars.githubusercontent.com/u/3009245?s=96&v=4',
                    'https://github.com/elelas' => 'https://avatars.githubusercontent.com/u/10687213?s=96&v=4',
                    'https://github.com/basepack' => 'https://avatars.githubusercontent.com/u/939500?s=96&v=4',
                    'https://github.com/matthans0n' => 'https://avatars.githubusercontent.com/u/25103095?s=96&v=4',
                    'https://github.com/lara-zeus' => 'https://avatars.githubusercontent.com/u/85035829?s=96&v=4',
                    'https://github.com/tanthammar' => 'https://avatars.githubusercontent.com/u/21239634?s=96&v=4',
                    'https://github.com/jszobody' => 'https://avatars.githubusercontent.com/u/203749?s=96&v=4',
                    'https://github.com/dubcanada' => 'https://avatars.githubusercontent.com/u/120325?s=96&v=4',
                    'https://github.com/saade' => 'https://avatars.githubusercontent.com/u/14329460?s=96&v=4',
                    'https://github.com/swilla' => 'https://avatars.githubusercontent.com/u/304159?s=96&v=4',
                    'https://github.com/cigoler' => 'https://avatars.githubusercontent.com/u/2905728?s=96&v=4',
                    'https://github.com/jwohlfert23' => 'https://avatars.githubusercontent.com/u/2797531?s=96&v=4',
                    'https://github.com/swara-mohammed' => 'https://avatars.githubusercontent.com/u/9349190?s=96&v=4',
                    'https://github.com/ap1969' => 'https://avatars.githubusercontent.com/u/1629592?s=96&v=4',
                    'https://github.com/martin-ro' => 'https://avatars.githubusercontent.com/u/10107779?s=96&v=4',
                    'https://github.com/cheesegrits' => 'https://avatars.githubusercontent.com/u/934456?s=96&v=4',
                    'https://github.com/dgironella' => 'https://avatars.githubusercontent.com/u/26429549?s=96&v=4',
                    'https://github.com/jimmyaldape' => 'https://avatars.githubusercontent.com/u/59585840?s=96&v=4',
                    'https://github.com/clausmunch' => 'https://avatars.githubusercontent.com/u/701248?s=96&v=4',
                    'https://github.com/hansenhalim' => 'https://avatars.githubusercontent.com/u/29351920?s=96&v=4',
                    'https://github.com/invaders-xx' => 'https://avatars.githubusercontent.com/u/604907?s=96&v=4',
                ] as $url => $avatar)
                    <a
                        href="{{ $url }}"
                        target="_blank"
                    >
                        <img src="{{ $avatar }}" class="rounded-full w-12 mx-auto" />
                    </a>
                @endforeach
            </div>

            <div class="flex-grow space-y-8">
                <div class="space-y-4">
                    <h2 class="font-heading font-bold text-primary-200 text-4xl">
                        Our sponsors
                    </h2>

                    <p class="text-xl text-white">
                        Filament is open source at heart. To allow us to <strong>build new features</strong>, <strong>fix bugs</strong>, and <strong>run the community</strong>, we require your financial support.
                    </p>
                </div>

                <a
                    href="https://github.com/sponsors/danharrin"
                    target="_blank"
                    class="group inline-flex items-center justify-center px-6 text-lg sm:text-xl font-semibold tracking-tight text-white transition rounded-lg h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-pink-500 hover:ring-primary-200 focus:ring-primary-200 focus:text-pink-500 focus:bg-primary-200 focus:outline-none"
                >
                    Sponsor Filament on GitHub

                    <x-heroicon-o-heart class="ml-2 -mr-3 w-7 h-7 transition-all group-hover:scale-125" />
                </a>
            </div>

            <div class="hidden absolute right-0 top-12 mr-12 xl:block">
                <img
                    src="{{ asset('images/diamond.svg') }}"
                    alt="Diamond"
                    class="h-[8rem]"
                />
            </div>
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-8 py-32 space-y-16">
            <h2 class="font-heading font-bold text-white text-4xl text-center">
                Meet the team
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <x-team-member
                    name="Ryan Chandler"
                    avatar="https://avatars.githubusercontent.com/u/41837763?v=4"
                    github="https://github.com/ryangjchandler"
                    twitter="https://twitter.com/ryangjchandler"
                />

                <x-team-member
                    name="Dan Harrin"
                    avatar="https://avatars.githubusercontent.com/u/41773797?v=4"
                    github="https://github.com/danharrin"
                    twitter="https://twitter.com/danjharrin"
                />

                <x-team-member
                    name="Ryan Scherler"
                    avatar="https://avatars.githubusercontent.com/u/881938?v=4"
                    github="https://github.com/ryanscherler"
                    twitter="https://twitter.com/ryanscherler"
                />
            </div>
        </div>
    </section>
</x-layouts.app>
