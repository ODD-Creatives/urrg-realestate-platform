@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Property Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Property Details</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="property-details space overflow-hidden">
        <div class="container">
            <div class="row gy-40 gx-50">
                <div class="col-lg-7">
                    <div class="row gy-30">
                        <div class="slider-area property-slider1">
                            <div class="swiper th-slider panoramaSlide2 mb-4" id="panoramaSlide2"
                                data-slider-options='{"autoplay":false,"effect":"fade","loop":true, "simulateTouch": false,"thumbs":{"swiper":".property-thumb-slider"},"autoplayDisableOnInteraction":"true"}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="property-slider-img propery-single-slide" id="panorama1"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-1.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-slider-img propery-single-slide" id="panorama2"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-2.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-slider-img propery-single-slide" id="panorama3"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-3.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-slider-img propery-single-slide" id="panorama4"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-4.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-slider-img propery-single-slide" id="panorama5"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-5.jpg')}}" alt="img"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper th-slider property-thumb-slider slider-tab"
                                data-slider-options='{"effect":"slide","loop":true, "simulateTouch": true,"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}},"autoplayDisableOnInteraction":"true"}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-bg-src="">
                                        <div class="tab-btn property-slider-img"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-1.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide" data-bg-src="">
                                        <div class="tab-btn property-slider-img"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-2.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide" data-bg-src="">
                                        <div class="tab-btn property-slider-img"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-3.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide" data-bg-src="">
                                        <div class="tab-btn property-slider-img"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-4.jpg')}}" alt="img"></div>
                                    </div>
                                    <div class="swiper-slide" data-bg-src="">
                                        <div class="tab-btn property-slider-img"><img
                                                src="{{asset('assets/img/explore-cites/explore-cites-bg-5.jpg')}}" alt="img"></div>
                                    </div>
                                </div>
                            </div><button data-slider-prev="#panoramaSlide2" class="slider-arrow slider-prev"><i
                                    class="far fa-arrow-left"></i></button> <button data-slider-next="#panoramaSlide2"
                                class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                        </div>
                        <div class="page-title-wrap fadeinup wow">

                                <div class="hightlighes-title-wrap mb-25 fadeinup wow">
                                    <h2 class="page-title mb-2">Property Hightlights</h2>
                                    <h5 class="house-sell">House for sale</h5>
                                </div>
                                <ul class="property-grid-list fadeinup wow">
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-1.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">ID NO.</h4>
                                            <p class="property-grid-list-text">#1234</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-2.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Type</h4>
                                            <p class="property-grid-list-text">Residencial</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-3.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Room</h4>
                                            <p class="property-grid-list-text">6</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-4.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Bedroom</h4>
                                            <p class="property-grid-list-text">4</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-5.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Bath</h4>
                                            <p class="property-grid-list-text">2</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-6.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Big Yard</h4>
                                            <p class="property-grid-list-text">1</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-7.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Purpose</h4>
                                            <p class="property-grid-list-text">For Rent</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-8.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Sqft</h4>
                                            <p class="property-grid-list-text">4000</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-9.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Parking</h4>
                                            <p class="property-grid-list-text">Yes</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-10.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Elevator</h4>
                                            <p class="property-grid-list-text">Yes</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-11.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Wifi</h4>
                                            <p class="property-grid-list-text">Yes</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="property-grid-list-icon"><img
                                                src="{{asset('assets/img/icon/property-single-icon1-12.svg')}}" alt="img"></div>
                                        <div class="property-grid-list-details">
                                            <h4 class="property-grid-list-title">Built in</h4>
                                            <p class="property-grid-list-text">1985</p>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <aside class="sidebar-area">
                        <div class="property-page-single">
                            <div class="page-content">
                                <div class="property-meta-wrap mb-55 fadeinup wow">
                                    <div class="property-meta"><a class="property-tag" href="blog.html">Featured</a> <a
                                            href="blog.html"><i class="fa-solid fa-calendar-days"></i> 05 Jun, 2024</a>
                                        <a href="blog.html"><i class="fa-solid fa-comments"></i> No Comments</a></div>
                                    <div class="wishlist-icon"><a href="wishlist.html" class="icon-btn"><i
                                                class="fa-solid fa-heart"></i></a></div>
                                </div>
                                <div class="page-title-wrap fadeinup wow">
                                    <h2 class="page-title mb-2">About This Property</h2>
                                    <h4 class="page-title">N50,805,000</h4>
                                </div>
                                <div class="page-features fadeinup wow">
                                    <div class="box-text">
                                        <div class="icon"><img src="{{asset('assets/img/icon/popular-location.svg')}}" alt="icon">
                                        </div>39A, Rohan Estates, Lekki Phase1, lagos Nigeria.
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="{{asset('assets/img/icon/bed.svg')}}" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="{{asset('assets/img/icon/bath.svg')}}" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="{{asset('assets/img/icon/sqft.svg')}}" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                </div>
                                <p class="mb-10 fadeinup wow" style="font-size:14px;">This meticulously remodeled "Savant Smart Home" is a true
                                    gem. Featuring four bedrooms and three bathrooms, including a master with a jacuzzi
                                    tub, walk-in shower, and steam room, it combines style with cutting-edge technology.
                                    The open living and dining areas lead to a chef's kitchen equipped with Thermador
                                    appliances, including a gas range/oven. A custom bar with sleek cabinetry, a dual
                                    Kegerator nitro brew system, and a 128-bottle, 3-zone wine fridge add to the home's
                                    allure. High-end lighting and automation bring sophistication and comfort
                                    throughout. Outdoors, enjoy a heated saltwater pool with spa, a cabana bath, and an
                                    outdoor kitchen/bar pergola. The fully-fenced front yard also features a putting
                                    green.</p>
                                <p class="mb-10 fadeinup wow" style="font-size:14px;">Ut enim ad minima veniam, quis nostrum exercitationem
                                    ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
                                    autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                    consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
                                
                                
                                <h3 class="page-title mt-50 mb-30 fadeinup wow">Location</h3>
                                <div class="location-map fadeinup wow">
                                    
                                    <div class="location-map-address">
                                       
                                        <div class="media-body">
                                            <h4 class="title">Address:</h4>
                                            <p class="text">Brooklyn, New York 11233, United States</p>
                                            <h4 class="title">Post Code:</h4>
                                            <p class="text">12345</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </aside>
                </div>
            </div>
        </div>
    </section>
    
    

    
    
    
@endsection