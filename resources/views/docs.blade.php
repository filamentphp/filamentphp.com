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

        <div class="max-w-8xl mx-auto grid grid-cols-1 gap-8 lg:grid-cols-5 lg:divide-x lg:dark:divide-gray-600">
            <aside
                x-cloak
                :aria-hidden="$store.sidebar.isOpen.toString()"
                :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
                class="fixed w-full max-w-xs p-8 space-y-8 inset-y-0 left-0 z-10 overflow-y-auto transition-transform duration-500 ease-in-out transform bg-gray-50 dark:bg-gray-800 lg:w-auto lg:max-w-full lg:ml-8 lg:mr-4 lg:p-0 lg:-translate-x-0 lg:bg-transparent lg:relative lg:overflow-visible"
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

            <main class="p-8 space-y-16 overflow-x-auto lg:pr-0 lg:py-0 lg:col-span-3">
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

                <x-filament-support::link href="{{ $page->github_link }}" >Edit on GitHub</x-filament-support::link>

                <p class="text-lg">
                    Still need help? Join our <a href="{{ route('discord') }}" target="_blank" class="transition hover:text-primary-600">Discord community</a> or open a <a href="https://github.com/filamentphp/filament/discussions/new" target="_blank" class="transition hover:text-primary-600">GitHub discussion</a>
                </p>
            </main>

            <aside class="space-y-8 pr-2 lg:pl-8 lg:sticky lg:top-8 lg:self-start lg:h-screen">
                <h4 class="font-heading text-center text-3xl">
                    Sponsors
                </h4>

                <div class="space-y-4">
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
                        href="https://larasapien.com/?utm_source=filamentphp.com"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/181019787-8cdb8813-5973-4a63-ae59-d85ff91dedd0.png"
                            alt="Larasapien"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://ohdear.app"
                        target="__blank"
                        class="block mx-auto max-w-xs"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/166422472-e722264e-3e77-480a-91af-e3fde597063c.png"
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
