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
        <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">

        @include('layouts.navbar_manicurist')
        <div class="box1">
            <p class="text1">bua</p>
        </div>
        <div class="container1">
                <a href="#" class="btn">
                    <p class="text1">แก้ไขร้าน</p>
                </a>
                <a href="{{ route('add_pomotion') }}"class="btn">
                    <p class="text1">เพิ่มโปรโมชัน</p>
                </a>
        </div>
        <div class="container1">
            <div class="textbox1">
                <p class="text1">รายการจอง</p>
            </div>
                <input class="btn" type="date" id="start" name="trip-start" value="<?= date('Y-m-d'); ?>" />
        </div>

        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>เบอร์โทร</th>
                        <th>เวลา</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ข้อมูล 1-1</td>
                        <td>ข้อมูล 1-2</td>
                        <td>ข้อมูล 1-3</td>
                    </tr>
                    <tr>
                        <td>ข้อมูล 2-1</td>
                        <td>ข้อมูล 2-2</td>
                        <td>ข้อมูล 2-3</td>
                    </tr>
                    <tr>
                        <td>ข้อมูล 3-1</td>
                        <td>ข้อมูล 3-2</td>
                        <td>ข้อมูล 3-3</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <h1>Calendar for {{ \Carbon\Carbon::create($currentYear, $currentMonth)->format('F Y') }}</h1>
        <table>
            <thead>
                <tr>
                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <th>{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $currentDay = 1;
                    $totalDays = $daysInMonth + $startDay;
                @endphp
                @for($i = 0; $i < ceil($totalDays / 7); $i++)
                    <tr>
                        @for($j = 0; $j < 7; $j++)
                            @if($i == 0 && $j < $startDay)
                                <td></td>
                            @elseif($currentDay <= $daysInMonth)
                                <td>{{ $currentDay }}</td>
                                @php $currentDay++ @endphp
                            @else
                                <td></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table> -->
    </body>
</html>