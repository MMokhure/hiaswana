@extends('layouts.app')
@section('content')

<!-- About Page -->
<section class="page-hero section dark-background about-hero">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">HIASWANA</h1>
        <p class="lead">First Health informatics Association in Botswana.</p>
        <div class="mt-4">
          <a href="{{ url('/#appointment') }}" id="appointment-btn" class="btn me-2 rounded-pill ">Book Appointment</a>
          <a href="{{ url('/services') }}" class="btn btn-outline rounded-pill">Our Services</a>
        </div>
      </div>
      <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
        <img src="{{ asset('assets/img/about3.jpeg') }}" alt="Clinic team" class="img-fluid rounded-3 shadow-lg about-hero-img">
      </div>
    </div>
  </div>
</section>

<section class="section about-section">
  <div class="container">
    <div class="row gy-5 align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <h2>Our Mission</h2>
        <p>To restore mobility and quality of life through evidence-based, non-invasive spinal rehabilitation and ongoing patient education.</p>

        <h3 class="mt-4">Our Approach</h3>
        <div class="row g-3 pillars">
          <div class="col-md-4">
            <div class="pill card p-3">
              <h5>Assess</h5>
              <p class="muted">Comprehensive clinical evaluation to identify the root cause of pain.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pill card p-3">
              <h5>Treat</h5>
              <p class="muted">Targeted non-surgical therapies tailored to each patient's needs.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pill card p-3">
              <h5>Rehabilitate</h5>
              <p class="muted">Personalised rehab plans and long-term follow-up to maintain results.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <h3>What We Offer</h3>
        <ul class="list-unstyled mt-3">
          <li>• Non-surgical spinal decompression</li>
          <li>• Peripheral neuropathy management</li>
          <li>• Cold laser therapy and targeted modalities</li>
          <li>• Physiotherapy and exercise rehabilitation</li>
          <li>• Patient education and self-management plans</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section light-background">
  <div class="container">
    <div class="section-header text-center mb-4">
      <h2>Meet Our Team</h2>
      <p class="muted">Experienced clinicians and therapists focused on lasting results.</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up">
        <div class="team-card card p-4 text-center">
          <img src="{{ asset('assets/img/team-1.jpg') }}" alt="Dr. Jane Doe" class="img-fluid rounded-circle mx-auto mb-3" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-0">Dr. Jane Doe</h5>
          <small class="muted">Clinical Director</small>
          <p class="mt-2 muted">Specialist in spinal rehabilitation with over 15 years' experience.</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="team-card card p-4 text-center">
          <img src="{{ asset('assets/img/team-2.jpg') }}" alt="Mr. John Smith" class="img-fluid rounded-circle mx-auto mb-3" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-0">Mr. John Smith</h5>
          <small class="muted">Lead Therapist</small>
          <p class="mt-2 muted">Focused on personalised rehabilitation plans and patient education.</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="team-card card p-4 text-center">
          <img src="{{ asset('assets/img/team-3.jpg') }}" alt="Ms. Alice Brown" class="img-fluid rounded-circle mx-auto mb-3" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-0">Ms. Alice Brown</h5>
          <small class="muted">Physiotherapist</small>
          <p class="mt-2 muted">Certified physiotherapist specialising in spinal and lower-limb conditions.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container text-center">
    <h2>Why Patients Choose Us</h2>
    <div class="row mt-4 stats-row">
      <div class="col-md-3">
        <h3 class="mb-0">25+</h3>
        <p class="muted">Years Experience</p>
      </div>
      <div class="col-md-3">
        <h3 class="mb-0">98%</h3>
        <p class="muted">Patient Satisfaction</p>
      </div>
      <div class="col-md-3">
        <h3 class="mb-0">10k+</h3>
        <p class="muted">Treatments Delivered</p>
      </div>
      <div class="col-md-3">
        <h3 class="mb-0">3</h3>
        <p class="muted">Clinic Locations</p>
      </div>
    </div>

    <a href="/services" class="btn btn-outline mt-4">Explore Services</a>
  </div>
</section>

@endsection
