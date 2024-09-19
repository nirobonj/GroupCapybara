<head>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">

</head>

<nav class="navbar navbar-expand-lg">
<div class="logo pacifico-regular" style="margin-left: 35px;">NailySlay</div>
    <!-- <div class="search-bar" style="display: flex; justify-content: flex-end; align-items: center; position: relative; width: 25%;">
        <input type="text" placeholder="" style="width: 90%; padding-right: 30px;">
        <i class="fab fa-sistrix" style="position: absolute; right: 10px; cursor: pointer;"></i>
    </div> -->
    <div class="navitem">
        <a href="/" style="margin-right: 15px;"><i class="fa-solid fa-house-chimney"></i></a>
        <a href="/bookinguser" style="margin-right: 15px;"><i class="fa-regular fa-clipboard"></i></a>
        <a href="/" class="login-btn">User</a>
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
        background-color: #cfe9e9;
        /* background-color: #9FEFEBFF; */
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
        /* background-color: #9FEFEBFF; */
        border-bottom-left-radius: 80px;
        border-bottom-right-radius: 80px;
    }
</style>