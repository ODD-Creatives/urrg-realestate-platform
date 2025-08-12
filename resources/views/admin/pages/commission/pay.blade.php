
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
                    
                    @if(isset($realtor))
                        <form method="POST" action="{{ route('admin.commissions.process-payment') }}">
                            @csrf 
                            <input type="hidden" name="realtor_id" value="{{ $realtor->id }}">
     
                            <!-- Main Realtor Card -->
                            <div class="border rounded p-3 mb-3 bg-light">
                                <h5 class="mb-3">
                                    <i class="fas fa-user-tie text-primary"></i> Realtor: {{ $realtor->fullname }}
                                    <span class="badge bg-info float-end">ID: {{ $realtor->realtor_id }}</span>
                                </h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Bank:</strong> {{ $realtor->bank_name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Account Name:</strong> {{ $realtor->account_name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Account No:</strong> {{ $realtor->account_number }}</p>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="realtor_amount" class="form-label">Commission Amount (₦)</label>
                                    <input type="number" class="form-control" id="realtor_amount" 
                                           name="realtor_amount" value="{{ old('realtor_amount') }}" 
                                           placeholder="e.g., 10000" required>
                                    @error('realtor_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Uplines Section -->
                            @if($uplineTree && count($uplineTree['children']) > 0)
                                <h5 class="mt-4 mb-3"><i class="fas fa-network-wired"></i> Upline Commissions</h5>
                                
                                @foreach($uplineTree['children'] as $index => $upline)
                                    <div class="border rounded p-3 mb-3">
                                        <h6 class="mb-2">
                                            <i class="fas fa-level-up-alt"></i> Upline {{ $index + 1 }}: {{ $upline['child']->fullname }}
                                            <span class="badge bg-secondary float-end">Level {{ $index + 1 }}</span>
                                        </h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>Bank:</strong> {{ $upline['child']->bank_name }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Account Name:</strong> {{ $upline['child']->account_name }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Account No:</strong> {{ $upline['child']->account_number }}</p>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="upline_{{ $upline['child']->id }}" class="form-label">Commission Amount (₦)</label>
                                            <input type="number" class="form-control" 
                                                   id="upline_{{ $upline['child']->id }}" 
                                                   name="upline_commissions[{{ $index }}][amount]" 
                                                   value="{{ old("upline_commissions.$index.amount") }}" 
                                                   placeholder="e.g., 3000">
                                            <input type="hidden" name="upline_commissions[{{ $index }}][user_id]" 
                                                   value="{{ $upline['child']->id }}">
                                            @error("upline_commissions.$index.amount")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            @endif

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