@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">🏠 Listing Details </h3>
                <h6 class="font-weight-normal mb-0">Oakwood Villa - Property Details</h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"> Property Details</h4>
                    <div>
                        <a href="{{ route('admin.developers.listings_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="{{ route('admin.developers.listings') }}" class="btn btn-sm btn-outline-dark">Back</a>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <p><strong>Category:</strong> Apartment</p>
                            <p><strong>Status:</strong> <span class="badge bg-success">Approved</span></p>
                            <p><strong>Featured:</strong> <span class="badge bg-info">Yes</span></p> 
                            <p><strong>Listed On:</strong> 2024-06-01</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Price:</strong> ₦25,000,000</p>
                            <p><strong>Developer:</strong> URRG Properties Ltd</p>
                            <p><strong>email:</strong> urrg@example.com </p>
                            <p><strong>Phone No.:</strong> +234 809 123 4567</p>
                        </div>
                        <!-- Description -->
                        <div class="col-md-4 mb-4">
                            <h6>📄 Property Description</h6>
                            <p>
                                Oakwood Villa is a luxury 3-bedroom apartment located in the heart of Lekki Phase 1.
                                It features modern architecture, spacious interiors, a gym, a pool, and 24/7 security.
                                Ideal for professionals and families looking for quality living.
                            </p>
                        </div>
                    </div>

                    

                    <!-- Image Gallery -->
                    <div class="mb-4">
                        <h6>🖼 Property Images</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('assets/admin/assets/images/carousel/banner_1.jpg')}}" class="img-fluid rounded" alt="Image 1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('assets/admin/assets/images/carousel/banner_2.jpg')}}" class="img-fluid rounded" alt="Image 2">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('assets/admin/assets/images/carousel/banner_3.jpg')}}" class="img-fluid rounded" alt="Image 3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('assets/admin/assets/images/carousel/banner_4.jpg')}}" class="img-fluid rounded" alt="Image 4">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('assets/admin/assets/images/carousel/banner_5.jpg')}}" class="img-fluid rounded" alt="Image 4">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                                <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Reject</a> 
                        
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
@endsection 