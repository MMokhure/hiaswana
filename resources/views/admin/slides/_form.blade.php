{{-- Shared form fields for Slides create/edit --}}
@php $slide = $slide ?? null; @endphp

<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
    <select name="location" class="form-select @error('location') is-invalid @enderror" required>
      <option value="hero"  {{ old('location', $slide?->location) === 'hero'  ? 'selected' : '' }}>Hero Slideshow (Homepage Banner)</option>
      <option value="about" {{ old('location', $slide?->location) === 'about' ? 'selected' : '' }}>About Section Slideshow</option>
    </select>
    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label fw-semibold">Sort Order</label>
    <input type="number" name="sort_order" min="0" class="form-control @error('sort_order') is-invalid @enderror"
           value="{{ old('sort_order', $slide?->sort_order ?? 0) }}">
    @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3 d-flex align-items-end">
    <div class="form-check form-switch mb-2">
      <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
             {{ old('is_active', $slide?->is_active ?? true) ? 'checked' : '' }}>
      <label class="form-check-label fw-semibold" for="is_active">Active</label>
    </div>
  </div>
</div>

<div class="mb-3 mt-3">
  <label class="form-label fw-semibold">Title <span class="text-muted small fw-normal">(optional)</span></label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title', $slide?->title) }}" placeholder="Slide caption title">
  @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Subtitle <span class="text-muted small fw-normal">(optional)</span></label>
  <textarea name="subtitle" rows="2" class="form-control @error('subtitle') is-invalid @enderror"
            placeholder="Short description shown on slide">{{ old('subtitle', $slide?->subtitle) }}</textarea>
  @error('subtitle')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label fw-semibold">Slide Media @if(!$slide)<span class="text-danger">*</span>@endif</label>
  @if($slide?->image_path)
    <div class="mb-2">
      <img src="{{ $slide->media_url }}" alt="Current slide" style="max-height:160px;border-radius:8px;object-fit:cover;">
      <div class="text-muted small mt-1">Current image</div>
    </div>
  @elseif($slide?->video_path)
    <div class="mb-2">
      <video src="{{ Storage::url($slide->video_path) }}" controls style="max-height:160px;border-radius:8px;max-width:100%;"></video>
      <div class="text-muted small mt-1">Current video</div>
    </div>
  @endif
  <div class="row g-2">
    <div class="col-md-6">
      <label class="form-label small">Image (optional)</label>
      <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="imageInput">
    </div>
    <div class="col-md-6">
      <label class="form-label small">Video (optional, mp4/webm/ogg)</label>
      <input type="file" name="video" accept="video/*" class="form-control @error('video') is-invalid @enderror">
    </div>
  </div>
  @if($slide?->image_path)
    <div class="form-check mt-2">
      <input class="form-check-input" type="checkbox" name="remove_image" id="remove_slide_image" value="1">
      <label class="form-check-label" for="remove_slide_image">Remove current image</label>
    </div>
  @endif
  @if($slide?->video_path)
    <div class="form-check mt-2">
      <input class="form-check-input" type="checkbox" name="remove_video" id="remove_slide_video" value="1">
      <label class="form-check-label" for="remove_slide_video">Remove current video</label>
    </div>
  @endif
  <div class="form-text">Upload an image or a video. For videos, prefer MP4/WebM and keep the file size reasonable.</div>
  @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
  @error('video')<div class="invalid-feedback">{{ $message }}</div>@enderror
  <div id="imagePreview" class="mt-2" style="display:none">
    <img id="previewImg" src="" alt="Preview" style="max-height:160px;border-radius:8px;object-fit:cover;">
    <div class="text-muted small mt-1">Preview of new image</div>
  </div>
</div>

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = function(ev) {
    document.getElementById('previewImg').src = ev.target.result;
    document.getElementById('imagePreview').style.display = 'block';
  };
  reader.readAsDataURL(file);
});
</script>
@endpush
