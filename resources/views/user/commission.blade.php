@extends('user.partials.home')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> 💰 My Commissions</h3>
        </div>
        <!-- Personal Information -->
        <div class="card mb-4">
            
            <div class="card-body">
                <!-- Earnings Summary -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title"> 💰 Total Earned</h6>
                                <h3 class="text-dark">₦150,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Referral Count</h6>
                            <h3 class="text-dark"> <i class="mdi mdi-account-multiple text-dark icon-sm"></i> 42</h3>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-dark">Last Payout</h6>
                            <h3 class="text-dark"> <i class="fa fa-briefcase text-dark icon-sm"></i> 2025-06-01</h3>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Referral</th>
                        <th>Level</th>
                        <th>Amount (₦)</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-06-10</td>
                        <td>John Doe</td>
                        <td>Direct</td>
                        <td>₦10,000</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2024-06-08</td>
                        <td>Jane Smith</td>
                        <td>Indirect</td>
                        <td>₦5,000</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024-06-05</td>
                        <td>Bob Wilson</td>
                        <td>Direct</td>
                        <td>₦15,000</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection