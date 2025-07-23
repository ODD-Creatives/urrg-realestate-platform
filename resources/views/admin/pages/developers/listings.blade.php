@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Developer's Listings</h3>
                    <h5 class="font-weight-bold">🏠 Manage Listings – URRG Properties Ltd</h5>
                    <a href="{{ route('admin.developers.listings_add') }}" class="btn btn-sm btn-warning">+ Add New Listing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Project Listings</h4>
                    <a href="{{ route('admin.developers.view') }}" class="btn btn-sm btn-outline-dark">Back</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Property Title</th>
                        <th>Category</th>
                        <th>Flags</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Listed On</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>Oakwood Villa</td>
                        <td>Apartment</td>
                        <td><span class="badge bg-info">Featured</span></td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>₦25,000,000</td>
                        <td>2024-06-01</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('admin.developers.listings_view') }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('admin.developers.listings_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Green Estate Plot B</td>
                        <td>Land</td>
                        <td><span class="badge bg-secondary">Standard</span></td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>₦25,000,000</td>
                        <td>2024-06-10</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('admin.developers.listings_view') }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('admin.developers.listings_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                            </div>
                        </td>
                        </tr>
                        <!-- More properties -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 