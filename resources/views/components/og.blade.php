<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">

        <!-- Fonts -->
        @googlefonts

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>

    <body class="antialiased">
        {{ $slot }}
    </body>
</html>
