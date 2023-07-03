<x-layouts.base previewify="756" :previewify-data="[
    'overline' => $package->name . ' v' . $package->version_id,
    'title' => $page->title,
    'subtitle' => $package->description,
    'repository' => $package->package,
]" dark-mode :doc-search="false">
    <x-nav dark-mode />

    <div x-data="{}" class="space-y-12">
        <button
            x-show="$store.sidebar.isOpen"
            x-transition.opacity
            x-on:click="$store.sidebar.isOpen = false"
            x-cloak
            type="button"
            aria-hidden="true"
            class="fixed inset-0 w-full h-full bg-black/50 focus:outline-none lg:hidden"
        ></button>

        <div class="max-w-8xl mx-auto grid grid-cols-1 gap-8 lg:grid-cols-11 lg:divide-x lg:dark:divide-gray-600">
            <aside
                x-cloak
                :aria-hidden="$store.sidebar.isOpen.toString()"
                :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
                class="fixed w-full max-w-xs p-8 space-y-8 inset-y-0 left-0 z-10 overflow-y-auto transition-transform duration-500 ease-in-out transform bg-gray-50 dark:bg-gray-800 lg:col-span-2 lg:w-auto lg:max-w-full lg:ml-8 lg:mr-4 lg:p-0 lg:-translate-x-0 lg:bg-transparent lg:relative lg:overflow-visible"
            >
                <div
                    x-data="{ version: '{{ $version->slug }}' }"
                    x-init="
                        $watch('version', () => window.location = `/docs/${version}/{{ $package->slug }}`)
                    "
                    class="space-y-2 -mx-3"
                >
                    <div class="mb-8 bg-gray-50 dark:bg-gray-800 -mx-2 px-1 rounded-lg text-sm flex flex-col">
                        @foreach (\App\Models\DocumentationPackage::query()->product()->get()->unique('slug') as $product)
                            <div class="py-1">
                                <a
                                    href="{{ route('docs', ['versionSlug' => $version->slug, 'packageSlug' => $product->slug]) }}"
                                    @class([
                                        'group p-1 rounded-md flex gap-4 items-center font-medium lg:text-sm lg:leading-6',
                                        'text-gray-500 dark:text-gray-300 hover:text-primary-500' => $package->slug !== $product->slug,
                                        'bg-gray-100 dark:bg-gray-700 text-primary-600 dark:text-primary-500' => $package->slug === $product->slug,
                                    ])
                                >
                                    <div class="flex items-center justify-center bg-white dark:bg-gray-900 text-primary-600 rounded h-6 w-6 ring-1 ring-gray-900/5 dark:ring-gray-100/5 shadow-sm group-hover:shadow group-hover:ring-gray-900/10 dark:group-hover:ring-gray-100/10 group-hover:shadow-primary-200 dark:group-hover:shadow-primary-800">
                                        <x-dynamic-component :component="$product->icon" class="h-4 w-4" />
                                    </div>

                                    <span>
                                        {{ $product->name }}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <select x-model="version" class="block w-full h-10 dark:bg-gray-800 border-gray-300 dark:border-gray-700 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500">
                        @foreach ($package->getVersions() as $packageVersion)
                            <option value="{{ $packageVersion->slug }}">
                                {{ $packageVersion->name }}
                            </option>
                        @endforeach
                    </select>

                    <div id="docsearch" class="border rounded-lg border-gray-300 dark:border-gray-700 shadow-sm"></div>
                </div>

                <ul class="space-y-4">
                    @php
                        $requestedSlug = request()->route()->parameter('pageSlug');
                        $predefinedSections = [];
                    @endphp

                    @foreach ($package->getPages() as $packagePage)
                        @php
                            $isSection = filled($packagePage->section);

                            if ($isSection) {
                                if (in_array($packagePage->section, $predefinedSections)) {
                                    continue;
                                }

                                $predefinedSections[] = $packagePage->section;
                            }

                            $isActive = $isSection ? str($requestedSlug)->startsWith("{$packagePage->section_slug}/") : $requestedSlug === $packagePage->slug;
                        @endphp

                        <li class="space-y-1">
                            <a
                                href="{{ $isSection ? $packagePage->getSectionUrl() : $packagePage->getUrl() }}"
                                @class([
                                    'font-medium transition hover:text-primary-600 dark:hover:text-primary-400 focus:text-primary-600 dark:focus:text-primary-400',
                                    'text-gray-900 dark:text-gray-300' => ! $isActive,
                                    'text-primary-600 dark:text-primary-500' => $isActive,
                                ])
                            >
                                {{ $isSection ? $packagePage->section : $packagePage->title }}
                            </a>

                            <ul class="pl-4 border-l-2 dark:border-gray-600 space-y-2">
                                @capture($renderListItem, $url, $label, $isActive)
                                    <li class="relative leading-5">
                                        @if ($isActive)
                                            <div class="absolute left-0 top-2 -ml-[1.2rem] h-1 w-1 bg-primary-600 rounded-full"></div>
                                        @endif

                                        <a
                                            href="{{ $url }}"
                                            @class([
                                                'text-sm transition hover:text-primary-600 dark:hover:text-primary-400 focus:text-primary-600 dark:focus:text-primary-400',
                                                'text-gray-700 dark:text-gray-400' => ! $isActive,
                                                'text-primary-600 dark:text-primary-500 font-medium' => $isActive,
                                            ])
                                        >
                                            {{ $label }}
                                        </a>
                                    </li>
                                @endcapture

                                @if (filled($packagePage->section))
                                    @foreach ($package->getPagesQuery()->where('section', $packagePage->section)->get() as $subpage)
                                        {{ $renderListItem($subpage->getUrl(), $subpage->title, $requestedSlug === $subpage->slug) }}
                                    @endforeach
                                @else
                                    @foreach ($packagePage->getContentSections() as $slug => $heading)
                                        {{ $renderListItem("{$packagePage->getUrl()}#{$slug}", $heading, false) }}
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <main class="p-8 space-y-16 overflow-x-auto lg:pr-0 lg:py-0 lg:col-span-7">
                <div class="mx-auto prose dark:prose-invert max-w-none">
                    <h1 class="font-heading">
                        {{ $page->title }}
                    </h1>

                    @if (filled($page->section))
                        <div class="-mt-6 mb-8 text-xl font-medium">
                            {{ $page->section }}
                        </div>
                    @endif

                    @php
                        config()->set('markdown', include config_path('markdown.php'));

                        app()->singleton('markdown.environment', function (\Illuminate\Contracts\Container\Container $app): \League\CommonMark\Environment\Environment {
                            $config = config()->get('markdown');

                            $environment = new \League\CommonMark\Environment\Environment(\Illuminate\Support\Arr::except($config, ['extensions', 'views']));

                            collect($config['extensions'])
                                ->each(fn (string $extension) => $environment->addExtension(app($extension)));

                            return $environment;
                        });

                        app()->singleton('markdown.converter', function (\Illuminate\Contracts\Container\Container $app): \League\CommonMark\MarkdownConverter {
                            $environment = app('markdown.environment');

                            return new \League\CommonMark\MarkdownConverter($environment);
                        });
                    @endphp

                    @markdown($page->content)
                </div>

                <x-filament-support::link :href="$page->getGitHubLink()" target="_blank">
                    Edit on GitHub
                </x-filament-support::link>

                <p class="text-lg">
                    Still need help? Join our <a href="{{ route('discord') }}" target="_blank" class="transition hover:text-primary-600">Discord community</a> or open a <a href="https://github.com/filamentphp/filament/discussions/new" target="_blank" class="transition hover:text-primary-600">GitHub discussion</a>
                </p>
            </main>

            <aside class="space-y-8 pr-2 lg:pl-8 lg:col-span-2">
                <h4 class="font-heading text-center text-3xl">
                    Sponsors
                </h4>

                <div class="space-y-4">
                    <a
                        href="https://ploi.io"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/166302471-b5f7596e-87af-4716-b73d-63241efd8756.png"
                            alt="Ploi"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://tappnetwork.com"
                        target="__blank"
                        class="block bg-white rounded-xl mx-auto max-w-xs"
                    >
                        <img
                            src="https://github.com/filamentphp/filament/assets/44533235/cd8be68b-59f3-4b93-8b25-f82c6f2d7864"
                            alt="Tapp Network"
                            class="block"
                        />
                    </a>

                    <a
                        href="https://codecourse.com"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/178451980-762bc3f0-3dc5-4fcb-ba1d-00f264a8936c.png"
                            alt="Codecourse"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://laradir.com"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/198047886-3cbed5d7-f855-4529-9ab6-eebdb708b974.png"
                            alt="Laradir"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://uselocale.com"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/222703942-927b565f-e389-47b3-b583-0e605b17d9bd.png"
                            alt="Locale"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://luckymedia.dev/?utm_campaign=sponsor&utm_source=filament&utm_medium=web"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://github.com/filamentphp/filament/assets/41773797/68e31a53-0d4e-463e-91bc-3b9258807908"
                            alt="Lucky Media"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://solutionforest.net"
                        target="__blank"
                        title="Solution Forest"
                        class="block bg-white rounded-xl p-4 mx-auto max-w-xs"
                    >
                        <svg class="w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 39.16">
                            <path fill="#007c90" d="M58.73,23.5H41.16a3.92,3.92,0,1,1,0-7.84H58.73a3.92,3.92,0,1,1,0,7.84Z"/>
                            <path fill="#fcaf17" d="M41.16,39.16a3.93,3.93,0,0,1-3.92-3.93,3.91,3.91,0,0,1,1.15-2.76,4,4,0,0,1,3.53-1.07,4.83,4.83,0,0,1,.74.22,4.32,4.32,0,0,1,.67.36,2.8,2.8,0,0,1,.59.49,3.91,3.91,0,0,1,1.15,2.76A4,4,0,0,1,43.92,38a3.44,3.44,0,0,1-.59.48,3.11,3.11,0,0,1-.67.36,3.92,3.92,0,0,1-1.5.31Z"/>
                            <path fill="#007c90" d="M22.14,39.16h-18a3.92,3.92,0,0,1,0-7.84H21.73l.41,0a3.91,3.91,0,0,0,0-7.82H11.74A11.74,11.74,0,0,1,11.74,0H62.65a3.92,3.92,0,0,1,0,7.84H11.74a3.91,3.91,0,1,0,0,7.81h10.4a11.74,11.74,0,0,1,.51,23.47A4.06,4.06,0,0,1,22.14,39.16Z"/>
                            <path fill="#00707e" d="M78.81,16a1.22,1.22,0,0,1,.74-2.21,1.32,1.32,0,0,1,.76.24,5,5,0,0,0,3.07,1.08c1.08,0,1.73-.43,1.73-1.13v0c0-.67-.41-1-2.42-1.52-2.42-.62-4-1.29-4-3.68v0c0-2.18,1.75-3.62,4.21-3.62a7,7,0,0,1,3.81,1.06,1.2,1.2,0,0,1,.58,1,1.22,1.22,0,0,1-1.24,1.22,1.3,1.3,0,0,1-.67-.19,4.94,4.94,0,0,0-2.52-.81c-1,0-1.54.46-1.54,1v0c0,.79.51,1,2.59,1.58,2.44.64,3.81,1.51,3.81,3.61v0c0,2.39-1.82,3.73-4.41,3.73A7.72,7.72,0,0,1,78.81,16Z"/>
                            <path fill="#00707e" d="M92.25,11.26v0a6.39,6.39,0,0,1,12.77,0v0a6.39,6.39,0,0,1-12.77,0Zm10,0v0a3.65,3.65,0,0,0-3.64-3.78A3.6,3.6,0,0,0,95,11.19v0A3.65,3.65,0,0,0,98.65,15,3.6,3.6,0,0,0,102.26,11.26Z"/>
                            <path fill="#00707e" d="M110.46,6.44a1.32,1.32,0,1,1,2.64,0v8.39H118a1.2,1.2,0,1,1,0,2.4h-6.22a1.31,1.31,0,0,1-1.32-1.32Z"/>
                            <path fill="#00707e" d="M124.33,12.08V6.44a1.32,1.32,0,1,1,2.64,0V12c0,2,1,3,2.59,3s2.59-1,2.59-2.89V6.44a1.33,1.33,0,1,1,2.65,0V12c0,3.64-2,5.42-5.27,5.42S124.33,15.62,124.33,12.08Z"/>
                            <path fill="#00707e" d="M143.38,7.65h-2.54a1.22,1.22,0,1,1,0-2.43h7.72a1.22,1.22,0,1,1,0,2.43H146V16a1.32,1.32,0,0,1-2.64,0Z"/>
                            <path fill="#00707e" d="M154.91,6.44a1.32,1.32,0,1,1,2.64,0V16a1.32,1.32,0,1,1-2.64,0Z"/>
                            <path fill="#00707e" d="M163.11,11.26v0a6.39,6.39,0,0,1,12.78,0v0a6.22,6.22,0,0,1-6.41,6.21A6.15,6.15,0,0,1,163.11,11.26Zm10,0v0a3.65,3.65,0,0,0-3.64-3.78,3.59,3.59,0,0,0-3.6,3.74v0A3.64,3.64,0,0,0,169.52,15,3.59,3.59,0,0,0,173.12,11.26Z"/>
                            <path fill="#00707e" d="M181.32,6.47a1.31,1.31,0,0,1,1.32-1.32h.28a1.64,1.64,0,0,1,1.37.77l5.1,6.7V6.42a1.31,1.31,0,1,1,2.61,0V16a1.31,1.31,0,0,1-1.32,1.32h-.09a1.64,1.64,0,0,1-1.37-.77l-5.29-6.94V16a1.31,1.31,0,1,1-2.61,0Z"/>
                            <path fill="#00707e" d="M78.38,25.43a1.31,1.31,0,0,1,1.32-1.32h6.73a1.21,1.21,0,0,1,0,2.41H81v2.55h4.64a1.21,1.21,0,0,1,0,2.41H81v3.43a1.32,1.32,0,1,1-2.64,0Z"/>
                            <path fill="#00707e" d="M92.19,30.16v0a6.22,6.22,0,0,1,6.41-6.21A6.15,6.15,0,0,1,105,30.09v0a6.39,6.39,0,0,1-12.78,0Zm10,0v0a3.65,3.65,0,0,0-3.64-3.78A3.6,3.6,0,0,0,95,30.09v0A3.65,3.65,0,0,0,98.6,33.9,3.59,3.59,0,0,0,102.2,30.16Z"/>
                            <path fill="#00707e" d="M110.4,25.43a1.32,1.32,0,0,1,1.32-1.32h4.18a4.8,4.8,0,0,1,3.5,1.22,3.78,3.78,0,0,1,1,2.75v0A3.67,3.67,0,0,1,118,31.77L119.86,34a1.53,1.53,0,0,1,.43,1A1.23,1.23,0,0,1,119,36.23a1.6,1.6,0,0,1-1.31-.68l-2.57-3.27h-2.11v2.63a1.33,1.33,0,0,1-2.65,0ZM115.72,30c1.29,0,2-.69,2-1.7v0c0-1.14-.79-1.72-2.08-1.72h-2.62V30Z"/>
                            <path fill="#00707e" d="M125.9,34.81V25.43a1.31,1.31,0,0,1,1.32-1.32h6.66a1.19,1.19,0,0,1,1.19,1.19,1.17,1.17,0,0,1-1.19,1.16h-5.35V28.9h4.58a1.18,1.18,0,0,1,1.18,1.19,1.17,1.17,0,0,1-1.18,1.16h-4.58v2.53H134a1.18,1.18,0,1,1,0,2.35h-6.75A1.31,1.31,0,0,1,125.9,34.81Z"/>
                            <path fill="#00707e" d="M140.59,34.86a1.24,1.24,0,0,1-.5-1,1.21,1.21,0,0,1,1.24-1.21,1.26,1.26,0,0,1,.75.24A5.08,5.08,0,0,0,145.16,34c1.08,0,1.73-.43,1.73-1.14v0c0-.67-.41-1-2.42-1.53-2.42-.62-4-1.29-4-3.67v0c0-2.18,1.75-3.62,4.2-3.62A6.94,6.94,0,0,1,148.5,25a1.18,1.18,0,0,1,.59,1,1.22,1.22,0,0,1-1.24,1.22,1.28,1.28,0,0,1-.67-.19,5,5,0,0,0-2.52-.8c-1,0-1.55.46-1.55,1v0c0,.79.52,1,2.6,1.58,2.43.63,3.81,1.51,3.81,3.6v0c0,2.38-1.82,3.72-4.41,3.72A7.78,7.78,0,0,1,140.59,34.86Z"/>
                            <path fill="#00707e" d="M157.7,26.55h-2.54a1.22,1.22,0,1,1,0-2.44h7.73a1.22,1.22,0,0,1,0,2.44h-2.54v8.36a1.33,1.33,0,0,1-2.65,0Z"/>
                        </svg>
                    </a>

                    <a
                        href="https://zimplerapps.com"
                        target="__blank"
                        class="block bg-white rounded-xl p-4 mx-auto max-w-xs"
                    >
                        <img
                            src="https://github.com/filamentphp/filament/assets/44533235/7098329d-3b1d-457d-bbeb-125af76433d4"
                            alt="ZimplerApps"
                            class="block"
                        />
                    </a>

                    <a
                        href="https://docuwriter.ai"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/231168744-48222757-98b3-45f0-9517-d1b0f0b66677.png"
                            alt="DocuWriter.ai"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://ego-trace.com"
                        target="__blank"
                        class="block bg-white rounded-xl p-4 mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/171833049-69fa5cbb-988e-4472-bcaf-4754dbade77d.png"
                            alt="EgoTrace"
                            class="block"
                        />
                    </a>

                    <a
                        href="https://flareapp.io"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/166236825-250ad64d-92b1-4291-bd97-306d51bb0ce7.png"
                            alt="Flare"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://native-media.fr"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://github.com/filamentphp/filament/assets/44533235/31c1de77-3a70-413a-8564-3c82f512c424"
                            alt="Native Media"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://ohdear.app"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/198252053-a2ae3314-5076-4383-9d1c-9507362f847f.jpg"
                            alt="Oh Dear"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://github.com/sponsors/danharrin"
                        target="__blank"
                        class="block mx-auto max-w-xs font-medium text-sm text-center rounded-xl bg-gray-50 dark:bg-gray-800 p-4 transition hover:bg-pink-100 dark:hover:bg-pink-900 hover:scale-105"
                    >
                        Your logo here? <span class="hover:scale-105">💖</span>
                    </a>
                </div>
            </aside>
        </div>

        <section class="bg-pink-500 dark:bg-pink-600 flex justify-center">
            <div class="relative max-w-8xl w-full flex justify-center text-center mx-auto px-8 py-16">
                <div class="max-w-2xl space-y-8">
                    <div class="space-y-4">
                        <h2 class="font-heading font-bold text-primary-200 text-4xl">
                            Enjoying Filament?
                        </h2>

                        <p class="text-xl text-white">
                            We are open source at heart. To allow us to <strong>build new features</strong>, <strong>fix bugs</strong>, and <strong>run the community</strong>, we require your financial support.
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

                <div class="hidden absolute left-0 bottom-0 ml-12 -mb-2 xl:block">
                    <img
                        src="{{ asset('images/dragon.svg') }}"
                        alt="Dragon"
                        class="h-[16rem]"
                    />
                </div>

                <div class="hidden absolute right-0 top-0 mt-12 mr-12 xl:block">
                    <img
                        src="{{ asset('images/diamond.svg') }}"
                        alt="Diamond"
                        class="h-[8rem]"
                    />
                </div>
            </div>
        </section>
    </div>

    <x-footer dark-mode />
</x-layouts.base>
