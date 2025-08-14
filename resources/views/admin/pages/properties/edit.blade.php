@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">✏️ Edit Property - {{ $property->title }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Property Information</h4>
            </div>

            <div class="card-body">
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Developer Select -->
                        <div class="col-md-6 mb-3">
                            <label for="developer_id">Developer</label>
                            <input type="text" class="form-control" value="{{ $property->developer->company_name }}" readonly>
                            <input type="hidden" name="developer_id" value="{{ $property->developer_id }}">
                        </div>

                        <!-- Category -->
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" value="{{ ucfirst($property->category) }}" readonly>
                            <input type="hidden" name="category" value="{{ $property->category }}">
                        </div>

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title">Property Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $property->title) }}">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location', $property->location) }}">
                            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price">Price (₦)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $property->price) }}">
                            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Bedrooms -->
                        <div class="col-md-2 mb-3">
                            <label for="bedrooms">Bedrooms</label>
                            <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $property->bedrooms) }}">
                            @error('bedrooms') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Bathrooms -->
                        <div class="col-md-2 mb-3">
                            <label for="bathrooms">Bathrooms</label>
                            <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $property->bathrooms) }}">
                            @error('bathrooms') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Toilets -->
                        <div class="col-md-2 mb-3">
                            <label for="toilets">Toilets</label>
                            <input type="number" name="toilets" class="form-control" value="{{ old('toilets', $property->toilets) }}">
                            @error('toilets') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Size -->
                        <div class="col-md-6 mb-3">
                            <label for="size">Size (e.g., 600sqm)</label>
                            <input type="text" name="size" class="form-control" value="{{ old('size', $property->size) }}">
                            @error('size') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $property->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $property->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $property->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="sold" {{ $property->status === 'sold' ? 'selected' : '' }}>Sold</option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description">Property Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $property->description) }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Image Uploads -->
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="col-md-4 mb-3">
                                <label for="image{{ $i }}">Image {{ $i }}</label>
                                <input type="file" name="image{{ $i }}" class="form-control">
                                @error('image' . $i) <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        @endfor

                        <!-- Submit -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">💾 Update Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
