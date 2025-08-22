@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">🎓 Academy Events</h3>
                    <div class="mt-3">
                        <a href="{{ route('admin.accademyEvents.create') }}" class="btn btn-sm btn-warning">+ Upload New Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h4 class="mb-0">Events</h4>
            </div>

            <div class="card-body table-responsive">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Banner</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $key => $event)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') }}</td>
                            <td>
                                <img src="{{ asset($event->banner) }}" width="80" class="rounded" />
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.accademyEvents.show', $event->id) }}" class="btn btn-sm btn-outline-warning">View</a>
                                    <a href="{{ route('admin.accademyEvents.edit', $event->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('admin.accademyEvents.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($events->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">No events found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
