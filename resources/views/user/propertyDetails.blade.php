@extends('user.partials.home')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="row">
            <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <!-- Bootstrap Carousel -->
                                    <div id="carousel-{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @php $hasImage = false; @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php $imageField = 'image'.$i; @endphp
                                                @if ($property->$imageField)
                                                    @php $hasImage = true; @endphp
                                                    <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                                        <img class="d-block w-100" 
                                                            src="{{ asset($property->$imageField) }}" 
                                                            alt="{{ $property->title }}">
                                                    </div>
                                                @endif
                                            @endfor

                                            @if(!$hasImage)
                                                <!-- fallback -->
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" 
                                                        src="{{ asset('assets/user/assets/images/dashboard/img_1.jpg') }}" 
                                                        alt="No Image">
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Controls -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $property->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $property->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                               
                            <div class="col-sm-6">
                                <!-- Property Info --> 
                                <h3 class="fw-bold mb-2">{{ $property->title }}</h3>
                                <p class="text-muted mb-3">{{ $property->description }}</p>
                                <!-- Property Details Grid -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Location</h6>
                                        <p class="mb-0">{{ $property->location }}</p>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Bedrooms</h6>
                                        <p class="mb-0">{{ $property->bedrooms }} Bedrooms</p>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Bathrooms</h6>
                                        <p class="mb-0">{{ $property->bathrooms }} Bathrooms</p>
                                    </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Size</h6>
                                        <p class="mb-0">{{ $property->size }} sqft</p>
                                    </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Price</h6>
                                        <p class="mb-0">₦{{ number_format($property->price, 2) }}</p>
                                    </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                    <div class="border p-3 rounded">
                                        <h6 class="text-muted mb-1">Status</h6>
                                        {{--
                                        <p class="mb-0">{{ $property->developer->company_name ?? 'N/A' }}</p>--}}
                                        <p class="mb-0">{{ ucfirst($property->status) }}</p>
                                    </div>
                                    </div>
                                </div> 
                                <!-- Contact Developer Button -->
                                <a href="{{route('user.properties')}}" class="btn btn-secondary">
                                    <i class="bi bi-envelope"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection