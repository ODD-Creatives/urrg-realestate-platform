@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $property->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>{{ $property->title }}</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <!-- Property Images -->
            <div class="col-lg-6">
                <div class="card">
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
                                <a class="th-btn sm style3 pill" href="{{ url('/building-projects') }}">Back</a>
                            </div>
                        </div>
                    </div> 
                </div>
                
            </div>

            <!-- Property Info -->
            <div class="col-lg-6">
                <h3>{{ $property->title }}</h3>
                <p>{{ $property->description }}</p>
                <p><strong>Location:</strong> {{ $property->location }}</p>
                <p><strong>Price:</strong> ₦{{ number_format($property->price, 2) }}</p>
                <p><strong>Category:</strong> {{ ucfirst($property->category) }}</p>
                <p><strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                <p><strong>Developer:</strong> {{ $property->developer->company_name ?? 'N/A' }}</p>                
            </div>
        </div>
    </div>
</section>
@endsection
