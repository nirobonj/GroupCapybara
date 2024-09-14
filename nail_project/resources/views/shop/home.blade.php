<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      <!-- Swiper CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
      <style>
        /* .swiper-container {
            width: 100%;
            height: 300px;
        }

        .swiper-slide {
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: #000;
        } */
    .swiper-container {
        position: relative;
        width: 100%;
        height: auto; /* หรือกำหนดความสูงที่ต้องการ */
        padding: 10px; /* หรือกำหนด padding ตามต้องการ */
    }

    .swiper-slide {
        background-color: #ffe4f8;
        padding: 15px;
        border-radius: 15px;
        /* border: 2px solid  #808080; */
        text-align: center;
        width: 380px;
        height: 310px;
        flex-shrink: 0; /* ทำให้ทุกไอเท็มมีขนาดคงที่ */
        font-family: 'Noto Sans Thai', sans-serif;
    }

    .swiper-container {
    width: 100%;
    height: auto; /* หรือกำหนดความสูงตามต้องการ */
    padding: 10px;
}

.swiper-slide {
    background-color: #ffe4f8;
    padding: 15px;
    border-radius: 15px;
    text-align: center;
    width: 380px;
    height: auto; /* ปรับเป็น auto เพื่อให้ขนาดปรับตามข้อมูล */
    flex-shrink: 0; /* ทำให้ทุกไอเท็มมีขนาดคงที่ */
    font-family: 'Noto Sans Thai', sans-serif;
}

  /* Fix positions for next/prev buttons */
  .swiper-button-next, .swiper-button-prev {
    position: fixed;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 44px;
        height: 44px;
        background-color: rgba(0, 0, 0, 0.5); /* สีพื้นหลังปุ่ม */
        border-radius: 50%; /* ทำให้ปุ่มกลม */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-button-next {
        right: 10px; /* ตำแหน่งปุ่ม next ด้านขวา */
    }

    .swiper-button-prev {
        left: 10px; /* ตำแหน่งปุ่ม prev ด้านซ้าย */
    }

    /* ป้องกันไม่ให้ปุ่มเคลื่อนที่ตามการสไลด์ */
    .swiper-button-next:hover, .swiper-button-prev:hover {
        background-color: rgba(0, 0, 0, 0.7); /* สีเมื่อ hover */
    }

    /* Optional: กำหนดสีไอคอนในปุ่ม */
    .swiper-button-next::after, .swiper-button-prev::after {
        color: white;
        font-size: 18px;
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
                    <div class="carousel">
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                    </div>
            </div>

            <div class="itemsection responsive">
                <h2>ร้านยอดนิยม Top 3</h2>
                    <div class="carousel">
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <a href=" {{ route('shopDetail') }} ">
                                <button class="details-btn ">รายละเอียด</button>
                            </a>
                        </div>
                    </div>
            </div>
        </section>

        <section class="promotions">
            <div class="itemsection swiper-container">
            <h2>โปรโมชั่น⚡⚡⚡</h2>

            <!-- Swiper Wrapper carousel -->
            <div class="swiper-wrapper">
                @foreach($homes as $shop)
                    <!-- Each Slide -->
                    <div class="swiper-slide">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                        <div style="text-align: left;">
                            <h3>{{ $shop->shop_name }}</h3>
                            <p>Promotion: {{ $shop->promotion_detail }}</p>
                            <p>{{ $shop->shop_address }}</p>
                            <p>{{ $shop->shop_description }}</p>
                            <p>PVC: {{ $shop->pvc }}</p>
                            <p>Clean Nail: {{ $shop->clean_nail }}</p>
                        </div>
                    </div>
                @endforeach
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            </div>

        </section>



        <section class="recommended-shops">
            <div class="itemsection responsive">
                <h2>ร้านแนะนำ</h2>
                <div class="carousel responsive">
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <a href=" {{ route('shopDetail') }} ">
                            <button class="details-btn ">รายละเอียด</button>
                        </a>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <a href=" {{ route('shopDetail') }} ">
                            <button class="details-btn ">รายละเอียด</button>
                        </a>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <a href=" {{ route('shopDetail') }} ">
                            <button class="details-btn ">รายละเอียด</button>
                        </a>
                    </div>
                </div>
            </div>

        </section>


      </div>
    </main>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper
    const swiper = new Swiper('.swiper-container', {
        loop: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 3, // Show 3 slides at a time
    spaceBetween: 10,
    slidesPerGroup: 3, // Move in groups of 3
    breakpoints: {
        600: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 5,
        },
        700: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 5,
        },
        800: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 10,
        }
    },
    on: {
        init: function () {
            this.update(); // Ensure swiper is updated on initialization
        },
        resize: function () {
            this.update(); // Ensure swiper is updated on window resize
        }
    }
    });
</script>
</body>
</html>
