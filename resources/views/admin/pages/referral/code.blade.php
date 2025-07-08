@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header border-0 pb-0 d-flex justify-content-between align-items-center mb-3">
                        <h3 class="card-title mb-0">Generate Referral Code</h3>
                        <a href="{{ route('admin.referrals.code.index') }}" class="btn btn-primary">
                            <i class="fas fa-list"></i> View All Referrals
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.referrals.code.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="user_id" class="col-sm-3 col-form-label">Select Admin</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <option value="">-- Select User --</option>
                                    @foreach($admins as $id => $name)
                                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">User must not already have a referral code</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="expires_at" class="col-sm-3 col-form-label">Expiry Date</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" id="expires_at" 
                                       name="expires_at" value="{{ old('expires_at') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Generate Code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts
    setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if (alert) alert.remove();
    }, 5000);
});
</script>
@endpush