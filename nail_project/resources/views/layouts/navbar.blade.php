<head>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div style="padding-left: 2%;">
            <a class="font-weight-bold fs-4" style="color: rgb(232, 179, 159); font-family: 'Leckerli One', cursive; text-decoration: none;font-size: 45px !important;">
                NailySlay
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage_reservations') }}">manage_reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">add_pomotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">show_pomotion</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ครึ่งวงกลมอยู่ภายใน navbar -->
    <div class="half-circle">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>

<style>
    .navbar {
        background-color: rgb(212, 234, 232);
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
        border-bottom-left-radius: 80px; 
        border-bottom-right-radius: 80px; 
    }
</style>
