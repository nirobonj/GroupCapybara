<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NailSlay</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/pomotion.css') }}">
        <link rel="stylesheet" href="{{ asset('css/history.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        
        @include('navbar.navbartwo')
        <div class="container1">
            <p class="text font-weight-bold">โปรโมชันของร้าน</p>
            <div class="box1">
                <!-- <p class="text">show pomotion</p> -->
            
                <div class="box2">
                {!! nl2br(str_replace('-', '<br>', $shop->promotion_detail)) !!}
                </div>
            </div>
            <a href="/nearbyShops" class="btn">
                <p class="text2">ตกลง</p>
            </a>
        </div>
    </div>
    </body>
</html>