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
                    <i class="fas fa-copy"></i> Copy
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
                                        <th>Name</th>
                                        <th>Relationship</th>
                                        <th>Status</th>
                                        <th>Level</th>
                                        <th>Earnings</th>
                                        <th>Joined</th>
                                        <th>Referrer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allReferrals as $referral)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $referral['user']->full_name }}</td>
                                        <td>
                                            @if($referral['level'] == 1)
                                                <span class="badge bg-success">Child</span>
                                            @elseif($referral['level'] == 2)
                                                <span class="badge bg-info">Grandchild</span>
                                            @else
                                                <span class="badge bg-warning">Great Grandchild</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $referral['user']->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($referral['user']->status) }}
                                            </span>
                                        </td>
                                        <td>Level {{ $referral['level'] }}</td>
                                        <td>₦{{ number_format($referral['user']->paidCommissions->sum('amount')) }}</td>
                                        <td>{{ $referral['user']->created_at->format('M d, Y') }}</td>
                                        <td>{{ $referral['referrer'] }}</td>
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