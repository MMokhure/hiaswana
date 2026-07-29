@extends('layouts.app')
@section('content')
   <!-- Contact Section -->
    <section id="contact" class="contact section">

    
      <div class="container">
        <div class="contact-wrapper">
          <div class="contact-info-panel">
            <div class="contact-info-header">
              <h3>Contact Information</h3>
              <p>
                {{ setting('contact_page_intro',"We're here to help. Contact HIASWANA for membership, collaboration opportunities, or general enquiries — our team responds promptly during working hours.") }}
              </p>
            </div>

            <div class="contact-info-cards">
                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-pin-map-fill" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Our Location</h4>
                    <p>{{ setting('contact_address','Gaborone, Botswana') }}</p>
                    <p class="muted"><a href="{{ setting('contact_map_url','https://www.google.com/maps?q=Gaborone,+Botswana') }}" target="_blank" rel="noopener">View on map</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-envelope-open" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Email</h4>
                    <p><a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}">{{ setting('contact_email','info@hiaswana.co.bw') }}</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Call</h4>
                    <p><a href="tel:{{ setting('contact_phone','+267 71 234 567') }}">{{ setting('contact_phone','+267 71 234 567') }}</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-clock-history" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Opening Hours</h4>
                    <p>{{ setting('contact_hours','Mon–Sat: 8:00 AM – 5:00 PM') }}</p>
                  </div>
                </div>
            </div>

              <div class="map-embed mt-4">
                <iframe title="{{ setting('site_name','HIASWANA') }}" src="{{ setting('contact_map_url','https://www.google.com/maps?q=Gaborone,+Botswana') }}&output=embed" style="border:0; width:100%; height:220px; border-radius: 8px;" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>

          <div class="contact-form-panel">
            <div class="form-container">
              <h3>Send Us a Message</h3>
              <p>If you have questions or need support, contact us directly and our team will reply as soon as possible.</p>

              <div class="d-grid gap-3">
                <a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}" class="btn-submit text-center">
                  Email Us <i class="bi bi-envelope-fill ms-2"></i>
                </a>
                <a href="tel:{{ setting('contact_phone','+267 71 234 567') }}" class="btn-submit text-center">
                  Call Us <i class="bi bi-telephone-fill ms-2"></i>
                </a>
                <a href="{{ url('/membership') }}" class="btn-submit text-center">
                  Apply for Membership <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Contact Section -->
@endsection