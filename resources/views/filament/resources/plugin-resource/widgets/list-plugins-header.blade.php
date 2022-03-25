<x-filament::widget>
    <x-filament::card>
        <x-slot name="heading">
            Grow our ecosystem with plugins
        </x-slot>

        <div class="prose max-w-none">
            <p>
                Filament Plugins is a directory of packages that are available for developers to use in their Filament projects.

                We currently have {{ \App\Models\Plugin::query()->published()->count() }} plugins listed on our website, and we'd love to see yours. 🤩
            </p>

            <p>
                Here's how it works:
            </p>

            <ul>
                <li>
                    <strong>
                        Create a plugin. 📦
                    </strong>

                    You can add images, documentation, a link to the plugin's GitHub repository, and more.
                </li>

                <li>
                    <strong>
                        Submit it for review. ⏳
                    </strong>

                    One of the Filament team will review your submission and approve it for our marketplace.
                </li>

                <li>
                    <strong>
                        Once approved ✅,
                    </strong>

                    your plugin will be listed on our website. You can edit it at any time.
                </li>
            </ul>

            <p>
                Wanna sell your plugins? 🤑 We've partnered with <a href="https://unlock.sh" target="_blank">Unlock</a>. They make it easy to sell, license and distribute your plugins. If you submit your plugin to their platform and opt-in to Filament's "affiliate channel". A link to your Unlock checkout will be automatically added to your plugin page. 🤯
            </p>
        </div>
    </x-filament::card>
</x-filament::widget>
