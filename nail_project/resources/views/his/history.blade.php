<!DOCTYPE html>
<html lang="th">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <title>NailySlay - ประวัติการจอง</title>
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   
</head>
<body>
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
   
</body>
</html>