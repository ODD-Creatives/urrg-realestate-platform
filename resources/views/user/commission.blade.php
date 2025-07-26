@extends('user.partials.home')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> 💰 My Commissions</h3>
        </div>
        <!-- Personal Information -->
        <div class="card mb-4">
            
            <div class="card-body">
                <!-- Earnings Summary -->
                @includeIf('user.partials.dashboardHeader')

                <!-- Transactions Table -->
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Referral</th>
                                <th>Level</th>
                                <th>Amount (₦)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->earnedCommissions()->latest()->get() as $index => $commission)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $commission->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if($commission->referral)
                                        {{ $commission->referral->firstname }} {{ $commission->referral->lastname }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @switch($commission->level)
                                        @case(1) Direct @break
                                        @case(2) Level 2 @break
                                        @case(3) Level 3 @break
                                        @default Level {{ $commission->level }}
                                    @endswitch
                                </td>
                                <td>₦{{ number_format($commission->amount) }}</td>
                                <td>
                                    @php
                                        $badgeClass = [
                                            'pending' => 'bg-warning',
                                            'paid' => 'bg-success',
                                            'cancelled' => 'bg-danger'
                                        ][$commission->status] ?? 'bg-secondary';
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($commission->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            
                            @if(auth()->user()->earnedCommissions()->count() === 0)
                            <tr>
                                <td colspan="6" class="text-center py-4">No commission records found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection