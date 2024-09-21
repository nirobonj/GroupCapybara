<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $shop->shop_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .review-box { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; }
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>
<body>
    @include('layouts.navbar_manicurist')

    <script>
        var shop = @json($shop);
        console.log("this ", shop);
    </script>

    <div style="padding-top: 5%; height: 100%;background-color: rgb(255, 234, 189);">
        <div class="mx-auto" style="max-width: 70%;">
            <h2 class="text-center mt-4" style="color: rgb(232, 179, 159);">{{ $shop->shop_name }}</h2>

            <form action="{{ route('shop.update', ['shop_id' => $shop->shop_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="container mt-3">
                    <div class="mb-3">
                        <label for="shop_name" class="form-label">ชื่อร้าน</label>
                        <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $shop->shop_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="shop_address" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" id="shop_address" name="shop_address" value="{{ $shop->shop_address }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="shop_description" class="form-label">คำอธิบาย</label>
                        <textarea class="form-control" id="shop_description" name="shop_description" rows="3" required>{{ $shop->shop_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images_name" class="form-label">รูปภาพร้าน</label>
                        <input type="file" class="form-control" id="images_name" name="images_name">
                        <small>ปัจจุบัน: <img src="{{ asset('images/' . $shop->images_name) }}" alt="Current Image" style="width: 40%; margin-top: 2%; margin-left: 2%; border-radius: 10px;"></small>
                    </div>

                    <div class="mb-3">
                        <label for="color_img" class="form-label">รูปภาพสี</label>
                        <input type="file" class="form-control" id="color_img" name="color_img">
                        <small>ปัจจุบัน: <img src="{{ asset('images/' . $shop->color_img) }}" alt="Current Color Image" style="width: 40%; margin-top: 2%; margin-left: 2%; border-radius: 10px;"></small>
                    </div>

                    <div class="mb-3">
                        <label for="parts_img" class="form-label">รูปภาพชิ้นส่วน</label>
                        <input type="file" class="form-control" id="parts_img" name="parts_img">
                        <small>ปัจจุบัน: <img src="{{ asset('images/' . $shop->parts_img) }}" alt="Current Parts Image" style="width: 40%; margin-top: 2%; margin-left: 2%; border-radius: 10px;"></small>
                    </div>

                    <div class="mb-3">
                        <label for="pvc" class="form-label">ราคาพีวีซี</label>
                        <input type="text" class="form-control" id="pvc" name="pvc" value="{{ $shop->pvc }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="clean_nail" class="form-label">ราคาล้างเล็บ</label>
                        <input type="text" class="form-control" id="clean_nail" name="clean_nail" value="{{ $shop->clean_nail }}" required>
                    </div>

                    <div class="d-flex justify-content-center align-items-center" style="padding-bottom: 5%;">
                        <!-- Button trigger modal -->
                        <button type="submit" class="mt-5 btn p-3 rounded"
                            style="background-color: #f29779; color: #fff; border: none; text-transform: uppercase;
                transition: background-color 0.3s ease, transform 0.3s ease;">
                            <p class="mb-0">อัปเดตข้อมูล</p>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
