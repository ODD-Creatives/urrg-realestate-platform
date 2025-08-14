@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Developer's </h3>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">🏗️ All Developers</h4>
                <div class="btn-group">
                    <a href="#" class="btn btn-sm btn-outline-primary">Approved ({{ $developers->where('status', 'approved')->count() }})</a>
                    <a href="#" class="btn btn-sm btn-outline-warning">Pending ({{ $developers->where('status', 'pending')->count() }})</a>
                    <a href="#" class="btn btn-sm btn-outline-danger">Rejected ({{ $developers->where('status', 'rejected')->count() }})</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Developer ID</th>
                            <th>Company Name</th>
                            <th>Company Logo</th>
                            <th>Email</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Verified</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($developers as $key => $developer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $developer->developer_id }}</td>
                            <td>{{ $developer->company_name }}</td>
                            <td><img src="{{ asset($developer->logo) }}" alt="Developer Logo" class="img-fluid" style="max-height: 120px;"></td>
                            <td>{{ $developer->email }}</td>
                            <td>{{ $developer->contact_person }}</td>
                            <td>{{ $developer->phone }}</td>
                            <td>
                                @if($developer->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($developer->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $developer->email_verified_at ? 'success' : 'secondary' }}">
                                    {{ $developer->email_verified_at ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>{{ $developer->created_at->format('M d, Y')  }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.developers.view', encrypt($developer->id) ) }}" class="btn btn-sm btn-outline-warning">View</a>
                                    @if($developer->status != 'approved')
                                        <a href="{{ route('admin.developers.edit', encrypt($developer->id)) }}" class="btn btn-sm btn-outline-success">Approve</a>
                                    @endif
                                    @if($developer->status != 'rejected')
                                        <a href="{{ route('admin.developers.edit', encrypt($developer->id)) }}" class="btn btn-sm btn-outline-danger">Reject</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection