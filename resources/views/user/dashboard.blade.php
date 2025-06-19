@extends('user.partials.home')

@section('content')
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#">
                        <p class="m-0 pe-3">Dashboard</p>
                    </a>
                    <a class="ps-3 me-4" href="#">
                        <p class="m-0">ADE-00234</p>
                    </a>
                </div>
                
            </div>
        </div>
        <!-- first row starts here -->
        <div class="row">
            <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <div class="card-title mb-0">Sales Revenue</div>
                        <h3 class="fw-bold mb-0">$32,409</h3>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                        <div class="d-flex me-5">
                            <button type="button" class="btn btn-social-icon btn-outline-sales"><i class="mdi mdi-inbox-arrow-down"></i></button>
                            <div class="ps-2">
                            <h4 class="mb-0 fw-semibold head-count">$8,217</h4>
                            <span class="font-10 fw-semibold text-muted">TOTAL SALES</span>
                            </div>
                        </div>
                        <div class="d-flex me-3 mt-2 mt-sm-0">
                            <button type="button" class="btn btn-social-icon btn-outline-sales profit"><i class="mdi mdi-cash text-info"></i></button>
                            <div class="ps-2">
                            <h4 class="mb-0 fw-semibold head-count">2,804</h4>
                            <span class="font-10 fw-semibold text-muted">TOTAL PROFIT</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <p class="text-muted font-13 mt-2 mt-sm-0">Your sales monitoring dashboard template. <a class="text-muted font-13" href="#"><u>Learn more</u></a></p>
                    <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart">
                        <canvas class="flot-base"></canvas>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
        </div>
        <!-- image card row starts here -->
        <div class="row">
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="assets/images/dashboard/img_1.jpg" alt="">
                </div>
                <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                    </div>
                    <h5 class="fw-semibold">Cosy Studio flat in London</h5>
                    <div class="d-flex justify-content-between fw-semibold">
                    <p class="mb-0"><i class="mdi mdi-star star-color pe-1"></i>4.60 (35)</p>
                    <p class="mb-0">$5,267/night</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="assets/images/dashboard/img_2.jpg" alt="">
                </div>
                <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                    </div>
                    <h5 class="fw-semibold">Victoria Bedsit Studio Ensuite</h5>
                    <div class="d-flex justify-content-between fw-semibold">
                    <p class="mb-0"><i class="mdi mdi-star star-color pe-1"></i>4.83 (12)</p>
                    <p class="mb-0">$6,144/night</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="assets/images/dashboard/img_3.jpg" alt="">
                </div>
                <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                    </div>
                    <h5 class="fw-semibold">Fabulous Huge Room </h5>
                    <div class="d-flex justify-content-between fw-semibold">
                    <p class="mb-0"><i class="mdi mdi-star star-color pe-1"></i>3.83 (15)</p>
                    <p class="mb-0">$5,267/night</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card">
                <div class="card-body">
                    <div class="card-title mb-2"> Upcoming events (3) </div>
                    <h3 class="mb-3">23 september 2019</h3>
                    <div class="d-flex border-bottom border-top py-3">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked></label>
                    </div>
                    <div class="ps-2">
                        <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                        <p class="m-0 text-black">Hey I attached some new PSD files…</p>
                    </div>
                    </div>
                    <div class="d-flex border-bottom py-3">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"></label>
                    </div>
                    <div class="ps-2">
                        <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                        <p class="m-0 text-black">Discuss performance with manager</p>
                    </div>
                    </div>
                    <div class="d-flex border-bottom py-3">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"></label>
                    </div>
                    <div class="ps-2">
                        <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                        <p class="m-0 text-black">Meeting with Alisa </p>
                    </div>
                    </div>
                    <div class="d-flex pt-3">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"></label>
                    </div>
                    <div class="ps-2">
                        <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                        <p class="m-0 text-black">Hey I attached some new PSD files…</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-warning">
                        <i class="mdi mdi-clock-outline"></i>
                        </div>
                    </div>
                    <div class="ps-4">
                        <h4 class="fw-bold text-warning mb-0">12.45</h4>
                        <h6 class="text-muted">Schedule Meeting </h6>
                    </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-danger">
                        <i class="mdi mdi-account-outline"></i>
                        </div>
                    </div>
                    <div class="ps-4">
                        <h4 class="fw-bold text-danger mb-0">34568</h4>
                        <h6 class="text-muted">Profile Visits</h6>
                    </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-success">
                        <i class="mdi mdi-laptop"></i>
                        </div>
                    </div>
                    <div class="ps-4">
                        <h4 class="fw-bold text-success mb-0">33.50%</h4>
                        <h6 class="text-muted">Bounce Rate</h6>
                    </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-info">
                        <i class="mdi mdi-clock-outline"></i>
                        </div>
                    </div>
                    <div class="ps-4">
                        <h4 class="fw-bold text-info mb-0">12.45</h4>
                        <h6 class="text-muted">Schedule Meeting</h6>
                    </div>
                    </div>
                    <div class="d-flex">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-primary">
                        <i class="mdi mdi-timer-sand"></i>
                        </div>
                    </div>
                    <div class="ps-4">
                        <h4 class="fw-bold text-primary mb-0">12.45</h4>
                        <h6 class="text-muted mb-0">Browser Usage</h6>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card color-card-wrapper">
                <div class="card-body">
                    <img class="img-fluid card-top-img w-100" src="assets/images/dashboard/img_5.jpg" alt="">
                    <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                        <div class="color-card primary m-auto">
                        <i class="mdi mdi-clock-outline"></i>
                        <p class="fw-semibold mb-0">Delivered</p>
                        <span class="small">15 Packages</span>
                        </div>
                    </div>
                    <div class="col-6 p-0 mb-4">
                        <div class="color-card bg-success  m-auto">
                        <i class="mdi mdi-tshirt-crew"></i>
                        <p class="fw-semibold mb-0">Ordered</p>
                        <span class="small">72 Items</span>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="color-card bg-info m-auto">
                        <i class="mdi mdi-trophy-outline"></i>
                        <p class="fw-semibold mb-0">Arrived</p>
                        <span class="small">34 Upgraded</span>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="color-card bg-danger m-auto">
                        <i class="mdi mdi-presentation"></i>
                        <p class="fw-semibold mb-0">Reported</p>
                        <span class="small">72 Support</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection