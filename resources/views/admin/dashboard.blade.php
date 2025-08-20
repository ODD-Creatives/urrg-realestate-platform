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
                <h4>Properties & Project</h4>
                <h3>{{ $totalApproved}}</h3>
                <p class="mb-0">Approved Listings</p>
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
                    @forelse($recentActivities as $activity)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activity->actor_name }}</td>
                            <td><span class="badge bg-info">{{ $activity->actor_role }}</span></td>
                            <td>{{ $activity->activity }}</td>
                            <td>{{ $activity->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No recent activity.</td>
                        </tr>
                    @endforelse
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