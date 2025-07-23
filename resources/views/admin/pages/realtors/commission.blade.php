@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Realtor's </h3>
                    <h6 class="font-weight-normal mb-0">💰 Commissions - Grace Johnson<span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Grace Johnson</h4>
                    <a href="{{ route('admin.realtors.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                </div>
                <div class="card-body">
                    <!-- Summary Info -->
                    <div class="row mb-4">
                    <div class="col-md-4">
                        <p><strong>Email:</strong> grace@example.com</p>
                        <p><strong>Upline:</strong> John Musa</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Total Earnings:</strong> ₦125,000</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">Active</span></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Bank:</strong> First Bank</p>
                        <p><strong>Account No:</strong> 0123456789</p>
                    </div>
                    </div>

                    <!-- Commission Table -->
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
                            <th>Payout Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024-06-10</td>
                            <td>Jane Smith</td>
                            <td>Direct</td>
                            <td>₦10,000</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>2024-06-12</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2024-06-12</td>
                            <td>Bob Wilson</td>
                            <td>Indirect</td>
                            <td>₦5,000</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>2024-06-13</td>

                        </tr>
                        <!-- More rows -->
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 