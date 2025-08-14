@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">🏘️ Properties by {{ $developer->company_name }}</h3>
            <p class="text-muted">All properties uploaded under this developer's profile.</p>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Developer Properties</h4>
                <a href="{{ route('admin.properties.create') }}" class="btn btn-sm btn-success">+ Add New Property</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Price (₦)</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($properties as $index => $property)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ ucfirst($property->category) }}</td>
                                <td>{{ number_format($property->price, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $property->status === 'approved' ? 'success' : ($property->status === 'sold' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </td>
                                <td>{{ $property->location }}</td>
                                <td>{{ $property->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No properties found for this developer.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
