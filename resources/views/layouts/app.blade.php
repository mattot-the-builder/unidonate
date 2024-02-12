<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="stylesheet" href="{{asset(" css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{ asset(" css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/magnific-popup.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/nice-select.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/flaticon.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/gijgo.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/animate.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/slicknav.css") }}">
    <link rel="stylesheet" href="{{ asset(" css/style.css") }}">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


    <!-- JS here -->
    <script src="{{ asset(" js/vendor/modernizr-3.5.0.min.js") }}"></script>
    <script src="{{ asset(" js/vendor/jquery-1.12.4.min.js") }}"></script>
    <script src="{{ asset(" js/popper.min.js") }}"></script>
    <script src="{{ asset(" js/bootstrap.min.js") }}"></script>
    <script src="{{ asset(" js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset(" js/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset(" js/ajax-form.js") }}"></script>
    <script src="{{ asset(" js/waypoints.min.js") }}"></script>
    <script src="{{ asset(" js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset(" js/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ asset(" js/scrollIt.js") }}"></script>
    <script src="{{ asset(" js/jquery.scrollUp.min.js") }}"></script>
    <script src="{{ asset(" js/wow.min.js") }}"></script>
    <script src="{{ asset(" js/nice-select.min.js") }}"></script>
    <script src="{{ asset(" js/jquery.slicknav.min.js") }}"></script>
    <script src="{{ asset(" js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset(" js/plugins.js") }}"></script>
    <script src="{{ asset(" js/gijgo.min.js") }}"></script>
    <!--contact js-->
    <script src="{{ asset(" js/contact.js") }}"></script>
    <script src="{{ asset(" js/jquery.ajaxchimp.min.js") }}"></script>
    <script src="{{ asset(" js/jquery.form.js") }}"></script>
    <script src="{{ asset(" js/jquery.validate.min.js") }}"></script>
    <script src="{{ asset(" js/mail-script.js") }}"></script>

    <script src="{{ asset(" js/main.js") }}"></script>
    </body>
</html>
