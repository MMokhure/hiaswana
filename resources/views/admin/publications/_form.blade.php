{{-- Shared form fields for Publications create/edit --}}
@php $publication = $publication ?? null; @endphp

<div class="mb-3">
  <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title', $publication?->title) }}" required>
  @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Description</label>
  <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $publication?->description) }}</textarea>
  @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label fw-semibold">Author / Publisher</label>
    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
           value="{{ old('author', $publication?->author) }}">
    @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label fw-semibold">Year</label>
    <input type="number" name="year" min="1990" max="2099" class="form-control @error('year') is-invalid @enderror"
           value="{{ old('year', $publication?->year) }}">
    @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
    <select name="type" class="form-select @error('type') is-invalid @enderror" required>
      @foreach(['PDF', 'Link', 'Report', 'Guideline', 'Case Study'] as $t)
        <option value="{{ $t }}" {{ old('type', $publication?->type) === $t ? 'selected' : '' }}>{{ $t }}</option>
      @endforeach
    </select>
    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>

<div class="row g-3 mt-1">
  <div class="col-md-6">
    <label class="form-label fw-semibold">External URL</label>
    <input type="text" name="file_url" class="form-control @error('file_url') is-invalid @enderror"
           placeholder="https://..." value="{{ old('file_url', $publication?->file_url) }}">
    <div class="form-text">Or upload a file below.</div>
    @error('file_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label fw-semibold">Upload File (PDF / Word)</label>
    <input type="file" name="file" accept=".pdf,.doc,.docx" class="form-control @error('file') is-invalid @enderror">
    @if($publication?->file_url && !str_starts_with($publication->file_url, 'http'))
      <div class="form-text">Current: <a href="{{ Storage::url($publication->file_url) }}" target="_blank">view file</a></div>
    @endif
    @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>

<div class="mt-3">
  <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
  <select name="status" class="form-select @error('status') is-invalid @enderror" required>
    <option value="published" {{ old('status', $publication?->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
    <option value="draft" {{ old('status', $publication?->status) === 'draft' ? 'selected' : '' }}>Draft</option>
  </select>
</div>
