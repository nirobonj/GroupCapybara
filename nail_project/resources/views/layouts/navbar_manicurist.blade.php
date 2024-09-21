<head>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div style="padding-left: 2%;">
            <a href="{{ route('home', ['id' => auth()->user()->id]) }}" class="font-weight-bold fs-4"
                style="color: #F29779; font-family: 'Leckerli One', cursive; text-decoration: none;font-size: 45px !important;">
                NailySlay
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
            <div class="navitem">
                    <a style="margin-right: 15px;" href="{{ route('mbooking', $shop->shop_id) }}"><i class="fa-solid fa-house-chimney"></i></a>
                    <a style="margin-right: 15px;" href="{{ route('editShop', $shop->shop_id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('edit_profile', ['id' => $user->id]) }}" class="login-btn"  style="margin-right: 15px;">SHOP</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div>
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
        background-color: #D4EAE8;
        height: 100px;
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
        border-bottom-left-radius: 80px;
        border-bottom-right-radius: 80px;
    }
    .fa-pen-to-square{
        font-size: 45px; 
        color: black;
    }
    .fa-house-chimney{
        font-size: 45px; 
        color: black;
    }
    .fa-right-from-bracket{
        font-size: 45px; 
        color: black;
    }
</style>
