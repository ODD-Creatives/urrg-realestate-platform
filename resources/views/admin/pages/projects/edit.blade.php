@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">✏️ Edit Project - {{ $project->title }}</h3>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-dark">🔙 Back to Projects</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h4>Update Project Information</h4>
        </div>

        <div class="card-body">
            <!-- Validation Errors -->
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

            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Developer -->
                    <div class="col-md-6 mb-3">
                        <label for="developer_id">Developer</label>
                        <input type="text" class="form-control" value="{{ $project->developer->company_name }}" readonly>
                        <input type="hidden" name="developer_id" value="{{ $project->developer_id }}">
                    </div>

                    <!-- Title -->
                    <div class="col-md-6 mb-3">
                        <label for="title">Project Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}">
                        @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-select">
                            <option value="upcoming" {{ $project->status === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ $project->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Number of Units -->
                    <div class="col-md-4 mb-3">
                        <label for="number_of_units">Number of Units</label>
                        <input type="number" name="number_of_units" class="form-control" value="{{ old('number_of_units', $project->number_of_units) }}">
                        @error('number_of_units') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Price Per Unit -->
                    <div class="col-md-4 mb-3">
                        <label for="price_per_unit">Price Per Unit (₦)</label>
                        <input type="number" name="price_per_unit" class="form-control" value="{{ old('price_per_unit', $project->price_per_unit) }}">
                        @error('price_per_unit') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Cover Image -->
                    <div class="col-md-4 mb-3">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control">
                        @if ($project->cover_image)
                            <img src="{{ asset($project->cover_image) }}" class="img-fluid rounded mt-2" style="height: 80px;">
                        @endif
                        @error('cover_image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Project Document -->
                    <div class="col-md-6 mb-3">
                        <label for="documents_path">Project Document (PDF, DOC)</label>
                        <input type="file" name="documents_path" class="form-control">
                        @if ($project->documents_path)
                            <a href="{{ asset('storage/' . $project->documents_path) }}" class="btn btn-sm btn-outline-info mt-2" target="_blank">
                                📎 View Existing Document
                            </a>
                        @endif
                        @error('documents_path') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label for="description">Project Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $project->description) }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">💾 Update Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
