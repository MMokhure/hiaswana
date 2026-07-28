@extends('admin.layouts.app')
@section('title', 'Slideshow Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold"><i class="bi bi-images me-2 text-primary"></i>Slideshow Management</h5>
  <a href="{{ route('admin.slides.create') }}" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-lg me-1"></i> Add Slide
  </a>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

{{-- Hero Slides --}}
<div class="card border-0 shadow-sm mb-4">
  <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
    <i class="bi bi-play-circle text-primary"></i>
    <h6 class="mb-0 fw-semibold">Hero Slideshow</h6>
    <span class="badge bg-primary ms-auto">{{ $slides->where('location','hero')->count() }} slides</span>
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3" style="width:80px">Image</th>
          <th>Title</th>
          <th>Subtitle</th>
          <th>Order</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($slides->where('location','hero') as $slide)
        <tr>
          <td class="ps-3">
            <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" style="width:70px;height:45px;object-fit:cover;border-radius:4px;">
          </td>
          <td class="fw-medium">{{ $slide->title ?: '—' }}</td>
          <td class="text-muted small">{{ Str::limit($slide->subtitle, 60) ?: '—' }}</td>
          <td>{{ $slide->sort_order }}</td>
          <td>
            @if($slide->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.slides.toggle', $slide) }}" class="d-inline">
              @csrf
              <button class="btn btn-sm {{ $slide->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}"
                      title="{{ $slide->is_active ? 'Hide from site' : 'Show on site' }}">
                <i class="bi {{ $slide->is_active ? 'bi-eye-slash' : 'bi-eye' }}"></i>
              </button>
            </form>
            <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}" class="d-inline"
                  onsubmit="return confirm('Delete this slide?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center py-4 text-muted">No hero slides yet. <a href="{{ route('admin.slides.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- About Slides --}}
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
    <i class="bi bi-collection text-success"></i>
    <h6 class="mb-0 fw-semibold">About Section Slideshow</h6>
    <span class="badge bg-success ms-auto">{{ $slides->where('location','about')->count() }} slides</span>
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3" style="width:80px">Image</th>
          <th>Title</th>
          <th>Order</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($slides->where('location','about') as $slide)
        <tr>
          <td class="ps-3">
            <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" style="width:70px;height:45px;object-fit:cover;border-radius:4px;">
          </td>
          <td class="fw-medium">{{ $slide->title ?: '—' }}</td>
          <td>{{ $slide->sort_order }}</td>
          <td>
            @if($slide->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.slides.toggle', $slide) }}" class="d-inline">
              @csrf
              <button class="btn btn-sm {{ $slide->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}"
                      title="{{ $slide->is_active ? 'Hide from site' : 'Show on site' }}">
                <i class="bi {{ $slide->is_active ? 'bi-eye-slash' : 'bi-eye' }}"></i>
              </button>
            </form>
            <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}" class="d-inline"
                  onsubmit="return confirm('Delete this slide?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-4 text-muted">No about slides yet. <a href="{{ route('admin.slides.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
