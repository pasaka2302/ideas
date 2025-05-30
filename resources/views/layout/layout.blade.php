<!DOCTYPE html>
<html lang="EN">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | {{ config('app.name') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="/brain-solid.svg" />

        <!-- Link only one version of Bootstrap CSS -->
        <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!-- Include navigation bar -->
        @include('layout.nav')

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        <p class="text-center">Copyrights &copy; {{ date('Y') }}. Ideas V1.0 Made with
            <i class="fas fa-heart text-danger"></i> by
            <a href="https://pasaka.wuaze.com/" target="_blank">Pasaka Maile</a>
        </p>

        <!-- Include only one version of Bootstrap JS and Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
        <!-- jQuery for any additional JavaScript functionality -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            // Remove session message after 5 seconds
            window.onload = function() {
                var fade = document.getElementById('fade');
                if (fade) {
                    setTimeout(function() {
                        fade.style.display = 'none';
                    }, 3000); // 3000 milliseconds = 3 seconds
                }
            };
        </script>

    </body>

</html>
