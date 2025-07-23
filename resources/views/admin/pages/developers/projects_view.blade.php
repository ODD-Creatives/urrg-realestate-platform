@extends('admin.layouts.app')

@section('content')
        <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Developer's Project</h3>
                    <h6 class="font-weight-normal mb-0">🏗️ Project Details – Oakwood Estate</h6>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="mb-0">Project Details</h4>
                  <div>
                    <a href="{{ route('admin.developers.projects') }}" class="btn btn-sm btn-outline-dark">Back</a>   
                  </div>
                </div>
                <div class="card-body">
                  <!-- Project Info -->
                  <div class="row mb-4">
                    <div class="col-md-6 mb-4"> 
                      <p><strong>Project Name:</strong> Oakwood Estate</p>
                      <p><strong>Status:</strong> <span class="badge bg-success">Ongoing</span></p>
                      <p><strong>Category:</strong> Mixed (Land & Apartments)</p>
                      <p><strong>Location:</strong> Lekki Phase 1, Lagos</p>
                    </div>
                    <div class="col-md-6 mb-4">
                      <p><strong>Developer:</strong> URRG Properties Ltd</p>
                      <p><strong>Email:</strong> urrg@example.com</p>
                      <p><strong>Phone:</strong> +234 809 123 4567</p>
                      <p><strong>Created:</strong> 2024-06-01</p>
                    </div>
                    <div class="col-md-6 mb-4">
                      <!-- Description -->
                      <div class="mb-4">
                        <h6>📄 Project Description</h6>
                        <p>
                          Oakwood Estate is a modern residential development with luxury apartments, plots of land, and smart infrastructure.
                          The estate includes gym facilities, 24/7 power supply, drainage, and a gated security system.
                        </p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <!-- Banner or Gallery -->
                      <div class="">
                        <h6>🖼 Project Banner</h6>
                        <img src="/storage/projects/oakwood-banner.jpg" class="img-fluid rounded" alt="Project Banner">
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <!-- Project Flags -->
                      <div class="mb-3">
                        <strong>Project Tags:</strong>
                        <span class="badge bg-info">Featured</span>
                        <span class="badge bg-dark">Verified</span>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <a href="{{ route('admin.developers.projects_add') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                      <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                      <a href="#" class="btn btn-sm btn-outline-danger">Reject</a>
                    </div>
                  </div>

                  

                  

                  

                  <!-- Listings Under Project -->
                  
                </div>
              </div>







            </div>
            
        </div>
@endsection 