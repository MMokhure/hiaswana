@extends('admin.layouts.app')
@section('title', 'Edit Committee')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.committees.show', $committee) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Edit Committee</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:620px;">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.committees.update', $committee) }}">
      @csrf @method('PUT')

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <div class="mb-3">
        <label class="form-label fw-semibold">Committee Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $committee->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Description</label>
        <textarea name="description" rows="3" class="form-control"
                  placeholder="Brief description of this committee's mandate…">{{ old('description', $committee->description) }}</textarea>
      </div>

      <div class="row g-3">
        <div class="col-sm-6">
          <label class="form-label fw-semibold">Sort Order</label>
          <input type="number" name="sort_order" min="0" class="form-control"
                 value="{{ old('sort_order', $committee->sort_order) }}">
        </div>
        <div class="col-sm-6 d-flex align-items-end">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                   {{ old('is_active', $committee->is_active ? '1' : '0') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active (visible on public site)</label>
          </div>
        </div>
      </div>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.committees.show', $committee) }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
