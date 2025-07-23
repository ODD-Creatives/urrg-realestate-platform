@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Realtor's Referrals</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
            <div class="card-header">
                <h4>🔗 All Referrals</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                    <th>#</th>
                    <th>Realtor</th>
                    <th>Referred By</th>
                    <th>Level</th>
                    <th>Total Downlines</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Grace Johnson</td>
                    <td>John Musa</td>
                    <td>Level 2</td>
                    <td>5</td>
                    <td>
                        <a href="{{ route('admin.referrals.referral-chain') }}" class="btn btn-sm btn-outline-warning">🔍 View Tree</a>
                    </td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Bob Wilson</td>
                    <td>Grace Johnson</td>
                    <td>Level 3</td>
                    <td>2</td>
                    <td>
                        <a href="{{ route('admin.referrals.referral-chain') }}" class="btn btn-sm btn-outline-warning">🔍 View Tree</a>
                    </td>
                    </tr>
                    <!-- more rows -->
                </tbody>
                </table>
            </div>
            </div>


        </div> 
        
    </div>
@endsection 