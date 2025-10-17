@extends('layouts.app')

@section('title', 'Sign In - Unique Radiance Realtors Group')

@section('content')
<div class="container pt-5">
    @if(session('whatsapp_link'))
        <script>
            window.onload = function() {
                window.open('{{ session('whatsapp_link') }}', '_blank');
            };
        </script>
    @endif

    <br/> <br/> 
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 mt-5">
            <div class="th-card shadow p-4 p-md-5">
                <h4 class="text-center mb-4">Sign In to Your Account</h4>
                
                @if(session('success'))
                    <div class="alert alert-success pt-3">
                        {{ session('success') }}
                        @if(session('whatsapp_link'))
                            <br>
                            <a href="{{ session('whatsapp_link') }}" target="_blank" class="btn btn-primary mt-2">
                                Join our WhatsApp group
                            </a>
                        @endif
                    </div>
                @endif 

                @if(session('error'))
                    <div class="alert alert-danger pt-3">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Unverified User Alert -->
                @if(session('unverified_user') || $errors->has('email') && str_contains($errors->first('email'), 'not been verified'))
                    <div class="alert alert-warning">
                        <h5>📧 Email Verification Required</h5>
                        <p class="mb-2">Your account has not been verified yet. Please check your email for the verification link.</p>
                        
                        @if(session('unverified_email'))
                        <form method="POST" action="{{ route('login.resend-verification') }}" class="mt-3">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('unverified_email') ?? old('email') }}">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    📧 Resend Verification Email
                                </button>
                            </div>
                            <small class="text-muted">Click to receive a new verification link</small>
                        </form>
                        @else
                        <p class="mb-0">
                            <a href="{{ route('verification.resend-form', ['email' => old('email')]) }}" class="btn btn-warning btn-sm">
                                📧 Request New Verification Link
                            </a>
                        </p>
                        @endif
                    </div>
                @endif

                <form action="{{ route('signin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="th-btn bg-black pill w-100">Sign In</button>
                </form>
                
                <p class="text-center mt-3">Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
                <p class="text-center">
                    <a href="{{ route('password.request') }}">Forgot Password?</a> | 
                    <a href="{{ route('verification.resend-form') }}">Resend Verification Email</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection