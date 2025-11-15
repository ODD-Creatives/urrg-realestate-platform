@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Realtor's</h3>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">👥 All Realtors</h5>
                    
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.realtors.index') }}" class="d-flex">
                        <div class="input-group">
                            <input type="text" 
                                   name="search" 
                                   class="form-control" 
                                   placeholder="Search by name, email, ID, or phone..." 
                                   value="{{ request('search') }}"
                                   style="min-width: 300px;">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                            @if(request('search'))
                                <a href="{{ route('admin.realtors.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i> Clear
                                </a>
                            @endif
                        </div>
                    </form>
                </div> 
                
                <div class="card-body table-responsive">
                    <!-- Search Results Info -->
                    @if(request('search'))
                        <div class="alert alert-info mb-3">
                            <strong>Search Results:</strong> 
                            Found {{ $users->total() }} result(s) for "{{ request('search') }}"
                            @if($users->total() > 0)
                                - Sorted alphabetically
                            @endif
                        </div>
                    @endif
                    
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Realtor ID</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @forelse($users as $user)
                            <tr> 
                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $user->full_name }}</strong>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $user->realtor_id }}</span>
                                </td>
                                <td>{{ $user->phone ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->isActive() ? 'success' : 'secondary' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>  
                                </td>
                                <td>{{ $user->formatted_created_at ?? 'N/A' }}</td> 
                            
                                <td>
                                    <div class="btn-group"> 
                                        <a href="{{ route('admin.realtors.view', encrypt($user->id) ) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($user->isActive())
                                            <form action="{{ route('admin.realtors.deactivate', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-warning" 
                                                        title="Deactivate"
                                                        onclick="return confirm('Are you sure you want to deactivate this realtor?')">
                                                    <i class="fas fa-pause"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.realtors.activate', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-success" 
                                                        title="Activate"
                                                        onclick="return confirm('Are you sure you want to activate this realtor?')">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </form>
                                        @endif 
                                        <a href="{{ route('admin.referrals.referral.chain', encrypt($user->id) ) }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="View Referrals">
                                            <i class="fas fa-network-wired"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    @if(request('search'))
                                        <div class="text-muted">
                                            <i class="fas fa-search fa-2x mb-3"></i><br>
                                            No realtors found matching "{{ request('search') }}"<br>
                                            <small>Try adjusting your search terms</small>
                                        </div>
                                    @else
                                        <div class="text-muted">
                                            <i class="fas fa-users fa-2x mb-3"></i><br>
                                            No realtors found<br>
                                            <small>Realtors will appear here once registered</small>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <!-- Debug Info (Optional - you can remove this) -->
                    @if(env('APP_DEBUG'))
                    <div class="alert alert-info mt-3">
                        <strong>Pagination Debug:</strong><br>
                        Total: {{ $users->total() }}<br>
                        Current Page: {{ $users->currentPage() }}<br>
                        Last Page: {{ $users->lastPage() }}<br>
                        Per Page: {{ $users->perPage() }}<br>
                        Has Pages: {{ $users->hasPages() ? 'Yes' : 'No' }}
                    </div>
                    @endif

                    <!-- Pagination Links -->
                    @if($users->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                    @elseif($users->total() > 0)
                    <div class="alert alert-warning text-center mt-4">
                        Showing all {{ $users->total() }} realtors (no pagination needed)
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .table th {
        border-top: none;
        font-weight: 600;
    }
    
    .btn-group .btn,
    .btn-group form {
        margin-right: 5px;
    }
    
    .btn-group .btn:last-child,
    .btn-group form:last-child {
        margin-right: 0;
    }
    
    /* Ensure consistent button sizes in group */
    .btn-group .btn,
    .btn-group form button {
        padding: 0.25rem 0.5rem;
    }
</style>
@endsection