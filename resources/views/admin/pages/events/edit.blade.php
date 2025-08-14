@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">✏️ Edit Event - {{ $event->title }}</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h4>Update Event Information</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please fix the errors below.
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <!-- Existing Images -->
                <div class="col-md-12">
                    <h5>📸 Existing Images</h5>
                    <div class="row">
                        @forelse ($event->images as $image)
                            <div class="col-md-3 mb-3 text-center">
                                <img src="{{ asset($image->image_path) }}" class="img-fluid rounded shadow-sm mb-2" style="height:120px; object-fit:cover;">
                                <form action="{{ route('admin.events.deleteImage', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted">No images uploaded yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6 mb-3">
                        <label>Event Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                    </div>

                    <!-- Date -->
                    <div class="col-md-6 mb-3">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date) }}" required>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="past" {{ old('status', $event->status) == 'past' ? 'selected' : '' }}>Past</option>
                            <option value="upcoming" {{ old('status', $event->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $event->description) }}</textarea>
                    </div>

                    <!-- Upload New Images -->
                    <div class="col-md-12 mb-3">
                        <label>Upload New Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                        <small class="text-muted">You can upload more images (up to 20 total)</small>
                    </div>

                    

                    <!-- Submit -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">💾 Update Event</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
