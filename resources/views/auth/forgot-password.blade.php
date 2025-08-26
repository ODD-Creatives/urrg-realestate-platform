@extends('layouts.app')

@section('title', 'Forgot Password - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5">
    <br/>
    <div class="row justify-content-center">
        <br/>
        <div class="col-lg-5 col-md-6 mt-5">
            <div class="th-card shadow p-4 p-md-5">
                <h4 class="text-center mb-4">Forgot Your Password?</h4>
                <p class="text-center text-muted mb-4">Enter your email and we’ll send you a reset link.</p>
 
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="th-btn bg-black pill w-100">Send Reset Link</button>
                </form>

                <p class="text-center mt-3">
                    <a href="{{ route('signin') }}">← Back to Sign In</a>
                </p>
            </div>
        </div>
        <br/>
    </div>
    <br/>
</div>
@endsection
