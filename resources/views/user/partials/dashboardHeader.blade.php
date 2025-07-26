
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0">Total Earnings</h4>
                            <h3 class="fw-bold mb-0">₦{{ number_format($user->wallet->balance ?? 0) }}</h3>
                        </div>
                        <i class="mdi mdi-currency-ngn text-success icon-lg"></i>
                    </div>
                    <p class="text-muted font-13 mt-2">Lifetime commissions</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0">Referral Count</h4>
                            <h3 class="fw-bold mb-0">{{ $user->referrals->count() }}</h3>
                        </div>
                        <i class="mdi mdi-account-multiple text-warning icon-lg"></i>
                    </div>
                    <p class="text-muted font-13 mt-2">
                        Active: {{ $user->activeReferrals->count() }} | 
                        Inactive: {{ $user->inactiveReferrals->count() }}
                    </p>
                </div>
            </div>
        </div>
         <div class="col-lg-4 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title">Commission Breakdown</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <h5>Level 1</h5>
                            <p class="mb-1">₦{{ number_format($commissionBreakdown['level1']['amount']) }}</p>
                           {{-- <small>{{ $commissionBreakdown['level1']['count'] }} </small>--}} 
                        </div>
                        <div class="col-4">
                            <h5>Level 2</h5>
                            <p class="mb-1">₦{{ number_format($commissionBreakdown['level2']['amount']) }}</p>
                           {{--<small>{{ $commissionBreakdown['level2']['count'] }} </small>--}} 
                        </div>
                        {{-- <div class="col-4">
                            <h5>Level 3</h5>
                            <p class="mb-1">₦{{ number_format($commissionBreakdown['level3']['amount']) }}</p>
                            <small>{{ $commissionBreakdown['level3']['count'] }} referrals</small>
                        </div> --}}
                    </div>
                </div>
            </div>
         </div>
    </div>
       
