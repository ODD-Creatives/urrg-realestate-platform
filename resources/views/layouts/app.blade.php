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
</head>
<body class="home-2">
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html">
                    <img src="{{ asset('assets/img/urrglogo1.png') }}" class="img-fluid w-75" alt="Unique Radiance Realtors Group"></a>
                </a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class=" active"><a href="index.html">Home</a>
                        
                    </li>
                    <li><a href="about.html">About Us</a></li>
                    <li class="menu-item-has-children"><a href="#">Property</a>
                        <ul class="sub-menu">
                            <li><a href="property.html">Properties</a></li>
                            <li><a href="property-details.html">Properties Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Agencies</a>
                        <ul class="sub-menu">
                            <li><a href="agency.html">Agencies</a></li>
                            <li><a href="agency-details.html">Agency Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="team.html">Agents Page</a></li>
                            <li><a href="team-details.html">Agent Details</a></li>
                            <li><a href="gallery.html">Gallery Page</a></li>
                            <li><a href="service.html">Service Page</a></li>
                            <li><a href="service-right-sidebar.html">Service with sidebar</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                            <li><a href="pricing.html">Pricing Plan</a></li>
                            <li><a href="neighborhood-guide.html">Neighborhood Guide</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="error.html">Error Page</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog Grid</a></li>
                            <li><a href="blog-grid-right-sidebar.html">Blog Grid With Right Sidebar</a></li>
                            <li><a href="blog-grid-left-sidebar.html">Blog Grid With Left Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
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
                                    <a href="index.html">
                                    <img src="assets/img/urrglogo1.png" class="img-fluid w-75" alt="Unique Radiance Realtors Group"></a>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li class=" active">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li class="">
                                        <a href="#">Realtors</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Developers</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="property.html">Properties</a></li>
                                            <li><a href="property-details.html">Properties Details</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </nav><button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="py-2">
        @yield('content')
    </main>

    <footer class="footer-wrapper footer-default">
        <div class="widget-area">
            <div class="container">
                <div class="footer-all-widget-wrapper">
                    <div class="footer-all-widget-item">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo"><a href="index.html"><img src="assets/img/logo-white.svg"
                                            alt="Piller-html"></a></div>
                                <p class="about-text">Pillar is a luxury to the resilience, adaptability, Spacious
                                    modern villa living room with centrally placed swimming pool blending indooroutdoor.
                                </p>
                                <div class="footer-info-wrap">
                                    <div class="footer-info"><i class="fas fa-phone"></i>
                                        <p class="info-box_link"><a href="tel:+00(123)456789012">+00 (123) 456 789
                                                012</a></p>
                                    </div>
                                    <div class="footer-info"><i class="fas fa-envelope"></i>
                                        <p class="info-box_link"><a
                                                href="mailto:infomail123@domain.com">infomail123@domain.com</a></p>
                                    </div>
                                    <div class="footer-info"><i class="fas fa-location-dot"></i>
                                        <p class="info-box_link"><span>West 2nd lane, Inner circular road, New York
                                                City</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-all-widget-item">
                        <div class="footer-right-wrap">
                            <div class="footer-item-wrap">
                                <div class="footer-item">
                                    <div class="widget widget_nav_menu footer-widget">
                                        <h3 class="widget_title">Featured Houses</h3>
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="service.html">#Villa</a></li>
                                                <li><a href="service.html">#Commercial</a></li>
                                                <li><a href="service.html">#Farm Houses</a></li>
                                                <li><a href="service.html">#Apartments</a></li>
                                                <li><a href="service.html">#Apartments</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-item">
                                    <div class="widget widget_nav_menu footer-widget">
                                        <h3 class="widget_title">Quick Links</h3>
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="service.html">Strategy Services</a></li>
                                                <li><a href="service.html">Management</a></li>
                                                <li><a href="service.html">Privacy & Policy</a></li>
                                                <li><a href="service.html">Sitemap</a></li>
                                                <li><a href="service.html">Term & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-item">
                                    <div class="widget widget_nav_menu footer-widget">
                                        <h3 class="widget_title">Support</h3>
                                        <div class="menu-all-pages-container">
                                            <ul class="menu">
                                                <li><a href="contact.html">Help Center</a></li>
                                                <li><a href="service.html">FAQs</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                                <li><a href="contact.html">Ticket Support</a></li>
                                                <li><a href="contact.html">Live Chat</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-item">
                                    <div class="widget widget_banner footer-widget">
                                        <h3 class="widget_title">Pillar Location</h3>
                                        <div class="widget-map"><iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuztheme!5e0!3m2!1sen!2sbd!4v1658812932163!5m2!1sen!2sbd"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-right-bottom-wrap">
                                <div class="footer-right-bottom-item">
                                    <div class="footer-right-bottom-item__thumb help"><img
                                            src="assets/img/icon/footer-default-icon-1-1.png" alt="img"></div>
                                    <div class="footer-right-bottom-item__content">
                                        <h4 class="box-title"><a href="contact.html">Need to Home buy or sell?</a></h4>
                                    </div>
                                </div>
                                <div class="footer-right-bottom-item scan">
                                    <div class="footer-right-bottom-item__thumb"><img
                                            src="assets/img/icon/footer-default-icon-1-2.png" alt="img"></div>
                                    <div class="footer-right-bottom-item__content">
                                        <p>Download on the</p>
                                        <h4 class="box-title"><a href="https://www.apple.com/app-store/">App Store</a>
                                        </h4>
                                    </div>
                                    <div class="footer-right-bottom-item__right"><img
                                            src="assets/img/icon/footer-default-icon-1-2-scan.png" alt="img"></div>
                                </div>
                                <div class="footer-right-bottom-item scan">
                                    <div class="footer-right-bottom-item__thumb"><img
                                            src="assets/img/icon/footer-default-icon-1-3.png" alt="img"></div>
                                    <div class="footer-right-bottom-item__content">
                                        <p>GET IT ON</p>
                                        <h4 class="box-title"><a href="https://play.google.com/store/apps">Google
                                                Play</a></h4>
                                    </div>
                                    <div class="footer-right-bottom-item__right"><img
                                            src="assets/img/icon/footer-default-icon-1-2-scan.png" alt="img"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="footer-bottom-top-shape animation-infinite"
                data-bg-src="assets/img/icon/footer-bottom-top-shape.png"></div>
            <div class="container">
                <div class="row gy-3 justify-content-lg-between justify-content-center align-items-center">
                    <div class="col-lg-7">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 <a
                                href="index.html">Piller</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-auto">
                        <div class="footer-default-copy-right">
                            <p>Social Media:</p>
                            <div class="th-social"><a href="https://www.facebook.com/"><i
                                        class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                        class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin-in"></i></a> <a href="https://www.whatsapp.com/"><i
                                        class="fab fa-whatsapp"></i></a></div>
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
