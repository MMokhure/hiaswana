<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HIASWANA Admin – @yield('title', 'Dashboard')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    body { background-color: #f4f6f9; }
    .sidebar {
      min-height: 100vh;
      background: #1a2e4a;
      color: #c0cfe0;
      width: 250px;
      position: fixed;
      top: 0; left: 0;
      z-index: 1000;
      transition: transform .3s ease-in-out;
    }
    .sidebar .brand {
      padding: 1.5rem 1.25rem;
      font-size: 1.1rem;
      font-weight: 700;
      color: #fff;
      border-bottom: 1px solid rgba(255,255,255,.1);
    }
    .sidebar .nav-link {
      color: #c0cfe0;
      padding: .65rem 1.25rem;
      border-radius: 6px;
      margin: 2px 8px;
      display: flex;
      align-items: center;
      gap: .6rem;
    }
    .sidebar .nav-link:hover, .sidebar .nav-link.active {
      background: rgba(255,255,255,.1);
      color: #fff;
    }
    .sidebar .nav-section {
      font-size: .7rem;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: #6b8aaa;
      padding: 1rem 1.25rem .25rem;
    }
    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }
    .topbar {
      background: #fff;
      border-bottom: 1px solid #e3e8ef;
      padding: .75rem 2rem;
      margin-left: 250px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .badge-pending { background-color: #ffc107; color:#000; }

    /* Mobile sidebar toggle */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: .75rem;
      left: .75rem;
      z-index: 1100;
    }

    /* Responsive tables */
    .table-responsive-custom {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.show {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
      .topbar {
        margin-left: 0;
        padding: .75rem 1rem;
      }
      .sidebar-toggle {
        display: inline-flex;
      }
      .error-code {
        font-size: 4rem !important;
      }
      .error-title {
        font-size: 1.4rem !important;
      }
      .error-actions {
        flex-direction: column;
      }
      .error-actions .btn {
        width: 100%;
      }
    }
  </style>
  @stack('styles')
</head>
<body>

<!-- Mobile sidebar toggle -->
<button class="sidebar-toggle btn btn-primary" onclick="document.querySelector('.sidebar').classList.toggle('show')">
  <i class="bi bi-list"></i>
</button>

<!-- Sidebar overlay for mobile -->
<div class="sidebar-overlay" onclick="document.querySelector('.sidebar').classList.remove('show')" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.5); z-index:999;"></div>

<script>
// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(e) {
  const sidebar = document.querySelector('.sidebar');
  const toggle = document.querySelector('.sidebar-toggle');
  if (window.innerWidth <= 768 && sidebar.classList.contains('show') && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
    sidebar.classList.remove('show');
  }
});
</script>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
  <div class="brand">
    <i class="bi bi-hospital me-2"></i>HIASWANA CMS
  </div>
  <nav class="flex-grow-1 pt-2">
    <div class="nav-section">Main</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-section">Content</div>
    <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
      <i class="bi bi-calendar-event"></i> Events
    </a>
    <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
      <i class="bi bi-people"></i> Team Members
    </a>
    <a href="{{ route('admin.publications.index') }}" class="nav-link {{ request()->routeIs('admin.publications*') ? 'active' : '' }}">
      <i class="bi bi-journal-text"></i> Publications
    </a>
    <a href="{{ route('admin.slides.index') }}" class="nav-link {{ request()->routeIs('admin.slides*') ? 'active' : '' }}">
      <i class="bi bi-images"></i> Slideshows
    </a>

    <div class="nav-section">Membership</div>
    <a href="{{ route('admin.members.index') }}" class="nav-link {{ request()->routeIs('admin.members*') ? 'active' : '' }}">
      <i class="bi bi-person-check"></i> Applications
    </a>
    <a href="{{ route('admin.membershiplist.index') }}" class="nav-link {{ request()->routeIs('admin.membershiplist*') ? 'active' : '' }}">
      <i class="bi bi-card-list"></i> Membership List
    </a>
    <a href="{{ route('admin.committees.index') }}" class="nav-link {{ request()->routeIs('admin.committees*') ? 'active' : '' }}">
      <i class="bi bi-diagram-3"></i> Committees
    </a>

    <div class="nav-section">Site</div>
    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
      <i class="bi bi-sliders"></i> Site Settings
    </a>
    <a href="{{ url('/') }}" target="_blank" class="nav-link">
      <i class="bi bi-box-arrow-up-right"></i> View Website
    </a>
  </nav>

  <div class="p-3 border-top" style="border-color: rgba(255,255,255,.1) !important;">
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit" class="btn btn-sm btn-outline-light w-100">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
      </button>
    </form>
  </div>
</div>

<!-- Topbar -->
<div class="topbar">
  <div class="fw-semibold text-muted">@yield('title', 'Dashboard')</div>
  <div class="text-muted small">{{ auth()->user()->name }}</div>
</div>

<!-- Main Content -->
<div class="main-content">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// File preview helper - shows a preview when a file input changes
function previewImage(input, previewId) {
  const preview = document.getElementById(previewId);
  if (!preview) return;
  preview.innerHTML = '';
  const file = input.files && input.files[0];
  if (!file) return;
  if (file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.className = 'rounded border mt-1';
      img.style.maxHeight = '100px';
      img.style.maxWidth = '150px';
      img.style.objectFit = 'cover';
      preview.appendChild(img);
    };
    reader.readAsDataURL(file);
  } else {
    // For non-image files (PDF, DOC), show file icon with name
    const icon = document.createElement('div');
    icon.className = 'd-flex align-items-center gap-2 mt-1 p-2 bg-light rounded border';
    icon.innerHTML = '<i class="bi bi-file-earmark-text fs-3 text-primary"></i><div><div class="fw-semibold">' + file.name + '</div><div class="small text-muted">' + (file.size / 1024).toFixed(1) + ' KB</div></div>';
    preview.appendChild(icon);
  }
}
</script>
@stack('scripts')
</body>
</html>