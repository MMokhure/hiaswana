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
            $icons = ['general'=>'bi-gear','contact'=>'bi-telephone','social'=>'bi-share','homepage'=>'bi-house','services'=>'bi-lightning','footer'=>'bi-layout-text-window-reverse','pages'=>'bi-file-text'];
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
        <i class="bi {{ ['general'=>'bi-gear','contact'=>'bi-telephone','social'=>'bi-share','homepage'=>'bi-house','services'=>'bi-lightning','footer'=>'bi-layout-text-window-reverse','pages'=>'bi-file-text'][$group] ?? 'bi-sliders' }} text-primary"></i>
        <h6 class="mb-0 fw-semibold">{{ $groupLabel }}</h6>
      </div>
      <div class="card-body p-4">

        <form method="POST" action="{{ route('admin.settings.update', $group) }}">
          @csrf @method('PUT')

          @if($settings->isEmpty())
            <p class="text-muted">No settings found for this group.</p>
          @else
            <div class="row g-4">
              @foreach($settings as $s)
              <div class="{{ in_array($s->type, ['textarea']) ? 'col-12' : 'col-md-6' }}">
                <label class="form-label fw-semibold">{{ $s->label }}</label>

                @if($s->type === 'textarea')
                  <textarea name="{{ $s->key }}" rows="3" class="form-control">{{ old($s->key, $s->value) }}</textarea>
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
