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

        @include('layouts.navbar_manicurist')
        <div class="container1">
            <p class="text font-weight-bold">เพิ่ม/แก้ไขโปรโมชัน</p>
            <div class="box1">
                <form action="{{ route('update_promotion', ['shop_id' => $shop->shop_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box2">
                        <textarea name="promotion_detail" rows="8" cols="50" class="form-control">{{ $shop->promotion_detail }}</textarea>
                    </div>
            </div>
            <div class="btn-container mb-4" >
                <button type="submit" class="btn btn-confirm">
                    <p class="text2">ยืนยัน</p>
                </button>
                <a href="{{ route('mbooking', $shop->shop_id)}}" class="btn2 btn-cancel">
                    <p class="text2">ยกเลิก</p>
                </a>
            </div>
            </form>
        </div>
    </div>
    <!-- @if (session('success'))
        <script>
            alert("{{ addslashes(session('success')) }}");
        </script>
    @endif -->
    @if (session('success'))
        <script>
            console.log("{{ addslashes(session('success')) }}");
            alert("{{ addslashes(session('success')) }}");
        </script>
    @endif

    </body>
</html>
