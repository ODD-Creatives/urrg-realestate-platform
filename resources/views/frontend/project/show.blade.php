@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $project->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>{{ $project->title }}</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                @if($project->cover_image)
                    <img src="{{ asset('storage/'.$project->cover_image) }}" class="img-fluid mb-3" alt="{{ $project->title }}">
                @endif

                <h4>Description</h4>
                <p>{{ $project->description }}</p>
            </div>

            <div class="col-lg-5">
                <div class="shadow p-3">
                    <h4 class="box-title">
                        <a href="{{ route('project.details', $project->id) }}">{{ $project->title }}</a>
                    </h4>
                    <p><strong>Location:</strong> {{ $project->location }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                    @if($project->number_of_units)
                        <p><strong>Plot(s):</strong> {{ $project->number_of_units }}</p>
                    @endif
                    @if($project->price_per_unit)
                        <p><strong>Price/Plot:</strong> ₦{{ number_format($project->price_per_unit, 2) }}</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
