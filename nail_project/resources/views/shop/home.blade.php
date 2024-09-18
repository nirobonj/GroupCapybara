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
        /* สไตล์ pagination (จุดด้านล่าง) */
.pagination {
    text-align: center;
    margin-top: 10px;
}

.dot {
    height: 10px;
    width: 10px;
    margin: 0 5px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.dot.active {
    background-color: #717171;
}

      </style>
   
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo pacifico-regular" style="margin-left: 18px;">NailySlay</div>
            <div class="search-bar" style="display: flex; justify-content: flex-end; align-items: center;">
                <input type="text" placeholder="search...">
                <i class="fab fa-sistrix"></i>
            </div>
            <div style="display: flex; justify-content: flex-end; align-items: center;">
                <a href="https://www.example.com" style="margin-right: 15px;"><i class="fa-solid fa-house-chimney"></i></a>
                <a href="https://www.example.com" style="margin-right: 15px;"><i class="fa-regular fa-clipboard"></i></a>
                <button class="login-btn" style="margin-right: 15px;">Login</button>
            </div>
        </nav>
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
                <h2 style=" font-size: 30px; text-align: left; margin-left: 10px;margin-top: 5px;">โปรโมชั่น⚡⚡⚡</h2>

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
                        <div class="discount">-50%</div>
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
