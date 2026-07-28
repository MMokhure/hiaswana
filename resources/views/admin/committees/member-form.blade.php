@extends('admin.layouts.app')
@section('title', isset($member) ? 'Edit Committee Member' : 'Add Committee Member')

@section('content')
@php $editing = isset($member); @endphp

<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.committees.show', $committee) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">
    {{ $editing ? 'Edit Member' : 'Add Member' }} —
    <span class="text-muted fw-normal">{{ $committee->name }}</span>
  </h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:680px;">
  <div class="card-body p-4">
    <form method="POST"
          action="{{ $editing ? route('admin.committees.members.update', [$committee, $member]) : route('admin.committees.members.store', $committee) }}"
          enctype="multipart/form-data">
      @csrf
      @if($editing) @method('PUT') @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $member->name ?? '') }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Role / Position <span class="text-danger">*</span></label>
          <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
                 value="{{ old('role', $member->role ?? '') }}" placeholder="e.g. Chairperson" required>
          @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email', $member->email ?? '') }}">
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Phone</label>
          <input type="text" name="phone" class="form-control"
                 value="{{ old('phone', $member->phone ?? '') }}">
        </div>
        <div class="col-12">
          <label class="form-label fw-semibold">Organization / Institution</label>
          <input type="text" name="organization" class="form-control"
                 value="{{ old('organization', $member->organization ?? '') }}">
        </div>
        <div class="col-12">
          <label class="form-label fw-semibold">Bio</label>
          <textarea name="bio" rows="3" class="form-control"
                    placeholder="Short professional bio…">{{ old('bio', $member->bio ?? '') }}</textarea>
        </div>
        <div class="col-md-8">
          <label class="form-label fw-semibold">Photo</label>
          @if($editing && $member->photo)
            <div class="mb-2 d-flex align-items-center gap-2">
              <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                   class="rounded-circle" style="width:52px;height:52px;object-fit:cover;">
              <small class="text-muted">Current photo — upload a new one to replace</small>
            </div>
          @endif
          <input type="file" name="photo" accept="image/*"
                 class="form-control @error('photo') is-invalid @enderror">
          @if($editing && $member->photo)
            <div class="form-check mt-2">
              <input class="form-check-input" type="checkbox" name="remove_photo" id="remove_committee_photo" value="1">
              <label class="form-check-label" for="remove_committee_photo">Remove current photo</label>
            </div>
          @endif
          @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Sort Order</label>
          <input type="number" name="sort_order" min="0" class="form-control"
                 value="{{ old('sort_order', $member->sort_order ?? 0) }}">
        </div>
      </div>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary">{{ $editing ? 'Save Changes' : 'Add Member' }}</button>
        <a href="{{ route('admin.committees.show', $committee) }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
