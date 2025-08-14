@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">➕ Add New Property</h4>
                <a href="{{ route('admin.properties.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label>Property Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Luxury 4-Bedroom Duplex" required>
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label>Price (₦)</label>
                            <input type="number" name="price" class="form-control" placeholder="50000000" required>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6 mb-3">
                            <label>Property Type</label>
                            <select name="type" class="form-select" required>
                                <option value="">-- Select Type --</option>
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="land">Land</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select" required>
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>

                        <!-- Location -->
                        <div class="col-12 mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Lekki Phase 1, Lagos" required>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Detailed description..." required></textarea>
                        </div>

                        <!-- Images Upload -->
                        <div class="col-12 mb-3">
                            <label>Upload Images (Max: 5)</label>
                            <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
                            <small class="text-muted">You can upload up to 5 images.</small>
                        </div>

                        <!-- Developer ID -->
                        <div class="col-12 mb-3">
                            <label>Developer</label>
                            <select name="developer_id" class="form-select" required>
                                <option value="">-- Select Developer --</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}">{{ $developer->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">💾 Save Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
