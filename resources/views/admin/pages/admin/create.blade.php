@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">👤 Create Admin</h3>
        </div>
    </div>
    {{-- Flash success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
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
            <h4>Add Admin Information</h4>
        </div>
        <div class="card-body"> 
            <form action="{{ route('admin.post.admin') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <!-- Full Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div> 

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <!-- Referral Code -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Referral Code</label>
                        <input readonly type="text" name="referral_code" class="form-control" value="{{ $referralCode }}">
                        @error('referral_code') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
 
                <hr class="my-4">

                <!-- Submit -->
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">💾 Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
