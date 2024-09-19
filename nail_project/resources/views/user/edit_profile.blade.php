<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailySlay - แก้ไขโปรไฟล์</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
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
            font-size: 35px;
            font-weight: 900;
            color: #F29779;
        }
        .form-group {
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
    </style>
</head>
<body>
    @include('layouts.navbar_frame')
    <div class="form-container">
        <div class="form-header">
            Profile
        </div>
        <form method="POST"  action="{{ route('edit_profile', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

            <!-- ชื่อผู้ใช้ -->
            <div class="form-group">
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="ชื่อผู้ใช้" required>
            </div>

            <!-- อีเมล -->
            <div class="form-group">
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="อีเมล" required>
            </div>

            <!-- เบอร์โทร -->
            <div class="form-group">
                <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="เบอร์โทร" required>
            </div>

            <!-- จังหวัด -->
            <div class="form-group">
                <select id="province_id" name="province_id" required>
                    <option value="" disabled>เลือกจังหวัด</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->province_id }}" @if($province->province_id == $user->province_id) selected @endif>{{ $province->province_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- อำเภอ -->
            <div class="form-group">
                <select id="district_id" name="district_id" required>
                    <option value="" disabled>เลือกอำเภอ</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->district_id }}" @if($district->district_id == $user->district_id) selected @endif>{{ $district->district_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- ยืนยันรหัสผ่าน -->
            <div class="form-group">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required>
            </div>
            @if ($errors->has('password_confirmation'))
            <div style="color:red; font-weight:bold;">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </div>
                @endif

            <div class="form-group">
                <button type="submit" class="btn-primary">บันทึก</button>
            </div>
        </form>
    </div>
</body>
</html>
