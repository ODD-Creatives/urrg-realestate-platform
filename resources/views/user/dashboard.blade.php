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
        <div class="row page-header flex-wrap">
            <div class="col-md-6 d-flex align-items-center mb-2 mb-md-0">
                <p class="m-0 pe-4">It's Great to have {{ auth()->user()->firstname }}!</p>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text"
                        class="form-control form-control-sm"
                        value="{{ url('/') }}/referral/user/{{ auth()->user()->referral_code }}"
                        id="referral-link-{{ auth()->user()->id }}"
                        readonly>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-primary copy-btn"
                                data-clipboard-target="#referral-link-{{ auth()->user()->id }}"
                                title="Copy referral link">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overview Widgets -->
        <div class="row">
            <div class="col-lg-8 grid-margin">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0">Total Earnings</h4>
                            <h3 class="fw-bold mb-0">₦{{ number_format(auth()->user()->wallet->balance ?? 0) }}</h3>
                        </div>
                        <i class="mdi mdi-currency-ngn text-success icon-lg"></i>
                        </div>
                        <p class="text-muted font-13 mt-2">Lifetime commissions & bonuses</p>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                        <h4 class="card-title mb-0">Referral Count</h4>
                        <h3 class="fw-bold mb-0">{{ auth()->user()->referrals->count() }}</h3>
                        </div>
                        <i class="mdi mdi-account-multiple text-warning icon-lg"></i>
                    </div>
                    <p class="text-muted font-13 mt-2">
                        Total: {{ auth()->user()->referrals->count() }} | 
                        Active: {{ auth()->user()->referrals()->where('status', 'active')->count() }}
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📈 Referral Performance</h5>
                    <div class="filters d-flex">
                        <!-- Status Filter -->
                        <select class="form-select-sm me-2" aria-label="Filter by Status">
                        <option selected>All Statuses</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Level</th>
                                    <th>Earnings (₦)</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->referrals as $index => $referral)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $referral->firstname }} {{ $referral->lastname }}</td>
                                    <td>{{ $referral->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $referral->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($referral->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($referral->upline_referral === auth()->user()->referral_code)
                                            Direct
                                        @else
                                            Indirect
                                        @endif
                                    </td>
                                    <td>
                                        ₦{{ number_format($referral->commissions->sum('amount')) }}
                                    </td>
                                    <td>{{ $referral->created_at->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-4 grid-margin">
            <div class="">
                <!-- Referral Chain Snapshot (Full Width) -->
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title mb-0">Referral Chain Snapshot</h4>
                    <ul id="tree">
                        <li>
                        <span class="caret">
                            You
                        </span>
                        <ul class="nested">
                            <!-- Child 1 -->
                            <li>
                            <span class="caret">Child 1</span>
                            <ul class="nested">
                                <li>
                                <span class="caret">Grandchild 1.1</span>
                                <ul class="nested">
                                    <li>Great Grandchild 1.1.1</li>
                                    <li>Great Grandchild 1.1.2</li>
                                </ul>
                                </li>
                                <li>
                                <span class="caret">Grandchild 1.2</span>
                                <ul class="nested">
                                    <li>Great Grandchild 1.2.1</li>
                                    <li>Great Grandchild 1.2.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>

                            <!-- Child 2 -->
                            <li>
                            <span class="caret">Child 2</span>
                            <ul class="nested">
                                <li>
                                <span class="caret">Grandchild 2.1</span>
                                <ul class="nested">
                                    <li>Great Grandchild 2.1.1</li>
                                    <li>Great Grandchild 2.1.2</li>
                                </ul>
                                </li>
                                <li>
                                <span class="caret">Grandchild 2.2</span>
                                <ul class="nested">
                                    <li>Great Grandchild 2.2.1</li>
                                    <li>Great Grandchild 2.2.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>

                            <!-- Child 3 -->
                            <li>
                            <span class="caret">Child 3</span>
                            <ul class="nested">
                                <li>
                                <span class="caret">Grandchild 3.1</span>
                                <ul class="nested">
                                    <li>Great Grandchild 3.1.1</li>
                                    <li>Great Grandchild 3.1.2</li>
                                </ul>
                                </li>
                                <li>
                                <span class="caret">Grandchild 3.2</span>
                                <ul class="nested">
                                    <li>Great Grandchild 3.2.1</li>
                                    <li>Great Grandchild 3.2.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>

                            <!-- Child 4 -->
                            <li>
                            <span class="caret">Child 4</span>
                            <ul class="nested">
                                <li>
                                <span class="caret">Grandchild 4.1</span>
                                <ul class="nested">
                                    <li>Great Grandchild 4.1.1</li>
                                    <li>Great Grandchild 4.1.2</li>
                                </ul>
                                </li>
                                <li>
                                <span class="caret">Grandchild 4.2</span>
                                <ul class="nested">
                                    <li>Great Grandchild 4.2.1</li>
                                    <li>Great Grandchild 4.2.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>

                            <!-- Child 5 -->
                            <li>
                            <span class="caret">Child 5</span>
                            <ul class="nested">
                                <li>
                                <span class="caret">Grandchild 5.1</span>
                                <ul class="nested">
                                    <li>Great Grandchild 5.1.1</li>
                                    <li>Great Grandchild 5.1.2</li>
                                </ul>
                                </li>
                                <li>
                                <span class="caret">Grandchild 5.2</span>
                                <ul class="nested">
                                    <li>Great Grandchild 5.2.1</li>
                                    <li>Great Grandchild 5.2.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>
                        </ul>
                        </li>
                    </ul>
                    </div>
                <script>
                    document.querySelectorAll('.caret').forEach(el => {
                    el.addEventListener('click', () => {
                        el.parentElement.querySelector('.nested').classList.toggle('active');
                        el.classList.toggle('caret-down');
                    });
                    });
                </script>
                </div>
            </div>
            </div>
                            
        </div>
        
        <!-- Approved Developers/Properties -->
        <div class="row">
            <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Approved Developers & Properties</h4>
                <div class="row">
                    <div class="col-sm-4 stretch-card">
                    <div class="card">
                        <div class="card-body p-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_1.jpg')}}" alt="">
                        </div>
                        <div class="card-body px-3 text-dark">
                        <h5 class="fw-semibold">Elite Estates</h5>
                        <p class="text-muted font-13 mb-0">Luxury Condos</p>
                        <a href="property-details.html" class="text-primary font-13">View Properties</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4 stretch-card">
                    <div class="card">
                        <div class="card-body p-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_2.jpg')}}" alt="">
                        </div>
                        <div class="card-body px-3 text-dark">
                        <h5 class="fw-semibold">Greenview Developers</h5>
                        <p class="text-muted font-13 mb-0">Suburban Homes</p>
                        <a href="property-details.html" class="text-primary font-13">View Properties</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4 stretch-card">
                    <div class="card">
                        <div class="card-body p-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/user/assets/images/dashboard/img_3.jpg')}}" alt="">
                        </div>
                        <div class="card-body px-3 text-dark">
                        <h5 class="fw-semibold">Cityscape Realty</h5>
                        <p class="text-muted font-13 mb-0">Urban Apartments</p>
                        <a href="property-details.html" class="text-primary font-13">View Properties</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection