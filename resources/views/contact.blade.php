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
                We're here to help. Contact HIASWANA for membership, collaboration opportunities, or general enquiries — our team responds promptly during working hours.
              </p>
            </div>

            <div class="contact-info-cards">
                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-pin-map-fill" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Our Location</h4>
                    <p>Gaborone, Botswana</p>
                    <p class="muted"><a href="https://www.google.com/maps?q=Gaborone,+Botswana" target="_blank" rel="noopener">View on map</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-envelope-open" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Email</h4>
                    <p><a href="mailto:info@hiaswana.co.bw">info@hiaswana.co.bw</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Call</h4>
                    <p><a href="tel:+26771234567">+267 71 234 567</a></p>
                  </div>
                </div>

                <div class="info-card">
                  <div class="icon-container">
                    <i class="bi bi-clock-history" aria-hidden="true"></i>
                  </div>
                  <div class="card-content">
                    <h4>Opening Hours</h4>
                    <p>Mon–Sat: 8:00 AM – 5:00 PM</p>
                  </div>
                </div>
            </div>

              <div class="map-embed mt-4">
                <iframe title="Spinal Rehabilitation - Gaborone" src="https://www.google.com/maps?q=Gaborone,+Botswana&output=embed" style="border:0; width:100%; height:220px; border-radius: 8px;" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>

          <div class="contact-form-panel">
          
            <div class="form-container">
              <h3>Send Us a Message</h3>
              <p>If you have questions or need advice, send us a message and we'll reply within one business day.</p>

              <form action="forms/contact.php" method="post" class="php-email-form" aria-label="Contact form">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full name" required aria-required="true" aria-label="Full name">
                  <label for="nameInput">Full name</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email address" required aria-required="true" aria-label="Email address">
                  <label for="emailInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="subjectInput" name="subject" placeholder="Subject" aria-label="Subject">
                  <label for="subjectInput">Subject (optional)</label>
                </div>

                <div class="form-floating mb-3">
                  <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Your message" style="height: 150px" required aria-required="true" aria-label="Your message"></textarea>
                  <label for="messageInput">Your message</label>
                </div>

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="d-grid justify-content-center">
                  <button type="submit" class="btn-submit">Send Message <i class="bi bi-send-fill ms-2"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->
@endsection