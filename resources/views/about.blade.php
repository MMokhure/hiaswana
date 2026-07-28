@extends('layouts.app')
@section('content')

<!-- About Page Hero -->
<section class="page-hero section dark-background about-hero">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">{{ setting('page_about_title','HIASWANA') }}</h1>
        <p class="lead">{{ setting('page_about_subtitle','First Health Informatics Association in Botswana.') }}</p>
        <div class="mt-4">
          <a href="{{ url('/membership') }}" class="btn me-2 rounded-pill">{{ setting('join_cta_label','Join HIASWANA') }}</a>
          <a href="{{ url('/contact') }}" class="btn btn-outline rounded-pill">Contact Us</a>
        </div>
      </div>
      <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
        @php $aboutHeroImg = setting('page_about_hero_image'); @endphp
        <img src="{{ $aboutHeroImg ? Storage::url($aboutHeroImg) : asset('assets/img/about3.jpeg') }}"
             alt="{{ setting('page_about_title','HIASWANA') }}"
             class="img-fluid rounded-3 shadow-lg about-hero-img">
      </div>
    </div>
  </div>
</section>

<!-- Mission & Vision -->
<section class="section about-section">
  <div class="container">
    <div class="row gy-5 align-items-start">
      <div class="col-lg-6" data-aos="fade-right">
        <h2>{{ setting('page_about_mission_heading','Our Mission') }}</h2>
        <p>{{ setting('page_about_mission','To champion the safe, ethical, and effective use of information and communication technologies to improve health outcomes for all people in Botswana and the region.') }}</p>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h2>{{ setting('page_about_vision_heading','Our Vision') }}</h2>
        <p>{{ setting('page_about_vision','A Botswana where every health decision is informed by accurate, timely, and accessible health data — enabling equitable, high-quality care for all.') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- Key Pillars -->
<section class="section light-background">
  <div class="container">
    <div class="section-header text-center mb-4">
      <h2>{{ setting('page_about_pillars_heading','How We Work') }}</h2>
      <p class="muted">{{ setting('page_about_pillars_subtitle','Our three-pillar approach to advancing health informatics in Botswana.') }}</p>
    </div>
    <div class="row g-3 pillars">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="pill card p-3 h-100">
          <h5>{{ setting('page_about_pillar1_title','Education & Capacity Building') }}</h5>
          <p class="muted">{{ setting('page_about_pillar1_desc','Delivering workshops, short courses, and mentorship programmes to grow a skilled health informatics workforce across Botswana.') }}</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="pill card p-3 h-100">
          <h5>{{ setting('page_about_pillar2_title','Research & Innovation') }}</h5>
          <p class="muted">{{ setting('page_about_pillar2_desc','Supporting applied research, pilot projects, and knowledge sharing to advance the use of data, AI, and digital tools in health.') }}</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="pill card p-3 h-100">
          <h5>{{ setting('page_about_pillar3_title','Policy & Advocacy') }}</h5>
          <p class="muted">{{ setting('page_about_pillar3_desc','Engaging government, partners, and regulators to ensure digital health investments are ethical, sustainable, and aligned with national health priorities.') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Affiliations & Global Membership -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center" data-aos="fade-up">
        <h2>{{ setting('page_about_affiliations_heading','Our Affiliations') }}</h2>
        <p class="mt-3">{{ setting('page_about_affiliations','HIASWANA is inspired by and aligned with global bodies including the International Medical Informatics Association (IMIA) and the Pan-African Health Informatics Association (HELINA), promoting the safe, ethical, and effective use of information and communication technologies to improve health for all.') }}</p>
      </div>
    </div>
  </div>
</section>

@endsection

