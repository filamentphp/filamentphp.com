@props([
    'previewify' => null,
    'previewifyData' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <x-seo::meta />

        @if ($previewify)
            <meta property="og:image" content="https://previewify.app/i/{{ $previewify }}?url={{ url()->current() }}">
            <meta name="twitter:image" content="https://previewify.app/i/{{ $previewify }}?url={{ url()->current() }}">
            <meta name="previewify:image" content="{{ asset('/images/icon.png') }}">
            @foreach ($previewifyData as $key => $value)
                <meta name="previewify:{{ $key }}" content="{{ $value }}">
            @endforeach
        @endif

        <!-- Fonts -->
        @googlefonts

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body class="antialiased">
        {{ $slot }}
    </body>
</html>
