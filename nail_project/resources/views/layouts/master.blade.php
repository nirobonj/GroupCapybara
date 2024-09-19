<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | NailySlay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="">
    </head>

    <body>
        <div>
            <!-- ตรวจสอบว่าผู้ใช้งานเป็นแม่ค้าหรือไม่ -->
            @if(Auth::user() && Auth::user()->isManicurist())
                @include('layouts.navbar_manicurist')
            @else
                @include('layouts.navbar_frame')
            @endif

            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
