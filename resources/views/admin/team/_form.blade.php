{{-- Shared form fields for Team Members create/edit --}}
@php $member = $member ?? null; @endphp

<div class="mb-3">
  <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
         value="{{ old('name', $member?->name) }}" required>
  @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Role / Title <span class="text-danger">*</span></label>
  <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
         value="{{ old('role', $member?->role) }}" placeholder="e.g. President, Secretary General" required>
  @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Bio</label>
  <textarea name="bio" rows="3" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $member?->bio) }}</textarea>
  @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3">
  <div class="col-md-4">
    <label class="form-label fw-semibold">Sort Order</label>
    <input type="number" name="sort_order" min="0" class="form-control @error('sort_order') is-invalid @enderror"
           value="{{ old('sort_order', $member?->sort_order ?? 0) }}">
    <div class="form-text">Lower numbers appear first.</div>
    @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4 d-flex align-items-end">
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
             {{ old('is_active', $member?->is_active ?? true) ? 'checked' : '' }}>
      <label class="form-check-label fw-semibold" for="is_active">
        Active <small class="text-muted">(visible on site)</small>
      </label>
    </div>
  </div>
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Photo</label>
  @if($member?->photo)
    <div class="mb-2">
      <img src="{{ Storage::url($member->photo) }}" class="rounded border" style="max-width:120px;max-height:120px;object-fit:cover;">
      <small class="text-muted ms-2">Current photo</small>
    </div>
  @endif
  <input type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror"
         onchange="previewImage(this, 'new-photo-preview')">
  <div id="new-photo-preview" class="mt-2"></div>
  @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>