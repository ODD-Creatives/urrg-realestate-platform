@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Realtor's Referrals</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div> 
        <div class="row">
            <div class="card mb-4">
            <div class="card-header">
                <h4>🔗 All Referrals</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Realtor</th>
                        <th>Referred By</th>
                        <th>Total Downlines</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                <td>{{ $user->fullname ?? 'N/A' }}</td>
                                <td>
                                    @if($upline = $user->relationLoaded('upline') ? $user->upline : null)
                                        @if($upline instanceof \App\Models\User)
                                            {{ $upline->fullname }}
                                        @elseif($upline instanceof \App\Models\ReferralCode && $upline->admin)
                                            {{ $upline->admin->username }} (Admin)
                                        @else
                                            <span class="text-muted">Upline not found</span>
                                        @endif
                                    @else 
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>

                                <td>
                                    {{-- Note: The 'downlines_count_by_level' attribute can be very slow. --}}
                                    {{ $user->downlines_count_by_level['total'] }}
                                    <small class="text-muted">
                                        (Direct: {{ $user->downlines_count_by_level['direct'] }}, 
                                        Grand: {{ $user->downlines_count_by_level['grandchildren'] }}, 
                                        Great-Grand: {{ $user->downlines_count_by_level['great_grandchildren'] }})
                                    </small>
                                </td>
                                <td>
                                    <a href="{{ route('admin.referrals.referral.chain', encrypt($user->id)) }}" class="btn btn-sm btn-outline-warning">🔍 View Tree</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No referrals found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
            </div>


        </div> 
        
    </div>
@endsection 