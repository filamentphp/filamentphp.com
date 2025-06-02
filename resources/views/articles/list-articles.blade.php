<x-layouts.app>
    <x-articles.hero
        :$articlesCount
        :$authorsCount
        :$starsCount
    />

    <div class="border-merino mx-auto mt-5 w-full max-w-330 border-t"></div>

    <x-articles.list
        :$articles
        :$categories
        :$types
    />
</x-layouts.app>
