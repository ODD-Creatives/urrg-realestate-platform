@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">🏗️ Developer Profile </h3>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $developer->company_name }}</h4>
                    <div>
                        <a href="{{ route('admin.developers.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                    <!-- Developer Logo -->
                    <div class="col-md-4 ">
                        <img src="{{ asset($developer->logo) }}" alt="Developer Logo" class="img-fluid rounded mb-2" style="max-height: 120px;">
                        <p><strong>Company Name:</strong> {{ $developer->company_name }}</p>
                        @if ($developer->letter_of_intent_path)
                            <p>
                                <strong> Letter of Intent:</strong> 
                                <a href="{{ asset($developer->letter_of_intent_path) }}" target="_blank" class="btn btn-sm btn-outline-warning">
                                  📎  View Document
                                </a>
                            </p>
                        @endif
                        @if ($developer->company_profile_path)
                            <p>
                                <strong> Company Profile:</strong> 
                                <a href="{{ asset($developer->company_profile_path) }}" target="_blank" class="btn btn-sm btn-outline-warning">
                                  📎  View Document
                                </a>
                            </p>
                        @endif
                        @if ($developer->property_details_path)
                            <p>
                                <strong> Property Details:</strong> 
                                <a href="{{ asset($developer->property_details_path) }}" target="_blank" class="btn btn-sm btn-outline-warning">
                                  📎  View Document
                                </a>
                            </p>
                        @endif

                    </div>
                    <!-- Developer Info -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <p><strong>Joined:</strong> {{ $developer->updated_at->format('M d, Y')  }}</p>
                                <p><strong>Contact Person:</strong> {{ $developer->contact_person }}</p>
                                <p><strong>Email:</strong> {{ $developer->email }}</p>
                                <p><strong>Phone:</strong> {{ $developer->phone }}</p>
                                <p><strong>Verified:</strong> <span class="badge bg-{{ $developer->email_verified_at ? 'success' : 'secondary' }}">
                                    {{ $developer->email_verified_at ? 'Yes' : 'No' }}
                                </span></p>
                                {{--
                                <p><strong>Total Listings:</strong> 12</p>
                                <p><strong>Featured Projects:</strong> 3</p>
                                --}}
                                <p><strong>Status:</strong> 
                                    @if($developer->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($developer->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </p>

                                
                            </div>
                            <div class="col-md-7">
                                <h6>📄 Company Description</h6>
                                <p>
                                    {{ $developer->company_description ?? 'No company description provided yet.' }}
                                </p>
 

                                <!-- Actions -->
                                <div class="mt-3">
                                    <a href="{{ route('admin.developers.edit', encrypt($developer->id)) }}" class="btn btn-outline-secondary">✏️ Edit</a>
                                    <a href="{{ route('admin.developers.properties', encrypt($developer->id)) }}" class="btn btn-outline-warning">📦 Listings</a>
                                    <a href="{{ route('admin.developers.projects', encrypt($developer->id)) }}" class="btn btn-outline-warning">🏗 Projects</a>
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