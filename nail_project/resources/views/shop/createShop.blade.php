<!-- resources/views/shop/createShop.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างร้านใหม่</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <style>
        .review-box {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    @include('layouts.navbar_manicurist')

    <form action="{{ route('shop.store', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="min-height: 100vh; background-color: rgb(255, 234, 189);">
            <div class="mx-auto" style="background-color: rgb(255, 234, 189); max-width: 80%;">
                <!-- Content Div -->
                <div class="container" style="width: 80%; margin-top: 10%;">
                    <p class="fs-1 fw-bold mb-4" style="font-family: 'Noto Sans Thai', sans-serif; color:#f29779;">สร้างร้าน</p>

                    <div class="row d-flex align-items-stretch">
                        <!-- Left Side (3 divs) -->
                        <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                            <div class="d-flex flex-column h-100">

                                <div class="mb-2 p-2 fw-bold rounded"
                                    style="font-family: 'Noto Sans Thai', sans-serif; background-color: white;">
                                    <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ชื่อร้าน" value="{{ old('shop_name') }}" required>
                                    @error('shop_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-2 p-1 ml-5 rounded">
                                    <i class="bi bi-star-fill"
                                        style="font-family: 'Noto Sans Thai', sans-serif; margin-left: 0.3rem; margin-right: 0.5rem; color:#f29779;"></i>
                                    {{ number_format($shop->reviews->avg('rating') ?? 0, 1) }}
                                </div>

                                <div class="p-3 rounded flex-grow-1" style="background-color: white;">

                                    <div class="rounded mb-3">
                                        <p class="fw-bold mb-0" style="font-family: 'Noto Sans Thai', sans-serif;">ที่อยู่ :</p>
                                        <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" id="shop_address" name="shop_address" placeholder="ที่อยู่ร้าน" value="{{ old('shop_address') }}" required>
                                        @error('shop_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="rounded mb-3">
                                        <p class="fw-bold mb-0" style="font-family: 'Noto Sans Thai', sans-serif;">คำอธิบาย :</p>
                                        <textarea style="font-family: 'Noto Sans Thai', sans-serif;" class="form-control" id="shop_description" name="shop_description" rows="3" placeholder="คำอธิบายร้าน" required>{{ old('shop_description') }}</textarea>
                                        @error('shop_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Right Side (1 div) -->
                        <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                            <div class="p-3 rounded h-100" style="background-color: white;">
                                <div class="pd-5" style="height: 100%;">
                                    <!-- Optional: Add preview for uploaded image -->
                                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;" />
                                </div>
                                <input type="file" class="form-control mb-3" id="images_name" name="images_name" accept="image/*" onchange="previewImage(event)">
                                @error('images_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Detail Div -->
                <div class="container" style="width: 80%; margin-top: 5%;">
                    <div class="row">
                        <!-- Left Side (2 divs) -->
                        <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                            <div class="mb-3 p-3 rounded"
                                style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; background-color: #f29779; font-weight: bold;">
                                สีของทางร้าน</div>
                            <div class="mb-3 p-3 rounded" style="background-color: white; height: 300px;">
                                <input type="file" class="form-control" id="color_img" name="color_img" accept="image/*">
                                @error('color_img')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Side (1 div) -->
                        <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                            <div class="mb-3 p-3 rounded"
                                style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; background-color: #f29779; font-weight: bold;">
                                อะไหล่ของทางร้าน</div>
                            <div class="mb-3 p-3 rounded" style="background-color: white; height: 300px;">
                                <input type="file" class="form-control" id="parts_img" name="parts_img" accept="image/*">
                                @error('parts_img')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Detail Div -->
                <div class="container" style="width: 80%; margin-top: 5%;">
                    <div class="row">
                        <!-- Left Side (2 divs) -->
                        <div class="col-md-3" style="padding-left: 0; padding-right: 0;">
                            <div class="mb-3 p-3 rounded" style="background-color: #f29779; width: 80%;">
                                <p style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; font-weight: bold;">PVC</p>
                            </div>
                            <div class="mb-3 p-3 rounded" style="background-color: #f29779; width: 80%;">
                                <p style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; font-weight: bold;">ล้างเล็บ</p>
                            </div>
                        </div>

                        <!-- Right Side (2 divs) -->
                        <div class="col-md-9" style="padding-left: 0; padding-right: 0;">
                            <div class="mb-3 p-3 rounded" style="background-color: white; width: 100%;">
                                <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" id="pvc" name="pvc" placeholder="PVC" value="{{ old('pvc') }}" required>
                                @error('pvc')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 p-3 rounded" style="background-color: white; width: 100%;">
                                <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" id="clean_nail" name="clean_nail" placeholder="ล้างเล็บ" value="{{ old('clean_nail') }}" required>
                                @error('clean_nail')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center" style="padding-bottom: 5%;">
                            <!-- Submit Button -->
                            <button type="submit" class="mt-5 btn p-3 rounded"
                                style="background-color: #f29779; color: #fff; border: none; text-transform: uppercase;
                    transition: background-color 0.3s ease, transform 0.3s ease;">
                                <p class="mb-0 fw-bold fs-5" style="font-family: 'Noto Sans Thai', sans-serif;">อัปเดตข้อมูล</p>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = 'block';
        }
    </script>
</body>

</html>
