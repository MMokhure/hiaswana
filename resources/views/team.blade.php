@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">Our Team</h1>
        <p class="lead">
          HIASWANA is led by volunteers from health, ICT, academia, and development partners who are passionate about
          using data and technology to improve health.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section light-background">
  <div class="container">
    <div class="section-header text-center mb-4">
      <h2>Leadership & Coordination</h2>
      <p class="muted">Current HIASWANA office bearers. You can replace the placeholder photos with official portraits.</p>
    </div>

    <div class="row g-4">
      <!-- President -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="President placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Dr Kagiso Ndlovu</h5>
          <small class="muted d-block mb-2">President</small>
          <p class="muted mb-0">Provides strategic leadership and represents HIASWANA nationally and internationally.</p>
        </div>
      </div>

      <!-- Vice President -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Vice President placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Benson Ncube</h5>
          <small class="muted d-block mb-2">Vice President</small>
          <p class="muted mb-0">Supports the President and leads selected programmes and partnerships.</p>
        </div>
      </div>

      <!-- Secretary General -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-3.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Secretary General placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Dr Kabelo Leonard Mauco</h5>
          <small class="muted d-block mb-2">Secretary General</small>
          <p class="muted mb-0">Leads governance, records, and coordination of the Association’s activities.</p>
        </div>
      </div>

      <!-- Treasurer -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Treasurer placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Star Chibemba</h5>
          <small class="muted d-block mb-2">Treasurer</small>
          <p class="muted mb-0">Oversees financial management, reporting, and membership fees.</p>
        </div>
      </div>

      <!-- Vice Secretary -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Vice Secretary placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Mpho Mokhure</h5>
          <small class="muted d-block mb-2">Vice Secretary</small>
          <p class="muted mb-0">Supports the Secretary General with documentation and member communication.</p>
        </div>
      </div>

      <!-- Communications -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-3.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Communications placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Fiaona</h5>
          <small class="muted d-block mb-2">Communications</small>
          <p class="muted mb-0">Leads communication, branding, and stakeholder engagement.</p>
        </div>
      </div>

      <!-- Public Relations -->
      <div class="col-md-4 col-lg-3">
        <div class="team-card card p-4 text-center h-100">
          <img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
               alt="Public Relations placeholder" style="width:110px;height:110px;object-fit:cover;">
          <h5 class="mb-1">Ogone</h5>
          <small class="muted d-block mb-2">Public Relations (PR)</small>
          <p class="muted mb-0">Builds and maintains relationships with partners, media, and the wider community.</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


