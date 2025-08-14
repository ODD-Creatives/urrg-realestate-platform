@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">📅 Event Details</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </div>

    <div class="card p-4">
        <h4>{{ $event->title }}</h4>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}</p>
        <p><strong>Status:</strong> <span class="badge bg-{{ $event->status == 'past' ? 'danger' : 'success' }}">{{ ucfirst($event->status) }}</span></p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Description:</strong> {!! nl2br(e($event->description)) !!}</p>

        <hr>
        <h5>📸 Event Images</h5>
        <div class="row">
            @forelse ($event->images as $image)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset($image->image_path) }}" class="img-fluid rounded shadow-sm">
                </div>
            @empty
                <p>No images uploaded for this event.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
