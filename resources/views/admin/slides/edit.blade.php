@extends('admin.layouts.app')
@section('title', 'Edit Slide')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
  <a href="{{ route('admin.slides.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left"></i>
  </a>
  <h5 class="mb-0 fw-semibold">Edit Slide</h5>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card border-0 shadow-sm" style="max-width:760px">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.slides.update', $slide) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      @include('admin.slides._form')
      <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4">
          <i class="bi bi-save me-1"></i> Update Slide
        </button>
        <a href="{{ route('admin.slides.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}" class="ms-auto"
              onsubmit="return confirm('Delete this slide permanently?')">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash me-1"></i> Delete
          </button>
        </form>
      </div>
    </form>
  </div>
</div>
@endsection
