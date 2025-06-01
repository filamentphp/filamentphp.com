<x-layouts.app>
    <x-plugins.hero
        :$authorsCount
        :$pluginsCount
        :$starsCount
    />

    <div
        class="mx-auto mt-5 w-full max-w-330 border-t border-merino"
    ></div>

    <x-plugins.featured-plugins :$featuredPlugins />

    <x-plugins.list
        :$categories
        :$plugins
    />
</x-layouts.app>
