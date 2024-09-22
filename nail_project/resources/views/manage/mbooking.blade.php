<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NailSlay</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/mbooking.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        @include('layouts.navbar_manicurist')
        <div class="box1">
            <p class="text1" style="font-weight: bold; ">{{ $shop->shop_name }}</p>
        </div>
        <div class="container1">
            <a href="{{ route('editShop', ['shop_id' => $shop->shop_id]) }}" class="btn">
                <p class="text1">แก้ไขร้าน</p>
            </a>
            <a href="{{ route('add_promotion',['shop_id' => $shop->shop_id]) }}" class="btn">
                <p class="text1">เพิ่มโปรโมชัน</p>
            </a>
        </div>
        <div class="container1">
            <div class="textbox1">
                <p class="text2">รายการจอง</p>
            </div>
            <input class="btn" type="date" id="start" name="trip-start" value="{{ request('date', now()->format('Y-m-d')) }}" onchange="filterBookings()" />
        </div>
        <div class="container mt-5">
        @if ($bookings->isEmpty())
            <table class="table">
                <thead>
                    <tr style="font-size: 20px;">
                        <th>ชื่อ</th>
                        <th>เบอร์โทร</th>
                        <th>เวลา</th>
                    </tr>
                </thead>
            </table>
            <p class="text-center" style="font-size: 20px; margin-top: 20px;" >วันนี้ไม่มีรายการจอง</p>
        @else
            <table class="table">
                <thead>
                    <tr style="font-size: 20px;">
                        <th>ชื่อ</th>
                        <th>เบอร์โทร</th>
                        <th>เวลา</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($bookings as $booking)
                    <tr style="font-size: 20px;">
                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                        <td>{{ $booking->user->phone_number ?? 'N/A' }}</td>
                        <td>{{ $booking->time_booking->format('H:i:s') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

        <script>
            function filterBookings() {
                const selectedDate = document.getElementById('start').value;
                window.location.href = `?date=${selectedDate}`;
            }
        </script>
        @if (session('success'))
            <script>
                alert("{{ addslashes(session('success')) }}");
            </script>
        @endif

    </body>
</html>
