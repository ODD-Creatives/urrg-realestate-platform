@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">🎓 Academy Events</h3>
                        <h6 class="font-weight-normal mb-0">📤 Upload Academy Event</h6>
                        
                                               
                    </div>
                  
                </div>
              </div>
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Event</h4>
                        <div>
                            <a href="{{ route('admin.accademyEvents.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.accademyEvents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Event Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Real Estate Masterclass" required>
                                </div>

                                <!-- Date -->
                                <div class="col-md-6 mb-3">
                                <label for="event_date" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" required>
                                </div>

                                <!-- Banner Upload -->
                                <div class="col-12 mb-3">
                                <label for="banner" class="form-label">Event Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner" accept="image/*" required>
                                <small class="text-muted">JPG/PNG, recommended size: 1200x600px</small>
                                </div>

                                <!-- Description -->
                                <div class="col-12 mb-3">
                                <label for="description" class="form-label">Event Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Details of what attendees will learn..." required></textarea>
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success">💾 Save Event</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




            </div>
            
          </div>
@endsection 