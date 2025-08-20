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
                        
                        @forelse ($projects as $project)
                        <div class="col-sm-4 stretch-card">
                            <div class="card">
                                <div class="card-body p-0">
                                    @if($project->cover_image)
                                        <img src="{{ asset('storage/'.$project->cover_image) }}" class="img-fluid w-100" alt="{{ $project->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/default.jpg') }}" class="img-fluid w-100" alt="Default">
                                    @endif
                                </div>
                                <div class="card-body px-3 text-dark">
                                <h5 class="fw-semibold">{{ $project->title }}</h5>
                                <p class="text-muted font-13 mb-0">{{ Str::limit($project->description, 80) }}</p>
                                <p class="text-muted font-13 mb-0">{{ $project->location }}</p>
                                @if($project->price_per_unit)
                                    <p class="text-muted font-13 mb-0"> ₦{{ number_format($project->price_per_unit, 2) }} (Per Plot)</p>
                                @endif
                                <a href="{{ route('user.projectDetail', $project->id) }}" class="text-primary font-13">View Properties</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p class="text-center">No projects available at the moment.</p>
                        @endforelse
                        
                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection