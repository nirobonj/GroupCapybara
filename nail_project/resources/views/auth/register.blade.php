<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay - ลงทะเบียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        /* เพิ่ม CSS นี้เพื่อให้กรอบและพื้นหลังเป็นสีชมพูอ่อนเดียวกัน */
        .form-container {
            border: 2px solid #FFE4F8; /* ขอบสีชมพูอ่อน */
            background-color: #FFE4F8; /* พื้นหลังสีชมพูอ่อน */
            padding: 15px; /* ลดพื้นที่ภายในกรอบ */
            border-radius: 12px; /* ขอบมุมกลมมนมากขึ้น */
            max-width: 450px; /* ลดความกว้างสูงสุด */
            margin: 20px auto; /* เพิ่มระยะห่างด้านบนและด้านล่าง */
            text-align: center; /* จัดปุ่มตรงกลาง */
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

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px; /* ลดพื้นที่ให้กับ input */
            border: 1px solid #ddd;
            border-radius: 8px; /* ขอบมุมกลมมนมากขึ้น */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
            font-size: 14px; /* ขนาดตัวอักษร */
        }

        .form-group input::placeholder, .form-group select::placeholder {
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

        .role-buttons {
            display: flex;
            flex-wrap: wrap; /* เพื่อให้ปุ่มสามารถตัดบรรทัดได้ */
            justify-content: center;
            gap: 8px; /* ลดระยะห่างระหว่างปุ่ม */
            margin: 15px 0; /* ลดระยะห่างด้านบนและด้านล่าง */
        }

        .role-buttons div {
            flex: 1 1 auto; /* ให้ปุ่มมีความกว้างที่ยืดหยุ่น */
            display: flex;
            justify-content: center; /* จัดกึ่งกลาง */
        }

        .role-buttons label {
            background-color: #ffffff; /* ปุ่มสีขาว */
            border: 1px solid #ddd; /* ขอบสีเทาอ่อน */
            padding: 10px 20px; /* ลดพื้นที่ให้กับปุ่ม */
            border-radius: 8px; /* ขอบมุมกลมมนมากขึ้น */
            color: #333; /* สีข้อความ */
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s; /* เพิ่มการเปลี่ยนแปลงของสี */
            display: block; /* ทำให้ label เป็นบล็อกเพื่อให้กว้างเต็ม */
            width: 100%; /* ทำให้ปุ่มเต็มความกว้าง */
            max-width: 180px; /* จำกัดความกว้างสูงสุดของปุ่ม */
            box-sizing: border-box; /* รวมขอบและ padding ในความกว้าง */
            font-size: 14px; /* ขนาดตัวอักษร */
            font-family: 'Noto Sans Thai', sans-serif; /* ฟอนต์เดียวกัน */
        }

        .role-buttons input[type="radio"] {
            display: none; /* ซ่อน radio button */
        }

        .role-buttons input[type="radio"]:checked + label {
            background-color: #F29779; /* สีชมพูอ่อนเมื่อเลือก */
            color: white; /* สีข้อความเป็นสีขาวเมื่อเลือก */
            border-color: #F29779; /* ขอบสีชมพูอ่อนเมื่อเลือก */
        }

        .role-buttons label:hover {
            background-color: #f5f5f5; /* สีพื้นหลังเมื่อเอาเมาส์ไปชี้ */
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 background-color">
    @include('layouts.navbar_frame')
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
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- อีเมล -->
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="อีเมล" required>
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

            <!-- ยืนยันรหัสผ่าน -->
            <div class="form-group">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required>
            </div>

            <!-- เบอร์โทร -->
            <div class="form-group">
                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="เบอร์โทร" required>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
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
                        <strong>{{ $message }}</strong>
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
