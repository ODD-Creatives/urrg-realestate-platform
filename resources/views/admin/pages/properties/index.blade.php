@extends('admin.layouts.app')

@section('content')
        <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">🏗️ Property / Project Listings</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                        
                                               
                    </div>
                  
                </div>
              </div>
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"> All Project </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Developer</th>
                            <th>Status</th>
                            <th>Flags</th>
                            <th>Listed On</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>1</td>
                            <td>Oakwood Villa</td>
                            <td><span class="badge bg-secondary">Property</span></td>
                            <td>Apartment</td>
                            <td>URRG Properties Ltd</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>
                                <span class="badge bg-info">Featured</span>
                                <span class="badge bg-dark">Verified</span>
                            </td>
                            <td>2024-06-01</td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('admin.developers.listings_view') }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="{{ route('admin.developers.listings_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>2</td>
                            <td>Greenstone Estate</td>
                            <td><span class="badge bg-primary">Project</span></td>
                            <td>Land</td>
                            <td>Greenstone Developers</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td><span class="badge bg-secondary">Not Verified</span></td>
                            <td>2024-06-15</td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('admin.developers.projects_view') }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="{{ route('admin.developers.projects_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                                </div>
                            </td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                        </table>
                    </div>
                </div>



            </div>
            
        </div>
@endsection 