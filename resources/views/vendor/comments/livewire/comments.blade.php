@php
    use Spatie\Comments\Enums\NotificationSubscriptionType;
@endphp

<section class="comments {{ $newestFirst ? 'comments-newest-first' : '' }}">
    <header class="comments-header">
        @if($writable)
            @auth
                @if($showNotificationOptions)
                    <div x-data="{ subscriptionsOpen: false}" class="comments-subscription">
                        <button @click.prevent="subscriptionsOpen = true" class="comments-subscription-trigger">
                            {{ NotificationSubscriptionType::from($selectedNotificationSubscriptionType)->longDescription() }}
                        </button>
                        <x-comments::modal
                            bottom
                            compact
                            x-show="subscriptionsOpen"
                            @click.outside="subscriptionsOpen = false"
                        >
                            @foreach(NotificationSubscriptionType::cases() as $case)
                                <button class="comments-subscription-item" @click="subscriptionsOpen = false" wire:click="updateSelectedNotificationSubscriptionType('{{ $case->value }}')">
                                    {{ $case->description() }}
                                </button>
                            @endforeach
                        </x-comments::modal>
                    </div>
                @endif
            @endif
        @endauth
    </header>

    @if ($newestFirst)
        @if (auth()->check() || config('comments.allow_anonymous_comments'))
            @include('comments::livewire.partials.newComment')
        @else
            <div class="text-center">
                <x-filament-support::link :href="route('filament.auth.login')" target="_blank">
                    Sign in to comment &rarr;
                </x-filament-support::link>
            </div>
        @endif
    @endif

    @if($comments->count())
        @foreach($comments as $comment)
            @can('see', $comment)
                <livewire:comments-comment
                    :key="$comment->id"
                    :comment="$comment"
                    :show-avatar="$showAvatars"
                    :newest-first="$newestFirst"
                    :writable="$writable"
                    :show-replies="$showReplies"
                />
            @endcan
        @endforeach
        {{ $comments->links() }}
    @else
        <p class="comments-no-comment-yet">{{ $noCommentsText ?? __('comments::comments.no_comments_yet') }}</p>
    @endif

    @if (! $newestFirst)
        @if (auth()->check() || config('comments.allow_anonymous_comments'))
            @include('comments::livewire.partials.newComment')
        @else
            <div class="text-center">
                <x-filament-support::link :href="route('filament.auth.login')" target="_blank">
                    Sign in to comment &rarr;
                </x-filament-support::link>
            </div>
        @endif
    @endif
</section>
