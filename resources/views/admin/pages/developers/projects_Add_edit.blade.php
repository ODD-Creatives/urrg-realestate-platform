    
@extends('admin.layouts.app')
    
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">🏗️ Add / Edit Project</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"> Project</h4>
                    <a href="developerprofile.html" class="btn btn-sm btn-outline-dark">Back</a>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Project Name -->
                        <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="e.g., Oakwood Estate" required>
                        </div>

                        <!-- Developer -->
                        <div class="col-md-6 mb-3">
                        <label for="developer_id" class="form-label">Select Developer</label>
                        <select class="form-select" name="developer_id" id="developer_id" required>
                            <option value="" disabled selected>Select a developer</option>
                            <option value="1">URRG Properties Ltd</option>
                            <option value="2">Greenstone Estates</option>
                            <!-- Add options dynamically -->
                        </select>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Lekki Phase 1, Lagos" required>
                        </div>

                        <!-- Project Status -->
                        <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="upcoming">Upcoming</option>
                        </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                        <label for="description" class="form-label">Project Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the project..." required></textarea>
                        </div>

                        <!-- Upload Banner -->
                        <div class="col-12 mb-3">
                        <label for="banner" class="form-label">Project Banner</label>
                        <input type="file" class="form-control" name="banner" id="banner" accept="image/*" required>
                        <small class="text-muted">Recommended size: 1200x600px (JPG or PNG)</small>
                        </div>

                        <!-- Featured Checkbox -->
                        
                        <div class="col-md-12 mb-3 ">
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label" for="is_sold"> 
                                    <input class="form-check-input" type="checkbox" value="1" id="is_sold" name="is_sold">
                                    Mark as Featured
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Save Project</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        
    </div>

@endsection 