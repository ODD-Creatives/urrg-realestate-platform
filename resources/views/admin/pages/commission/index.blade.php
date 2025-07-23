@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">💰 Commission Records </h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 mt-4">
                    <p>Filter By:-</p>
                    <input type="date" class="form-control d-inline-block" style="width: auto;">
                    <input type="text" class="form-control d-inline-block ms-2" placeholder="Search Realtor..." style="width: 200px;">
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0"> Commission Records</h4>
                    <div>
                        <a href="{{ route('admin.commissions.pay') }}" class="btn btn-sm btn-outline-success">Pay Comission</a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Realtor</th>
                        <th>Level</th>
                        <th>Realtor ₦</th>
                        <th>Upline 1</th>
                        <th>Upline 1 ₦</th>
                        <th>Upline 2</th>
                        <th>Upline 2 ₦</th>
                        <th>Status</th>
                        <th>Payout Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>Grace Johnson</td>
                        <td>Direct</td>
                        <td>₦10,000</td>
                        <td>John Musa</td>
                        <td>₦3,000</td>
                        <td>Deborah Olu</td>
                        <td>₦2,000</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>2024-07-01</td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Ahmed Musa</td>
                        <td>Direct</td>
                        <td>₦8,000</td>
                        <td>Sarah Bello</td>
                        <td>₦2,500</td>
                        <td>-</td>
                        <td>-</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>--</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>


                

                
        </div>
    </div>
@endsection 