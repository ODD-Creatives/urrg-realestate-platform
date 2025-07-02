@extends('user.partials.home')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="row">
            <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                <!-- Property Image -->
                <div class="mb-4">
                    <img src="{{ asset('assets/user/assets/images/dashboard/img_1.jpg') }}" class="img-fluid w-100 rounded" alt="Property Image">
                </div>

                <!-- Property Info -->
                <h3 class="fw-bold mb-2">Elite Estates - Luxury Condos</h3>
                <p class="text-muted mb-3">Located in the heart of the city, Elite Estates offers premium luxury condos with breathtaking skyline views.</p>

                <!-- Property Details Grid -->
                <div class="row mb-4">
                    <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <h6 class="text-muted mb-1">Location</h6>
                        <p class="mb-0">Downtown, Metro City</p>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <h6 class="text-muted mb-1">Bedrooms</h6>
                        <p class="mb-0">3 Bedrooms</p>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="border p-3 rounded">
                        <h6 class="text-muted mb-1">Bathrooms</h6>
                        <p class="mb-0">2 Bathrooms</p>
                    </div>
                    </div>
                    <div class="col-md-4 mt-3">
                    <div class="border p-3 rounded">
                        <h6 class="text-muted mb-1">Size</h6>
                        <p class="mb-0">1,800 sqft</p>
                    </div>
                    </div>
                    <div class="col-md-4 mt-3">
                    <div class="border p-3 rounded">
                        <h6 class="text-muted mb-1">Price</h6>
                        <p class="mb-0">$450,000</p>
                    </div>
                    </div>
                </div>

                <!-- More Description -->
                <h5 class="fw-semibold">About This Property</h5>
                <p>
                    These luxury condos feature spacious living areas, modern kitchens with premium appliances, and access to world-class amenities including a rooftop pool, fitness center, and 24/7 concierge service. Ideal for professionals and families seeking urban comfort.
                </p>

                <!-- Contact Developer Button -->
                <a href="mailto:sales@eliteestates.com" class="btn btn-primary">
                    <i class="bi bi-envelope"></i> Contact Developer
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection