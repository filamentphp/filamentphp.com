@props([
    'plugin',
])

<div class="block relative group transition hover:scale-105 hover:-rotate-1">
    <a href="{{ route('plugins.view', ['plugin' => $plugin]) }}" class="block">
        <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden bg-gray-100">
            <img
                src="https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg"
                alt="{{ $plugin->name }}"
                class="object-center object-cover"
            >
        </div>

        <div class="p-2 space-y-1">
            <div class="flex items-center justify-between text-base font-medium text-gray-900">
                <h3>
                    <a href="#">
                        {{ $plugin->name }}
                    </a>
                </h3>

                <p class="ml-4 flex-shrink-0">
                    $49
                </p>
            </div>

            <p class="text-sm text-gray-500">
                by {{ $plugin->author->name }}
            </p>
        </div>
    </a>
</div>
