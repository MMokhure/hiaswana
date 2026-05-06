@extends('admin.layouts.app')
@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0 fw-semibold">Events</h5>
  <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-lg me-1"></i> Add Event
  </a>
</div>

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Title</th>
          <th>Category</th>
          <th>Date</th>
          <th>Location</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($events as $event)
        <tr>
          <td class="ps-3 fw-medium">{{ $event->title }}</td>
          <td><span class="badge bg-secondary">{{ ucfirst($event->category) }}</span></td>
          <td>{{ $event->event_date ? $event->event_date->format('M d, Y') : '—' }}</td>
          <td>{{ $event->location ?: '—' }}</td>
          <td>
            @if($event->status === 'published')
              <span class="badge bg-success">Published</span>
            @else
              <span class="badge bg-secondary">Draft</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil"></i>
            </a>
            <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="d-inline"
                  onsubmit="return confirm('Delete this event?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center py-4 text-muted">No events yet. <a href="{{ route('admin.events.create') }}">Add one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($events->hasPages())
  <div class="card-footer bg-white">{{ $events->links() }}</div>
  @endif
</div>
@endsection
