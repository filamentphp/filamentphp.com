<x-layouts.app>
    <x-community.hero
        :$tricksCount
        :$articlesCount
        :$authorsCount
    />

    <div
        class="mx-auto mt-5 w-full max-w-[82.5rem] border-t border-merino"
    ></div>
    
    <x-community.list
        :$records
        :$tags
    />
</x-layouts.app>
