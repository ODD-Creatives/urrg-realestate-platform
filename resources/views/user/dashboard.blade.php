@extends('user.partials.home')

@section('content')
<div class="content-wrapper pb-0">
    <div class="row page-header flex-wrap">
        <div class="col-md-6 d-flex align-items-center mb-2 mb-md-0">
            <p class="m-0 pe-4">Welcome back, {{ $user->firstname }}!</p>
        </div>
        <div class="col-md-6">
            <div class="input-group"> 
                <input type="text" class="form-control form-control-sm"
                 value="{{ url('/referral/register/'.$user->referral_code)  }}"
                    {{-- value="{{ url('/register?ref='.$user->referral_code) }}" --}}
                    id="referral-link" readonly>
                <button class="btn btn-sm btn-outline-primary copy-btn"
                    data-clipboard-target="#referral-link">
                    <i class="fa fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        @includeIf('user.partials.dashboardHeader')
        
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Referral Performance</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unique ID</th>
                                        <th>Name</th>
                                        <th>Referrer</th>
                                        <th>Date Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allReferrals as $referral)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $referral['user']->realtor_id }}</td>
                                        <td>{{ $referral['user']->full_name }}</td>
                                        <td>{{ $referral['referrer'] }}</td>

                                        <td>{{ $referral['user']->created_at->format('M d, Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Referral Network</h4>
                        <div id="referral-tree">
                            <ul>
                                <li>
                                    @if($user->upline_referral)
                                        @php
                                            $upline = $user->relationLoaded('upline') ? $user->upline : null;
                                            
                                             if (!$upline) {
                                                $upline = \App\Models\User::where('referral_code', $user->upline_referral)->first();
                                                
                                                if (!$upline) {
                                                    $upline = \App\Models\ReferralCode::where('code', $user->upline_referral)->with('admin')->first();
                                                }
                                            }
                                        @endphp

                                        @if($upline)
                                            @if($upline instanceof \App\Models\User)
                                                {{ $upline->fullname }} ({{ $upline->realtor_id ?? 'User' }})
                                            @elseif($upline instanceof \App\Models\ReferralCode && $upline->admin)
                                                {{ $upline->admin->referralCode->referredAdmins->username}} 
                                                
                                                <br> 
                                                {{ $upline->admin->username }} (Admin) <br> 
                                            @else
                                                <span class="text-muted">Upline Code: {{ $user->upline_referral }}</span>
                                            @endif
                                        @else
                                            <span class="text-muted">Upline Code: {{ $user->upline_referral }}</span>
                                        @endif
                                    @else
                                        <span class="text-muted">No Upline</span>
                                    @endif 
                                    <span class="caret caret-down">{{ $user->full_name }} (You)</span>
                                    <ul class="nested active">
                                        @foreach($referralTree['children'] as $childData)
                                        <li>
                                            <span class="caret {{ count($childData['grandchildren']) > 0 ? 'caret-down' : '' }}">
                                                {{ $childData['child']->full_name }} 
                                                {{-- <small class="text-muted">Earned: ₦{{ number_format($childData['child']->paidCommissions->sum('amount')) }}</small> --}}
                                            </span>
                                            <ul class="nested {{ count($childData['grandchildren']) > 0 ? 'active' : '' }}">
                                                @foreach($childData['grandchildren'] as $grandchildData)
                                                <li>
                                                    <span class="caret {{ count($grandchildData['great_grandchildren']) > 0 ? 'caret-down' : '' }}">
                                                        {{ $grandchildData['grandchild']->full_name }}
                                                        {{-- <small class="text-muted">Earned: ₦{{ number_format($grandchildData['grandchild']->paidCommissions->sum('amount')) }}</small> --}}
                                                    </span>
                                                    <ul class="nested {{ count($grandchildData['great_grandchildren']) > 0 ? 'active' : '' }}">
                                                        @foreach($grandchildData['great_grandchildren'] as $greatGrandchild)
                                                        <li>
                                                            {{ $greatGrandchild->full_name }}
                                                            {{-- <small class="text-muted">Earned: ₦{{ number_format($greatGrandchild->paidCommissions->sum('amount')) }}</small> --}}
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
    </div>
</div>

<style>
    #referral-tree ul {
        list-style-type: none;
        padding-left: 20px;
    }
    .caret {
        cursor: pointer;
        user-select: none;
    }
    .caret::before {
        content: "▸";
        margin-right: 6px;
    }
    .caret-down::before {
        transform: rotate(90deg);
    }
    .nested {
        display: none;
    }
    .active {
        display: block;
    }
</style>

<script>
    document.querySelectorAll('.caret').forEach(item => {
        item.addEventListener('click', function() {
            this.parentElement.querySelector('.nested').classList.toggle('active');
            this.classList.toggle('caret-down');
        });
    });
    
    document.querySelector('.copy-btn').addEventListener('click', function() {
        const input = document.querySelector(this.dataset.clipboardTarget);
        input.select();
        document.execCommand('copy');
        alert('Referral link copied!');
    });
</script>
@endsection