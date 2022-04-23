<x-layouts.app>
    <x-header :subheading="'by' . $trick->getAuthorName() . ', last modified on' . $trick->updated_at->format('F NS, Y')">
        {{ $trick->name }}
    </x-header>

    <x-section>
        <div class="max-w-4xl mx-auto px-8">
            <div class="text-sm text-gray-700 mb-5">
                <a href="{{ route('tricks') }}">
                    &larr; Back to Tricks
                </a>
            </div>

            <div>
                <ul class="mb-10">
                    @foreach($trick->getCategoryLabels() as $category)
                        <li class="inline-flex items-center justify-center space-x-1 text-primary-700 bg-primary-500/10 min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl whitespace-normal">{{ $category }}</li>
                    @endforeach
                </ul>

                <div class="border-t border-gray-200 mb-10"></div>

                <div class="prose max-w-none">
                    @markdown($trick->description)
                </div>
            </div>
        </div>
    </x-section>
</x-layouts.app>
