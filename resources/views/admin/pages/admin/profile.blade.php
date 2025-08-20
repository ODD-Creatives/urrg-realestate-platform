@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">👤 Profile Settings</h3>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! Please fix the following issues:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Update Profile Information</h4>
        </div>
        <div class="card-body"> 
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <!-- Full Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $adminUser->name ?? '' }}" required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $adminUser->phone ?? '' }}">
                    </div>

                    <!-- Profile Photo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" name="profile_photo" class="form-control">
                        @if($adminUser->profile_photo)
                            <img src="{{ asset('storage/' . $adminUser->profile_photo) }}" class="mt-2 rounded-circle" width="100" height="100" alt="Profile Photo">
                        @endif
                    </div>
                </div>

                <hr class="my-4">

                <!-- Bank Details Section -->
                <h5 class="mb-3">🏦 Bank Details</h5>
                <div class="row">
                    <!-- Bank Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" value="{{ $adminUser->account_name ?? '' }}" required>
                            
                        </select>
                    </div>

                    <!-- Account Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Account Name</label>
                        <input type="text" name="account_name" class="form-control" value="{{ $adminUser->account_name ?? '' }}" required>
                    </div>

                    <!-- Account Number -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Account Number</label>
                        <input type="text" name="account_number" class="form-control" value="{{ $adminUser->account_number ?? '' }}" required>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">💾 Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
