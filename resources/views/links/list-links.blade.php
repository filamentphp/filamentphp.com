<x-layouts.app>
    <x-header>
        Community Links
    </x-header>

    <x-section id="all-links">
        @livewire(\App\Http\Livewire\Links\SearchLinks::class)
    </x-section>

    <section class="bg-gray-900">
        <div class="lg:flex items-center space-y-16 max-w-7xl mx-auto px-8 py-32 lg:space-y-0 lg:space-x-16">
            <div class="mx-auto max-w-2xl text-center space-y-8">
                <div class="space-y-4">
                    <h2 class="font-heading font-bold text-primary-200 text-4xl">
                        Submit your own links 🚀
                    </h2>

                    <p class="text-xl text-white">
                        Visit the link dashboard to publish your own links to our website!
                    </p>
                </div>

                <a
                    href="/admin/links"
                    target="_blank"
                    class="group inline-flex items-center justify-center px-6 text-lg sm:text-xl font-semibold tracking-tight text-white transition rounded-lg h-11 ring-2 ring-inset ring-white hover:bg-primary-200 hover:text-primary-800 hover:ring-primary-200 focus:ring-primary-200 focus:text-primary-800 focus:bg-primary-200 focus:outline-none"
                >
                    Go to link dashboard
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
