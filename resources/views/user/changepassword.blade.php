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
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
      }
    </style>
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> My Profile </h3>
        </div>
        <!-- Personal Information -->
        <div class="container my-5" id="change-password">
            <h2 class="mb-4"><i class="bi bi-lock"></i> My Profile - Change Password</h2>

            <div class="card">
                <div class="card-body">
                <p class="mb-3">
                    For your account security, we recommend updating your password regularly. <br> 
                    Click the button below to change your password.
                </p>
                <div class="">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                    <i class="bi bi-shield-lock"></i> Change Password
                    </button>
                </div>
                </div>
            </div>
            </div>

    </div>
    <!-- Edit Personal Information Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h5 class="modal-title" id="changePasswordModalLabel">
                <i class="bi bi-shield-lock"></i> Change Password
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" placeholder="Enter current password">
              </div>
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" placeholder="Enter new password">
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" placeholder="Re-enter new password">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Update Password
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection