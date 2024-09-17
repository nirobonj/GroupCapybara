<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NailSlay</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/listShop.css') }}">
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">
    <!-- Navbar -->
    @include('layouts.navbar_frame')

    <!-- Main Content -->
    <div class="container">
        <div class="header">
            <h1 class="nameShop">ร้านทำเล็บใกล้คุณ</h1>
            <div class="search-container">
                <input type="text" placeholder="ค้นหาร้านทำเล็บ...">
                <button type="submit">ค้นหา</button>
            </div>
        </div>
        
        <div class="content">
            <!-- Loop through the shops -->
            @foreach ($shops as $shop)
            <div class="shop-item">
                <div class="shop-image">
                    รูป
                </div>
                <div class="shop-info">
                    <div class="nameShop">{{ $shop->shop_name }}</div>

                    <!-- Calculate average review rating -->
                    @php
                        $averageRating = $shop->reviews->avg('rating') ?? 0; // ค่าเริ่มต้นถ้าไม่มีรีวิว
                        $reviewCount = $shop->reviews->count();
                    @endphp
                    <div class="rating">★ {{ number_format($averageRating, 1) }} ({{ $reviewCount }} รีวิว)</div>
                    
                    <!-- Display promotion label if available -->
                    @if ($shop->promotion_detail && $shop->promotion_detail !== '-')
                    <div class="promo-label">promo</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
