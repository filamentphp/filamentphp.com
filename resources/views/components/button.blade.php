@props([
    "color" => "primary",
    "disabled" => false,
    "form" => null,
    "icon" => null,
    "iconPosition" => "before",
    "outlined" => false,
    "tag" => "button",
    "tooltip" => null,
    "type" => "button",
    "size" => "md",
])

@php
    $buttonClasses = array_merge(
        [
            "inline-flex items-center justify-center font-medium tracking-tight rounded-lg border transition hover:scale-105 hover:-rotate-1 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset",
            "opacity-70 cursor-not-allowed" => $disabled,
            "h-9 px-4" => $size === "md",
            "h-8 px-3 text-sm" => $size === "sm",
            "h-11 px-4 text-lg" => $size === "lg",
        ],
        $outlined
            ? [
                "shadow focus:ring-white" => $color !== "secondary",
                "text-primary-500 border-primary-500 hover:bg-primary-500/20 focus:bg-primary-600/20 focus:ring-offset-primary-600" => $color === "primary",
                "text-success-500 border-success-500 hover:bg-success-500/20 focus:bg-success-600/20 focus:ring-offset-success-600" => $color === "success",
                "text-danger-500 border-danger-500 hover:bg-danger-500/20 focus:bg-danger-600/20 focus:ring-offset-danger-600" => $color === "danger",
                "text-warning-500 border-warning-500 hover:bg-warning-500/20 focus:bg-warning-600/20 focus:ring-offset-warning-600" => $color === "warning",
                "text-gray-500 border-gray-500 hover:bg-gray-500/20 focus:bg-gray-600/20 focus:ring-offset-gray-600" => $color === "gray",
                "text-gray-700 border-gray-300 hover:bg-gray-50 focus:ring-primary-500 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-500" => $color === "secondary",
            ]
            : [
                "text-white shadow focus:ring-white border-transparent" => $color !== "secondary",
                "bg-primary-500 hover:bg-primary-400 focus:bg-primary-600 focus:ring-offset-primary-600" => $color === "primary",
                "bg-success-500 hover:bg-success-400 focus:bg-success-600 focus:ring-offset-success-600" => $color === "success",
                "bg-danger-500 hover:bg-danger-400 focus:bg-danger-600 focus:ring-offset-danger-600" => $color === "danger",
                "bg-warning-500 hover:bg-warning-400 focus:bg-warning-600 focus:ring-offset-warning-600" => $color === "warning",
                "bg-gray-500 hover:bg-gray-400 focus:bg-gray-600 focus:ring-offset-gray-600" => $color === "gray",
                "text-gray-700 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-500 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-500" => $color === "secondary",
            ],
    );

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        "filament-button-icon",
        "w-6 h-6" => $size === "md",
        "w-7 h-7" => $size === "lg",
        "w-5 h-5" => $size === "sm",
        "mr-1 -ml-2 rtl:ml-1 rtl:-mr-2" => $iconPosition === "before" && $size === "md",
        "mr-2 -ml-3 rtl:ml-2 rtl:-mr-3" => $iconPosition === "before" && $size === "lg",
        "mr-1 -ml-1.5 rtl:ml-1 rtl:-mr-1.5" => $iconPosition === "before" && $size === "sm",
        "ml-1 -mr-2 rtl:mr-1 rtl:-ml-2" => $iconPosition === "after" && $size === "md",
        "ml-2 -mr-3 rtl:mr-2 rtl:-ml-3" => $iconPosition === "after" && $size === "lg",
        "ml-1 -mr-1.5 rtl:mr-1 rtl:-ml-1.5" => $iconPosition === "after" && $size === "sm",
    ]);

    $hasLoadingIndicator = filled($attributes->get("wire:click")) || ($type === "submit" && filled($form));

    if ($hasLoadingIndicator) {
        $loadingIndicatorTarget = html_entity_decode($attributes->get("wire:click", $form), ENT_QUOTES);
    }
@endphp

@if ($tag === "button")
    <button
        @if ($tooltip)
            x-data="{}"
            x-tooltip.raw="{{ $tooltip }}"
        @endif
        type="{{ $type }}"
        wire:loading.attr="disabled"
        {!! $hasLoadingIndicator ? 'wire:loading.class="opacity-70 cursor-wait"' : "" !!}
        {!! $hasLoadingIndicator && $loadingIndicatorTarget ? "wire:target=\"{$loadingIndicatorTarget}\"" : "" !!}
        {!! $disabled ? "disabled" : "" !!}
        {{ $attributes->class($buttonClasses) }}
    >
        @if ($icon && $iconPosition === "before")
            <x-dynamic-component
                :component="$icon"
                :class="$iconClasses"
            />
        @elseif ($hasLoadingIndicator)
            <svg
                wire:loading
                {!! $loadingIndicatorTarget ? "wire:target=\"{$loadingIndicatorTarget}\"" : "" !!}
                @class([$iconClasses, "animate-spin"])
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
            >
                <path
                    d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
                />
            </svg>
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === "after")
            <x-dynamic-component
                :component="$icon"
                :class="$iconClasses"
            />
        @endif
    </button>
@elseif ($tag === "a")
    <a
        @if ($tooltip)
            x-data="{}"
            x-tooltip.raw="{{ $tooltip }}"
        @endif
        wire:loading.attr="disabled"
        {!! $hasLoadingIndicator ? 'wire:loading.class="opacity-70 cursor-wait"' : "" !!}
        {!! $hasLoadingIndicator && $loadingIndicatorTarget ? "wire:target=\"{$loadingIndicatorTarget}\"" : "" !!}
        {{ $attributes->class($buttonClasses) }}
    >
        @if ($icon && $iconPosition === "before")
            <x-dynamic-component
                :component="$icon"
                :class="$iconClasses"
            />
        @elseif ($hasLoadingIndicator)
            <svg
                wire:loading
                {!! $loadingIndicatorTarget ? "wire:target=\"{$loadingIndicatorTarget}\"" : "" !!}
                @class([$iconClasses, "animate-spin"])
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
            >
                <path
                    d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
                />
            </svg>
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === "after")
            <x-dynamic-component
                :component="$icon"
                :class="$iconClasses"
            />
        @endif
    </a>
@endif
