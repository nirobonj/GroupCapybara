<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay Booking</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>NailySlay - ประวัติการจอง</title>
    

    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  
   
</head>

<body>
        @include('navbar.navbartwo')
   
    <main>
    
    <div class="containerout">
    <div class="containersection">
        <h1>My Booking</h1>
        <div class="boxsections">
            <div class="">
            @foreach($bookingLists as $booking)
            <!-- Each Slide -->
            <div class="boxsection">
                <div class="image-placeholder"></div>
                <div class="boxtext">
                    <h3>{{ $booking->shop_name }}</h3> <!-- ใช้ shop_name ที่ได้จาก join -->
                    <p>Date Transaction: {{ $booking->date_transaction }}</p> <!-- วันที่ทำธุรกรรม -->
                    <p>Time Transaction: {{ $booking->time_transaction }}</p> <!-- เวลาทำธุรกรรม -->
                    <p>Date Booking: {{ $booking->date_booking }}</p> <!-- วันที่ทำการจอง -->
                    <p>Time Booking: {{ $booking->time_booking }}</p> <!-- เวลาทำการจอง -->
                    <a href="/" class="details-btn"><i class="fa-solid fa-pen-to-square"></i>แก้ไข</a>
                </div>
            </div>
            @endforeach

        </div>
          
        </div>
    </div>

    </main>
 
   
</body>
</html>