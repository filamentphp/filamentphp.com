<x-filament::widget>
    <x-filament::card>
        <div class="prose max-w-none dark:prose-invert">
            @if ($record->status === \App\Enums\TrickStatus::DRAFT)
                <p>
                    <strong>
                        This trick is still in draft mode.
                    </strong>

                    You can edit it however you like. When you're ready, submit it for review, and we'll publish it on the Filament website! 🤩
                </p>
            @elseif ($record->status === \App\Enums\TrickStatus::PENDING)
                <p>
                    <strong>
                        This trick is now under review. 🧐
                    </strong>

                    You can still edit it, but a Filament maintainer will check it out very soon, and publish it on the Filament website.
                </p>
            @elseif ($record->status === \App\Enums\TrickStatus::PUBLISHED)
                <p>
                    This trick is now published on our website. ✅
                </p>
            @endif
        </div>
    </x-filament::card>
</x-filament::widget>
