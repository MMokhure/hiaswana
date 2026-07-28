@extends('admin.layouts.app')
@section('title', $groupLabel . ' Settings')

@section('content')
<div class="row g-4">

  {{-- Settings Group Sidebar --}}
  <div class="col-md-3">
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white fw-semibold py-3">Settings</div>
      <div class="list-group list-group-flush">
        @foreach($groups as $slug => $label)
        <a href="{{ route('admin.settings.group', $slug) }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ $group === $slug ? 'active' : '' }}">
          @php
            $icons = ['general'=>'bi-gear','media'=>'bi-image','contact'=>'bi-telephone','social'=>'bi-share','homepage'=>'bi-house','services'=>'bi-lightning','footer'=>'bi-layout-text-window-reverse','pages'=>'bi-file-text'];
          @endphp
          <i class="bi {{ $icons[$slug] ?? 'bi-sliders' }}"></i>
          {{ $label }}
        </a>
        @endforeach
      </div>
    </div>
  </div>

  {{-- Settings Form --}}
  <div class="col-md-9">
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
        @php $iconMap = ['general'=>'bi-gear','media'=>'bi-image','contact'=>'bi-telephone','social'=>'bi-share','homepage'=>'bi-house','services'=>'bi-lightning','footer'=>'bi-layout-text-window-reverse','pages'=>'bi-file-text']; @endphp
        <i class="bi {{ $iconMap[$group] ?? 'bi-sliders' }} text-primary"></i>
        <h6 class="mb-0 fw-semibold">{{ $groupLabel }}</h6>
      </div>
      <div class="card-body p-4">

        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif

        @php $hasImageType = $settings->where('type','image')->isNotEmpty(); @endphp
        <form method="POST" action="{{ route('admin.settings.update', $group) }}"
              @if($hasImageType) enctype="multipart/form-data" @endif>
          @csrf @method('PUT')

          @if($settings->isEmpty())
            <p class="text-muted">No settings found for this group.</p>
          @else
            <div class="row g-4">
              @foreach($settings as $s)
              <div class="{{ in_array($s->type, ['textarea','image']) ? 'col-12' : 'col-md-6' }}">
                <label class="form-label fw-semibold">{{ $s->label }}</label>

                @if($s->type === 'textarea')
                  <textarea name="{{ $s->key }}" rows="3" class="form-control">{{ old($s->key, $s->value) }}</textarea>

                @elseif($s->type === 'image')
                  <div class="d-flex align-items-start gap-4 flex-wrap">
                    @if($s->value)
                      <div>
                        <img src="{{ Storage::url($s->value) }}" alt="{{ $s->label }}"
                             style="max-height:100px;max-width:200px;object-fit:contain;border:1px solid #dee2e6;border-radius:6px;padding:4px;background:#f8f9fa;">
                        <div class="text-muted small mt-1">Current image</div>
                      </div>
                    @endif
                    <div class="flex-grow-1">
                      <input type="file" name="{{ $s->key }}" accept="image/*"
                             class="form-control" id="img_{{ $s->key }}">
                      <div class="form-text">JPG, PNG, SVG or WEBP. Max 4 MB.</div>
                      <div id="preview_{{ $s->key }}" class="mt-2" style="display:none">
                        <img id="previewImg_{{ $s->key }}" src="" alt="Preview"
                             style="max-height:100px;max-width:200px;object-fit:contain;border-radius:6px;">
                      </div>
                    </div>
                  </div>

                @else
                  <input
                    type="{{ $s->type }}"
                    name="{{ $s->key }}"
                    value="{{ old($s->key, $s->value) }}"
                    class="form-control"
                    @if($s->type === 'url') placeholder="https://" @endif
                  >
                @endif
              </div>
              @endforeach
            </div>
          @endif

          <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-save me-1"></i> Save Changes
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('input[type="file"][id^="img_"]').forEach(function(input) {
  input.addEventListener('change', function(e) {
    var key = input.id.replace('img_', '');
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(ev) {
      document.getElementById('previewImg_' + key).src = ev.target.result;
      document.getElementById('preview_' + key).style.display = 'block';
    };
    reader.readAsDataURL(file);
  });
});
</script>
@endpush
