<x-layouts.app>
    <x-header>
        Plugin Store

        <x-slot name="doodles">
            <div class="hidden absolute inset-y-0 items-center left-32 md:flex">
                <img
                    src="{{ asset('images/bolt.svg') }}"
                    alt="Lightning bolt"
                    class="h-[8rem]"
                />
            </div>

            <div class="hidden absolute inset-y-0 items-center right-24 md:flex">
                <img
                    src="{{ asset('images/unicorn.svg') }}"
                    alt="Unicorn"
                    class="h-[10rem]"
                />
            </div>
        </x-slot>
    </x-header>

    <x-section>
        <div class="flex items-center justify-between space-x-4">
            <h2 class="text-lg font-heading text-gray-900">Popular products</h2>

            <a href="#" class="whitespace-nowrap text-sm font-medium text-primary-600 hover:text-primary-500">View all<span aria-hidden="true"> &rarr;</span></a>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
            @foreach ($popularProducts as $product)
                <div class="block relative group transition hover:scale-105 hover:-rotate-1">
                    <a href="/" class="block">
                        <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden bg-gray-100">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg" alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." class="object-center object-cover">

                            <div class="flex items-end opacity-0 p-4 group-hover:opacity-100" aria-hidden="true">
                                <div class="w-full bg-white bg-opacity-75 backdrop-filter backdrop-blur py-2 px-4 rounded-md text-sm font-medium text-gray-900 text-center">
                                    View Product
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900 space-x-8">
                            <h3>
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p>$49</p>
                        </div>

                        <p class="mt-1 text-sm text-gray-500">
                            by {{ $product->owner->name }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>

{{--        <h3 class="font-heading text-2xl">--}}
{{--            Popular plugins--}}
{{--        </h3>--}}

{{--        <div class="grid grid-cols-3 gap-8">--}}
{{--            @foreach ($popularProducts as $product)--}}
{{--                <a href="/" class="group transition rounded-lg shadow-sm border border-gray-300 p-8 hover:scale-105 hover:-rotate-1">--}}
{{--                    <h4 class="font-heading text-lg">--}}
{{--                        {{ $product->name }}--}}
{{--                    </h4>--}}

{{--                    <p class="text-gray-700">--}}
{{--                        by {{ $product->owner->name }}--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </x-section>
</x-layouts.app>
