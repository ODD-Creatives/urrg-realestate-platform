@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Realtor's </h3>
                        <h6 class="font-weight-normal mb-0">👤 Realtor Profile</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Profile</h4>
                    <div>
                        <a href="{{ route('admin.realtors.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Photo -->
                        <div class="col-md-4 text-center2 mb-3">
                            <img src="{{ asset('assets/admin/assets/images/faces/face28.jpg') }}" alt="Realtor Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            <p class="mt-2 fw-bold"> Grace Johnson </p>
                        
                            <p><strong>Email:</strong> grace@example.com</p>
                            <p><strong>Phone:</strong> +234 801 234 5678</p>
                            <p><strong>Status:</strong> 
                                <span class="badge bg-success">Active</span>
                            
                            </p>
                            <p>
                                <strong>Joined:</strong> 
                                    3rd of June, 2025.
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-danger">Suspend</a>
                        </div>
                        <!-- Basic Info -->
                        <div class="col-md-6">
                            <div class="card bg-light border mb-3">
                                <div class="card-body text-center ">
                                    <h6>Total Earnings</h6>
                                    <h3 class="text-success">₦ 325,640.00
                                        
                                    </h3>
                                </div>
                            </div>
                            <div>
                                <p>
                                    <strong>Bank:</strong> 
                                    Zenith
                                </p>
                                <p><strong>Account Number:</strong> 
                                    0223456789
                                </p>
                                <p><strong>Referral Code:</strong> 
                                    Qrty2345686
                                </p>
                                <p><strong>Upline:</strong> 
                                    Johnson Quinm, James Ademola
                                </p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('admin.realtors.referral') }}" class="btn btn-outline-primary">View Referral Chain</a>
                                <a href="{{ route('admin.realtors.commission') }}" class="btn btn-outline-success">View Commissions</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>    
        </div>
        
        
    </div>
@endsection 