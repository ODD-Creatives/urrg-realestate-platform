@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row"> 
                <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                     <div class="row page-header flex-wrap">
                        <div class="col-md-6 d-flex align-items-center mb-2 mb-md-0">
                            <p class="m-0 pe-4">Welcome back, {{ $adminUser->username }}!</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm"
                        @if($adminUser->referralCode)
                            <input type="text" class="form-control" id="referral-link"
                                value="{{ url('/referral/register/'.$adminUser->referralCode->code) }}"
                                readonly>
                        @else
                            <input type="text" class="form-control" value="No referral code generated" readonly>
                        @endif
                        <button class="btn btn-sm btn-outline-primary copy-btn"
                            data-clipboard-target="#referral-link">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <h4>Total Realtors</h4>
                <h3>{{$userCount}}</h3> 
                <p class="mb-0">Registered Realtors</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h4>Total Developers</h4>
                <h3>{{ $developerCount}}</h3>
                <p class="mb-0">Approved Profiles</p>
            </div>
            </div>
        </div> 
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-success text-white">
            <div class="card-body text-center">
                <h4>Total Commission Paid</h4>
                <h3>₦{{ $formattedTotal }}</h3>
                <p class="mb-0">To Realtors/Uplines</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h4>Properties Listed</h4>
                <h3>675</h3>
                <p class="mb-0">Approved Listings</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card mb-2">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">🏠 Properties Listed / Approved</h5>
                <a href="#" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                    <th>#</th>
                    <th>Property Name</th>
                    <th>Category</th>
                    <th>Developer</th>
                    <th>Status</th>
                    <th>Date Listed</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Oak Residence</td>
                    <td>Apartment</td>
                    <td>Greenstone Developers</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>2024-06-01</td>
                    <td><a href="#" class="btn btn-sm btn-outline-info">Edit</a></td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Sunset Estate</td>
                    <td>Land</td>
                    <td>URRG Ltd</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>2024-06-10</td>
                    <td><a href="#" class="btn btn-sm btn-outline-info">Edit</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
                </table>
            </div>
            </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">🧾 Recent Activity Log</h5>
                <a href="#" class="btn btn-sm btn-secondary">View All</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Activity</th>
                    <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Admin</td>
                    <td>Approved Property: Oak Residence</td>
                    <td>2024-06-12 09:34 AM</td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Grace Smith</td>
                    <td>Realtor</td>
                    <td>Requested Withdrawal: ₦25,000</td>
                    <td>2024-06-11 02:45 PM</td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td>URRG Dev</td>
                    <td>Developer</td>
                    <td>Submitted Property: Sunset Estate</td>
                    <td>2024-06-10 08:15 AM</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
                </table>
            </div>
            </div>


            </div>
        </div>
    </div>

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