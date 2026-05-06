@extends('admin.layouts.app')
@section('title', 'Membership Applications')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Membership Applications</h5>
  <div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('admin.members.index') }}" class="btn {{ $status === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
    <a href="{{ route('admin.members.index', ['status' => 'pending']) }}" class="btn {{ $status === 'pending' ? 'btn-warning' : 'btn-outline-secondary' }}">Pending</a>
    <a href="{{ route('admin.members.index', ['status' => 'approved']) }}" class="btn {{ $status === 'approved' ? 'btn-success' : 'btn-outline-secondary' }}">Approved</a>
    <a href="{{ route('admin.members.index', ['status' => 'rejected']) }}" class="btn {{ $status === 'rejected' ? 'btn-danger' : 'btn-outline-secondary' }}">Rejected</a>
  </div>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Name</th>
          <th>Email</th>
          <th>Category</th>
          <th>Organization</th>
          <th>Status</th>
          <th>Applied</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($members as $m)
        <tr>
          <td class="ps-3 fw-medium">{{ $m->name }}</td>
          <td>{{ $m->email }}</td>
          <td>{{ $m->category }}</td>
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
          <td>{{ $m->created_at->format('M d, Y') }}</td>
          <td>
            <a href="{{ route('admin.members.show', $m) }}" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-eye"></i>
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
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center py-4 text-muted">No applications found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($members->hasPages())
  <div class="card-footer bg-white">{{ $members->links() }}</div>
  @endif
</div>
@endsection
