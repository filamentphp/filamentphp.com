<x-filament::widget>
    <x-filament::card>
        <x-slot name="heading">
            Educate our community with links
        </x-slot>

        <div class="prose max-w-none dark:prose-invert">
            <p>
                Filament Links is a directory of useful resources, like articles and videos, that can educate developers about Filament.

                We currently have {{ \App\Models\Link::query()->published()->count() }} links listed on our website, and we'd love to see yours. 🤩
            </p>

            <p>
                Here's how it works:
            </p>

            <ul>
                <li>
                    <strong>
                        Create a link. 📦
                    </strong>

                    You can add images, a description, and more.
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

                    your link will be listed on our website. You can edit it at any time.
                </li>
            </ul>
        </div>
    </x-filament::card>
</x-filament::widget>
