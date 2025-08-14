@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">🏘️ Property Detail</h3>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>{{ $property->title }}</h4>
                <a href="{{ route('admin.properties.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
            </div>

            <div class="card-body">
                <div class="row">
                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $imageField = 'image' . $i;
                        @endphp

                        @if ($property->$imageField)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset($property->$imageField) }}" class="img-fluid rounded shadow-sm" style="height: 120px; object-fit: cover;">
                            </div>
                        @endif
                    @endfor
                </div>


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p><strong>Developer:</strong> {{ $property->developer->company_name ?? 'N/A' }}</p>
                        <p><strong>Category:</strong> {{ ucfirst($property->category) }}</p>
                        <p><strong>Location:</strong> {{ $property->location }}</p>
                        <p><strong>Price:</strong> ₦{{ number_format($property->price, 2) }}</p>
                        <p><strong>Size:</strong> {{ $property->size ?? 'N/A' }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge bg-{{ $property->status === 'approved' ? 'success' : ($property->status === 'sold' ? 'danger' : 'warning text-dark') }}">
                                {{ ucfirst($property->status) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Bedrooms:</strong> {{ $property->bedrooms ?? 'N/A' }}</p>
                        <p><strong>Bathrooms:</strong> {{ $property->bathrooms ?? 'N/A' }}</p>
                        <p><strong>Toilets:</strong> {{ $property->toilets ?? 'N/A' }}</p>
                        <p><strong>Created:</strong> {{ $property->created_at->format('M d, Y') }}</p>
                        <p><strong>Updated:</strong> {{ $property->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <h6><strong>Description:</strong></h6>
                    <p>{{ $property->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
