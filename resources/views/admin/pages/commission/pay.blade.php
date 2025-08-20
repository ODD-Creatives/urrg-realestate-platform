
@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">💰 Commission Payment</h3>
                        <h6 class="font-weight-normal mb-0">
                            All systems are running smoothly! You have 
                            <span class="text-primary">3 unread alerts!</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>💸 Pay Commission</h4>
                    <a href="{{ route('admin.commissions.index') }}" class="btn btn-sm btn-outline-dark">Back</a>
                </div>
                
                <div class="card-body">
                    <!-- Step 1: Search Realtor -->
                    <form method="GET" action="{{ route('admin.commissions.pay') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="search" class="form-label">Search by Realtor ID or Email</label>
                                <input type="text" id="search" name="search" class="form-control" 
                                       value="{{ request('search') }}" 
                                       placeholder="e.g., RLTR-001 or realtor@example.com" required>
                            </div>
                            <div class="col-md-6 align-self-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Fetch Realtor & Uplines
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    
                    
                    @if($realtor)
                    <form method="POST" action="{{ route('admin.commissions.process-payment') }}">
    @csrf
    <input type="hidden" name="realtor_id" value="{{ $realtor->id }}">
    <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

    <!-- Realtor Info -->
    <div class="border rounded p-3 mb-3 bg-light">
        <h5 class="mb-3">
            <i class="fas fa-user-tie text-primary"></i> Realtor: {{ $realtor->fullname }}
            <span class="badge bg-info float-end">ID: {{ $realtor->realtor_id }}</span>
            @if($realtor->upline_referral)
                <span class="badge bg-secondary ms-2">Upline Code: {{ $realtor->upline_referral }}</span>
            @endif
        </h5>
        
        <div class="row">
            <div class="col-md-4">
                <p><strong>Bank:</strong> {{ $realtor->bank_name ?? 'N/A' }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Account Name:</strong> {{ $realtor->account_name ?? 'N/A' }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Account No:</strong> {{ $realtor->account_number ?? 'N/A' }}</p>
            </div>
        </div>
        
        <!-- Commission Amount for Main Realtor -->
        <div class="mb-2 mt-3">
            <label for="realtor_amount" class="form-label">
                <strong>Commission Amount for Realtor (₦)</strong>
            </label>
            <input type="number" class="form-control" 
                   id="realtor_amount" 
                   name="realtor_amount" 
                   value="{{ old('realtor_amount') }}"
                   placeholder="e.g., 10000" 
                   required>
            @error('realtor_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Uplines Section - MAX 3 LEVELS -->
    @if($uplineTree['has_uplines'])
        <h5 class="mt-4 mb-3">
            <i class="fas fa-network-wired"></i> Upline Commissions 
            <span class="badge bg-info">Levels: {{ $uplineTree['total_levels'] }}/3</span>
        </h5>
        
        <!-- Display only the first 3 uplines -->
        @foreach(array_slice($uplineTree['uplines'], 0, 3) as $index => $uplineData)
            <div class="border rounded p-3 mb-3">
                <h6 class="mb-2">
                    <i class="fas fa-level-up-alt"></i> Level {{ $uplineData['level'] }}: 
                    {{ $uplineData['entity']->name ?? $uplineData['entity']->username }}
                    
                    <span class="badge bg-{{ $uplineData['is_admin'] ? 'danger' : 'info' }} ms-2">
                        {{ $uplineData['is_admin'] ? 'Admin' : 'User' }}
                    </span>
                    
                    <span class="badge bg-secondary float-end">
                        Code: {{ $uplineData['code'] }}
                    </span>
                </h6>
                
                <div class="row">
                    @if($uplineData['is_admin'])
                        <!-- Admin Details -->
                        <div class="col-md-6">
                            <p><strong>Username:</strong> {{ $uplineData['entity']->username }}</p>
                            <p><strong>Email:</strong> {{ $uplineData['entity']->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Role:</strong> Administrator</p>
                            <p><strong>Referral Code:</strong> {{ $uplineData['entity']->referral_code }}</p>
                        </div>
                    @else
                        <!-- User Details -->
                        <div class="col-md-4">
                            <p><strong>Name:</strong> {{ $uplineData['entity']->fullname }}</p>
                            <p><strong>Bank:</strong> {{ $uplineData['entity']->bank_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Realtor ID:</strong> {{ $uplineData['entity']->realtor_id }}</p>
                            <p><strong>Account Name:</strong> {{ $uplineData['entity']->account_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Email:</strong> {{ $uplineData['entity']->email }}</p>
                            <p><strong>Account No:</strong> {{ $uplineData['entity']->account_number ?? 'N/A' }}</p>
                        </div>
                    @endif
                </div>
                
                <div class="mb-2 mt-3">
                    <label for="upline_{{ $index }}" class="form-label">Commission Amount (₦)</label>
                    <input type="number" class="form-control" 
                           id="upline_{{ $index }}" 
                           name="upline_commissions[{{ $index }}][amount]" 
                           value="{{ old("upline_commissions.$index.amount") }}"
                           placeholder="e.g., 3000">
                    <input type="hidden" name="upline_commissions[{{ $index }}][user_id]" 
                           value="{{ $uplineData['entity']->id }}">
                    <input type="hidden" name="upline_commissions[{{ $index }}][level]" 
                           value="{{ $uplineData['level'] }}">
                    <input type="hidden" name="upline_commissions[{{ $index }}][is_admin]" 
                           value="{{ $uplineData['is_admin'] ? 1 : 0 }}">
                    @error("upline_commissions.$index.amount")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endforeach

        <!-- Show message if more than 3 uplines exist but we're only displaying 3 -->
        @if(count($uplineTree['uplines']) > 3)
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> 
                Note: Only showing first 3 upline levels. Total uplines in chain: {{ count($uplineTree['uplines']) }}
            </div>
        @endif
        
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> 
            No uplines found for commission distribution.
        </div>
    @endif

    <!-- Submit Button -->
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fas fa-check-circle"></i> Confirm & Process Payments
        </button>
    </div>
</form>
@endif
                </div>
            </div>
        </div>
    </div>
@endsection