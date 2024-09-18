<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <title>NailySlay - ประวัติการจอง</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
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
    <div class="container">
        <h1>NailySlay</h1>
        <div class="appointments">
        @foreach($historys as $shop)
                    <!-- Each Slide -->
                    <div class="appointment">
                        <div class="image-placeholder"></div>
                        <button class="details-btn">รายละเอียด</button>
                        <div style="text-align: left;">
                            <h3>{{ $shop->shop_name }}</h3>
                            <p>Promotion: {{ $shop->promotion_detail }}</p>
                            <p>{{ $shop->shop_address }}</p>
                            <p>{{ $shop->shop_description }}</p>
                            <p>PVC: {{ $shop->pvc }}</p>
                            <p>Clean Nail: {{ $shop->clean_nail }}</p>
                            <button class="edit-btn">แก้ไข</button>
                        </div>
                  
                    </div>
                @endforeach
        </div>
    </div>

    </main>
 
   
</body>
</html>