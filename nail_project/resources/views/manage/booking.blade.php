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
        <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        @include('layouts.navbar_manicurist')
        <div class="box1">
            <p class="text">bua</p>
        </div>
        <div class="container1">
            <div class="container1">
                <a href="#" class="btn">
                    <p class="text">แก้ไขร้าน</p>
                </a>
                <a href="{{ route('add_pomotion') }}"class="btn">
                    <p class="text">เพิ่มโปรโมชัน</p>
                </a>
            </div>
        </div>
        <div class="container1">
            <div class="btn">
                <p class="text">รายการจอง</p>
            </div>
            <input class="btn" type="date" id="start" name="trip-start" value="<?= date('Y-m-d'); ?>" />
        </div>
    </body>
</html>