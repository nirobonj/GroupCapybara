<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | NailSlay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="">
    </head>

    <body>
          <div>
            @include('layouts.navbar')
                <div>
                    @yield('content')
                </div>
                <!-- container-fluid -->
            <!-- end main content-->
    </div>
    </body>
</html>
