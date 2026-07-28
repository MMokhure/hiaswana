@extends('admin.layouts.app')
@section('title', 'Edit Member')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.members.show', $member) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Edit Member: {{ $member->name }}</h5>
  @if($member->membership_number)
    <code class="text-success ms-2">{{ $member->membership_number }}</code>
  @endif
</div>

<div class="card border-0 shadow-sm" style="max-width:680px;">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.members.update', $member) }}">
      @csrf @method('PUT')

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $member->name) }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Surname</label>
          <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror"
                 value="{{ old('surname', $member->surname) }}">
          @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">ID / Passport Number</label>
          <input type="text" name="identification_number" class="form-control"
                 value="{{ old('identification_number', $member->identification_number) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Nationality</label>
          <input type="text" name="nationality" class="form-control"
                 value="{{ old('nationality', $member->nationality) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Residential Address</label>
          <textarea name="residential_address" rows="2" class="form-control">{{ old('residential_address', $member->residential_address) }}</textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Postal Address</label>
          <textarea name="postal_address" rows="2" class="form-control">{{ old('postal_address', $member->postal_address) }}</textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email', $member->email) }}" required>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Contact Number</label>
          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                 value="{{ old('phone', $member->phone) }}">
          @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Organization</label>
          <input type="text" name="organization" class="form-control @error('organization') is-invalid @enderror"
                 value="{{ old('organization', $member->organization) }}">
          @error('organization')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
          <select name="category" class="form-select @error('category') is-invalid @enderror" required>
            @foreach(['Professional','Student','Associate','Institutional'] as $cat)
              <option value="{{ $cat }}" {{ old('category', $member->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
          </select>
          @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
          <label class="form-label fw-semibold">Admin Notes</label>
          <textarea name="notes" rows="4" class="form-control @error('notes') is-invalid @enderror"
                    placeholder="Internal notes about this member…">{{ old('notes', $member->notes) }}</textarea>
          @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.members.show', $member) }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
