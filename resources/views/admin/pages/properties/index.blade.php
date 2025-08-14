@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">🌍 All Property Listings</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Properties</h4>
                <a href="{{ route('admin.properties.create') }}" class="btn btn-sm btn-success">+ Add New Property</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Developer</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Price (₦)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $index => $property)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->developer->company_name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($property->category) }}</td>
                                <td>{{ $property->location }}</td>
                                <td>{{ number_format($property->price, 2) }}</td>
                                
                                <td>
                                    <span class="badge bg-{{ $property->status === 'approved' ? 'success' : ($property->status === 'sold' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($properties->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No properties found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
