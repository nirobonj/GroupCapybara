<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay - ลงทะเบียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
            font-size:35px;
            font-weight: 900;
            color: #F29779;
        }

        .form-group {
            position: relative;
            margin-bottom: 12px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 14px;
        }

        .form-group input::placeholder, .form-group select::placeholder {
            color: #888;
            opacity: 1;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .invalid-feedback {
            color: #FF0000;
            font-size: 14px;
            font-family: 'Noto Sans Thai', sans-serif;
            display: block; 
            text-align: left;
            margin-top: 5px;
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

        .role-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin: 15px 0;
        }

        .role-buttons div {
            flex: 1 1 auto;
            display: flex;
            justify-content: center;
        }

        .role-buttons label {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 8px;
            color: #333;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            display: block;
            width: 100%;
            max-width: 180px;
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .role-buttons input[type="radio"] {
            display: none;
        }

        .role-buttons input[type="radio"]:checked + label {
            background-color: #F29779;
            color: white;
            border-color: #F29779;
        }

        .role-buttons label:hover {
            background-color: #f5f5f5;
        }


        .back-button {
            position: absolute;
            top: 170px;
            right: 300px;
            background-color: #F29779;
            border: none;
            border-radius: 8px;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 14px;
        }

        .back-button:hover {
            background-color: #f1815c;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('navbar.navbarlogin')

    <button class="back-button" onclick="window.history.back()">
        <i class="fas fa-arrow-left"></i> back to login
    </button>

    <div class="form-container">
        <div class="form-header">
            Sign Up
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- ชื่อผู้ใช้ -->
            <div class="form-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ชื่อผู้ใช้" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณากรอกชื่อผู้ใช้</strong>
                    </span>
                @enderror
            </div>

            <!-- อีเมล -->
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="อีเมล" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>อีเมลนี้มีผู้ใช้งานแล้ว</strong>
                    </span>
                @enderror
            </div>

            <!-- รหัสผ่าน -->
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณากรอกรหัสผ่าน</strong>
                    </span>
                @enderror
            </div>

            <!-- ยืนยันรหัสผ่าน -->
            <div class="form-group">
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>รหัสผ่านไม่ตรงกัน</strong>
                    </span>
                @enderror
            </div>

            <!-- เบอร์โทร -->
            <div class="form-group">
                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="เบอร์โทร" required>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณากรอกเบอร์โทร</strong>
                    </span>
                @enderror
            </div>

            <!-- จังหวัด -->
            <div class="form-group">
                <select id="province_id" name="province_id" class="form-control @error('province_id') is-invalid @enderror" required>
                    <option value="" disabled selected>เลือกจังหวัด</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                    @endforeach
                </select>
                @error('province_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณาเลือกจังหวัด</strong>
                    </span>
                @enderror
            </div>

            <!-- อำเภอ -->
            <div class="form-group">
                <select id="district_id" name="district_id" class="form-control @error('district_id') is-invalid @enderror" required>
                    <option value="" disabled selected>เลือกอำเภอ</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                    @endforeach
                </select>
                @error('district_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณาเลือกอำเภอ</strong>
                    </span>
                @enderror
            </div>

            <!-- Role -->
            <div class="form-group">
                <div class="role-buttons">
                    <div>
                        <input type="radio" id="role_user" name="role" value="user" @if(old('role') == 'user') checked @endif required>
                        <label for="role_user">ผู้บริโภค</label>
                    </div>
                    <div>
                        <input type="radio" id="role_admin" name="role" value="admin" @if(old('role') == 'admin') checked @endif required>
                        <label for="role_admin">ผู้ให้บริการ</label>
                    </div>
                </div>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>กรุณาเลือกประเภทผู้ใช้</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">
                    ลงทะเบียน
                </button>
            </div>
        </form>
    </div>
</body>
</html>
