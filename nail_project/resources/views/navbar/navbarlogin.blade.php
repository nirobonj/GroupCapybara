<head>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">

</head>

<nav class="navbar navbar-expand-lg">
    <div style="padding-left: 2%;">
        <a class="font-weight-bold fs-4"
            style="color: #F29779; font-family: 'Leckerli One', cursive; text-decoration: none;font-size: 45px !important;">
            NailySlay
        </a>
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