@extends('user.partials.home')

@section('content')
    
    <div class="content-wrapper pb-0">
                      
        <!-- Approved Developers/Properties -->
        <div class="row">
            <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Approved Developers & Properties</h4>
                    <div class="row">
                        
                        @forelse($properties as $property)
                            <div class="col-sm-4 stretch-card">
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

                                        <!-- Badge -->
                                        <span class="badge bg-{{ $property->status == 'approved' ? 'success' : ($property->status == 'pending' ? 'warning' : 'secondary') }} position-absolute m-2">
                                            {{ ucfirst($property->status) }}
                                        </span>
                                    </div>

                                    <!-- Property Info -->
                                    <div class="card-body px-3 text-dark">
                                        <h5 class="fw-semibold">{{ $property->title }}</h5>
                                        <p class="text-muted font-13 mb-0">
                                            {{ ucfirst($property->category) }} • {{ $property->location }}
                                        </p>

                                        <!-- Features -->
                                        <ul class="list-inline my-2">
                                            @if($property->bedrooms)
                                                <li class="list-inline-item">
                                                    <i class="fa fa-bed text-primary"></i> {{ $property->bedrooms }}
                                                </li>
                                            @endif
                                            @if($property->bathrooms)
                                                <li class="list-inline-item">
                                                    <i class="fa fa-bath text-info"></i> {{ $property->bathrooms }}
                                                </li>
                                            @endif
                                            @if($property->size)
                                                <li class="list-inline-item">
                                                    <i class="fa fa-expand text-success"></i> {{ $property->size }}
                                                </li>
                                            @endif
                                        </ul>

                                        <!-- Price and Link -->
                                        <p class="fw-bold mb-1">₦{{ number_format($property->price, 2) }}</p>
                                        <a href="{{ route('property.details', $property->id) }}" class="text-primary font-13">
                                            View Property
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No approved properties available at the moment.</p>
                        @endforelse

    


                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection