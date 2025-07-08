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
                    <h3 class="card-title mb-0">Referral Codes</h3> 
                    <a href="{{ route('admin.referrals.code.generator') }}" class="btn btn-primary">Generate Referral Code</a>
                </div>
                 
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Code</th>
                                <th>Admin</th> 
                                <th>Date</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($referrals as $index => $referral)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td> 
                                    <td>
                                    <div class="input-group">
                                        <input type="text" 
                                            class="form-control form-control-sm" 
                                            value="{{ url('/') }}/ref/{{ $referral->code }}" 
                                            id="referral-link-{{ $referral->id }}"
                                            readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-primary copy-btn" 
                                                    data-clipboard-target="#referral-link-{{ $referral->id }}"
                                                    title="Copy referral link">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="text-muted">Click the button to copy your referral link</small>
                                </td>
                                    <td>{{ optional($referral->admin)->username ?? 'N/A' }}</td>
                                    
                                    <td>{{ $referral->created_at->format('d M Y') }}</td> 
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('admin.referrals.code.delete', encrypt($referral->id)) }}" method="POST" 
                                                onsubmit="return confirm('Are you sure you want to delete this Code and all its items?');">
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
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
                    <script>
                        new ClipboardJS('.copy-btn');
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection 
