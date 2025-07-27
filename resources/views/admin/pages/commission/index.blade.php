@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">💰 Commission Records </h3>
                    <h6 class="font-weight-normal mb-0">
                        All systems are running smoothly! You have 
                        <span class="text-primary">{{ $unreadAlerts ?? 0 }} unread alerts!</span>
                    </h6>
                </div>
                <div class="col-12 mt-4">
                    <p>Filter By:-</p>
                    <form method="GET" action="{{ route('admin.commissions.index') }}" class="d-inline-block">
                        <input type="date" name="date" value="{{ request('date') }}" class="form-control d-inline-block" style="width: auto;">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control d-inline-block ms-2" placeholder="Search Realtor..." style="width: 200px;">
                        <button type="submit" class="btn btn-sm btn-primary ms-2">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0"> Commission Records</h4>
                    <div>
                        <a href="{{ route('admin.commissions.pay') }}" class="btn btn-sm btn-outline-success">Pay Comission</a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Realtor</th>
                        <th>Realtor Email</th>
                        <th>Level</th>
                        <th>Amount ₦</th>
                        <th>Referral</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($commissions as $commission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $commission->user ? $commission->user->firstname . ' ' . $commission->user->lastname : '-' }}</td>
    
                            <td>{{ $commission->user_email }}</td>
                            <td>{{ $commission->level }}</td>
                            <td>₦{{ number_format($commission->amount, 0) }}</td>
                            <td>{{ $commission->referral ? $commission->referral->firstname. ' ' . $commission->referral->lastname : '-'}}</td>
    
                            <td>
                                @if($commission->status === 'Paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No commission records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection