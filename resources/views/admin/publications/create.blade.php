@extends('admin.layouts.app')
@section('title', 'Add Publication')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.publications.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Add Publication</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:700px;">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.publications.store') }}" enctype="multipart/form-data">
      @csrf
      @include('admin.publications._form')
      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary">Create Publication</button>
        <a href="{{ route('admin.publications.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
