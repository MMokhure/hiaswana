@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-3 p-3" style="background:#e8f4fd;">
          <i class="bi bi-calendar-event fs-4 text-primary"></i>
        </div>
        <div>
          <div class="text-muted small">Events</div>
          <div class="fs-3 fw-bold">{{ $stats['events'] }}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-3 p-3" style="background:#e8fdf0;">
          <i class="bi bi-people fs-4 text-success"></i>
        </div>
        <div>
          <div class="text-muted small">Team Members</div>
          <div class="fs-3 fw-bold">{{ $stats['team_members'] }}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-3 p-3" style="background:#fdf4e8;">
          <i class="bi bi-journal-text fs-4 text-warning"></i>
        </div>
        <div>
          <div class="text-muted small">Publications</div>
          <div class="fs-3 fw-bold">{{ $stats['publications'] }}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="rounded-3 p-3" style="background:#fde8e8;">
          <i class="bi bi-person-check fs-4 text-danger"></i>
        </div>
        <div>
          <div class="text-muted small">Members ({{ $stats['pending'] }} pending)</div>
          <div class="fs-3 fw-bold">{{ $stats['members'] }}</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
    <h6 class="mb-0 fw-semibold">Recent Membership Applications</h6>
    <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Name</th>
          <th>Email</th>
          <th>Category</th>
          <th>Status</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @forelse($latestMembers as $m)
        <tr>
          <td class="ps-3">{{ $m->name }}</td>
          <td>{{ $m->email }}</td>
          <td>{{ $m->category }}</td>
          <td>
            @if($m->status === 'pending')
              <span class="badge bg-warning text-dark">Pending</span>
            @elseif($m->status === 'approved')
              <span class="badge bg-success">Approved</span>
            @else
              <span class="badge bg-danger">Rejected</span>
            @endif
          </td>
          <td>{{ $m->created_at->format('M d, Y') }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-4 text-muted">No applications yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
