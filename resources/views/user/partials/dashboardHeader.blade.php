
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card ">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0 text-white">Property Sold</h4>
                            <h3 class="fw-bold mb-0">1</h3>
                        </div>
                        <i class="mdi mdi-castle text-white icon-lg"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0 text-white">Referral Count</h4>
                            <h3 class="fw-bold mb-0">{{ $user->referrals->count() }}</h3>
                        </div>
                        <i class="mdi mdi-account-multiple text-white icon-lg"></i>
                    </div>
                    
                </div>
            </div>
        </div>
        {{--
         <div class="col-lg-4 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title">Commission Breakdown</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <h5>Level 1</h5>
                            <p class="mb-1">₦{{ number_format($commissionBreakdown['level1']['amount']) }}</p>
                        </div>
                        <div class="col-4">
                            <h5>Level 2</h5>
                            <p class="mb-1">₦{{ number_format($commissionBreakdown['level2']['amount']) }}</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>--}}
        <div class="col-lg-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Referral Network</h4>
                    <div id="referral-tree">
                        <ul>
                            <li>
                                <span > Enshakope Daniel (Upline)</span>
                                <span class="caret caret-down">{{ $user->full_name }} (You)</span>
                                <ul class="nested active">
                                    @foreach($referralTree['children'] as $childData)
                                    <li>
                                        <span class="caret {{ count($childData['grandchildren']) > 0 ? 'caret-down' : '' }}">
                                            {{ $childData['child']->full_name }} 
                                            <span class="badge bg-success">Child</span>
                                            <small class="text-muted">Earned: ₦{{ number_format($childData['child']->paidCommissions->sum('amount')) }}</small>
                                        </span>
                                        <ul class="nested {{ count($childData['grandchildren']) > 0 ? 'active' : '' }}">
                                            @foreach($childData['grandchildren'] as $grandchildData)
                                            <li>
                                                <span class="caret {{ count($grandchildData['great_grandchildren']) > 0 ? 'caret-down' : '' }}">
                                                    {{ $grandchildData['grandchild']->full_name }}
                                                    <span class="badge bg-info">Grandchild</span>
                                                    <small class="text-muted">Earned: ₦{{ number_format($grandchildData['grandchild']->paidCommissions->sum('amount')) }}</small>
                                                </span>
                                                <ul class="nested {{ count($grandchildData['great_grandchildren']) > 0 ? 'active' : '' }}">
                                                    @foreach($grandchildData['great_grandchildren'] as $greatGrandchild)
                                                    <li>
                                                        {{ $greatGrandchild->full_name }}
                                                        <span class="badge bg-warning">Great Grandchild</span>
                                                        <small class="text-muted">Earned: ₦{{ number_format($greatGrandchild->paidCommissions->sum('amount')) }}</small>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
       
