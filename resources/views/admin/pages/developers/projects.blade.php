@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold">📋 Projects by {{ $developer->company_name }}</h3>
            <a href="{{ route('admin.developers.index') }}" class="btn btn-sm btn-outline-secondary">🔙 Back to Developers</a>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-outline-primary">➕ Add New Project</a>
        </div>
    </div>

    @if ($projects->isEmpty())
        <div class="alert alert-info">No projects available for this developer.</div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Units</th>
                                <th>Price/Unit</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $index => $project)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($project->cover_image)
                                            <img src="{{ asset('storage/' . $project->cover_image) }}" width="70" class="img-thumbnail">
                                        @else
                                            <small class="text-muted">No Image</small>
                                        @endif
                                    </td>
                                    <td>{{ $project->title }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $project->status === 'completed' ? 'success' : 
                                            ($project->status === 'ongoing' ? 'primary' : 'warning') 
                                        }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $project->number_of_units ?? '-' }}</td>
                                    <td>₦{{ number_format($project->price_per_unit ?? 0) }}</td>
                                    <td>{{ $project->location ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Del</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
