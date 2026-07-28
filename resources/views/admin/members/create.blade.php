@extends('admin.layouts.app')
@section('title', 'Add Member')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Add Member</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:780px;">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.members.store') }}">
      @csrf

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <div class="row g-3">
        {{-- Name & Surname --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name') }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Surname</label>
          <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror"
                 value="{{ old('surname') }}">
          @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- ID & Nationality --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">ID / Passport Number</label>
          <input type="text" name="identification_number" class="form-control"
                 value="{{ old('identification_number') }}" placeholder="National ID or Passport">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Nationality</label>
          <input type="text" name="nationality" class="form-control"
                 value="{{ old('nationality') }}" placeholder="e.g. Motswana">
        </div>

        {{-- Addresses --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Residential Address</label>
          <textarea name="residential_address" rows="2" class="form-control"
                    placeholder="Street, city, district">{{ old('residential_address') }}</textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Postal Address</label>
          <textarea name="postal_address" rows="2" class="form-control"
                    placeholder="P.O. Box or postal address">{{ old('postal_address') }}</textarea>
        </div>

        {{-- Contact --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email') }}" required>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Contact Number</label>
          <input type="text" name="phone" class="form-control"
                 value="{{ old('phone') }}" placeholder="+267 xxxxxxxx">
        </div>

        {{-- Organisation & Category --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Organisation / Institution</label>
          <input type="text" name="organization" class="form-control"
                 value="{{ old('organization') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Membership Category <span class="text-danger">*</span></label>
          <select name="category" class="form-select @error('category') is-invalid @enderror" required>
            <option value="">Select a category</option>
            @foreach(['Professional','Student','Associate','Institutional'] as $cat)
              <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
          </select>
          @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Status --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="pending"   {{ old('status','pending') === 'pending'   ? 'selected' : '' }}>Pending</option>
            <option value="approved"  {{ old('status') === 'approved'  ? 'selected' : '' }}>Approved (auto-assigns membership number)</option>
            <option value="rejected"  {{ old('status') === 'rejected'  ? 'selected' : '' }}>Rejected</option>
          </select>
          @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Motivation --}}
        <div class="col-12">
          <label class="form-label fw-semibold">Motivation / Notes</label>
          <textarea name="motivation" rows="3" class="form-control"
                    placeholder="Motivation or areas of interest…">{{ old('motivation') }}</textarea>
        </div>
        <div class="col-12">
          <label class="form-label fw-semibold">Admin Notes</label>
          <textarea name="notes" rows="2" class="form-control"
                    placeholder="Internal notes (not visible to member)…">{{ old('notes') }}</textarea>
        </div>
      </div>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i>Add Member</button>
        <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
