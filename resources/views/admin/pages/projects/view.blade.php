@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">📌 Project Details</h3>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-dark">🔙 Back to Projects</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h4 class="mb-0">{{ $project->title }}</h4>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <!-- Cover Image -->
                <div class="col-md-4">
                    @if ($project->cover_image)
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="img-fluid rounded shadow" alt="Project Cover Image">
                    @else
                        <div class="alert alert-warning">No cover image available.</div>
                    @endif
                </div>

                <!-- Project Info -->
                <div class="col-md-8">
                    <p><strong>Developer:</strong> {{ $project->developer->company_name }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-{{ 
                            $project->status === 'completed' ? 'success' : 
                            ($project->status === 'ongoing' ? 'primary' : 'warning') 
                        }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </p>
                    <p><strong>Location:</strong> {{ $project->location ?? '-' }}</p>
                    <p><strong>Units:</strong> {{ $project->number_of_units ?? 'N/A' }}</p>
                    <p><strong>Price Per Unit:</strong> ₦{{ number_format($project->price_per_unit ?? 0) }}</p>

                    @if ($project->documents_path)
                        <p>
                            <strong>📎 Project Document:</strong> 
                            <a href="{{ asset('storage/' . $project->documents_path) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                View Document
                            </a>
                        </p>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <h5>📄 Description</h5>
                <p>{{ $project->description ?? 'No description provided.' }}</p>
            </div>

            <!-- Actions -->
            <div class="text-end">
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">✏️ Edit</a>
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">🗑️ Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
