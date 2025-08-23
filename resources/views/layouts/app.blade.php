<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Unique Radiance Realtors Group</title>
    <meta name="author" content="Unique Radiance Realtors Group">
    <meta name="description" content="Unique Radiance Realtors Group">
    <meta name="keywords" content="Unique Radiance Realtors Group">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .capsule-buttons .btn {
            border-radius: 0; /* Remove default rounding */
            }

        .capsule-buttons .btn:first-child {
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        }

        .capsule-buttons .btn:last-child {
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        }
        .btn-group.capsule-buttons .btn {
            margin-right: -1px;
        }

        /* Base styles */
        .btn-signin {
            background-color: #FFB539; /* brand yellow */
            color: #000;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-signup {
            background-color: #424242; /* brand gray */
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        /* Hover effects */
        .btn-signin:hover {
            background-color: #000000; /* deeper yellow */
            color: #fff;
        }

        .btn-signup:hover {
            background-color: #e0a800; /* darker gray */
            color: #000;
        }
        @media screen and (max-width: 576px) {
            .w-xs-100 {
                width: 100%;
            }
        }
        @media screen and (min-width: 576px) {
            .w-xs-75 {
                width: 75%;
            }
        }
    </style>
</head>
<body class="home-2">
    @include('layouts.navbar')
  

    <main class="py-2">
        @yield('content')
    </main> 

    @include('layouts.footer')

</body>
</html>
