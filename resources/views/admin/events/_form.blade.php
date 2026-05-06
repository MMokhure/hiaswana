{{-- Shared form fields for Events create/edit --}}
@php $event = $event ?? null; @endphp

<div class="mb-3">
  <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title', $event?->title) }}" required>
  @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Description</label>
  <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $event?->description) }}</textarea>
  @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
      @foreach(['workshops' => 'Workshops & Trainings', 'conference' => 'Conference', 'webinars' => 'Webinars', 'forums' => 'Forums'] as $val => $label)
        <option value="{{ $val }}" {{ old('category', $event?->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
      @endforeach
    </select>
    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
      <option value="published" {{ old('status', $event?->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
      <option value="draft" {{ old('status', $event?->status) === 'draft' ? 'selected' : '' }}>Draft</option>
    </select>
  </div>
</div>

<div class="row g-3 mt-1">
  <div class="col-md-6">
    <label class="form-label fw-semibold">Event Date</label>
    <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
           value="{{ old('event_date', $event?->event_date?->format('Y-m-d')) }}">
    @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label fw-semibold">Location</label>
    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
           value="{{ old('location', $event?->location) }}">
    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>

<div class="mt-3">
  <label class="form-label fw-semibold">Image</label>
  @if($event?->image)
    <div class="mb-2">
      <img src="{{ Storage::url($event->image) }}" alt="Current image" style="height:80px;object-fit:cover;border-radius:6px;">
      <small class="text-muted ms-2">Current image</small>
    </div>
  @endif
  <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
  @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
