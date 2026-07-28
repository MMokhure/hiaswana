@extends('admin.layouts.app')
@section('title', 'Add Slide')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
  <a href="{{ route('admin.slides.index') }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-arrow-left"></i>
  </a>
  <h5 class="mb-0 fw-semibold">Add New Slide</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:760px">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.slides.store') }}" enctype="multipart/form-data">
      @csrf
      @include('admin.slides._form')
      <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4">
          <i class="bi bi-save me-1"></i> Save Slide
        </button>
        <a href="{{ route('admin.slides.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection