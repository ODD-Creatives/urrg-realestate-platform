@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">👥 Team Leads</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.teamLeads.create') }}" class="btn btn-primary">➕ Add Team Lead</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Full Name</th>
                            <th>Post</th>
                            <th>Added On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teamLeads as $lead)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($lead->picture)
                                        <img src="{{ asset($lead->picture) }}" alt="Profile" style="height:50px;width:50px;object-fit:cover;" class="rounded-circle">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $lead->fullname }}</td>
                                <td>{{ $lead->post }}</td>
                                <td>{{ $lead->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.teamLeads.edit', $lead->id) }}" class="btn btn-sm btn-warning">✏ Edit</a>
                                    <form action="{{ route('admin.teamLeads.destroy', $lead->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No team leads added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
