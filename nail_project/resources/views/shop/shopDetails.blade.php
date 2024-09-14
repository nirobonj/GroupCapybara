<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    @include('layouts.navbar')
    <div style="height: 100%;background-color: rgb(255, 234, 189);">
        <p class="text-center fs-3 pt-3" style="color: rgb(232, 179, 159);">
            <i class="bi bi-flower3"></i><i class="bi bi-flower3"></i><i class="bi bi-flower3"></i>
        </p>

        <div class="mx-auto" style="background-color: rgb(255, 234, 189); max-width: 80%;">
            <!-- Banner Div -->
            <div class="mx-auto rounded" style="background-color: white; width: 80%; height: 150px;">
                <p>banner</p>
            </div>

            <!-- Content Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                        <div class="mb-2 p-2 fw-bold rounded" style="background-color: white;">
                            {{ $shop->shop_name }}
                        </div>
                        <div class="mb-2 p-1 ml-5 rounded">
                            <i class="bi bi-star-fill"
                                style="margin-left: 0.3rem; margin-right: 0.5rem; color: rgb(232, 179, 159);"></i>
                            {{ number_format($shop->rating, 1) }}
                        </div>
                        <div class="p-3 rounded" style="background-color: white;">
                            <div class="rounded" style="background-color: white;">
                                <p class="fw-bold mb-0">ที่อยู่ :</p>{{ $shop->shop_address }}
                            </div>
                            <div class="rounded" style="background-color: white;">
                                <p class="fw-bold mb-0">คำอธิบาย :</p>{{ $shop->shop_description }}
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                        <div class="p-3 rounded" style="background-color: white; height: 100%;">picture</div>
                    </div>
                </div>
            </div>

            <!-- Review Carousel -->
            <div id="reviewCarousel" class="carousel slide mx-auto" style="margin-top: 30px; max-width: 80%;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-between">
                            <div class="rounded review-box" style="padding: 12%;">Review 1</div>
                            <div class="rounded review-box" style="padding: 12%;">Review 2</div>
                            <div class="rounded review-box" style="padding: 12%;">Review 3</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-between">
                            <div class="rounded review-box" style="padding: 12%;">Review 4</div>
                            <div class="rounded review-box" style="padding: 12%;">Review 5</div>
                            <div class="rounded review-box" style="padding: 12%;">Review 6</div>
                        </div>
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="background-color: rgb(232, 179, 159); "></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"
                        style="background-color: rgb(232, 179, 159);"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Detail Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6" style="padding-right: 0.5rem; padding-left: 0;">
                        <div class="mb-3 p-3 rounded" style="background-color: #f0d6cd;">color</div>
                        <div class="mb-3 p-5 rounded" style="background-color: white;">pic color</div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6" style="padding-right: 0; padding-left: 0.5rem;">
                        <div class="mb-3 p-3 rounded" style="background-color: #f0d6cd;">parts</div>
                        <div class="mb-3 p-5 rounded" style="background-color: white;">pic parts</div>
                    </div>
                </div>
            </div>

            <!-- Detail Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (2 divs) -->
                    <div class="col-md-3" style="padding-left: 0; padding-right: 0;">
                        <div class="mb-3 p-3 rounded" style="background-color: #f0d6cd; width: 80%;">
                            PVC
                        </div>
                        <div class="mb-3 p-3 rounded" style="background-color: #f0d6cd; width: 80%;">
                            ล้างเล็บ
                        </div>
                    </div>

                    <!-- Right Side (2 divs) -->
                    <div class="col-md-9" style="padding-left: 0; padding-right: 0;">
                        <div class="mb-3 p-3 rounded" style="background-color: white; width: 100%;">
                            {{ $shop->pvc }}
                        </div>

                        <div class="mb-3 p-3 rounded" style="background-color: white; width: 100%;">
                            {{ $shop->clean_nail }}
                        </div>
                    </div>

                    <div class="d-flex justify-content-center align-items-center" style="padding-bottom: 5%;">
                        <!-- Button trigger modal -->
                        <button type="button" class="mt-5 p-2 rounded" data-bs-toggle="modal"
                            data-bs-target="#bookNowModal">
                            Book Now!
                        </button>
                    </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="date" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Select Time</label>
                            <input type="time" class="form-control" id="time">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmBooking">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
