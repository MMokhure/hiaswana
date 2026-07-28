@extends('admin.layouts.app')
@section('title', $committee->name . ' — Members')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.committees.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">{{ $committee->name }}</h5>
  <span class="badge {{ $committee->is_active ? 'bg-success' : 'bg-secondary' }} ms-1">{{ $committee->is_active ? 'Active' : 'Inactive' }}</span>
  <div class="ms-auto d-flex gap-2">
    <a href="{{ route('admin.committees.members.create', $committee) }}" class="btn btn-primary btn-sm">
      <i class="bi bi-person-plus me-1"></i> Add Member
    </a>
    <a href="{{ route('admin.committees.edit', $committee) }}" class="btn btn-sm btn-outline-secondary">
      <i class="bi bi-pencil me-1"></i> Edit Committee
    </a>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

@if($committee->description)
  <p class="text-muted mb-4">{{ $committee->description }}</p>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3" style="width:60px;"></th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Organization</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($committee->members as $member)
        <tr>
          <td class="ps-3">
            @if($member->photo)
              <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                   class="rounded-circle" style="width:38px;height:38px;object-fit:cover;">
            @else
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white"
                   style="width:38px;height:38px;font-size:14px;">
                {{ strtoupper(substr($member->name, 0, 1)) }}
              </div>
            @endif
          </td>
          <td class="fw-medium">{{ $member->name }}</td>
          <td>{{ $member->role }}</td>
          <td>{{ $member->email ?: '—' }}</td>
          <td>{{ $member->organization ?: '—' }}</td>
          <td>{{ $member->sort_order }}</td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.committees.members.edit', [$committee, $member]) }}"
                 class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
              <form method="POST" action="{{ route('admin.committees.members.destroy', [$committee, $member]) }}"
                    onsubmit="return confirm('Remove this member?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Remove"><i class="bi bi-trash"></i></button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center py-5 text-muted">
          No members yet. <a href="{{ route('admin.committees.members.create', $committee) }}">Add the first member</a>.
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
