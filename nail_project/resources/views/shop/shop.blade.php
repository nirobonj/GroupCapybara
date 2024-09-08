<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    @include('layouts.navbar')
    <div style="height: 30cm;background-color: rgb(255, 234, 189);">
        <p class="text-center fs-2">shopDetail</p>

        <div class="mx-auto" style="background-color: rgb(214, 212, 209); max-width: 90%;">
            <!-- Banner Div -->
            <div class="mx-auto rounded" style="background-color: white; width: 80%; height: 150px;">
                <p>banner</p>
            </div>

            <!-- Content Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6">
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">Shop name</div>
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">⭐</div>
                        <div class="p-3 rounded" style="background-color: #f8f9fa;">
                            address :
                            description:
                        </div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6">
                        <div class="p-3 rounded" style="background-color: #f8f9fa; height: 100%;">picture</div>
                    </div>
                </div>
            </div>

            <!-- review Div -->
            <div class="mx-auto rounded" style="background-color: white; width: 80%; height: 150px; margin-top: 30px;">
                <p>review part</p>
            </div>

            <!-- Detail Div -->
            <div class="container" style="width: 80%; margin-top: 30px;">
                <div class="row">
                    <!-- Left Side (3 divs) -->
                    <div class="col-md-6">
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">color</div>
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">pic color</div>
                    </div>

                    <!-- Right Side (1 div) -->
                    <div class="col-md-6">
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">parts</div>
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">pic parts</div>
                    </div>
                </div>
            </div>

            <!-- Detail Div -->
<div class="container" style="width: 80%; margin-top: 30px;">
    <div class="row">
        <!-- Left Side (2 divs) -->
        <div class="col-md-6">
            <!-- Use custom classes or inline styles to adjust width -->
            <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa; width: 80%;">
                PVC
            </div>
            <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa; width: 80%;">
                ล้างเล็บ
            </div>
        </div>

        <!-- Right Side (2 divs) -->
        <div class="col-md-6">
            <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa; width: 100%;">
                -
            </div>
            <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa; width: 100%;">
                -
            </div>
        </div>
    </div>
</div>


        </div>

    </div>

</body>
</html>
