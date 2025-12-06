@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">Join HIASWANA</h1>
        <p class="lead">
          Connect with a growing community of health informatics professionals, students, and partners
          shaping digital health in Botswana.
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

          <div class="membership-form-card">
            <form action="#" method="post" enctype="multipart/form-data" class="membership-form">
              @csrf
              
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="full_name" class="form-label">
                      <i class="bi bi-person"></i> Full Name <span class="required">*</span>
                    </label>
                    <input type="text" id="full_name" name="full_name" class="form-control" required placeholder="Enter your full name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-label">
                      <i class="bi bi-envelope"></i> Email Address <span class="required">*</span>
                    </label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="your.email@example.com">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="organisation" class="form-label">
                      <i class="bi bi-building"></i> Organisation / Institution
                    </label>
                    <input type="text" id="organisation" name="organisation" class="form-control" placeholder="Your organization name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category" class="form-label">
                      <i class="bi bi-tag"></i> Membership Category <span class="required">*</span>
                    </label>
                    <select id="category" name="category" class="form-select" required>
                      <option value="">Select a category</option>
                      <option value="individual">Individual Professional</option>
                      <option value="student">Student / Early Career</option>
                      <option value="institutional">Institutional / Organisational</option>
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="motivation" class="form-label">
                      <i class="bi bi-card-text"></i> Motivation / Areas of Interest
                    </label>
                    <textarea id="motivation" name="motivation" rows="4" class="form-control" placeholder="Briefly describe your interest in health informatics and HIASWANA, and what you hope to contribute or gain from membership."></textarea>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="supporting_doc" class="form-label">
                      <i class="bi bi-file-earmark-arrow-up"></i> Upload Supporting Document (Optional)
                    </label>
                    <input type="file" id="supporting_doc" name="supporting_doc" class="form-control">
                    <small class="form-text">E.g. CV, short bio, or institutional letter of support (PDF, DOC, DOCX - Max 5MB)</small>
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
