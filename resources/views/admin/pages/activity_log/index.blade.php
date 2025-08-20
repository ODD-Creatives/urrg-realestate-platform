@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper py-4">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                    <h5 class="mb-0 fw-semibold">🧾 Recent Activity Log</h5>
                    <a href="{{ route('admin.activityLog.index') }}" class="btn btn-sm btn-outline-secondary">
                        View All
                    </a>
                </div>
                <div class="card-body p-3 table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 40%;">User</th>
                                <th scope="col" style="width: 20%;">Role</th>
                                {{-- <th scope="col">Activity</th> --}}
                                <th scope="col" style="width: 20%;">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                                <tr>
                                    <td>{{ $activities->firstItem() + $loop->index }}</td>
                                    <td>{{ $activity->user->fullname ?? '—' }}</td>
                                    <td>
                                        @php
                                            $role = 'Unknown';
                                            $badgeClass = 'bg-secondary';

                                            if ($activity->user) {
                                                $role = 'User';
                                                $badgeClass = 'bg-primary';
                                            } elseif ($activity->developer) {
                                                $role = 'Developer';
                                                $badgeClass = 'bg-info';
                                            } elseif ($activity->admin) {
                                                $role = 'Admin';
                                                $badgeClass = 'bg-danger';
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeClass }} text-white">{{ $role }}</span>
                                    </td>
                                    {{-- <td>{{ $activity->activity }}</td> --}}
                                    <td>{{ $activity->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        No recent activity found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-end bg-white border-top">
                    {{ $activities->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
