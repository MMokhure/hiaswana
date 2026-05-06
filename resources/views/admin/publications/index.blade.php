@extends('admin.layouts.app')
@section('title', 'Publications')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Publications</h5>
  <a href="{{ route('admin.publications.create') }}" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-lg me-1"></i> Add Publication
  </a>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Title</th>
          <th>Author</th>
          <th>Year</th>
          <th>Type</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($publications as $pub)
        <tr>
          <td class="ps-3 fw-medium">{{ $pub->title }}</td>
          <td>{{ $pub->author ?: '—' }}</td>
          <td>{{ $pub->year ?: '—' }}</td>
          <td><span class="badge bg-info text-dark">{{ $pub->type }}</span></td>
          <td>
            @if($pub->status === 'published')
              <span class="badge bg-success">Published</span>
            @else
              <span class="badge bg-secondary">Draft</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.publications.edit', $pub) }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil"></i>
            </a>
            <form method="POST" action="{{ route('admin.publications.destroy', $pub) }}" class="d-inline"
                  onsubmit="return confirm('Delete this publication?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center py-4 text-muted">No publications yet. <a href="{{ route('admin.publications.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($publications->hasPages())
  <div class="card-footer bg-white">{{ $publications->links() }}</div>
  @endif
</div>
@endsection
