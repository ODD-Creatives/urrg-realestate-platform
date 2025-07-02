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
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_1.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Elite Estates</h5>
                            <p class="text-muted font-13 mb-0">Luxury Condos</p>
                            <a href="{{route('user.propertyDetails')}}" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_2.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Greenview Developers</h5>
                            <p class="text-muted font-13 mb-0">Suburban Homes</p>
                            <a href="property-details.html" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_3.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Cityscape Realty</h5>
                            <p class="text-muted font-13 mb-0">Urban Apartments</p>
                            <a href="property-details.html" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_1.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Elite Estates</h5>
                            <p class="text-muted font-13 mb-0">Luxury Condos</p>
                            <a href="property-details.html" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_2.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Greenview Developers</h5>
                            <p class="text-muted font-13 mb-0">Suburban Homes</p>
                            <a href="property-details.html" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4 stretch-card">
                        <div class="card">
                            <div class="card-body p-0">
                            <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_3.jpg')}}" alt="">
                            </div>
                            <div class="card-body px-3 text-dark">
                            <h5 class="fw-semibold">Cityscape Realty</h5>
                            <p class="text-muted font-13 mb-0">Urban Apartments</p>
                            <a href="property-details.html" class="text-primary font-13">View Properties</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection