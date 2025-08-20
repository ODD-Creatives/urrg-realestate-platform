@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">💰 Commission Records</h3>
                        <h6 class="font-weight-normal mb-0">
                            All systems are running smoothly! You have 
                            <span class="text-primary">{{ $unreadAlerts ?? 0 }} unread alerts!</span>
                        </h6>
                    </div>
                    <div class="col-12 mt-4">
                        <form method="GET" action="{{ route('admin.commissions.index') }}" class="row g-3">
                            <div class="col-md-3">
                                <input type="date" name="date" value="{{ request('date') }}" class="form-select">
                            </div>
                            <div class="col-md-3">
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" 
                                           class="form-control" placeholder="Search by Realtor ID, Name, Email or Code">
                                    <button type="submit" class="btn btn-primary">
                                        Filter
                                    </button>
                                    @if(request()->has('search') || request()->has('date') || request()->has('status'))
                                        <a href="{{ route('admin.commissions.index') }}" class="btn btn-outline-secondary">
                                            Clear
                                        </a>
                                    @endif 
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="{{ route('admin.commissions.pay') }}" class="btn btn-sm btn-success text-white">
                                    <i class="mdi mdi-cash-multiple"></i> Pay Commission
                                </a>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr> 
                                    <th>#</th>
                                    <th>Realtor</th>
                                    <th>Email</th>
                                    <th>Realtor ID</th>
                                    <th>Amount</th>
                                    <th>Referred By</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @forelse($commissions as $commission)
                                <tr>  
                                    <td>{{ ($commissions->currentPage()-1) * $commissions->perPage() + $loop->iteration }}</td>
                                    <td>
                                        @if($commission->user)
                                            <a href="{{ route('admin.realtors.show', encrypt($commission->user->id) ) }}">
                                                {{ $commission->user->fullname }} 
                                            </a>
                                        @else
                                            - 
                                        @endif
                                    </td>
                                    <td>{{ $commission->user_email }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $commission->user->realtor_id ?? '-' }}
                                        </span>
                                    </td> 
                                    <td class="fw-bold">₦{{ number_format($commission->amount, 2) }}</td>
                                    <td>
                                        @if($commission->referral)
                                            <a href="{{ route('admin.realtors.show', encrypt($commission->referral->id) ) }}">
                                                {{ $commission->referral->fullname }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($commission->status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ optional($commission->created_at)->format('M d, Y') ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                                            <h4>No commission records found</h4>
                                            <p class="text-muted">Try adjusting your search filters</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $commissions->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection