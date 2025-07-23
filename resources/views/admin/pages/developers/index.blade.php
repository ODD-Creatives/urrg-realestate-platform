@extends('admin.layouts.app')
@section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Developer's </h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">🏗️ All Developers</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Verified</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>URRG Properties Ltd</td>
                                    <td>urrg@example.com</td>
                                    <td>+234 809 123 4567</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td><span class="badge bg-secondary">No</span></td>
                                    <td>2024-05-10</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('admin.developers.view') }}" class="btn btn-sm btn-outline-warning">View</a>
                                        <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Greenstone Estates</td>
                                    <td>greenstone@real.com</td>
                                    <td>+234 802 555 7890</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td><span class="badge bg-success">Yes</span></td>
                                    <td>2024-04-25</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('admin.developers.view') }}" class="btn btn-sm btn-outline-warning">View</a>
                                        <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection 