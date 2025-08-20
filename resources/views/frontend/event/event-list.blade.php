@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg')}}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Our Events</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Events</li>
            </ul>
        </div>
    </div> 
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row gy-4">
            @forelse ($events as $event)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="popular-list-2 grid-style">
                        <div class="thumb-wrapper">
                            @if($event->images->first())
                                <img src="{{ asset($event->images->first()->image_path) }}" class="img-fluid" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('assets/img/default.jpg') }}" class="img-fluid" alt="Default">
                            @endif
                        </div>
                        <div class="property-content px-3 py-3">
                            <h3 class="box-title">
                                <a href="{{ route('event.details', $event->id) }}">{{ $event->title }}</a>
                            </h3>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                            @if($event->location)
                                <p><strong>Location:</strong> {{ $event->location }}</p>
                            @endif
                            @if($event->status)
                                <p>
                                    <strong>Status:</strong>
                                    @if($event->status == 'past')
                                        <span class="th-btn sm pill bg-danger text-white px-3 py-2">
                                            ⏳ Past
                                        </span>
                                    @elseif($event->status == 'upcoming')
                                        <span class=" th-btn sm pill bg-success text-white px-3 py-2">
                                            📅 Upcoming
                                        </span>
                                    @else
                                        {{ ucfirst($event->status) }} 
                                    @endif
                                </p>
                            @endif

                            <p>{{ Str::limit($event->description, 80) }}</p>
                            <a class="th-btn sm style3 pill" href="{{ route('event.details', $event->id) }}">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No events available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
</section>
@endsection
