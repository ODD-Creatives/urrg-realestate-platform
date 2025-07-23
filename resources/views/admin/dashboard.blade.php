@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row"> 
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome John</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                    </div>
                    </div>
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
                <h3>1,250</h3>
                <p class="mb-0">Registered Realtors</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h4>Total Developers</h4>
                <h3>320</h3>
                <p class="mb-0">Approved Profiles</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-success text-white">
            <div class="card-body text-center">
                <h4>Total Commission Paid</h4>
                <h3>₦18,500,000</h3>
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
@endsection 