@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">✏️ Edit Developer Profile</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Update Developer Info</h4>
                <a href="{{ route('admin.developers.view', encrypt($developer->id)) }}" class="btn btn-sm btn-outline-dark">Back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.developers.update', encrypt($developer->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Company Name -->
                        <div class="col-md-6 mb-3">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $developer->company_name) }}" required>
                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-6 mb-3">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" value="{{ old('contact_person', $developer->contact_person) }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $developer->email) }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $developer->phone) }}">
                        </div>

                        <!-- Logo Upload -->
                        <div class="col-md-6 mb-3">
                            <label>Current Logo</label><br>
                            @if($developer->logo)
                                <img src="{{ asset($developer->logo) }}" alt="Logo" class="img-fluid mb-2" style="max-height: 100px;">
                            @else
                                <p class="text-muted">No logo uploaded</p>
                            @endif
                            <input type="file" class="form-control mt-2" name="logo" accept="image/*">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-select">
                                <option value="approved" {{ $developer->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="pending" {{ $developer->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="rejected" {{ $developer->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                            <label for="company_description">Company Description</label>
                            <textarea name="company_description" rows="4" class="form-control">{{ old('company_description', $developer->company_description) }}</textarea>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">💾 Update Developer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
