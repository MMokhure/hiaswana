@extends('admin.layouts.app')
@section('title', 'Team Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Team Members</h5>
  <a href="{{ route('admin.team.create') }}" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-lg me-1"></i> Add Member
  </a>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0 align-middle">
      <thead class="table-light">
        <tr>
          <th class="ps-3" style="width:60px;">Photo</th>
          <th>Name</th>
          <th>Role</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($members as $member)
        <tr>
          <td class="ps-3">
            @if($member->photo)
              <img src="{{ Storage::url($member->photo) }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;">
            @else
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width:40px;height:40px;font-size:.85rem;">
                {{ strtoupper(substr($member->name,0,1)) }}
              </div>
            @endif
          </td>
          <td class="fw-medium">{{ $member->name }}</td>
          <td>{{ $member->role }}</td>
          <td>{{ $member->sort_order }}</td>
          <td>
            <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil"></i>
            </a>
            <form method="POST" action="{{ route('admin.team.destroy', $member) }}" class="d-inline"
                  onsubmit="return confirm('Delete this team member?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-4 text-muted">No team members yet. <a href="{{ route('admin.team.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
