@props([
    'package',
])

<button
    x-data="{}"
    x-on:click="$clipboard('composer require {{ $package }}')"
    type="button"
    {{ $attributes->class(['group']) }}
>
    <code class="inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6">
        <span class="flex gap-4">
            <span class="shrink-0 text-gray-500">
                $
            </span>

            <span class="flex-1">
                <span>
                    composer require
                </span>

                <span class="text-primary-500">
                    {{ $package }}
                </span>
            </span>
        </span>

        <x-heroicon-s-clipboard-copy class="shrink-0 h-5 w-5 transition text-gray-500 group-hover:text-white" />
    </code>
</button>
