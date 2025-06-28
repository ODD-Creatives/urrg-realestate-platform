@extends('layouts.app')

@section('title', 'Sign Up - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 mt-5">
            <div class="th-card shadow p-4 p-md-5">
                <h4 class="text-center mb-4">Create Your Account</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">I agree to the <a href="{{ url('service') }}">Terms & Conditions</a></label>
                        @error('terms')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="th-btn bg-black pill w-100">Sign Up</button>
                </form>
                <p class="text-center mt-3">Already have an account? <a href="{{ route('signin') }}">Sign In</a></p>
            </div>
        </div>
    </div>
</div>
@endsection