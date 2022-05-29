<x-filament::widget>
    <x-filament::card>
        <x-slot name="heading">
            Share your Filament tricks with the community
        </x-slot>

        <div class="prose max-w-none dark:prose-invert">
            <p>
                Share helpful tricks with the community. We currently have {{ \App\Models\Trick::query()->published()->count() }} tricks listed on our website, and we'd love to see yours. 🤩
            </p>

            <p>
                Here's how it works:
            </p>

            <ul>
                <li>
                    <strong>
                        Create a trick. 📦
                    </strong>

                    You can write an article in markdown.
                </li>

                <li>
                    <strong>
                        Submit it for review. ⏳
                    </strong>

                    One of the Filament team will review your submission and approve it for our website.
                </li>

                <li>
                    <strong>
                        Once approved ✅,
                    </strong>

                    your trick will be listed on our website. You can edit it at any time.
                </li>
            </ul>
        </div>
    </x-filament::card>
</x-filament::widget>
