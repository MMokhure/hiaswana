@extends('admin.layouts.app')
@section('title', 'Member Application')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">{{ $member->name }}</h5>
  @if($member->membership_number)
    <code class="text-success ms-2">{{ $member->membership_number }}</code>
  @endif
  <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-sm btn-outline-primary ms-auto">
    <i class="bi bi-pencil me-1"></i>Edit
  </a>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="row g-4">
  <div class="col-md-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white fw-semibold">Contact Details</div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-4">Name</dt><dd class="col-sm-8">{{ $member->name }} {{ $member->surname }}</dd>
          <dt class="col-sm-4">ID / Passport</dt><dd class="col-sm-8">{{ $member->identification_number ?: '—' }}</dd>
          <dt class="col-sm-4">Nationality</dt><dd class="col-sm-8">{{ $member->nationality ?: '—' }}</dd>
          <dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $member->email }}</dd>
          <dt class="col-sm-4">Contact No.</dt><dd class="col-sm-8">{{ $member->phone ?: '—' }}</dd>
          <dt class="col-sm-4">Organization</dt><dd class="col-sm-8">{{ $member->organization ?: '—' }}</dd>
          <dt class="col-sm-4">Residential</dt><dd class="col-sm-8">{{ $member->residential_address ?: '—' }}</dd>
          <dt class="col-sm-4">Postal</dt><dd class="col-sm-8">{{ $member->postal_address ?: '—' }}</dd>
          <dt class="col-sm-4">Category</dt><dd class="col-sm-8"><span class="badge bg-secondary">{{ $member->category }}</span></dd>
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
          @if($member->membership_number)
          <dt class="col-sm-4">Membership No.</dt>
          <dd class="col-sm-8"><code class="text-success fw-bold">{{ $member->membership_number }}</code></dd>
          @endif
          @if($member->approved_at)
          <dt class="col-sm-4">Approved</dt>
          <dd class="col-sm-8">{{ $member->approved_at->format('M d, Y H:i') }}</dd>
          @endif
          <dt class="col-sm-4">Payment</dt>
          <dd class="col-sm-8">
            @if($member->payment_status === 'paid')
              <span class="badge bg-success">Paid</span>
            @elseif($member->payment_status === 'pending_verification')
              <span class="badge bg-warning text-dark">Pending Verification</span>
            @else
              <span class="badge bg-secondary">Unpaid</span>
            @endif
            @if($member->payment_proof)
              <a href="{{ Storage::url($member->payment_proof) }}" target="_blank" class="btn btn-sm btn-outline-info ms-2">
                <i class="bi bi-eye"></i> View Proof
              </a>
            @endif
          </dd>
        </dl>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card border-0 shadow-sm mb-3">
      <div class="card-header bg-white fw-semibold">Motivation</div>
      <div class="card-body">
        <p class="mb-0 text-muted">{{ $member->motivation ?: 'No motivation provided.' }}</p>
      </div>
    </div>
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white fw-semibold">Admin Notes</div>
      <div class="card-body">
        <p class="mb-0 text-muted">{{ $member->notes ?: 'No notes.' }}</p>
      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mt-4 flex-wrap">
  @if($member->status !== 'approved')
  <form method="POST" action="{{ route('admin.members.approve', $member) }}">
    @csrf
    <button class="btn btn-success"><i class="bi bi-check-lg me-1"></i>Approve</button>
  </form>
  @endif
  @if($member->status !== 'rejected')
  <form method="POST" action="{{ route('admin.members.reject', $member) }}">
    @csrf
    <button class="btn btn-warning"><i class="bi bi-x-lg me-1"></i>Reject</button>
  </form>
  @endif
  @if($member->payment_status === 'pending_verification')
  <form method="POST" action="{{ route('admin.members.verify-payment', $member) }}">
    @csrf
    <button class="btn btn-info"><i class="bi bi-check-circle me-1"></i>Verify Payment</button>
  </form>
  @endif
  <form method="POST" action="{{ route('admin.members.destroy', $member) }}"
        onsubmit="return confirm('Permanently delete this application?')">
    @csrf @method('DELETE')
    <button class="btn btn-outline-danger"><i class="bi bi-trash me-1"></i>Delete</button>
  </form>
</div>
@endsection