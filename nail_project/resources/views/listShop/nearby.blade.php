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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/listShop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">
    <!-- Navbar -->
    @include('navbar.navbartwo')

    <!-- Main Content -->
    <div class="container">
        <div class="header">
            <h1 class="nameShop">ใกล้ฉัน</h1>
            <div class="search-container">
                <input type="text" placeholder="ค้นหาร้านทำเล็บ...">
                <button type="submit">ค้นหา</button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($shops as $shop)
                    <div class="col-12 mb-4"> <!-- ปรับเป็น col-12 เพื่อให้ความยาวเต็มหน้า -->

                        <div class="card h-100"
                            style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">

                                <div class="row">
                                    <!-- รูปของร้าน -->
                                    <div class="col-3 d-flex align-items-center justify-content-center">

                                        <div
                                            style="background-color: #f6a5ec; width: 100%; height: 120px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                            <img src="{{ asset('images/' . $shop->images_name) }}" alt="Shop Image"
                                                class="card-image">
                                        </div>
                                    </div>

                                    <!-- ข้อมูลร้าน -->
                                    <div class="col-9">
                                        <a href="{{ route('shopDetail', ['id' => $shop->shop_id]) }}"
                                            style="text-decoration: none;">
                                            <h5 class="card-title" style="color: black;">{{ $shop->shop_name }}</h5>
                                        </a>
                                        <!-- แสดงผลการให้ดาวรีวิว -->
                                        @php
                                            $averageRating = $shop->reviews->avg('rating') ?? 0;
                                            $reviewCount = $shop->reviews->count();
                                            $fullStars = floor($averageRating);
                                            $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp

                                        <div class="rating mb-2">
                                            <!-- ดาวเต็ม -->
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <i class="fa-solid fa-star" style="color: Violet;"></i>
                                            @endfor

                                            <!-- ดาวครึ่ง -->
                                            @if ($halfStar)
                                                <i class="fa-solid fa-star-half" style="color: Violet;"></i>
                                            @endif

                                            <!-- ดาวว่าง -->
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <i class="fa-regular fa-star" style="color: Gray;"></i>
                                            @endfor

                                            <!-- ค่าเฉลี่ยรีวิวและจำนวนรีวิว -->
                                            <span style="color: black;">{{ number_format($averageRating, 1) }}
                                                ({{ $reviewCount }} รีวิว)</span>
                                        </div>

                                        <!-- ปุ่มโปรโมชั่น -->
                                        @if (!empty($shop->promotion_detail) && $shop->promotion_detail !== '-')
                                            <a href="{{ route('shopDetail', ['id' => $shop->shop_id]) }}"
                                                class="btn btn-warning">promo</a>
                                        @endif
                                        <div style="display: flex; justify-content: start;  padding: 10px; border-radius: 5px; width: 30%; margin-left: auto;">
                                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: auto; margin: 0;">
                                                <i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $shop->shop_address }}
                                            </p>
                                        </div>
                                        
                                        
                                        
                                        {{-- <div class="rating mb-2">
                                <span style="color: green;">★ {{ number_format($shop->reviews->avg('rating') ?? 1, 1) }}</span>
                                <span style="color: green;">({{ $shop->reviews->count() }})</span>
                            </div>
                            @if ($shop->promotion_detail)
                            <button class="btn btn-warning">promo</button>
                            @endif --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</body>

</html>
