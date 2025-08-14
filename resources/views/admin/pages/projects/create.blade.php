@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">🏗️ Add New Project</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Project Details</h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Fix the following:
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Developer -->
                        <div class="col-md-6 mb-3">
                            <label for="developer_id">Developer</label>
                            <select name="developer_id" class="form-control" required>
                                <option value="">-- Select Developer --</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>
                                        {{ $developer->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title">Project Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control " required>
                                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Units -->
                        <div class="col-md-4 mb-3">
                            <label for="number_of_units">Number of Units</label>
                            <input type="number" name="number_of_units" class="form-control" value="{{ old('number_of_units') }}">
                        </div>

                        <!-- Price Per Unit -->
                        <div class="col-md-4 mb-3">
                            <label for="price_per_unit">Price Per Unit (₦)</label>
                            <input type="number" name="price_per_unit" class="form-control" value="{{ old('price_per_unit') }}">
                        </div>

                        <!-- Cover Image -->
                        <div class="col-md-4 mb-3">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>

                        <!-- Documents -->
                        <div class="col-md-6 mb-3">
                            <label for="documents_path">Project Documents</label>
                            <input type="file" name="documents_path" class="form-control">
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                            <label for="description">Project Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Submit -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">💾 Create Project</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
