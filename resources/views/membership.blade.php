@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">{{ setting('page_membership_title','Join HIASWANA') }}</h1>
        <p class="lead">
          {{ setting('page_membership_subtitle','Connect with a growing community of health informatics professionals, students, and partners shaping digital health in Botswana.') }}
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Benefits Section -->
<section class="section membership-benefits">
  <div class="container">
    <div class="membership-header text-center mb-5" data-aos="fade-up">
      <h2 class="membership-section-title">Why Become a Member?</h2>
      <p class="membership-section-subtitle">Join a vibrant community dedicated to advancing digital health</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <h3 class="benefit-title">Learning & Development</h3>
          <p class="benefit-description">Access to workshops, training sessions, and communities of practice</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="bi bi-people-fill"></i>
          </div>
          <h3 class="benefit-title">Networking</h3>
          <p class="benefit-description">Connect with peers across health, ICT, academia, and government</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="bi bi-briefcase-fill"></i>
          </div>
          <h3 class="benefit-title">Career Opportunities</h3>
          <p class="benefit-description">Contribute to working groups and national health informatics initiatives</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <h3 class="benefit-title">Visibility</h3>
          <p class="benefit-description">Showcase your work and projects in health informatics</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Membership Categories Section -->
<section class="section light-background membership-categories">
  <div class="container">
    <div class="membership-header text-center mb-5" data-aos="fade-up">
      <h2 class="membership-section-title">Membership Categories</h2>
      <p class="membership-section-subtitle">Choose the membership type that fits your profile</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="membership-category-card">
          <div class="category-icon">
            <i class="bi bi-person-badge-fill"></i>
          </div>
          <h3 class="category-title">Individual Professional</h3>
          <p class="category-description">For health informatics professionals, clinicians, technologists, and researchers working in the field.</p>
          <ul class="category-features">
            <li><i class="bi bi-check-circle-fill"></i> Full access to events</li>
            <li><i class="bi bi-check-circle-fill"></i> Networking opportunities</li>
            <li><i class="bi bi-check-circle-fill"></i> Working group participation</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="membership-category-card featured">
          <div class="category-badge">Popular</div>
          <div class="category-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <h3 class="category-title">Student / Early Career</h3>
          <p class="category-description">For students and early-career professionals interested in health informatics and digital health.</p>
          <ul class="category-features">
            <li><i class="bi bi-check-circle-fill"></i> Reduced membership fees</li>
            <li><i class="bi bi-check-circle-fill"></i> Mentorship programs</li>
            <li><i class="bi bi-check-circle-fill"></i> Student forums</li>
            <li><i class="bi bi-check-circle-fill"></i> Career guidance</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="membership-category-card">
          <div class="category-icon">
            <i class="bi bi-building"></i>
          </div>
          <h3 class="category-title">Institutional</h3>
          <p class="category-description">For organizations, institutions, and companies supporting health informatics initiatives.</p>
          <ul class="category-features">
            <li><i class="bi bi-check-circle-fill"></i> Multiple member access</li>
            <li><i class="bi bi-check-circle-fill"></i> Partnership opportunities</li>
            <li><i class="bi bi-check-circle-fill"></i> Corporate visibility</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Application Form Section -->
<section class="section membership-form-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="membership-form-wrapper" data-aos="fade-up">
          <div class="form-header text-center mb-4">
            <h2 class="form-title">Apply for Membership</h2>
            <p class="form-subtitle">Complete this form to apply. HIASWANA will review your application and contact you with next steps.</p>
          </div>

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
          @endif

          <div class="membership-form-card">
            <form action="{{ route('membership.store') }}" method="POST" class="membership-form">
              @csrf

              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name" class="form-label">
                      <i class="bi bi-person"></i> Full Name <span class="required">*</span>
                    </label>
                    <input type="text" id="name" name="name" class="form-control" required
                           value="{{ old('name') }}" placeholder="Enter your full name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-label">
                      <i class="bi bi-envelope"></i> Email Address <span class="required">*</span>
                    </label>
                    <input type="email" id="email" name="email" class="form-control" required
                           value="{{ old('email') }}" placeholder="your.email@example.com">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone" class="form-label">
                      <i class="bi bi-telephone"></i> Phone Number
                    </label>
                    <input type="text" id="phone" name="phone" class="form-control"
                           value="{{ old('phone') }}" placeholder="+267 xxxxxxxx">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="organisation" class="form-label">
                      <i class="bi bi-building"></i> Organisation / Institution
                    </label>
                    <input type="text" id="organisation" name="organization" class="form-control"
                           value="{{ old('organization') }}" placeholder="Your organization name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category" class="form-label">
                      <i class="bi bi-tag"></i> Membership Category <span class="required">*</span>
                    </label>
                    <select id="category" name="category" class="form-select" required>
                      <option value="">Select a category</option>
                      @foreach(['Professional', 'Student', 'Associate', 'Institutional'] as $cat)
                        <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="motivation" class="form-label">
                      <i class="bi bi-card-text"></i> Motivation / Areas of Interest
                    </label>
                    <textarea id="motivation" name="motivation" rows="4" class="form-control"
                              placeholder="Briefly describe your interest in health informatics and HIASWANA.">{{ old('motivation') }}</textarea>
                  </div>
                </div>

                <div class="col-12">
                  <div class="payment-info-box">
                    <div class="payment-info-header">
                      <i class="bi bi-credit-card"></i>
                      <strong>Membership Fee Payment</strong>
                    </div>
                    <p class="payment-info-text">
                      After submitting this form, HIASWANA will email you payment details (bank transfer / mobile money) and confirm your membership once payment is received.
                    </p>
                    <button type="button" class="btn-payment-disabled" disabled>
                      <i class="bi bi-lock"></i> Pay membership fee (coming soon)
                    </button>
                  </div>
                </div>

                <div class="col-12 text-center">
                  <button type="submit" class="btn-submit-membership">
                    <i class="bi bi-send"></i> Submit Membership Application
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
