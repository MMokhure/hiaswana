@extends('admin.layouts.app')
@section('title', 'Membership Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Membership Management</h5>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.members.create') }}" class="btn btn-sm btn-primary">
      <i class="bi bi-person-plus me-1"></i> Add Member
    </a>
    <a href="{{ route('admin.members.export') }}" class="btn btn-sm btn-outline-success">
      <i class="bi bi-download me-1"></i> Export CSV
    </a>
  </div>
</div>

{{-- Stats row --}}
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="card border-0 shadow-sm text-center py-3">
      <div class="fs-4 fw-bold">{{ $counts['all'] }}</div>
      <div class="small text-muted">Total</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card border-0 shadow-sm text-center py-3">
      <div class="fs-4 fw-bold text-warning">{{ $counts['pending'] }}</div>
      <div class="small text-muted">Pending</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card border-0 shadow-sm text-center py-3">
      <div class="fs-4 fw-bold text-success">{{ $counts['approved'] }}</div>
      <div class="small text-muted">Approved</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card border-0 shadow-sm text-center py-3">
      <div class="fs-4 fw-bold text-danger">{{ $counts['rejected'] }}</div>
      <div class="small text-muted">Rejected</div>
    </div>
  </div>
</div>

{{-- Filters --}}
<div class="card border-0 shadow-sm mb-3">
  <div class="card-body py-2 px-3">
    <form method="GET" action="{{ route('admin.members.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
      <div class="btn-group btn-group-sm" role="group">
        <a href="{{ route('admin.members.index', array_merge(request()->except('status','page'), ['status' => 'all'])) }}"
           class="btn {{ $status === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
        <a href="{{ route('admin.members.index', array_merge(request()->except('status','page'), ['status' => 'pending'])) }}"
           class="btn {{ $status === 'pending' ? 'btn-warning' : 'btn-outline-secondary' }}">Pending</a>
        <a href="{{ route('admin.members.index', array_merge(request()->except('status','page'), ['status' => 'approved'])) }}"
           class="btn {{ $status === 'approved' ? 'btn-success' : 'btn-outline-secondary' }}">Approved</a>
        <a href="{{ route('admin.members.index', array_merge(request()->except('status','page'), ['status' => 'rejected'])) }}"
           class="btn {{ $status === 'rejected' ? 'btn-danger' : 'btn-outline-secondary' }}">Rejected</a>
      </div>
      <input type="hidden" name="status" value="{{ $status }}">
      <div class="input-group input-group-sm ms-auto" style="max-width:280px;">
        <input type="text" name="search" class="form-control" placeholder="Search name, email, org…" value="{{ $search }}">
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        @if($search)
          <a href="{{ route('admin.members.index', ['status' => $status]) }}" class="btn btn-outline-secondary"><i class="bi bi-x"></i></a>
        @endif
      </div>
    </form>
  </div>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Name</th>
          <th>Membership No.</th>
          <th>Category</th>
          <th>Organization</th>
          <th>Status</th>
          <th>Payment</th>
          <th>Applied</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($members as $m)
        <tr>
          <td class="ps-3">
            <div class="fw-medium">{{ $m->name }}</div>
            <small class="text-muted">{{ $m->email }}</small>
          </td>
          <td>
            @if($m->membership_number)
              <code class="text-success">{{ $m->membership_number }}</code>
            @else
              <span class="text-muted">—</span>
            @endif
          </td>
          <td><span class="badge bg-secondary">{{ $m->category }}</span></td>
          <td>{{ $m->organization ?: '—' }}</td>
          <td>
            @if($m->status === 'pending')
              <span class="badge bg-warning text-dark">Pending</span>
            @elseif($m->status === 'approved')
              <span class="badge bg-success">Approved</span>
            @else
              <span class="badge bg-danger">Rejected</span>
            @endif
          </td>
          <td>
            @if($m->payment_status === 'paid')
              <span class="badge bg-success">Paid</span>
            @elseif($m->payment_status === 'pending_verification')
              <span class="badge bg-warning text-dark">Pending</span>
            @else
              <span class="badge bg-secondary">Unpaid</span>
            @endif
          </td>
          <td>{{ $m->created_at->format('M d, Y') }}</td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.members.show', $m) }}" class="btn btn-sm btn-outline-secondary" title="View">
                <i class="bi bi-eye"></i>
              </a>
              <a href="{{ route('admin.members.edit', $m) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                <i class="bi bi-pencil"></i>
              </a>
              @if($m->status !== 'approved')
              <form method="POST" action="{{ route('admin.members.approve', $m) }}" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-success" title="Approve"><i class="bi bi-check-lg"></i></button>
              </form>
              @endif
              @if($m->status !== 'rejected')
              <form method="POST" action="{{ route('admin.members.reject', $m) }}" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-danger" title="Reject"><i class="bi bi-x-lg"></i></button>
              </form>
              @endif
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="8" class="text-center py-4 text-muted">No applications found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($members->hasPages())
  <div class="card-footer bg-white">{{ $members->links() }}</div>
  @endif
</div>
@endsection

