@extends('admin.layouts.app')
@section('title', 'Member Application')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Application: {{ $member->name }}</h5>
</div>

<div class="row g-4">
  <div class="col-md-6">
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white fw-semibold">Contact Details</div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-4">Name</dt><dd class="col-sm-8">{{ $member->name }}</dd>
          <dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $member->email }}</dd>
          <dt class="col-sm-4">Phone</dt><dd class="col-sm-8">{{ $member->phone ?: '—' }}</dd>
          <dt class="col-sm-4">Organization</dt><dd class="col-sm-8">{{ $member->organization ?: '—' }}</dd>
          <dt class="col-sm-4">Category</dt><dd class="col-sm-8">{{ $member->category }}</dd>
          <dt class="col-sm-4">Applied</dt><dd class="col-sm-8">{{ $member->created_at->format('M d, Y H:i') }}</dd>
          <dt class="col-sm-4">Status</dt>
          <dd class="col-sm-8">
            @if($member->status === 'pending')
              <span class="badge bg-warning text-dark">Pending</span>
            @elseif($member->status === 'approved')
              <span class="badge bg-success">Approved</span>
            @else
              <span class="badge bg-danger">Rejected</span>
            @endif
          </dd>
        </dl>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white fw-semibold">Motivation</div>
      <div class="card-body">
        <p class="mb-0">{{ $member->motivation ?: 'No motivation provided.' }}</p>
      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mt-4">
  @if($member->status !== 'approved')
  <form method="POST" action="{{ route('admin.members.approve', $member) }}">
    @csrf
    <button class="btn btn-success"><i class="bi bi-check-lg me-1"></i>Approve</button>
  </form>
  @endif
  @if($member->status !== 'rejected')
  <form method="POST" action="{{ route('admin.members.reject', $member) }}">
    @csrf
    <button class="btn btn-danger"><i class="bi bi-x-lg me-1"></i>Reject</button>
  </form>
  @endif
  <form method="POST" action="{{ route('admin.members.destroy', $member) }}"
        onsubmit="return confirm('Permanently delete this application?')">
    @csrf @method('DELETE')
    <button class="btn btn-outline-danger"><i class="bi bi-trash me-1"></i>Delete</button>
  </form>
</div>
@endsection
