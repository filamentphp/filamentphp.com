@props([
    'darkMode' => false,
    'docSearch' => true,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta
            http-equiv="Content-Security-Policy"
            content="upgrade-insecure-requests"
        />

        <meta
            name="application-name"
            content="{{ config('app.name') }}"
        />
        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        />

        <x-seo::meta />

        {{-- Favicon --}}
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/favicon/apple-touch-icon.png?v=w1dBNxT7Wg"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/favicon/favicon-32x32.png?v=w1dBNxT7Wg"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/favicon/favicon-16x16.png?v=w1dBNxT7Wg"
        />
        <link
            rel="manifest"
            href="/favicon/site.webmanifest?v=w1dBNxT7Wg"
        />
        <link
            rel="mask-icon"
            href="/favicon/safari-pinned-tab.svg?v=w1dBNxT7Wg"
            color="#fdae4b"
        />
        <link
            rel="shortcut icon"
            href="/favicon/favicon.ico?v=w1dBNxT7Wg"
        />
        <meta
            name="msapplication-TileColor"
            content="#ffc40d"
        />
        <meta
            name="msapplication-config"
            content="/favicon/browserconfig.xml?v=w1dBNxT7Wg"
        />
        <meta
            name="theme-color"
            content="#ffffff"
        />

        <!-- Fonts -->
        @googlefonts

        <!-- Styles -->
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @livewireStyles
        @vite('resources/css/app.css')

        <!-- Scripts -->
        @livewireScripts
        @vite('resources/js/app.js')
        @stack('scripts')
    </head>

    <body
        class="relative min-h-screen overflow-x-clip bg-cream font-vietnam text-midnight antialiased selection:bg-stone-500/10"
    >
        <div
            id="docsearch"
            class="hidden"
        ></div>

        {{ $slot }}
    </body>
</html>
