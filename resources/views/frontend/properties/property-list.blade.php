@extends('layouts.app')

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
        <div class="container pt-5">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Properties</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
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
                            <form class="woocommerce-ordering" method="get" id="sortingForm">
                                <select name="orderby" class="orderby" aria-label="Shop order" onchange="document.getElementById('sortingForm').submit()">
                                    <option value="">Sorting</option>
                                    <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>Housing Properties</option>
                                    <option value="rating" {{ request('orderby') == 'rating' ? 'selected' : '' }}>Landed Properties</option>
                                    <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort by latest</option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                                </select>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                    <div class="row gy-40">
                        <div class="row gy-40">
                            @forelse($properties as $property)
                                <div class="col-xl-4 col-lg-6 col-md-6 fadeinup wow">
                                    <div class="popular-list-1 grid-style">
                                        <div class="thumb-wrapper">
                                            <div class="th-slider" data-slider-options='{"loop":false, "autoplay": false,"autoHeight": true, "effect":"fade"}'>
                                                <div class="swiper-wrapper">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @php $imageField = 'image'.$i; @endphp
                                                        @if ($property->$imageField)
                                                            <div class="swiper-slide">
                                                                <a class="popular-popup-image" href="{{ asset($property->$imageField) }}">
                                                                    <img src="{{ asset($property->$imageField) }}" alt="{{ $property->title }}">
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <div class="icon-wrap">
                                                    <button class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                                                    <button class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            <div class="popular-badge">
                                                <img src="{{ asset('assets/img/icon/sell_rent_icon.svg') }}" alt="icon">
                                                <p>{{ ucfirst($property->category) }}</p>
                                            </div>
                                        </div>

                                        <div class="property-content">
                                            <div class="media-body">
                                                <h3 class="box-title">
                                                    <a href="{{ route('property.details', $property->id) }}">{{ $property->title }}</a>
                                                </h3>
                                                <div class="box-text">
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/popular-location.svg') }}" alt="icon"></div>
                                                    {{ $property->location }}
                                                </div>
                                            </div>

                                            <ul class="property-featured">
                                                @if($property->bedrooms)
                                                    <li><div class="icon"><img src="{{ asset('assets/img/icon/bed.svg') }}" alt="icon"></div>Bed {{ $property->bedrooms }}</li>
                                                @endif
                                                @if($property->bathrooms)
                                                    <li><div class="icon"><img src="{{ asset('assets/img/icon/bath.svg') }}" alt="icon"></div>Bath {{ $property->bathrooms }}</li>
                                                @endif
                                                @if($property->size)
                                                    <li><div class="icon"><img src="{{ asset('assets/img/icon/sqft.svg') }}" alt="icon"></div>{{ $property->size }}</li>
                                                @endif
                                            </ul>

                                            <div class="property-bottom">
                                                <h6 class="box-title">₦{{ number_format($property->price, 2) }}</h6>
                                                <a class="th-btn sm style3 pill" href="{{ route('property.details', $property->id) }}">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No approved properties available at the moment.</p>
                            @endforelse
                        </div>
                        <div class="th-pagination text-center pt-4">
                            {{ $properties->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    

    
    
    
@endsection