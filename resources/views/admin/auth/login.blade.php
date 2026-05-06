<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HIASWANA Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1a2e4a 0%, #2c5282 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      width: 100%;
      max-width: 420px;
      border: none;
      border-radius: 12px;
      box-shadow: 0 20px 60px rgba(0,0,0,.3);
    }
    .login-header {
      background: #1a2e4a;
      color: #fff;
      border-radius: 12px 12px 0 0;
      padding: 2rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-card card">
    <div class="login-header">
      <h4 class="mb-0 fw-bold">HIASWANA Admin</h4>
      <p class="mb-0 opacity-75 small mt-1">Content Management System</p>
    </div>
    <div class="card-body p-4">
      @if($errors->any())
        <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label fw-semibold">Email address</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-4 form-check">
          <input type="checkbox" name="remember" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign In</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
