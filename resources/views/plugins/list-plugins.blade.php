<x-layouts.app>
    <x-plugins.hero
        :$authorsCount
        :$pluginsCount
        :$starsCount
    />

    <div
        class="mx-auto mt-5 w-full max-w-[82.5rem] border-t border-merino"
    ></div>

    <x-plugins.featured-plugin-authors
        :$featured_plugins
    />

    <x-plugins.list
        :$categories
        :$plugins
    />
</x-layouts.app>
