@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">📅 Add New Event</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Event Information</h4>
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

                <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label>Event Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <label>Event Date</label>
                            <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}" required>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">-- Select Status --</option>
                                <option value="past" {{ old('status') == 'past' ? 'selected' : '' }}>Past</option>
                                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Multiple Images -->
                        <div class="col-md-12 mb-3">
                            <label>Upload Images (Multiple)</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <small class="text-muted">You can upload up to 20 images</small>
                        </div>

                        <!-- Submit -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">💾 Save Event</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
