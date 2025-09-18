@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Realtor's </h3>
                        <h6 class="font-weight-normal mb-0">👤 Realtor Profile</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Profile</h4>
                    <div>
                        <a href="{{ route('admin.realtors.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Photo -->
                        <div class="col-md-4 text-center2 mb-3">
                            <img 
                                src="{{ auth()->user()->photo ? asset('storage/avatars/'.auth()->user()->photo) : asset('assets/user/assets/images/faces/face1.jpg') }}" 
                                class="img-fluid rounded-circle mb-2" 
                                alt="Profile Photo" 
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
                            @if($user->status === 'active')
                                <form action="{{ route('admin.realtors.deactivate', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Suspend</button>
                                </form>
                            @else
                                <form action="{{ route('admin.realtors.activate', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success">Activate</button>
                                </form>
                            @endif
                        </div> 
                        <!-- Basic Info --> 
                        <div class="col-md-6">
                            <div class="card bg-light border mb-3">
                                <div class="card-body text-center ">
                                    <h6>Total Earnings</h6>
                                    <h3 class="text-success">
                                        ₦{{ number_format($user->commissions()->where('status', 'paid')->sum('amount'), 2) }}
                                    </h3>
                                </div>
                            </div>
                            <div>
                                <p>
                                    <strong>Bank:</strong>
                                    {{ $user->bank_name ?? 'N/A' }}
                                </p>
                                <p>
                                    <strong>Account Name:</strong>
                                    {{ $user->account_name ?? 'N/A' }}
                                </p>
                                <p>
                                    <strong>Account Number:</strong>
                                    {{ $user->account_number ?? 'N/A' }}
                                </p>
                                <p>
                                    <strong>Referral Code:</strong>
                                    {{ $user->referral_code ?? 'N/A' }}
                                </p>
                                <p> 
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
                                                <b>{{ $upline->admin->referralCode->referredAdmins->name}} </b>
                                                
                                                <br> 
                                                {{ $upline->admin->username }} (Admin) <br> 
                                            @else
                                                <span class="text-muted">Upline Code: {{ $user->upline_referral }}</span>
                                                 <br> 
                                            @endif
                                        @else
                                            <span class="text-muted">Upline Code: {{ $user->upline_referral }}</span>
                                            <br> 
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
                                
                                </p>
                            </div> 
                            <div class="mt-4">
                                <a href="{{ route('admin.referrals.referral.chain', encrypt($user->id)) }}" class="btn btn-outline-primary">View Referral Chain</a>
                                <a href="{{ route('admin.commissions.index') }}" class="btn btn-outline-success">View Commissions</a>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>    
        </div>
        
        
    </div>
@endsection 