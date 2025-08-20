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
                                <!-- Property Image -->
                                <div class="mb-4">
                                    @if($project->cover_image)
                                        <img src="{{ asset('storage/'.$project->cover_image) }}" class="img-fluid w-100 rounded" alt="{{ $project->title }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                               
                                <h3 class="fw-bold mb-2">{{ $project->title }}</h3>
                                <p class="text-muted mb-3">{{ $project->description }}</p>

                                <!-- Property Details Grid -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="border p-3 rounded">
                                            <h6 class="text-muted mb-1">Location</h6>
                                            <p class="mb-0">{{ $project->location }}</p>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="border p-3 rounded">
                                            <h6 class="text-muted mb-1">Status</h6>
                                            <p class="mb-0">{{ ucfirst($project->status) }}</p>
                                        </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                        <div class="border p-3 rounded">
                                            <h6 class="text-muted mb-1">Plot(s)</h6>
                                            @if($project->number_of_units)
                                                <p > {{ $project->number_of_units }} Plot(s)</p>
                                            @endif
                                        </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                        <div class="border p-3 rounded">
                                            <h6 class="text-muted mb-1">Price Per Plot:</h6>
                                            @if($project->price_per_unit)
                                                <p> ₦{{ number_format($project->price_per_unit, 2) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <a href="{{ url('/user/projects') }}" class="btn btn-secondary">
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