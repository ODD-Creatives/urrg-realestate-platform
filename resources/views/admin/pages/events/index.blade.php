@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">🎓 Academy Events</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                    <div class="mt-3">
                    <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-warning">+ Upload New Event</a>

                    </div>
                                            
                </div>
                
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">Events</h4>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Banner</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>Building Wealth in Real Estate</td>
                        <td>2024-08-12</td>
                        <td><img src="{{asset('assets/admin/assets/images/carousel/banner_2.jpg')}}" width="80" class="rounded" /></td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('admin.events.show') }}" class="btn btn-sm btn-outline-warning">View</a>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </div>
                        </td>
                        </tr>
                        <!-- More rows -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 