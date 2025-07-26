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
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Level</th>
                                            <th>Earnings</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->referrals as $referral)
                                        <tr>
                                            <td>{{ $referral->full_name }}</td>
                                            <td>
                                                <span class="badge bg-{{ $referral->status === 'active' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($referral->status) }}
                                                </span>
                                            </td>
                                            <td>Level {{ $referral->paidCommissions->first()->level ?? 1 }}</td>
                                            <td>₦{{ number_format($referral->paidCommissions->sum('amount')) }}</td>
                                            <td>{{ $referral->created_at->format('M d, Y') }}</td>
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
                                        @foreach($referralTree[1] ?? [] as $level1)
                                        <li>
                                            <span class="caret">{{ $level1->full_name }} (Level 1)</span>
                                            <ul class="nested">
                                                @foreach($level1->referrals as $level2)
                                                <li>
                                                    <span class="caret">{{ $level2->full_name }} (Level 2)</span>
                                                    <ul class="nested">
                                                        @foreach($level2->referrals as $level3)
                                                        <li>{{ $level3->full_name }} (Level 3)</li>
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