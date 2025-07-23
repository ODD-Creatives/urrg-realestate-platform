@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">🏗️ Developer Profile </h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">URRG Properties Ltd</h4>
                    <div>
                        <a href="{{ route('admin.developers.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                    <!-- Developer Logo -->
                    <div class="col-md-4 ">
                        <img src="{{ asset('assets/img/urrglogo1.png') }}" alt="Developer Logo" class="img-fluid rounded" style="max-height: 120px;">
                        <p><strong>Company Name:</strong> URRG Properties Ltd</p>
                        <p><strong>Email:</strong> urrg@example.com</p>
                        <p><strong>Phone:</strong> +234 809 123 4567</p>
                    </div>
                    <!-- Developer Info -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <p><strong>Verified:</strong> <span class="badge bg-success">Yes</span></p>
                                <p><strong>Joined:</strong> 2024-05-10</p>
                                <p><strong>Total Listings:</strong> 12</p>
                                <p><strong>Featured Projects:</strong> 3</p>
                                <p><strong>Status:</strong> <span class="badge bg-success">Approved</span></p>

                                
                            </div>
                            <div class="col-md-7">
                                <h6>📄 Company Description</h6>
                                <p>
                                    URRG Properties Ltd is a leading real estate developer providing premium housing projects across Lagos and Abuja.
                                    Our mission is to redefine luxury living with affordability and security.
                                </p>

                                <!-- Actions -->
                                <div class="mt-3">
                                    <a href="{{ route('admin.developers.listings') }}" class="btn btn-outline-warning">Listings</a>
                                    <a href="{{ route('admin.developers.projects') }}" class="btn btn-outline-warning"> Projects</a>
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