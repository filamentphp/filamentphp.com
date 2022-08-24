<a
    href="{{ $url }}"
    target="_blank"
    class="group transition rounded-lg shadow border border-gray-300 p-8 hover:scale-105"
>
    <div class="flex flex-col space-y-8 justify-between h-full">
        <div class="relative">
            <span class="absolute top-0 left-0 -mt-12 -ml-8">
                <span class="transition font-heading font-bold text-gray-100 relative leading-none text-[10rem] -z-1 group-hover:text-primary-100">
                    “
                </span>
            </span>

            <blockquote class="text-gray-900 text-lg">
                "{{ $slot }}"
            </blockquote>
        </div>

        <div class="flex space-x-4 px-4 items-center justify-center">
            <img
                src="{{ $author->attributes->get('avatar') }}"
                alt="{{ $author }}"
                class="rounded-full w-12 h-12"
            />

            <span class="font-medium transition group-hover:text-primary-600">
                {{ $author }}
            </span>
        </div>
    </div>
</a>
