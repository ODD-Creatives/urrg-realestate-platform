@extends('layouts.app')

@section('title', 'Reset Password - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 mt-5">
            <div class="th-card shadow p-4 p-md-5">
                <h4 class="text-center mb-4">Reset Your Password</h4>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ request('email') }}" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm New Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="th-btn bg-black pill w-100">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
