<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NailySlay Booking</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .star-rating {
            cursor: pointer;
            color: lightgray;
            /* สีเริ่มต้น */
        }

        .star-rating i {
            font-size: 24px;
            /* ขนาดดาว */
        }

        .star-rating i.selected {
            color: gold;
            /* สีเมื่อเลือก */
        }
    </style>
</head>

<body>
    @include('navbar.navbartwo')

    <main>
        <div class="containerout">
            <div class="containersection">
                <h1>My Booking</h1>
                <div class="boxsections">
                    <div class="">
                        @foreach ($bookingLists as $booking)
                            <!-- Each Slide -->
                            <div class="boxsection">
                                <div class="boxtext">
                                    <h3>{{ $booking->shop_name }}</h3>
                                    <div style="display: flex; gap: 75px; align-items: center;">
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
                                        <button class="review-btn"
                                            onclick="openPopup({{ $booking->booking_list_id }}, '{{ $booking->shop_id }}')">
                                            <i class="fa-solid fa-pen-to-square"></i> รีวิว
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h2>เขียนรีวิวของคุณ</h2>
        <div class="star-rating">
            <i class="fa-solid fa-star" onclick="setRating(1)"></i>
            <i class="fa-solid fa-star" onclick="setRating(2)"></i>
            <i class="fa-solid fa-star" onclick="setRating(3)"></i>
            <i class="fa-solid fa-star" onclick="setRating(4)"></i>
            <i class="fa-solid fa-star" onclick="setRating(5)"></i>
        </div>
        <textarea rows="4" cols="40" placeholder="พิมพ์รีวิวที่นี่..."></textarea><br><br>
        <div class="button-container">
            <button class="cancel-btn" onclick="closePopup()">ยกเลิก</button>
            <button class="confirm-btn" onclick="submitReview()">ยืนยัน</button>
        </div>
    </div>
    <script>
        let currentBookingId = null;
        let currentShopId = null;
        let currentRating = 0;

        function openPopup(bookingId, shopId) {
            console.log('Booking ID:', bookingId, 'Shop ID:', shopId);
            currentBookingId = bookingId;
            currentShopId = shopId;
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            resetRating(); // รีเซ็ตคะแนนเมื่อปิดป๊อปอัพ
        }

        function setRating(rating) {
            currentRating = rating;

            const stars = document.querySelectorAll('.star-rating i');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('selected'); // เพิ่มคลาสสำหรับดาวที่เลือก
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        function resetRating() {
            currentRating = 0;

            const stars = document.querySelectorAll('.star-rating i');
            stars.forEach(star => {
                star.classList.remove('selected'); // ลบคลาสสำหรับดาวที่เลือก
            });
        }

        function submitReview() {
    const reviewText = document.querySelector('textarea').value;
    const reviewData = new FormData();
    reviewData.append('booking_list_id', currentBookingId);
    reviewData.append('shop_id', currentShopId);
    reviewData.append('rating', currentRating);
    reviewData.append('detail', reviewText);
    
    // ดึง CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('{{ route('submit-review') }}', {
        method: 'POST',
        body: reviewData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            closePopup(); // ปิดป๊อปอัพ
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('เกิดข้อผิดพลาดในการส่งข้อมูล');
    });
}

    </script>
</body>

</html>
