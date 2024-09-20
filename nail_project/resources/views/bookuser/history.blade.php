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

                <!-- <div class="image-placeholder">
                    <img src="{{ asset('images/' . $booking->images_name) }}" alt="Shop Image">
                </div> -->

                <div class="boxtext">
                    <h3>{{ $booking->shop_name }}</h3> <!-- ใช้ shop_name ที่ได้จาก join -->

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <table style="width: 65%; table-layout: auto;">
                            <tr>
                                <td style="width: 140px; line-height: 3;">Date Transaction:</td>
                                <td>{{ $booking->date_transaction }}</td>
                                <td style="width: 140px; line-height: 3;">Time Transaction:</td>
                                <td>{{ $booking->time_transaction }}</td>
                            </tr>
                            <tr>
                                <td style="width: 140px; line-height: 1;">Date Booking:</td>
                                <td>{{ $booking->date_booking }}</td>
                                <td style="width: 140px; line-height: 1;">Time Booking:</td>
                                <td>{{ $booking->time_booking }}</td>
                            </tr>
                        </table>

                      
                        <a href="/" class="details-btn" style="margin-right: 100px;"><i class="fa-solid fa-pen-to-square"></i> แก้ไข</a>

                    

                       
                    </div>

                 
                </div>
            </div>
            @endforeach

        </div>
          
        </div>
    </div>

    </main>
 
   
</body>
</html>