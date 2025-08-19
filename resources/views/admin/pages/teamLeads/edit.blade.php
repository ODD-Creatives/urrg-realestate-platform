@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="font-weight-bold">✏ Edit Team Lead - {{ $teamLead->fullname }}</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.teamLeads.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please fix the errors below.
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.teamLeads.update', $teamLead->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Full Name -->
                    <div class="col-md-6 mb-3">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" value="{{ old('fullname', $teamLead->fullname) }}" required>
                    </div>

                    <!-- Post -->
                    <div class="col-md-6 mb-3">
                        <label>Post / Position</label>
                        <input type="text" name="post" class="form-control" value="{{ old('post', $teamLead->post) }}" required>
                    </div>

                    <!-- Current Picture -->
                    <div class="col-md-6 mb-3">
                        <label>Current Picture</label><br>
                        @if($teamLead->picture)
                            <img src="{{ asset('storage/'.$teamLead->picture) }}" alt="Profile" style="height:80px;width:80px;object-fit:cover;" class="rounded mb-2">
                        @else
                            <p class="text-muted">No Image Uploaded</p>
                        @endif
                        <input type="file" name="picture" class="form-control">
                        <small class="text-muted">Leave blank to keep current</small>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">💾 Update Team Lead</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
