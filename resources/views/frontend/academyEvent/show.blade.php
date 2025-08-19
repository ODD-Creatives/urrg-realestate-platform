@extends('layouts.app')

@section('content')
    
    <div class="breadcumb-wrapper" data-bg-src="{{asset('assets/img/blog/breadcrumb-bg.jpg1')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Academy Event Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Event Details</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-lg-6">
                    <div class="th-blog blog-single">
                        <div class="blog-img">

                         @if($event->banner)
                            <img src="{{ asset('storage/'. $event->banner) }}" class="card-img-top" alt="{{ $event->title }}" >
                        
                        @else
                            <img src="{{ asset('assets/img/default-event.jpg') }}" class="card-img-top" alt="{{ $event->title }}">
                        @endif 
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-xxl-6 col-lg-6">
                    <div class="th-blog blog-single">
                        <div class="blog-content">
                            <h2 class="blog-title">{{ $event->title }}</h2>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</a> <a
                                        href="blog.html"><i class="fa-regular fa-tag"></i>URRG Academy</a>
                                </div>
                            </div>
                            <p>{{  $event->description  }}</p>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    
    
    
@endsection