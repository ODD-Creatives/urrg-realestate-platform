@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg1.jpg') }}">
    <div class="container pt-5">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">URRG Academy Events</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>URRG Academy Events</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row gy-4">
            @forelse($accademyEvents as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        @if($event->banner)
                            <img src="{{ asset($event->banner) }}" class="card-img-top" alt="{{ $event->title }}" style="height:220px; object-fit:cover;">
                        
                        @else
                            <img src="{{ asset('assets/img/default-event.jpg') }}" class="card-img-top" alt="{{ $event->title }}" style="height:220px; object-fit:cover;">
                        @endif 

                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="text-muted mb-1"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                            <p class="small">{{ Str::limit($event->description, 100) }}</p>
                            <a href="{{ route('academyEvent.details', $event->id) }}" class="btn btn-warning btn-sm mt-2">View Details</a>
                        </div>

                        
                    </div>
                </div>
            @empty
                <p class="text-center">No academy events available at the moment.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
