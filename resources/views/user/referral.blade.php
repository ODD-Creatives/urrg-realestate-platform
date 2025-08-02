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
            {{--
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
            --}}
         </div>
    </div>
        
        
    </div>
@endsection