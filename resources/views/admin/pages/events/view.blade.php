@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold"> Academy Events</h3>
                    <h6 class="font-weight-normal mb-0">🎓 Event Details – Real Estate Masterclass <span class="text-primary">3 unread alerts!</span></h6>
                    
                                            
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"> Event Details </h4>
                <div>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                
                </div>
            </div>

            <div class="card-body">
                <!-- Event Meta Info -->
                <div class="row mb-4">
                    <!-- Event Banner -->
                    <div class="col-md-6">
                        <div class="mb-4 text-center">
                            <img src="{{asset('assets/admin/assets/images/carousel/banner_2.jpg')}}" class="img-fluid rounded shadow-sm" style="max-height: 350px;" alt="Event Banner">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <!-- Event Description -->
                        <div class="mb-4">
                            <h6>📝 Event Description</h6>
                            <p>
                                Join our Real Estate Masterclass to learn from top developers, brokers, and investment experts.
                                This session will cover: property acquisition, legal frameworks, land banking, real estate tech, and closing deals faster.
                                <br><br>
                                Whether you’re a realtor or investor, this masterclass gives you the tools to thrive in Nigeria’s property market.
                            </p>
                        </div>
                        </div>
                    

                
                        <div class="col-md-6">
                            <p><strong>📅 Date:</strong> June 12, 2025</p>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.events.event_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </div>
                    </div>

                

                
            </div>
            </div>





        </div>
        
    </div>
@endsection 