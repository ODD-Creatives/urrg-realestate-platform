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
                    <img src="{{ asset('assets/user/assets/images/faces/face1.jpg')}}" class="rounded-circle img-fluid mb-2" alt="Profile Photo" style="width: 120px; height: 120px;">
                    <div><small class="text-muted">Profile Photo</small></div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPersonalModal">
                        <i class="mdi mdi-pencil"></i> Edit Information
                    </button>
                    </div>
                    <div class="col-md-9">
                    <table class="table table-borderless mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Full Name</th>
                            <td>Antonio Olson</td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address</th>
                            <td>antonio.olson@example.com</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>+1234567890</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Birth</th>
                            <td>1990-01-01</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>123 Main Street, City</td>
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
          <div class="modal-header">
            <h5 class="modal-title" id="editPersonalModalLabel">Edit Personal Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" value="Antonio Olson">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" value="antonio.olson@example.com">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" value="+1234567890">
              </div>
              <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" value="1990-01-01">
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" value="123 Main Street, City">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
@endsection