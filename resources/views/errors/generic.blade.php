@extends('layouts.app')

@section('content')
<section class="section error-page-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <div class="error-page-card">
          <div class="error-icon">
            <i class="bi bi-exclamation-circle"></i>
          </div>
          <h1 class="error-code">Oops!</h1>
          <h2 class="error-title">Something went wrong</h2>
          <p class="error-message">
            We encountered an unexpected error. Please try again or contact our support team.
          </p>
          <div class="error-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
              <i class="bi bi-house-door me-2"></i>Go Home
            </a>
            <button onclick="window.location.reload()" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-clockwise me-2"></i>Try Again
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
.error-page-card {
  padding: 4rem 2rem;
  text-align: center;
}
.error-icon {
  font-size: 5rem;
  color: #ffc107;
  margin-bottom: 1rem;
}
.error-code {
  font-size: 8rem;
  font-weight: 900;
  color: #ffc107;
  line-height: 1;
  margin-bottom: 0.5rem;
}
.error-title {
  font-size: 2rem;
  font-weight: 700;
  color: #1a2e4a;
  margin-bottom: 1rem;
}
.error-message {
  font-size: 1.2rem;
  color: #6c757d;
  margin-bottom: 2rem;
}
.error-actions {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}
</style>
@endpush