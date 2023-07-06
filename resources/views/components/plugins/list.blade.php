<div class="mx-auto w-full max-w-8xl px-10 pt-20">
    <div class="flex items-start gap-5">
        {{-- Categories --}}
        <div class="w-full max-w-[15rem]">Categories</div>

        {{-- Plugins --}}
        <div
            class="grid w-full grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] items-start justify-center gap-6"
        >
            <template
                x-data="{
                    plugins: [
                        {
                            price: 'Free',
                            github_stars: 54,
                            view_count: 3719,
                            thumbnail: '',
                            name: 'Access and Menu Management',
                            link: 'https://filament.app.test/plugins/access-and-menu-management',
                            description: 'Modular support based on nwidart/laravel-modules.',
                            author: {
                                name: 'Alan Lam',
                                avatar: null,
                            },
                            features: {
                                dark_mode: false,
                                multi_language: false,
                            },
                            supported_versions: ['1', '2'],
                            categories: ['Editor', 'Authentication'],
                            latest_activity_at: '2023-04-07T00:21:45.148Z',
                        },
                        {
                            price: '$199',
                            github_stars: 145,
                            view_count: 54001,
                            thumbnail: '',
                            name: 'Overlook',
                            link: 'https://filament.app.test/plugins/overlook',
                            description:
                                'Widget to show an overview of resources on the dashboard.',
                            author: {
                                name: 'Adam Weston',
                                avatar: 'https://avatars.githubusercontent.com/u/3596800?v=4',
                            },
                            features: {
                                dark_mode: true,
                                multi_language: true,
                            },
                            supported_versions: ['1', '2', '3'],
                            categories: ['Admin Panel', 'Widget'],
                            latest_activity_at: '2022-03-08T07:52:26+00:00',
                        },
                        {
                            price: '$199',
                            github_stars: 145,
                            view_count: 54001,
                            thumbnail: '',
                            name: 'Overlook',
                            link: 'https://filament.app.test/plugins/overlook',
                            description:
                                'Widget to show an overview of resources on the dashboard.',
                            author: {
                                name: 'Adam Weston',
                                avatar: 'https://avatars.githubusercontent.com/u/3596800?v=4',
                            },
                            features: {
                                dark_mode: true,
                                multi_language: false,
                            },
                            supported_versions: ['1', '2', '3'],
                            categories: ['Admin Panel', 'Widget'],
                            latest_activity_at: '2022-03-08T07:52:26+00:00',
                        },
                    ],
                }"
                x-for="plugin in plugins"
                class=""
            >
                <x-plugins.card />
            </template>
        </div>
    </div>
</div>
