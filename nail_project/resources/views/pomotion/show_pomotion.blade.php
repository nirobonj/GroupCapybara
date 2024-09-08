<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NailSlay</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
        .container1 {
            display: flex; 
            gap: 10px; 
            /* padding: 20px;  */
            flex-direction: row;
        }
        .box1 {
            margin-top: 60px;
            margin-left: 40px;
            width: 650px;
            height: 50px;
            background-color: #fff;
            border-radius: 16px;
            padding-top: 10px;
            display: flex;
            align-items: center; 
            justify-content: center; 
        }
        .btn {
            margin-top: 20px;
            margin-left: 40px;
            width: 300px;
            height: 50px;
            background-color: #fff;
            border-radius: 16px;
            padding-top: 10px;
            display: flex;
            align-items: center; 
            justify-content: center; 
        }
        .background-color {
            background-color: #FFEABD;
        }
        .text {
            /* margin-top: 40px; */
            margin-left: 20px;
            font-size: 20px;
        }
    </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        @include('layouts.navbar_manicurist')
        <div class="box1">
            <p class="text">show pomotion</p>
        </div>
    </div>
    </body>
</html>