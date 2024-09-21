<head>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div style="padding-left: 2%;">
            <a href="{{ route('home', ['id' => auth()->user()->id]) }}" class="font-weight-bold fs-4"
                style="color: rgb(232, 179, 159); font-family: 'Leckerli One', cursive; text-decoration: none;font-size: 45px !important;">
                NailySlay
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">edit_shop(emma)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mbooking', $shop->shop_id) }}">manage_booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('add_promotion',$shop->shop_id) }}">add_promotion</a>
                </li>
                <!-- อันนี้ของผู้ใช้ปกติ เดะต้องไปใส่ใน navbar.php -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('show_promotion',$shop->shop_id) }}">show_promotion(ลูกค้า)</a>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- ครึ่งวงกลมอยู่ภายใน navbar -->
    <div class="half-circle">
        <?php
            for ($i = 0; $i < 20; $i++) {
                echo "<div></div>";
            }
        ?>
    </div>
</nav>

<style>
    .navbar {
        background-color: rgb(212, 234, 232);
        /* background-color: #9FEFEBFF; */
        height: 80px;
        position: relative;
        z-index: 1;
    }

    .half-circle {
        position: absolute;
        bottom: -35px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        z-index: 0;
    }

    .half-circle div {
        width: 77px;
        height: 35px;
        background-color: rgb(212, 234, 232);
        /* background-color: #9FEFEBFF; */
        border-bottom-left-radius: 80px;
        border-bottom-right-radius: 80px;
    }
</style>
