@extends('admin.layouts.app')
<style>
    ul.referral-tree, ul.referral-tree ul {
    list-style-type: none;
    padding-left: 1rem;
    }

    .referral-tree .caret {
    cursor: pointer;
    user-select: none;
    display: inline-block;
    position: relative;
    padding-left: 1rem;
    }

    .referral-tree .caret::before {
    content: "▶";
    position: absolute;
    left: 0;
    top: 0;
    font-size: 12px;
    transition: transform 0.2s ease;
    }

    .referral-tree .caret-down::before {
    transform: rotate(90deg);
    }

    .nested {
    display: none;
    margin-left: 1rem;
    }

    .active {
    display: block;
    }                                                                                                           
</style>
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Realtor's </h3>
                    <h6 class="font-weight-normal mb-0">Realtor's - Referral Tree </h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Referral Tree</h4>
                    <div>
                        <a href="{{ route('admin.realtors.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center2 mb-3">
                            <img src="{{ asset('assets/admin/assets/images/faces/face28.jpg') }}" alt="Realtor Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            <p class="mt-2 fw-bold"> Grace Johnson </p>
                        
                            <p><strong>Email:</strong> grace@example.com</p>
                            <p><strong>Phone:</strong> +234 801 234 5678</p>
                            <p><strong>Status:</strong> 
                                <span class="badge bg-success">Active</span>
                            
                            </p>
                            <p>
                                <strong>Joined:</strong> 
                                    3rd of June, 2025.
                            </p>
                        </div>
                        <div class="col-md-8 shadow p-4">
                            <p>Referral Chain</p>
                            <ul class="referral-tree" id="referralTree">
                                <li>
                                    <span class="caret">You (John Doe)</span>
                                    <ul class="nested">
                                    <li>
                                        <span class="caret">B (Level 1)</span>
                                        <ul class="nested">
                                        <li>
                                            <span class="caret">C (Level 2)</span>
                                            <ul class="nested">
                                            <li>D (Level 3)</li>
                                            </ul>
                                        </li>
                                        <li>E (Level 2)</li>
                                        </ul>
                                    </li>
                                    <li>F (Level 1)</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                </div>



                <script>
                    document.querySelectorAll("#referralTree .caret").forEach(function (caret) {
                        caret.addEventListener("click", function () {
                            this.classList.toggle("caret-down");
                            const nested = this.nextElementSibling;
                            if (nested && nested.classList.contains("nested")) {
                            nested.classList.toggle("active");
                            }
                        });
                    });
                </script>


                    

                    
            </div>
        </div>
@endsection 