<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

      <!-- Swiper CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
      <link rel="stylesheet" href="{{ asset('css/swipe.css') }}">

      <style>

      </style>
   
</head>

<body>
    <header>
        @include('navbar.navbarhome')
    </header>

    <main>
      <div class="">
    
   
      <section class="tabs">
            <div class="itemsection">
                <h2>ใกล้ฉัน</h2>
                    <div class="carousels">
                        <div class="itemsecond">
                            <div class="image-placeholder"></div>
                            <div class="textnearme">ที่อยู่1</div>
                            
                        </div>
                        <div class="itemsecond">
                            <div class="image-placeholder"></div>
                            <div class="textnearme">ที่อยู่2</div>
                           
                        </div>
                        <div class="itemsecond">
                            <div class="image-placeholder"></div>
                            <div class="textnearme">ที่อยู่3</div>
                           
                        </div>
                    </div>
            </div>
        <div class="itemsections">
            <h2>ร้านยอดนิยม Top 3</h2>
            <div class="nexts carousel">
                <div class="items-wrapper">
                    <div class="items">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">click1</button>
                    </div>
                    <div class="items">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">click2</button>
                    </div>
                    <div class="items">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">click3</button>
                    </div>
  
                </div>
                    <!-- เพิ่มจุด pagination -->
                    <div class="pagination">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    </div>
            </div>
        </div>

        </section>

        <section class="promotions">
            <div class="swiper-container">
            <div class="header-container">
            <h2 class="header-title">โปรโมชั่น⚡⚡⚡</h2>
            <a href="your-link-here" class="view-more-link">ดูเพิ่มเติม</a>
        </div>

                <!-- Swiper Wrapper carousel -->
                <div class="swiper-wrapper">
                @foreach($homes as $home)
        <!-- Each Slide -->
        <div class="swiper-slide">
            <div class="image-placeholder">
                <img src="{{ asset('images/' . $home->images_name) }}" alt="Shop Image">
            </div>
            <a href="/bookinguser" class="details-btn">รายละเอียด</a>
            <button class="details-btn" onclick="window.location.href='/bookinguser'">รายละเอียด</button>
            <div class="discount">-50%</div>

            <div style="font-size: 18px; text-align: left; margin-left: 10px;">
              <!-- Calculate average review rating -->
              @php
    $averageRating = $home->reviews->avg('rating') ?? 0; // ค่าเริ่มต้นถ้าไม่มีรีวิว
    $reviewCount = $home->reviews->count();

    // คำนวณจำนวนดาวเต็ม ดาวครึ่ง และดาวว่าง
    $fullStars = floor($averageRating);
    $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
    $emptyStars = 5 - ($fullStars + $halfStar);
@endphp

<div class="rating">
    @for ($i = 0; $i < $fullStars; $i++)
        <i class="fa-solid fa-star" style="color: Violet;"></i>
    @endfor
    @if ($halfStar)
        <i class="fa-solid fa-star-half" style="color: Violet;"></i>
    @endif
    @for ($i = 0; $i < $emptyStars; $i++)
        <i class="fa-regular fa-star" style="color: Gray;"></i>
    @endfor
    <span>{{ number_format($averageRating, 1) }} ({{ $reviewCount }} รีวิว)</span>
</div>
    

                <h3>{{ $home->shop_name }}</h3>
                <p>Promotion: {{ $home->promotion_detail }}</p>
                <p>{{ $home->shop_description }}</p>
                <p>PVC: {{ $home->pvc }}</p>
                <p>Clean Nail: {{ $home->clean_nail }}</p>
                <p><i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $home->shop_address }}</p>
            </div>
        </div>
    @endforeach
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        
        <section class="recommended-shops">
        <div class="swiper-container">
                <h2 style=" font-size: 30px; text-align: left; margin-left: 10px;margin-top: 5px;">ร้านแนะนำ</h2>

                <!-- Swiper Wrapper carousel -->
                <div class="swiper-wrapper">
                @foreach($homes as $shop)
                    <!-- Each Slide -->
                    <div class="swiper-slide">

                        <div class="image-placeholder">
                        <img src="{{ asset('images/' . $shop->images_name) }}" alt="Shop Image">
                        </div>
                        <a href="/history" class="details-btn">รายละเอียด</a>
                        <button class="details-btn" onclick="window.location.href='/history'">รายละเอียด</button>
                        <div style=" font-size: 18px; text-align: left; margin-left: 10px;">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                            <h3>{{ $shop->shop_name }}</h3>
                            <p>Promotion: {{ $shop->promotion_detail }}</p>
                            <p>{{ $shop->shop_description }}</p>
                            <p>PVC: {{ $shop->pvc }}</p>
                            <p>Clean Nail: {{ $shop->clean_nail }}</p>
                            <p><i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $shop->shop_address }}</p>
                        </div>
                    </div>
                @endforeach
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

      </div>
    </main>

    <!-- Swiper JS ถ้าเรียกจาก asset ต้องเอาไว้ที่ public-->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/slideone.js') }}"></script>
    <script src="{{ asset('js/swipe.js') }}"></script>
   


</body>
</html>
