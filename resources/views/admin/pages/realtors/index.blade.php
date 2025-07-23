@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Realtor's </h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">👥 All Realtors</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>Grace Johnson</td>
                        <td>grace@example.com</td>
                        <td>+234 801 234 5678</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>2024-06-01</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.realtors.view') }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="#" class="btn btn-sm btn-outline-warning">Suspend</a>
                                <a href="{{ route('admin.realtors.referral') }}" class="btn btn-sm btn-outline-primary">Referrals</a>
                                <a href="{{ route('admin.realtors.commission') }}" class="btn btn-sm btn-outline-success">Commissions</a>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Ahmed Musa</td>
                        <td>ahmed@example.com</td>
                        <td>+234 802 456 7890</td>
                        <td><span class="badge bg-secondary">Suspended</span></td>
                        <td>2024-05-22</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.realtors.view') }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="#" class="btn btn-sm btn-outline-success">Activate</a>
                                <a href="{{ route('admin.realtors.referral') }}" class="btn btn-sm btn-outline-primary">Referrals</a>
                                <a href="{{ route('admin.realtors.commission') }}" class="btn btn-sm btn-outline-success">Commissions</a>
                            </div>
                        </td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
        
    </div>
@endsection 