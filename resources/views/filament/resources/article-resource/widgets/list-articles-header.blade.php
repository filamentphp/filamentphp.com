<x-filament::widget>
    <x-filament::card>
        <x-slot name="heading">
            Share your Filament articles with the community
        </x-slot>

        <div class="prose max-w-none dark:prose-invert">
            <p>
                Write an informative article to share on our blog. We currently have {{ \App\Models\Article::query()->published()->count() }} articles listed on our blog, and we'd love to see yours. 🤩
            </p>

            <p>
                Here's how it works:
            </p>

            <ul>
                <li>
                    <strong>
                        Create a article. 📦
                    </strong>

                    You can write an article in markdown.
                </li>

                <li>
                    <strong>
                        Submit it for review. ⏳
                    </strong>

                    One of the Filament team will review your submission and approve it for our blog.
                </li>

                <li>
                    <strong>
                        Once approved ✅,
                    </strong>

                    your article will be listed on our blog. You can edit it at any time.
                </li>
            </ul>
        </div>
    </x-filament::card>
</x-filament::widget>
