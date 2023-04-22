<a
    href="{{ $url }}"
    target="_blank"
    class="p-8 transition border border-gray-300 shadow group rounded-2xl hover:scale-105"
>
    <div class="flex flex-col justify-between h-full space-y-8">
        <div class="relative">
            <span class="absolute top-0 -mt-12 start-0 -ms-8">
                <span class="transition font-heading font-bold text-gray-100 relative leading-none text-[10rem] -z-1 group-hover:text-primary-100">
                    “
                </span>
            </span>

            <blockquote class="text-lg text-gray-900">
                "{{ $slot }}"
            </blockquote>
        </div>

        <div class="flex items-center justify-center px-4 space-x-4">
            <img
                src="{{ $author->attributes->get('avatar') }}"
                alt="{{ $author }}"
                class="w-12 h-12 rounded-full"
            />

            <span class="text-xl transition font-cursive group-hover:text-primary-600">
                {{ $author }}
            </span>
        </div>
    </div>
</a>
