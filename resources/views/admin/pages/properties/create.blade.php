@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">🏠 Add New Property</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Property Information</h4>
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

                <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Developer Select -->
                        <div class="col-md-6 mb-3">
                            <label for="developer_id">Developer</label>
                            <select name="developer_id" class="form-control">
                                <option value="">-- Select Developer --</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>
                                        {{ $developer->company_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('developer_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Category -->
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                <option value="">-- Select Category --</option>
                                <option value="house" {{ old('category') == 'house' ? 'selected' : '' }}>House</option>
                                <option value="land" {{ old('category') == 'land' ? 'selected' : '' }}>Land</option>
                                <option value="apartment" {{ old('category') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                            </select>
                            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title">Property Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price">Price (₦)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        

                        <!-- Bedrooms -->
                        <div class="col-md-2 mb-3">
                            <label for="bedrooms">Bedrooms</label>
                            <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}">
                            @error('bedrooms') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Bathrooms -->
                        <div class="col-md-2 mb-3">
                            <label for="bathrooms">Bathrooms</label>
                            <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}">
                            @error('bathrooms') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Toilets -->
                        <div class="col-md-2 mb-3">
                            <label for="toilets">Toilets</label>
                            <input type="number" name="toilets" class="form-control" value="{{ old('toilets') }}">
                            @error('toilets') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Size -->
                        <div class="col-md-6 mb-3">
                            <label for="size">Size (e.g., 600sqm)</label>
                            <input type="text" name="size" class="form-control" value="{{ old('size') }}">
                            @error('size') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description">Property Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
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
                            <button type="submit" class="btn btn-success">💾 Create Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
