
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card ">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0 text-white">Property Sold</h4>
                            <h3 class="fw-bold mb-0">{{ $user->sold_properties_count }}</h3>
                        </div> 
                        <i class="mdi mdi-castle text-white icon-lg"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mb-0">Referral Count</h4>
                            <h3 class="fw-bold mb-0">{{ $user->referrals->count() }}</h3>
                        </div>
                        <i class="mdi mdi-account-multiple text-warning icon-lg"></i>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
       
