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
        <div class="container my-5" id="bank-info">
            <h2 class="mb-4"><i class="bi bi-bank"></i> Payment Information</h2>

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Bank Name</th>
                                <td>First Bank</td>
                            </tr>
                            <tr>
                                <th scope="row">Account Name</th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th scope="row">Account Number</th>
                                <td>****5678</td>
                            </tr>
                            <tr>
                                <th scope="row">Payment Method</th>
                                <td>Bank Transfer</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBankModal">
                        <i class="bi bi-pencil"></i> Edit Payment Info
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editBankModal" tabindex="-1" aria-labelledby="editBankModalLabel" aria-hidden="true">
            <div class="modal-dialog moda">
                <div class="modal-content">
                <form>
                    <div class="modal-header">
                    <h5 class="modal-title" id="editBankModalLabel">
                        <i class="bi bi-pencil"></i> Edit Bank / Payment Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-control" value="First Bank">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Account Name</label>
                        <input type="text" class="form-control" value="John Doe">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-control" value="0123456789">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Preferred Payment Method</label>
                        <select class="form-select">
                            <option selected>Bank Transfer</option>
                            <option>PayPal</option>
                            <option>Cheque</option>
                        </select>
                        </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    </div>
                </form>
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