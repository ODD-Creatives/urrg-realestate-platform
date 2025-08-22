@extends('admin.layouts.app')
@section('content')
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Event</h4>
        <a href="{{ route('admin.accademyEvents.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.accademyEvents.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
            <label for="title">Event Title</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
            <label for="event_date">Event Date</label>
            <input type="date" name="event_date" value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d')) }}" class="form-control" required>
            </div>

            <div class="col-12 mb-3">
            <label>Current Banner</label><br>
            <img src="{{ asset($event->banner) }}" alt="Banner" class="img-fluid mb-2" style="max-height: 150px;">
            </div>

            <div class="col-12 mb-3">
            <label for="banner">Change Banner (optional)</label>
            <input type="file" name="banner" class="form-control">
            </div>

            <div class="col-12 mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="col-12 text-end">
            <button type="submit" class="btn btn-success">💾 Update Event</button>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection
