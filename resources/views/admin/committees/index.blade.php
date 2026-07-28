@extends('admin.layouts.app')
@section('title', 'Committees')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Committees</h5>
  <a href="{{ route('admin.committees.create') }}" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-lg me-1"></i> Add Committee
  </a>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Committee Name</th>
          <th>Members</th>
          <th>Order</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($committees as $committee)
        <tr>
          <td class="ps-3">
            <div class="fw-medium">{{ $committee->name }}</div>
            @if($committee->description)
              <small class="text-muted">{{ Str::limit($committee->description, 70) }}</small>
            @endif
          </td>
          <td><span class="badge bg-secondary">{{ $committee->members_count }}</span></td>
          <td>{{ $committee->sort_order }}</td>
          <td>
            @if($committee->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.committees.show', $committee) }}" class="btn btn-sm btn-outline-secondary" title="View Members"><i class="bi bi-people"></i></a>
              <a href="{{ route('admin.committees.edit', $committee) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
              <form method="POST" action="{{ route('admin.committees.destroy', $committee) }}"
                    onsubmit="return confirm('Delete this committee and all its members?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-5 text-muted">No committees yet. <a href="{{ route('admin.committees.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
