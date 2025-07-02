@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/blog/breadcrumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Academy Event</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Event</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row gy-30 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-1.jpg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">22 Feb</a></div>
                        </div>
                        <div class="blog-content">
                            
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">Building gains into housing stocks and how
                                    to trade the sector</a></h3><a href="{{route('eventdetails')}}"
                                class="th-btn pill style3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-2.jpg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">23 Feb</a></div>
                        </div>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">92% of millennial homebuyers say has
                                    impacted their plans</a></h3><a href="{{route('eventdetails')}}"
                                class="th-btn pill style3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-3.jpeg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">24 Feb</a></div>
                        </div>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">Exploring the impact of climate change on
                                    global markets</a></h3><a href="{{route('eventdetails')}}" class="th-btn pill style3">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-4.jpg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">26 Feb</a></div>
                        </div>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">The future of city living and its
                                    influence on of the in design</a></h3><a href="{{route('eventdetails')}}"
                                class="th-btn pill style3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-7.jpg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">27 Feb</a></div>
                        </div>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">Exploring innovative architecture trends
                                    and their impact</a></h3><a href="{{route('eventdetails')}}" class="th-btn pill style3">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img"><a href="{{route('eventdetails')}}"><img src="assets/img/blog/blog-s-1-6.jpg"
                                    alt="Image"></a>
                            <div class="date"><a href="blog.html">16 Mar</a></div>
                        </div>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="{{route('eventdetails')}}">Breaking down latest tech trends and
                                    investment opportunity</a></h3><a href="{{route('eventdetails')}}"
                                class="th-btn pill style3">Read More</a>
                        </div>
                    </div>
                </div>
                
                <div class="th-pagination text-center pt-4">
                    <ul>
                        <li><a href="blog.html"><i class="far fa-arrow-left"></i></a></li>
                        <li><a href="blog.html">1</a></li>
                        <li><a href="blog.html">2</a></li>
                        <li><a href="blog.html">3</a></li>
                        <li><a class="next-page" href="blog.html">Next <i class="far fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    
    
@endsection