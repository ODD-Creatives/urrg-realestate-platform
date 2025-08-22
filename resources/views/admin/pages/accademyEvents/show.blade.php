@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Academy Events</h3>
                    <h6 class="font-weight-normal mb-0">🎓 Event Details – {{ $event->title }} </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Event Details</h4>
                <div>
                    <a href="{{ route('admin.accademyEvents.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                </div>
            </div>

            <div class="card-body">
                <!-- Event Meta Info -->
                <div class="row mb-4">
                    <!-- Event Banner -->
                    <div class="col-md-6">
                        <div class="mb-4 text-center">
                            <img src="{{ asset($event->banner) }}" class="img-fluid rounded shadow-sm" style="max-height: 350px;" alt="Event Banner">
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="col-md-6">
                        <div class="mb-4">
                            <h6>📝 Event Description</h6>
                            <p>{{ $event->description }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p><strong>📅 Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                    </div>
                    
                    <div class="col-md-6">
                        <a href="{{ route('admin.accademyEvents.edit', $event->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('admin.accademyEvents.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
