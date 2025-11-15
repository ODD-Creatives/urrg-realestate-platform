@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold">🏗️ Developer Projects</h3>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary mt-2">➕ Add New Project</a>
        </div>
    </div> 

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="card">
            <div class="card-body">
                @if ($projects->isEmpty())
                    <p>No projects found.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Developer</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Units</th>
                                    <th>Price/Unit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $index => $project)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td> 
                                            @if($project->cover_image)
                                                <img src="{{ asset($project->cover_image) }}" alt="Cover" width="80" class="img-thumbnail"/>
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->developer->company_name ?? 'N/A' }}</td>
                                        <td>{{ $project->location ?? 'N/A' }}</td>
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
                                        <td>
                                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
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
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
