@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">Newsletter</h1>
        <p class="lead mb-0">Follow our official Facebook page for the latest HIASWANA updates, event announcements, and opportunities.</p>
      </div>
    </div>
  </div>
</section>

<section class="section newsletter-section">
  <div class="container-fluid newsletter-container">
    <div class="row g-4 align-items-start newsletter-layout">
      <div class="col-12 col-xl-8" data-aos="fade-up">
        <div class="newsletter-facebook-card">
          @php
            $facebookPage = setting('social_facebook', '#');
          @endphp

          @if($facebookPage !== '#')
            <iframe
              title="HIASWANA Facebook Page"
              src="https://www.facebook.com/plugins/page.php?href={{ urlencode($facebookPage) }}&tabs=timeline&width=1200&height=1200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
              width="100%"
              height="1200"
              style="border:none;overflow:hidden"
              scrolling="no"
              frameborder="0"
              allowfullscreen="true"
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          @else
            <div class="text-center py-4">
              <h3 class="mb-3">Facebook Page Not Configured</h3>
              <p class="text-muted mb-0">Please set the Facebook URL in Admin Settings under Social Media to display the newsletter feed.</p>
            </div>
          @endif
        </div>
      </div>

      <div class="col-12 col-xl-4" data-aos="fade-left">
        <div class="newsletter-side-card">
          <h3 class="newsletter-side-title">More from HIASWANA</h3>
          <p class="newsletter-side-text">Stay connected beyond Facebook. Explore our upcoming activities, resources, and ways to participate.</p>

          <div class="newsletter-side-links">
            <a href="{{ url('/events') }}" class="newsletter-side-link">
              <i class="bi bi-calendar-event"></i>
              <span>Upcoming Events</span>
            </a>
            <a href="{{ url('/publications') }}" class="newsletter-side-link">
              <i class="bi bi-journal-text"></i>
              <span>Latest Publications</span>
            </a>
            <a href="{{ url('/membership') }}" class="newsletter-side-link">
              <i class="bi bi-people"></i>
              <span>Become a Member</span>
            </a>
          </div>

          <div class="newsletter-contact-box">
            <h4>Need Updates by Email?</h4>
            <p>Contact us directly and we will share key announcements.</p>
            <a href="mailto:{{ setting('contact_email', 'info@hiaswana.co.bw') }}" class="newsletter-contact-btn">Email HIASWANA</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
