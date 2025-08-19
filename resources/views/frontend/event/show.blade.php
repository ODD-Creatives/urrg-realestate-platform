@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $event->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>{{ $event->title }}</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($event->images->count())
                    <div class="row mb-3">
                        @foreach($event->images as $img)
                            <div class="col-md-4 mb-2">
                                <img src="{{ asset($img->image_path) }}" class="img-fluid rounded shadow-sm" alt="Event Image">
                            </div>
                        @endforeach
                    </div>
                @endif

                
            </div>

            <div class="col-lg-4">
                <div class="card p-3">
                    <h4>Description</h4>
                    <p>{{ $event->description }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</p>
                    @if($event->location)
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                    @endif
                    <p><strong>Status:</strong> {{ ucfirst($event->status) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
