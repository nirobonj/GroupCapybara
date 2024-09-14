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
                            <button class="details-btn ">รายละเอียด</button>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <button class="details-btn">รายละเอียด</button>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <button class="details-btn">รายละเอียด</button>
                        </div>
                    </div>
            </div>

            <div class="itemsection">
                <h2>ร้านยอดนิยม Top 3</h2>
                    <div class="carousel">
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <button class="details-btn">รายละเอียด</button>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <button class="details-btn">รายละเอียด</button>
                        </div>
                        <div class="item">
                            <div class="image-placeholder"></div>
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <button class="details-btn">รายละเอียด</button>
                        </div> 
                    </div>
            </div>
        </section>

        <section class="promotions">
            <div class="itemsection">
                <h2>โปรโมชั่น</h2>
        
                <div class="carousel">
                <button class="prev">&#10094;</button>
                <div class="carousel-inner">
                @foreach($homes as $shop)
                    <div class="item">
                        <h3>{{ $shop->shop_name }}</h3>
                        <p>{{ $shop->promotion_detail }}</p>
                        <p>{{ $shop->shop_address }}</p>
                        <p>{{ $shop->shop_description }}</p>
                        <p>PVC: {{ $shop->pvc }}</p>
                        <p>Clean Nail: {{ $shop->clean_nail }}</p>
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                @endforeach
                <!-- <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                    </div> -->

                </div>
                 
                    <button class="next">&#10095;</button>
                </div>
              
            </div>
        </section>

        <section class="recommended-shops">
            <div class="itemsection">
                <h2>ร้านแนะนำ</h2>
                <div class="carousel">
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                    <div class="item">
                        <div class="image-placeholder"></div>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <button class="details-btn">รายละเอียด</button>
                    </div>
                </div>
            </div>
          
        </section>
      </div>
    </main>
</body>
</html>
