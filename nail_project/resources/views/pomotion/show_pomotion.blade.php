<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NailSlay</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/pomotion.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        @include('layouts.navbar_manicurist')
        <div class="box1">
            <p class="text">show pomotion</p>
        </div>
    </div>
    </body>
</html>