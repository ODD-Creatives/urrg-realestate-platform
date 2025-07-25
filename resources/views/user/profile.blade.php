@extends('user.partials.home')

@section('content')
    <style>
      .table td, .table th {
        vertical-align: middle;
      }
      .card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .card-body {
        padding: 2rem;
      }
      .btn-primary {
        transition: background-color 0.3s, box-shadow 0.3s;
      }
      .btn-primary:hover {
        box-shadow: 0 4px 15px rgba(255, 208, 0, 0.59);
      }
    </style>
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> My Profile </h3>
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Error Message -->
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Personal Information -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Personal Information</h4>
                        </div>
                        <div class="row">
                           <div class="col-md-3 text-center">
                            <!-- Profile Picture -->
                            <img src="{{ auth()->user()->avatar ? asset('storage/avatars/'.auth()->user()->avatar) : asset('assets/user/assets/images/faces/face1.jpg') }}" 
                                class="rounded-circle img-fluid mb-2" 
                                alt="Profile Photo" 
                                style="width: 120px; height: 120px; object-fit: cover;">
                            
                                {{-- <div><small class="text-muted">Profile Photo</small></div> --}}
                                
                                <!-- Avatar Upload Form -->
                                <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data" class="mb-3">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" name="avatar" class="form-control d-none" id="avatarUpload" accept="image/*">
                                        <label for="avatarUpload" class="btn btn-primary w-100">
                                            <i class="mdi mdi-camera"></i> Change Photo
                                        </label>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById('avatarUpload').addEventListener('change', function() {
                                        this.form.submit();
                                    });
                                </script>
                                
                                <!-- Edit Information Button -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPersonalModal">
                                    <i class="mdi mdi-pencil"></i> Edit Information
                                </button>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td>{{ auth()->user()->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email Address</th>
                                            <td>{{ auth()->user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone Number</th>
                                            <td>{{ auth()->user()->phone ?? 'Not provided' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date of Birth</th>
                                            <td>{{ auth()->user()->dob ? \Carbon\Carbon::parse(auth()->user()->dob)->format('jS \o\f F, Y') : 'Not provided' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{ auth()->user()->address ?? 'Not provided' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Personal Information Modal -->
    <div class="modal fade" id="editPersonalModal" tabindex="-1" aria-labelledby="editPersonalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.update.personal') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPersonalModalLabel">Edit Personal Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" value="{{ auth()->user()->firstname }}">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" value="{{ auth()->user()->lastname }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ auth()->user()->dob ? \Carbon\Carbon::parse(auth()->user()->dob)->format('Y-m-d') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ auth()->user()->address }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
