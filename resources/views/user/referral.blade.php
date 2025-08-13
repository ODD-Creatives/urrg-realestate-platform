@extends('user.partials.home')

@section('content')
    <style>
      ul, #tree {
        list-style-type: none;
        padding-left: 1rem;
        font-family: Arial, sans-serif;
      }

      .caret {
        cursor: pointer;
        user-select: none;
        display: inline-block;
        padding: 4px;
      } 

      .caret::before {
        content: "▶";
        color: black;
        display: inline-block;
        margin-right: 6px;
      }

      .caret-down::before {
        transform: rotate(90deg);
      }

      .nested {
        display: none;
        padding-left: 1rem;
      }

      .active {
        display: block;
      }

      .table td, .table th {
        vertical-align: middle;
      }
    </style>
    <div class="content-wrapper pb-0">
        
        <!-- Overview Widgets -->
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
@endsection