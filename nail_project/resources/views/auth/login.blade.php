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
            border: 2px solid #FFE4F8;
            background-color: #FFE4F8;
            padding: 15px;
            border-radius: 12px;
            max-width: 450px;
            margin: 60px auto;
            text-align: center;
        }

        .form-header {
            background-color: #FFE4F8;
            border: 2px solid #FFE4F8;
            border-radius: 12px 12px 0 0;
            padding: 5px;
            margin-bottom: 5px;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 30px;
            font-weight: 900; 
            color: #F29779; 
        }

        .form-group {
            position: relative;
            margin-bottom: 12px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 14px;
        }

        .form-group input::placeholder {
            color: #888;
            opacity: 1;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .btn-primary {
            background-color: #F29779;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
            display: inline-block;
            width: 100%;
            max-width: 200px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .btn-primary:hover {
            background-color: #f1815c;
        }

        .btn-link {
            background-color: transparent;
            border: none;
            color: #888;
            padding: 0;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Noto Sans Thai', sans-serif;
            text-decoration: underline;
            cursor: pointer;
            display: block;
            text-align: left;
            margin-bottom: 12px;
        }
        .invalid-feedback {
            color: #FF0000;
            font-size: 14px;
            font-family: 'Noto Sans Thai', sans-serif;
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
