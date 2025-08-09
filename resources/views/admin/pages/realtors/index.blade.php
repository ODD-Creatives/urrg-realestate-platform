@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Realtor's</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </div>
                </div>
            </div>
        </div> 
        
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">👥 All Realtors</h5>
                </div> 
                <div class="card-body table-responsive">
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
                            @foreach($users as $user)
                            <tr> 
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->realtor_id }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->isActive() ? 'success' : 'secondary' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>  
                                </td>
                                <td>{{ $user->formatted_created_at ?? 'N/A' }}</td> 
                            
                                <td>
                                    <div class="btn-group"> 
                                        <a href="{{ route('admin.realtors.view', encrypt($user->id) ) }}" class="btn btn-sm btn-outline-info">View</a>
                                        @if($user->isActive())
                                            <form action="{{ route('admin.realtors.deactivate', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-outline-warning">Deactivate</button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.realtors.activate', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-outline-success">Activate</button>
                                            </form>
                                        @endif 
                                        <a href="{{ route('admin.referrals.referral.chain', encrypt($user->id) ) }}" class="btn btn-sm btn-outline-primary">Referrals</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Pagination Links -->
                    {{-- <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection