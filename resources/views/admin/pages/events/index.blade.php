@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">📅 Events</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">➕ Add Event</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $event->status == 'past' ? 'danger' : 'success' }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td>{{ $event->images_count }}</td>
                            <td>
                                <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this event?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No events found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
