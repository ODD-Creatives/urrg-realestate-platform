@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Developer Projects</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Projects</li>
            </ul>
        </div>
    </div> 
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row gy-4">
            @forelse ($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="popular-list-1 grid-style">
                        <div class="thumb-wrapper">
                            @if($project->cover_image)
                                <img src="{{ asset('$project->cover_image') }}" class="img-fluid" alt="{{ $project->title }}">
                                

                            @else
                                <img src="{{ asset('assets/img/default.jpg') }}" class="img-fluid" alt="Default">
                            @endif
                        </div>
                        <div class="property-content px-3">
                            <h3 class="box-title">
                                <a href="{{ route('project.details', $project->id) }}">{{ $project->title }}</a>
                            </h3>
                            <p>{{ Str::limit($project->description, 80) }}</p>
                            <p><strong>Location:</strong> {{ $project->location }}</p>
                            @if($project->price_per_unit)
                                <p><strong>Price/Plot:</strong> ₦{{ number_format($project->price_per_unit, 2) }}</p>
                            @endif
                            <a class="th-btn sm style3 pill" href="{{ route('project.details', $project->id) }}">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No projects available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
</section>
@endsection
