<x-layouts.app>
    <x-articles.hero
        :$articlesCount
        :$authorsCount
        :$starsCount
    />

    <div
        class="mx-auto mt-5 w-full max-w-[82.5rem] border-t border-merino"
    ></div>

    <x-articles.list
        :$articles
        :$categories
        :$types
    />
</x-layouts.app>
