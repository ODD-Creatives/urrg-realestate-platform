<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Unique Radiance Realtors Group') }}</title>
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
        



    </style>
</head>
<body class="home-2">
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/urrglogo1.png') }}" class="img-fluid w-75" alt="Unique Radiance Realtors Group"></a>
                </a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class=" active"><a href="{{ route('home') }}">Home</a>
                        
                    </li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('realtors') }}">Realtors</a></li>
                    <li><a href="{{ route('developers') }}">Developers</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">Services</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('property') }}">Properties</a></li>
                            <li><a href="{{ route('event') }}">Academy Event</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-default header-layout1">
        {{--
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <i class="fa-solid fa-envelope"></i> 
                                    <a href="mailto:infomailexample@mail.com">infomailexample@mail.com</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i> 
                                    <a href="tel:+0012345678900">+00 (123) 456 789 00</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <div class="th-social"><a href="https://www.facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                                class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                                class="fab fa-linkedin-in"></i></a> <a
                                            href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="assets/img/urrglogo1.png" class="img-fluid w-75" alt="Unique Radiance Realtors Group">
                                </a>
                            </div>
                        </div>

                        <div class="col-auto d-flex align-items-center gap-3">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('realtors') }}">Realtors</a></li>
                                    <li><a href="{{ route('developers') }}">Developers</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('property') }}">Properties</a></li>
                                            <li><a href="{{ route('event') }}">Academy Event</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </nav>

                            
                            <div class="d-flex justify-content-center my-2">
                                <div class="btn-group capsule-buttons" role="group">
                                    <button type="button" class="btn btn-sm btn-signin" style="margin-right: -27px;"><a href="{{ route('signup') }}" class="text-white">Join Us</a></button>
                                    <button type="button" class="btn btn-sm btn-signup"><a href="{{ route('signin') }}" class="text-white">Sign In</a></button>
                                </div>
                            </div>



                            <button type="button" class="th-menu-toggle d-block d-lg-none">
                                <i class="far fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main class="py-2">
        @yield('content')
    </main>

    <footer class="footer-wrapper ">
        <div class="widget-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-all-widget-item">
                            <div class="widget footer-widget">
                                <div class="th-widget-about">
                                    <div class="about-logo">
                                        <a href="index.html">
                                            <img src="{{ asset('assets/img/urrglogo2.png') }}" class="img-fluid w-50" alt="Unique Radiance Realtors Group"></a>

                                        </a>
                                    </div>
                                    <p class="about-text">
                                        Unique Radiance Realtors Group (URRG) is Africa’s greatest real estate empire, dedicated to shaping global 
                                        leaders and impacting the world through real estate excellence. 
                                        

                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="footer-all-widget-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-item">
                                        <div class="widget widget_nav_menu footer-widget">
                                            <h3 class="widget_title">Quick Links</h3>
                                            <div class="menu-all-pages-container">
                                                <ul class="menu">
                                                    <li><a href="#">Realtor Signin</a></li>
                                                    <li><a href="#">Academy Event</a></li>
                                                    <li><a href="#">Developer Project</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-item">
                                        <div class="widget widget_nav_menu footer-widget">
                                            <h3 class="widget_title">Support</h3>
                                            <div class="menu-all-pages-container">
                                                <ul class="menu">
                                                    <li><a href="#">Contact Us</a></li>
                                                    <li><a href="#">FAQs</a></li>
                                                    <li><a href="#">About Us</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-item">
                                        <div class="widget widget_banner footer-widget">
                                            <h3 class="widget_title">Location</h3>
                                            <div class="widget-map">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.998207725692!2d3.512199673975619!3d6.6471419217162655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103beeb42f4c7c49%3A0xc64264fa4a378607!2sFirst%20Gate!5e0!3m2!1sen!2sng!4v1751425110804!5m2!1sen!2sng"></iframe>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4076154548557!2d3.3409031739752444!3d6.59615612231685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b922427ed08df%3A0x2781d4bd158fc9c2!2s51%20Olowu%20St%2C%20Opebi%2C%20Ikeja%20101233%2C%20Lagos!5e0!3m2!1sen!2sng!4v1751706741481!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap ps-5 pe-5">
            <div class="row gy-3 justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-7">
                    <p class="copyright-text">
                        Copyright <i class="fal fa-copyright"></i> 2025 
                        <a href="index.html">Unique Radiance Realtors Group </a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-auto">
                    <div class="footer-default-copy-right">
                        <p>Social Media:</p>
                        <div class="th-social">
                            <a href="https://www.facebook.com/share/15mDCMedN9/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a> 
                            <a href="https://www.facebook.com/share/15mDCMedN9/?mibextid=wwXIfr"><i class="fab fa-twitter"></i></a> 
                            <a href="https://www.linkedin.com/in/unique-radiance-realtors-group-35b17a362?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app "><i class="fab fa-linkedin-in"></i></a> 
                            <a href="https://www.instagram.com/urrg_realtorsgroup?igsh=MWxzZzgxZ2pqemtmcQ%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script></body>
</html>
