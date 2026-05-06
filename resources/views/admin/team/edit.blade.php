@extends('admin.layouts.app')
@section('title', 'Edit Team Member')

@section('content')
<div class="d-flex align-items-center gap-2 mb-4">
  <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <h5 class="mb-0 fw-semibold">Edit Team Member</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
  <div class="card-body p-4">
    <form method="POST" action="{{ route('admin.team.update', $member) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      @include('admin.team._form')
      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
