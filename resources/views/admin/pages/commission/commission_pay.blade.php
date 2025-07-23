@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0 ">
                <h3 class="font-weight-bold">💰 Commission Payment </h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
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
                    <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="searchEmail" class="form-label">Search by Realtor Email</label>
                        <input type="text" id="searchEmail" class="form-control" placeholder="e.g., grace@example.com">
                    </div>
                    <div class="col-md-6 align-self-end mt-2">
                        <button class="btn btn-outline-primary">Fetch Realtor & Uplines</button>
                    </div>
                    </div>

                    <!-- Step 2: Commission Entry Panel (Populated After Search) -->
                    <form action="#" method="POST">
                    <!-- Realtor -->
                    <div class="border rounded p-3 mb-3 bg-light">
                        <h6 class="mb-2">🎯 Realtor: Grace Johnson</h6>
                        <p><strong>Bank:</strong> First Bank</p>
                        <p><strong>Account No:</strong> 0123456789</p>
                        <div class="mb-2">
                        <label for="realtor_amount" class="form-label">Realtor Commission (₦)</label>
                        <input type="number" class="form-control" id="realtor_amount" name="realtor_amount" placeholder="e.g., 10000" required>
                        </div>
                    </div>

                    <!-- Upline 1 -->
                    <div class="border rounded p-3 mb-3">
                        <h6 class="mb-2">🔗 Upline 1: John Musa</h6>
                        <p><strong>Bank:</strong> GTB</p>
                        <p><strong>Account No:</strong> 0234567890</p>
                        <div class="mb-2">
                        <label for="upline1_amount" class="form-label">Upline 1 Commission (₦)</label>
                        <input type="number" class="form-control" id="upline1_amount" name="upline1_amount" placeholder="e.g., 3000">
                        </div>
                    </div>

                    <!-- Upline 2 -->
                    <div class="border rounded p-3 mb-3">
                        <h6 class="mb-2">🔗 Upline 2: Deborah Olu</h6>
                        <p><strong>Bank:</strong> Access Bank</p>
                        <p><strong>Account No:</strong> 0456789012</p>
                        <div class="mb-2">
                        <label for="upline2_amount" class="form-label">Upline 2 Commission (₦)</label>
                        <input type="number" class="form-control" id="upline2_amount" name="upline2_amount" placeholder="e.g., 2000">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">✅ Record & Pay Commission</button>
                    </div>
                    </form>
                </div>
            </div>



                

                
        </div>
    </div>
@endsection 