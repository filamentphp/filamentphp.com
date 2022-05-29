<x-filament::widget>
    <x-filament::card>
        <div class="prose max-w-none dark:prose-invert">
            @if ($record->status === \App\Enums\ArticleStatus::Draft)
                <p>
                    <strong>
                        This article is still in draft mode.
                    </strong>

                    You can edit it however you like. When you're ready, submit it for review, and we'll publish it on
                    the Filament website! 🤩
                </p>
            @elseif ($record->status === \App\Enums\ArticleStatus::Pending)
                <p>
                    <strong>
                        This article is now under review. 🧐
                    </strong>

                    You can still edit it, but a Filament maintainer will check it out very soon, and publish it on the
                    Filament website.
                </p>
            @elseif ($record->status === \App\Enums\ArticleStatus::Published)
                <p>
                    This article is now published on our website. ✅
                </p>
            @endif
        </div>
    </x-filament::card>
</x-filament::widget>
