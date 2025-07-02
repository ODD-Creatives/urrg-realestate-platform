@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/blog/breadcrumb-bg.jpg">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Properties</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Properties</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="th-sort-bar property-style">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h4 class="box-title text-start fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            Property Listing</h4>
                    </div>
                    <div class="col-md-auto">
                        <div class="sorting-filter-wrap fadeinup wow" data-wow-duration="1.5s" data-wow-delay="0.3s">
                           
                            <form class="woocommerce-ordering" method="get"><select name="orderby" class="orderby"
                                    aria-label="Shop order">
                                    <option value="menu_order" selected="selected">Sorting</option>
                                    <option value="popularity">Housing Properties</option>
                                    <option value="rating">Landed Properties</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select></form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                    <div class="row gy-40">
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-1.jpg"><img
                                                        src="assets/img/popular/popular-1-1.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-2.jpg"><img
                                                        src="assets/img/popular/popular-1-2.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Charming Beach House</a>
                                        </h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$179,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-2.jpg"><img
                                                        src="assets/img/popular/popular-1-2.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-3.jpg"><img
                                                        src="assets/img/popular/popular-1-3.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Contemporary Loft</a></h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$335,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-3.jpg"><img
                                                        src="assets/img/popular/popular-1-3.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-4.jpg"><img
                                                        src="assets/img/popular/popular-1-4.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Cozy Cottage</a></h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$250,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-4.jpg"><img
                                                        src="assets/img/popular/popular-1-4.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-5.jpg"><img
                                                        src="assets/img/popular/popular-1-5.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Modern Beach House</a>
                                        </h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$189,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-5.jpg"><img
                                                        src="assets/img/popular/popular-1-5.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-6.jpg"><img
                                                        src="assets/img/popular/popular-1-6.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Cozy Mountain Cabin</a>
                                        </h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$179,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                            <div class="popular-list-1 grid-style">
                                <div class="thumb-wrapper">
                                    <div class="th-slider"
                                        data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-6.jpg"><img
                                                        src="assets/img/popular/popular-1-6.jpg" alt="Image"></a></div>
                                            <div class="swiper-slide"><a class="popular-popup-image"
                                                    href="assets/img/popular/popular-1-7.jpg"><img
                                                        src="assets/img/popular/popular-1-7.jpg" alt="Image"></a></div>
                                        </div>
                                        <div class="icon-wrap"><button class="slider-arrow slider-prev"><i
                                                    class="far fa-arrow-left"></i></button> <button
                                                class="slider-arrow slider-next"><i
                                                    class="far fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="actions"><a href="wishlist.html" class="icon-btn"><i
                                                class="fas fa-heart"></i></a></div>
                                    <div class="actions-style-2-wrapper">
                                        <div class="actions style-2"><a href="#" class="icon-btn"><span
                                                    class="action-text">Add To Favorite</span> <i
                                                    class="fa-solid fa-bookmark"></i> </a><a
                                                href="assets/img/popular/popular-1-1.jpg"
                                                class="icon-btn popular-popup-image"><span class="action-text">View all
                                                    img</span> <i class="fa-solid fa-camera"></i></a></div>
                                    </div>
                                    <div class="popular-badge"><img src="assets/img/icon/sell_rent_icon.svg" alt="icon">
                                        <p>For Sale</p>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('propertydetails') }}">Modern Apartment</a></h3>
                                        <div class="box-text">
                                            <div class="icon"><img src="assets/img/icon/popular-location.svg"
                                                    alt="icon"></div>39581 Rohan Estates, New York
                                        </div>
                                    </div>
                                    <ul class="property-featured">
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bed.svg" alt="icon"></div>Bed 4
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/bath.svg" alt="icon"></div>Bath
                                            2
                                        </li>
                                        <li>
                                            <div class="icon"><img src="assets/img/icon/sqft.svg" alt="icon"></div>1500
                                            sqft
                                        </li>
                                    </ul>
                                    <div class="property-bottom">
                                        <h6 class="box-title">$132,800.00</h6><a class="th-btn sm style3 pill"
                                            href="{{ route('propertydetails') }}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="th-pagination text-center pt-4">
                            <ul>
                                <li><a href="blog.html"><i class="far fa-arrow-left"></i></a></li>
                                <li><a href="blog.html">1</a></li>
                                <li><a href="blog.html">2</a></li>
                                <li><a href="blog.html">3</a></li>
                                <li><a class="next-page" href="blog.html">Next <i class="far fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    

    
    
    
@endsection