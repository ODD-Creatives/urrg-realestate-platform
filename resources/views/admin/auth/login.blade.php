@extends('admin.auth.app')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <img src="{{ asset('assets/img/urrglogo1.png') }}" alt="logo">
            </div>
            <h4>Welcome Admin! let's Pick up.</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                </div>
                <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="mt-3 d-grid gap-2">
                <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2  align-items-center">
                    @if($errors->any())
                        <p class="text-danger text-center" >{{ $errors->first() }}</p>
                    @endif
                </div>
                
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection 

