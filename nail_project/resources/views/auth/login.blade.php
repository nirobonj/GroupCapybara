<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay - เข้าสู่ระบบ</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <style>
        .form-container {
            border: 2px solid #FFE4F8; /* ขอบสีชมพูอ่อน */
            background-color: #FFE4F8; /* พื้นหลังสีชมพูอ่อน */
            padding: 15px; /* เพิ่มพื้นที่ภายในกรอบ */
            border-radius: 12px; /* ขอบมุมกลมมนมากขึ้น */
            max-width: 450px; /* ลดความกว้างสูงสุด */
            margin: 20px auto; /* เพิ่มระยะห่างด้านบนและด้านล่าง */
            text-align: center; /* จัดปุ่มเข้าสู่ระบบตรงกลาง */
        }

        .form-header {
            background-color: #FFE4F8; /* พื้นหลังสีชมพูอ่อน */
            border: 2px solid #FFE4F8; /* ขอบสีชมพูอ่อน */
            border-radius: 12px 12px 0 0; /* ขอบมุมกลมมนด้านบน */
            padding: 5px; /* เพิ่มพื้นที่ภายในกรอบ */
            margin-bottom: 5px; /* เพิ่มระยะห่างด้านล่าง */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
            font-size: 30px; /* ขนาดตัวอักษรเพิ่มขึ้น */
            font-weight: 900; /* ความหนาของตัวอักษรเพิ่มขึ้น */
            color: #F29779; /* สีข้อความ */
        }

        .form-group {
            position: relative;
            margin-bottom: 12px; /* ลดระยะห่างระหว่างฟอร์ม */
        }

        .form-group input {
            width: 100%;
            padding: 10px; /* ลดพื้นที่ให้กับ input */
            border: 1px solid #ddd;
            border-radius: 8px; /* ขอบมุมกลมมนมากขึ้น */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
            font-size: 14px; /* ขนาดตัวอักษร */
        }

        .form-group input::placeholder {
            color: #888;
            opacity: 1; /* แสดงผล placeholder อย่างเต็มที่ */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์ของ placeholder */
        }

        .btn-primary {
            background-color: #F29779; /* ปุ่มสีชมพูอ่อน */
            border: none;
            padding: 12px 24px; /* เพิ่มพื้นที่ให้กับปุ่ม */
            border-radius: 8px; /* ขอบมุมกลมมนมากขึ้น */
            color: white;
            cursor: pointer;
            text-align: center; /* ทำให้ข้อความในปุ่มตรงกลาง */
            margin-top: 10px; /* ลดระยะห่างด้านบน */
            display: inline-block; /* ให้ปุ่มอยู่ตรงกลาง */
            width: 100%; /* ทำให้ปุ่มเต็มความกว้าง */
            max-width: 200px; /* จำกัดความกว้างสูงสุดของปุ่ม */
            font-size: 16px; /* ขนาดตัวอักษรเพิ่มขึ้น */
            font-weight: 600; /* ความหนาของตัวอักษรเพิ่มขึ้น */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
        }

        .btn-primary:hover {
            background-color: #f1815c; /* สีชมพูอ่อนเข้มเมื่อเอาเมาส์ไปชี้ */
        }

        .btn-link {
            background-color: transparent; /* ไม่มีสีพื้นหลัง */
            border: none; /* ลบขอบ */
            color: #888; /* สีข้อความเทา */
            padding: 0; /* ลบพื้นที่ภายในปุ่ม */
            font-size: 16px; /* ขนาดตัวอักษร */
            font-weight: 600; /* ความหนาของตัวอักษร */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
            text-decoration: underline; /* ขีดเส้นใต้เพื่อให้ดูเหมือนลิงก์ */
            cursor: pointer; /* เปลี่ยนเคอร์เซอร์เมื่อเอาเมาส์ไปชี้ */
            display: block; /* ทำให้ลิงก์เต็มความกว้าง */
            text-align: left; /* ทำให้ข้อความในลิงก์ชิดซ้าย */
            margin-bottom: 12px; /* เพิ่มระยะห่างด้านล่าง */
        }
        .invalid-feedback {
            color: #FF0000; /* สีแดง */
            font-size: 14px; /* ขนาดตัวอักษร */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
        }

    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('layouts.navbar_frame')
    <div class="form-container">
        <div class="form-header">
            Log in
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- อีเมล -->
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="อีเมล" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- รหัสผ่าน -->
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- ลิงก์ไปยังหน้า Register -->
            <div class="form-group">
                <a href="{{ route('register') }}" class="btn-link">
                    สมัครสมาชิก
                </a>
            </div>

            <!-- ปุ่ม -->
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    เข้าสู่ระบบ
                </button>
            </div>
        </form>
    </div>
</body>
</html>
