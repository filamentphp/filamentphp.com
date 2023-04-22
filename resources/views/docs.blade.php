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

        <div class="grid grid-cols-1 gap-8 mx-auto max-w-8xl lg:grid-cols-11 lg:divide-x lg:dark:divide-gray-600">
            <aside
                x-cloak
                :aria-hidden="$store.sidebar.isOpen.toString()"
                :class="$store.sidebar.isOpen ? '-translate-x-0' : '-translate-x-full'"
                class="fixed inset-y-0 z-10 w-full max-w-xs p-8 space-y-8 overflow-y-auto transition-transform duration-500 ease-in-out transform start-0 bg-gray-50 dark:bg-gray-800 lg:col-span-2 lg:w-auto lg:max-w-full lg:ms-8 lg:me-4 lg:p-0 lg:-translate-x-0 lg:bg-transparent lg:relative lg:overflow-visible"
            >
                <div
                    x-data="{ version: '{{ $version->slug }}' }"
                    x-init="
                        $watch('version', () => window.location = `/docs/${version}/{{ $package->slug }}`)
                    "
                    class="-mx-3 space-y-2"
                >
                    <div class="flex flex-col px-1 mb-8 -mx-2 text-sm rounded-lg bg-gray-50 dark:bg-gray-800">
                        @foreach (\App\Models\DocumentationPackage::query()->product()->where('version_id', $version->getKey())->get()->unique('slug') as $product)
                            <div class="py-1">
                                <a
                                    href="{{ route('docs', ['versionSlug' => $version->slug, 'packageSlug' => $product->slug]) }}"
                                    @class([
                                        'group p-1 rounded-md flex gap-4 items-center font-medium lg:text-sm lg:leading-6',
                                        'text-gray-500 dark:text-gray-300 hover:text-primary-500' => $package->slug !== $product->slug,
                                        'bg-gray-100 dark:bg-gray-700 text-primary-600 dark:text-primary-500' => $package->slug === $product->slug,
                                    ])
                                >
                                    <div class="flex items-center justify-center w-6 h-6 bg-white rounded shadow-sm dark:bg-gray-900 text-primary-600 ring-1 ring-black/5 dark:ring-gray-100/5 group-hover:shadow group-hover:ring-gray-900/10 dark:group-hover:ring-gray-100/10 group-hover:shadow-primary-200 dark:group-hover:shadow-primary-800">
                                        <x-dynamic-component :component="$product->icon" class="w-4 h-4" />
                                    </div>

                                    <span>
                                        {{ $product->name }}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <select x-model="version" class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500">
                        @foreach ($package->getVersions() as $packageVersion)
                            <option value="{{ $packageVersion->slug }}">
                                {{ $packageVersion->name }}
                            </option>
                        @endforeach
                    </select>

                    <div id="docsearch" class="border border-gray-300 rounded-lg shadow-sm dark:border-gray-700"></div>
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

                            <ul class="space-y-2 border-s-2 ps-4 dark:border-gray-600">
                                @capture($renderListItem, $url, $label, $isActive)
                                    <li class="relative leading-5">
                                        @if ($isActive)
                                            <div class="absolute start-0 top-2 -ms-[1.2rem] h-1 w-1 bg-primary-600 rounded-full"></div>
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

            <main class="p-8 space-y-16 overflow-x-auto lg:pe-0 lg:py-0 lg:col-span-7">
                <div class="mx-auto prose dark:prose-invert max-w-none">
                    <h1 class="font-heading">
                        {{ $page->title }}
                    </h1>

                    @if (filled($page->section))
                        <div class="mb-8 -mt-6 text-xl font-medium">
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

            <aside class="space-y-8 pe-2 lg:ps-8 lg:col-span-2">
                <h4 class="text-3xl text-center font-heading">
                    Sponsors
                </h4>

                <div class="space-y-4">
                    <a
                        href="https://ploi.io"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/166302471-b5f7596e-87af-4716-b73d-63241efd8756.png"
                            alt="Ploi"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://codecourse.com"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/178451980-762bc3f0-3dc5-4fcb-ba1d-00f264a8936c.png"
                            alt="Codecourse"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://laradir.com"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/198047886-3cbed5d7-f855-4529-9ab6-eebdb708b974.png"
                            alt="Laradir"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://uselocale.com"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/222703942-927b565f-e389-47b3-b583-0e605b17d9bd.png"
                            alt="Locale"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://docuwriter.ai"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/231168744-48222757-98b3-45f0-9517-d1b0f0b66677.png"
                            alt="DocuWriter.ai"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://ego-trace.com"
                        target="_blank"
                        class="block max-w-xs p-4 mx-auto bg-white rounded-xl"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/171833049-69fa5cbb-988e-4472-bcaf-4754dbade77d.png"
                            alt="EgoTrace"
                            class="block"
                        />
                    </a>

                    <a
                        href="https://flareapp.io"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/166236825-250ad64d-92b1-4291-bd97-306d51bb0ce7.png"
                            alt="Flare"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://larasapien.com/?utm_source=filamentphp.com"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/181019787-8cdb8813-5973-4a63-ae59-d85ff91dedd0.png"
                            alt="Larasapien"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://ohdear.app"
                        target="_blank"
                        class="block max-w-xs mx-auto"
                    >
                        <img
                            src="https://user-images.githubusercontent.com/41773797/198252053-a2ae3314-5076-4383-9d1c-9507362f847f.jpg"
                            alt="Oh Dear"
                            class="block rounded-xl"
                        />
                    </a>

                    <a
                        href="https://github.com/sponsors/danharrin"
                        target="_blank"
                        class="block max-w-xs p-4 mx-auto text-sm font-medium text-center transition rounded-xl bg-gray-50 dark:bg-gray-800 hover:bg-pink-100 dark:hover:bg-pink-900 hover:scale-105"
                    >
                        Your logo here? <span class="hover:scale-105">💖</span>
                    </a>
                </div>
            </aside>
        </div>

        <x-sponsor-banner />
    </div>

    <x-footer dark-mode />
</x-layouts.base>
