@extends('admin.layouts.app')
@section('title', 'Membership List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h5 class="mb-0 fw-semibold">Membership List</h5>
    <small class="text-muted">{{ $total }} approved member{{ $total !== 1 ? 's' : '' }}</small>
  </div>
  <div class="d-flex gap-2">
    <button onclick="window.print()" class="btn btn-sm btn-outline-secondary d-print-none">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <a href="{{ route('admin.members.export') }}" class="btn btn-sm btn-outline-success d-print-none">
      <i class="bi bi-download me-1"></i> Export CSV
    </a>
  </div>
</div>

{{-- Filters (hidden when printing) --}}
<div class="card border-0 shadow-sm mb-4 d-print-none">
  <div class="card-body py-3">
    <form method="GET" action="{{ route('admin.membershiplist.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
      <input type="text" name="search" value="{{ $search }}" class="form-control form-control-sm" style="max-width:240px;"
             placeholder="Search name, ID, email, membership no…">

      <select name="category" class="form-select form-select-sm" style="max-width:180px;">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
          <option value="{{ $cat }}" {{ $category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
        @endforeach
      </select>

      <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-search me-1"></i>Filter</button>

      @if($search || $category)
        <a href="{{ route('admin.membershiplist.index') }}" class="btn btn-sm btn-outline-secondary">
          <i class="bi bi-x"></i> Clear
        </a>
      @endif
    </form>
  </div>
</div>

{{-- Print header (shown only when printing via CSS) --}}
<div class="print-header">
  <h4 class="fw-bold mb-1">HIASWANA — Member Register</h4>
  <p class="text-muted mb-0" style="font-size:9pt;">Printed: {{ now()->format('d M Y') }} &nbsp;|&nbsp; Total approved members: {{ $total }}</p>
  <hr>
</div>

{{-- Table --}}
<div class="card border-0 shadow-sm">
  <div class="table-responsive">
    <table class="table table-sm table-hover mb-0 align-middle" id="membership-table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Membership No.</th>
          <th>Name</th>
          <th>Surname</th>
          <th>ID / Passport</th>
          <th>Nationality</th>
          <th>Residential Address</th>
          <th>Postal Address</th>
          <th>Contact Number</th>
          <th>Email</th>
          <th>Category</th>
          <th>Approved</th>
          <th class="d-print-none">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($members as $i => $m)
        <tr>
          <td class="text-muted">{{ $members->firstItem() + $i }}</td>
          <td><code class="text-success fw-semibold">{{ $m->membership_number }}</code></td>
          <td>{{ $m->name }}</td>
          <td>{{ $m->surname ?: '—' }}</td>
          <td>{{ $m->identification_number ?: '—' }}</td>
          <td>{{ $m->nationality ?: '—' }}</td>
          <td style="max-width:160px;white-space:normal;">{{ $m->residential_address ?: '—' }}</td>
          <td style="max-width:140px;white-space:normal;">{{ $m->postal_address ?: '—' }}</td>
          <td>{{ $m->phone ?: '—' }}</td>
          <td>{{ $m->email }}</td>
          <td><span class="badge bg-secondary">{{ $m->category }}</span></td>
          <td class="text-nowrap">{{ $m->approved_at?->format('d M Y') ?? '—' }}</td>
          <td class="d-print-none">
            <a href="{{ route('admin.members.show', $m) }}" class="btn btn-xs btn-outline-primary btn-sm py-0 px-2">
              <i class="bi bi-eye"></i>
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="13" class="text-center text-muted py-5">No approved members found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- Pagination --}}
@if($members->hasPages())
  <div class="mt-3 d-print-none">
    {{ $members->links() }}
  </div>
@endif

@endsection

@push('styles')
<style>
  @media print {
    /* Hide all admin chrome */
    .sidebar,
    .topbar,
    .d-print-none { display: none !important; }

    /* Full-width content, no margin */
    .main-content {
      margin-left: 0 !important;
      padding: 0 !important;
    }

    body { background: #fff !important; font-size: 9pt; }

    /* Print header */
    .print-header { display: block !important; text-align: center; margin-bottom: 12pt; }

    /* Table styles */
    #membership-table { width: 100%; border-collapse: collapse; font-size: 8pt; }
    #membership-table th,
    #membership-table td {
      border: 1px solid #999;
      padding: 3pt 5pt;
      vertical-align: top;
      white-space: normal !important;
    }
    #membership-table thead th { background: #e8e8e8 !important; font-weight: bold; }
    #membership-table tbody tr:nth-child(even) td { background: #f9f9f9 !important; }

    /* Remove card shadow/border */
    .card { box-shadow: none !important; border: none !important; }
    .table-responsive { overflow: visible !important; }

    /* page setup */
    @page { size: A4 landscape; margin: 10mm; }
  }

  /* Hide print header on screen */
  .print-header { display: none; }
</style>
@endpush
