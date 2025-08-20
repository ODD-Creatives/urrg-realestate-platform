@extends('admin.layouts.app')
<style>
    ul.referral-tree, ul.referral-tree ul {
    list-style-type: none;
    padding-left: 1rem;
    }

    .referral-tree .caret {
    cursor: pointer;
    user-select: none;
    position: relative;
    padding-left: 1rem;
    }

    .referral-tree .caret::before {
    content: "▶";
    position: absolute;
    left: 0;
    top: 0;
    font-size: 12px;
    transition: transform 0.2s ease;
    }

    .referral-tree .caret-down::before {
    transform: rotate(90deg);
    }

    .nested {
    display: none;
    }

    .active {
    display: block;
    }
  </style>
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Realtor's </h3>
                <h6 class="font-weight-normal mb-0">📈 Referral Tree – {{$user->fullname}} </h6>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Referral Tree </h4>
                    <div>
                        <a href="{{ route('admin.referrals.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-4 text-center2 mb-3">
                            <img src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('assets/user/assets/images/avatar.jpg') }}" 
                                 alt="Realtor Photo"  
                                 class="img-fluid rounded-circle"  
                                 style="width: 100px; height: 100px; object-fit: cover;">
                            <p class="mt-2 fw-bold"> {{ $user->full_name }}</p>
                        
                            <p><strong>Email:</strong> {{ $user->email }}</p> 
                            <p><strong>Phone:</strong> {{ $user->phone }}</p>
                            <p>
                                <strong>Status:</strong> 
                                <span class="badge bg-{{ $user->status === 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </p>
                             <p>
                                <strong>Joined:</strong> 
                                {{ $user->created_at->format('jS \o\f F, Y') }}
                            </p>
                        </div> 
                       
                        <div class="col-lg-8 shadow-sm">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Referral Network</h4>
                                    <div id="referral-tree">
                                        <ul class="referral-tree"> 
                                            <li> 
                                                @if($user->upline_referral)
                                                    @php  
                                                        $referrer = \App\Models\ReferralCode::where('code', $user->upline_referral)->first();
                                                    @endphp
                                                    @if($referrer) 
                                                     <p><b>{{ $referrer->admin->referralCode->referredAdmins->name}} </b></p>
                                                    <p>{{ $referrer->admin->username }} (Upline)</p>
                                                    @else
                                                        <p class="text-muted">Upline not found</p>
                                                    @endif
                                                @else
                                                    <p class="text-muted">No Upline</p>
                                                @endif 
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
        </div> 
        
    </div>
    <script>
        document.querySelectorAll('.referral-tree .caret').forEach(item => {
            item.addEventListener('click', function () {
            this.classList.toggle('caret-down');
            const nested = this.nextElementSibling;
            if (nested && nested.classList.contains('nested')) {
                nested.classList.toggle('active');
            }
            });
        });
    </script>
@endsection 