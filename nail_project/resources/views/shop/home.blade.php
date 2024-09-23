<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
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

    @include('navbar.navbartwo')

    <main>

    <div class="containerall">
            <div class="">


      <div class="containerall">
      <div class="container">

      <section class="tabs">
          <div class="itemsection">
          <div class="header-containersmall">
              <h2 class="header-title">ใกล้ฉัน</h2>
              <a href="/nearbyShops" class="view-more-linksmall">ดูเพิ่มเติม</a>
          </div>
                  <div class="carousels">
                  @foreach($homes->take(3) as $home)
                  <!-- Each Slide -->
                  <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" style="text-decoration: none; color: inherit;">
                  <div class="itemsecond">
                      <div class="image-placeholder">
                          <img src="{{ asset('images/' . $home->images_name) }}" alt="Shop Image">
                      </div>

                      <div style="font-size: 18px; text-align: left; margin-left: 5px; margin-top: 5px;">

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
                      <p><i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $home->shop_address }}</p>

                      </div>

                  </div>

                  </a>
                
                  @endforeach
                  </div>
          </div>

      <div class="itemsections">

          <div class="header-containersmall">
              <h2 class="header-title">ร้านยอดนิยม Top 3</h2>
              <a href="/recomentShops" class="view-more-linksmall">ดูเพิ่มเติม</a>
          </div>

          <div class="nexts carousel">
              <div class="items-wrapper">
              @foreach($tops as $home)
              <!-- Each Slide -->
              <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" style="text-decoration: none; color: inherit;">
              <div class="items">
                  <div class="image-placeholder">
                      <img src="{{ asset('images/' . $home->images_name) }}" alt="Shop Image">
                  </div>

                  <div style="font-size: 18px; text-align: left; margin-left: 5px; margin-top: 5px;">

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
                      <p><i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $home->shop_address }}</p>

                  </div>

              </div>

              </a>
            
              @endforeach

              </div>
          </div>
      </div>

      </section>

      <section class="container">
      <section class="promotions">
          <div class="swiper-container">
          <div class="header-container">
              <h2 class="header-title">โปรโมชั่น⚡⚡⚡</h2>
              <a href="/allShops" class="view-more-link">ดูเพิ่มเติม</a>
          </div>
              <!-- Swiper Wrapper carousel -->
          <div class="swiper-wrapper">
          @foreach($promotions as $home)
              <!-- Each Slide -->
              <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" style="text-decoration: none; color: inherit;">
              <div class="swiper-slide">
                    <div class="image-placeholder">
                        <img src="{{ asset('images/' . $home->images_name) }}" alt="Image">
                    </div>

                    <div class="discount" style="color: black; text: 16px;">promotion!</div>

                    <div style="font-size: 18px; text-align: left; margin-left: 10px;">
                        <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" class="details-btn">Detail</a>

                        <!-- Calculate average review rating -->
                        @php
                            $averageRating = $home->reviews->avg('rating') ?? 0; // ค่าเริ่มต้นถ้าไม่มีรีวิว
                            $reviewCount = $home->reviews->count();

                            // คำนวณจำนวนดาวเต็ม ดาวครึ่ง และดาวว่าง
                            $fullStars = floor($averageRating);
                            $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
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
                        <span>{{ number_format($averageRating, 1) }} ({{ $reviewCount }}
                                                รีวิว)</span>
                        </div>

                        <h3>{{ $home->shop_name }}</h3>
                        <p>Promotion: {{ $home->promotion_detail }}</p>
                        <p><i class="fa-solid fa-location-dot" style="color: red;"></i> {{ $home->shop_address }}</p>
                  </div>
              </div>

              </a>
            
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
                        <div class="header-container">
                            <h2 class="header-title">ร้านแนะนำ</h2>
                            <a href="/allShops" class="view-more-link">ดูเพิ่มเติม</a>
                        </div>

                        <!-- Swiper Wrapper carousel -->
                        <div class="swiper-wrapper">
                            @foreach ($recomments as $home)
                                <!-- Each Slide -->
                                <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" style="text-decoration: none; color: inherit;">
                                <div class="swiper-slide">
                                    <div class="image-placeholder">
                                        <img src="{{ asset('images/' . $home->images_name) }}" alt="Shop Image">
                                    </div>


                                    <div style="font-size: 18px; text-align: left; margin-left: 10px;">
                                        <a href="{{ route('shopDetail', ['id' => $home->shop_id]) }}" class="details-btn">Detail</a>


                                        <!-- Calculate average review rating -->
                                        @php
                                            $averageRating = $home->reviews->avg('rating') ?? 0; // ค่าเริ่มต้นถ้าไม่มีรีวิว
                                            $reviewCount = $home->reviews->count();

                                            // คำนวณจำนวนดาวเต็ม ดาวครึ่ง และดาวว่าง
                                            $fullStars = floor($averageRating);
                                            $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
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
                                            <span>{{ number_format($averageRating, 1) }} ({{ $reviewCount }}
                                                รีวิว)</span>
                                        </div>

                                        <h3>{{ $home->shop_name }}</h3>
                                        <p>PVC: {{ $home->pvc }}</p>
                                        <p>Clean Nail: {{ $home->clean_nail }}</p>
                                        <p><i class="fa-solid fa-location-dot" style="color: red;"></i>
                                            {{ $home->shop_address }}</p>
                                    </div>
                                </div>

                                </a>
                            
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

        </div>

    </main>

    <!-- Swiper JS ถ้าเรียกจาก asset ต้องเอาไว้ที่ public-->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/slideone.js') }}"></script>
    <script src="{{ asset('js/swipe.js') }}"></script>



</body>

</html>
