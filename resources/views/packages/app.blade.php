<x-layouts.app previewify="757" :previewify-data="[
    'title' => 'Filament - App Framework and Admin Panel for Laravel',
    'subtitle' => 'Build beautiful apps and admin panels using the TALL stack.',
    'code' => 'composer require filament/filament',
]">
    <header class="max-w-7xl mx-auto text-center py-12 px-8 md:py-24">
        <h4 class="font-cursive md:text-2xl">
            Introducing...
        </h4>

        <h1 class="mt-4 text-4xl font-heading md:text-6xl">
            <span>
                Our Laravel
            </span>

            <span class="text-primary-500">
                Admin Panel
            </span>
        </h1>

        <h3 class="mt-8 text-gray-600 font-medium text-xl md:text-3xl">
            Fully featured, simply intuitive and <span class="italic">insanely</span> attractive.
        </h3>

        <div class="flex justify-center items-center flex-wrap gap-4 mt-4 md:mt-8">
            <a
                href="/docs/app"
                class="inline-flex items-center font-medium text-lg px-4 py-2 rounded-lg bg-primary-500 text-white transition hover:text-primary-50 hover:scale-105"
            >
                <x-heroicon-o-academic-cap class="w-6 h-6 mr-3" />

                Visit the documentation
            </a>

            <a
                href="{{ route('discord') }}"
                target="_blank"
                class="inline-flex items-center font-medium text-lg px-4 py-2 rounded-lg bg-gray-900 text-white transition hover:text-primary-100 hover:scale-105"
            >
                <svg class="w-5 mr-3" fill="none" viewBox="0 0 71 55" aria-hidden="true">
                    <g clip-path="url(#clip0)">
                        <path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z" fill="currentColor"/>
                    </g>
                </svg>

                <span>
                    Join our community
                </span>
            </a>
        </div>

        <div class="mt-12 md:mt-28">
            <x-admin-demo shadow="shadow-2xl shadow-black/40" />
        </div>
    </header>

    <section>
        <div class="bg-primary-300 bg-cover bg-top -mt-[8rem] md:-mt-[20rem] pt-[8rem] md:pt-[16rem] lg:-mt-[24rem]" style="background-image: url(/images/backgrounds/liquid.svg)">
            <div class="max-w-8xl mx-auto px-8 py-16 lg:pt-32">
                <div class="text-center">
                    <h2 class="font-heading text-black-900/80 text-4xl">
                        The entire power of Filament in one package
                    </h2>

                    <div class="mt-8 mx-auto max-w-5xl">
                        <p class="text-gray-800/80 font-medium text-xl">
                            Our TALL stack admin panel is a collaboration between all our other packages. Each package already provides you with a comprehensive set of features, now experience all of those combined into one product!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 px-8 gap-8">
            <x-feature icon="icons.form-input">
                <x-slot name="heading">
                    Over 25 form components, built-in
                </x-slot>

                <x-feature.paragraph>
                    Take complete control over the layout and behaviour of your forms, using our simple builder API.
                </x-feature.paragraph>

                <x-feature.paragraph>
                    We use PHP and Livewire to provide you with a clean approach to writing dependant fields and handling other user interactions.
                </x-feature.paragraph>
            </x-feature>

            <x-feature icon="heroicon-o-table">
                <x-slot name="heading">
                    Datatables on steroids
                </x-slot>

                <x-feature.paragraph>
                    We've harnessed the power of Eloquent to build a table component with first class features.
                </x-feature.paragraph>

                <x-feature.paragraph>
                    Advanced filtering, pagination, bulk-actions, drag and drop reordering, relationship data presentation and aggregation.
                </x-feature.paragraph>
            </x-feature>

            <x-feature icon="heroicon-o-chart-square-bar">
                <x-slot name="heading">
                    Dashboard widgets with style
                </x-slot>

                <x-feature.paragraph>
                    Our beautiful set of dashboard widgets let you present your data in a range of formats. Interactive charts, stat counters, tables, and anything custom that you can imagine.
                </x-feature.paragraph>
            </x-feature>

            <x-feature icon="heroicon-o-annotation">
                <x-slot name="heading">
                    Slick notifications
                </x-slot>

                <x-feature.paragraph>
                    A beautiful design, complete with polished animations and versatile action buttons. Easily send messages from any part of the Livewire admin panel.
                </x-feature.paragraph>
            </x-feature>

            <x-feature icon="heroicon-o-inbox">
                <x-slot name="heading">
                    Effortless modals
                </x-slot>

                <x-feature.paragraph>
                    Simply trigger a modal from anywhere, collect user input with a form, and run an operation. We include a set of handy helpers for your test suite that help you ensure these important interactions work as expected.
                </x-feature.paragraph>
            </x-feature>

            <x-feature icon="heroicon-o-puzzle">
                <x-slot name="heading">
                    An ecosystem of plugins
                </x-slot>

                <x-feature.paragraph>
                    Our wonderful community has built a wide range of packages that were crafted out of their own need for additional Filament functionality in their projects. If you find a missing core feature, just check our plugins.
                </x-feature.paragraph>
            </x-feature>
        </div>

        <div class="mt-16">
            <h3 class="text-xl text-center font-medium transition hover:scale-105">
                <a href="/docs/app" class="link-underline">
                    Well. What are you waiting for? &rarr;
                </a>
            </h3>
        </div>
    </section>

    <x-sponsor-banner class="mt-16" />
</x-layouts.app>
