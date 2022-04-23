<x-layouts.app>
    <x-section>
        <div class="grid grid-cols-6">
            <div class="col-span-2 flex flex-col">
                <span class="font-medium uppercase tracking-wider focus:text-primary-500 text-gray-900">Recent tricks</span>

                <ul class="mb-10">
                    @foreach(\App\Models\Trick::published()->recent()->limit(5)->get() as $recent)
                        <li>
                            <a href="{{ route('tricks.view', $recent) }}">{{ $recent->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <span class="font-medium uppercase tracking-wider focus:text-primary-500 text-gray-900">Other tricks by {{ $trick->getAuthorName() }}</span>

                <ul>
                    @foreach(\App\Models\Trick::whereBelongsTo($trick->author, 'author')->recent()->limit(5)->get() as $authorTrick)
                        <li>{{ $authorTrick->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-span-4">
                <h1 class="text-2xl font-heading tracking-tight text-gray-900 sm:text-3xl mb-2">
                    {{ $trick->name }}
                </h1>

                <p class="text-gray-500 mb-2">by {{ $trick->getAuthorName() }}, last modified on {{ $trick->updated_at->format('F NS, Y') }}</p>

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
