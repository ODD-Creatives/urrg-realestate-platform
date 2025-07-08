@extends('admin.layouts.app')

@section('content')

 <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
                 @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        {{-- Use Bootstrap's standard close button --}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
               
              <div class="card">
                <div class="card-body">
                <div class="mb-3 card-header border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Menu List</h3>
                    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add Menu</a>
                </div>
                 
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Menu items</th>
                                <th>Dropdown Items & Sub-items</th> 
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menuItems as $index => $menuItem)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td> 
                                    <td>{{ $menuItem->name }}</td>
                                    <td>
                                        @if ($menuItem->dropdownItems && $menuItem->dropdownItems->isNotEmpty())
                                            <ul class="list-unstyled mb-0"> 
                                                @foreach ($menuItem->dropdownItems as $dropdownItem)
                                                    @include('admin.pages.menu.dropdown_item', ['item' => $dropdownItem])
                                                @endforeach 
                                            </ul>
                                        @else
                                            <span class="text-muted">None</span> 
                                        @endif
                                    </td>
                                    <td>{{ $menuItem->created_at->format('d M Y') }}</td> 
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary btn-sm me-2" href="{{ route('admin.menu.edit', encrypt($menuItem->id)) }}">Edit</a>
                                            <form action="{{ route('admin.menu.destroy', encrypt($menuItem->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Menu and all its items?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No menu items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          
         
          </div>
        </div>
@endsection 