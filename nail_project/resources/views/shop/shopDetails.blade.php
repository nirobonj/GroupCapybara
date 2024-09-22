<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $shop->shop_name }}</title>
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
    @include('navbar.navbartwo')


    <div style="height: 100%;background-color: rgb(255, 234, 189);">

        <div class="mx-auto" style="background-color: rgb(255, 234, 189); max-width: 80%;">
            <!-- Banner Div -->
            <div class="mx-auto rounded mt-5" style="background-color: white; width: 80%; height: 150px;">
                <div class="pd-5" style="max-width: 100%; height: 100%;">
                    <img src="{{ asset('images/' . $shop->images_name) }}" alt="Image"
                        style="width: 100%; height: 100%; object-fit: cover; object-position: center; border-radius: 10px;">
                </div>
            </div>

            <!-- Content Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row d-flex align-items-stretch">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-2 p-2 fw-bold rounded"
                                style="font-family: 'Noto Sans Thai', sans-serif; background-color: white;">
                                {{ $shop->shop_name }}
                            </div>
                            <div class="mb-2 p-1 ml-5 rounded">
                                <i class="bi bi-star-fill"
                                    style="font-family: 'Noto Sans Thai', sans-serif; margin-left: 0.3rem; margin-right: 0.5rem; color: Violet;"></i>
                                {{ number_format($shop->reviews->avg('rating') ?? 0, 1) }}
                            </div>
                            <div class="p-3 rounded flex-grow-1" style="background-color: white;">
                                <div class="rounded" style="background-color: white;">
                                    <p class="fw-bold mb-0" style="font-family: 'Noto Sans Thai', sans-serif; ">ที่อยู่
                                        :</p>
                                    <p style="font-family: 'Noto Sans Thai', sans-serif; ">{{ $shop->shop_address }}</p>
                                </div>
                                <div class="rounded" style="background-color: white;">
                                    <p class="fw-bold mb-0" style="font-family: 'Noto Sans Thai', sans-serif; ">คำอธิบาย
                                        :</p>
                                    <p style="font-family: 'Noto Sans Thai', sans-serif; ">{{ $shop->shop_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                        <div class="p-3 rounded h-100" style="background-color: white;">
                            <div class="pd-5" style="height: 100%;">
                                <img src="{{ asset('images/' . $shop->images_name) }}" alt="Image"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Review Carousel -->
            <div id="reviewCarousel" class="carousel slide mx-auto" style="margin-top: 30px; max-width: 80%;"
                data-bs-ride="carousel">

                @if ($shop->reviews->isEmpty())
                    <!-- No Reviews Available -->
                    <div class="p-5 rounded" style="background-color: #fff; text-align: center;">
                        <p class="mb-0" style="font-family: 'Noto Sans Thai', sans-serif; color: #ccc;">ยังไม่มีรีวิว
                        </p>
                    </div>
                @else
                    <div class="carousel-inner">
                        @foreach ($shop->reviews->chunk(3) as $key => $reviewChunk)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-start" style="width: 100%;">
                                    @foreach ($reviewChunk as $review)
                                        <div class="rounded review-box"
                                            style="padding: 1rem; width: 33%; background-color: #fff; margin-right: 0.5rem;">
                                            <div id="content" class="p-3 rounded"
                                                style="background-color: #f8ccbe; width: 100%; border: 1px solid #ccc;">
                                                <div style="display: flex; align-items: center;">
                                                    <i class="bi bi-star-fill"
                                                        style="color: Violet; margin-right: 0.5rem;"></i>
                                                    <p style="font-family: 'Noto Sans Thai', sans-serif; margin: 0;">
                                                        {{ $review->rating }}</p>
                                                </div>
                                                <hr>
                                                <p style="font-family: 'Noto Sans Thai', sans-serif; ">
                                                    {{ $review->detail }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#reviewCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#reviewCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                @endif
            </div>



            <!-- Detail Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                        <div class="mb-3 p-3 rounded"
                            style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; background-color: #f29779; font-weight: bold;">
                            สีของทางร้าน</div>
                        <div class="mb-3 p-3 rounded" style="background-color: white; height: 300px;">
                            <!-- Set a fixed height for consistency -->
                            <img src="{{ asset('images/' . $shop->color_img) }}" alt="Image"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        </div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                        <div class="mb-3 p-3 rounded"
                            style="text-align: center; font-family: 'Noto Sans Thai', sans-serif; background-color: #f29779; font-weight: bold;">
                            อะไหล่ของทางร้าน</div>
                        <div class="mb-3 p-3 rounded" style="background-color: white; height: 300px;">
                            <!-- Set a fixed height for consistency -->
                            <img src="{{ asset('images/' . $shop->parts_img) }}" alt="Image"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Detail Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
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
                            <p style="font-family: 'Noto Sans Thai', sans-serif; ">{{ $shop->pvc }}</p>
                        </div>

                        <div class="mb-3 p-3 rounded" style="background-color: white; width: 100%;">
                            <p style="font-family: 'Noto Sans Thai', sans-serif; ">{{ $shop->clean_nail }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center align-items-center" style="padding-bottom: 5%;">
                        <!-- Button trigger modal -->
                        <button type="button" class="mt-5 btn p-3 rounded" data-bs-toggle="modal"
                            data-bs-target="#bookNowModal"
                            style="background-color: #f29779; color: #fff; border: none; text-transform: uppercase;
                transition: background-color 0.3s ease, transform 0.3s ease;">
                            <p class="mb-0 fw-bold fs-5" style="font-family: 'Noto Sans Thai', sans-serif;">จองเลย !</p>
                        </button>

                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookNowModalLabel">Booking Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('add_booking') }}" method="POST">
                        @csrf
                        <!-- Hidden input to send shop_id -->
                        <input type="hidden" name="shop_id" value="{{ $shop->shop_id }}">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="date" class="form-label">Select Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Select Time</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
