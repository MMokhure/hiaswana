  <footer id="footer" class="footer-premium">

    <!-- Main Footer Body -->
    <div class="footer-body">
      <div class="container">
        <div class="row gy-5">

          <!-- Column 1: Brand + About + Social -->
          <div class="col-lg-4 col-md-6">
            <div class="footer-brand">
              <div class="footer-logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="{{ setting('site_name','HIASWANA') }}" class="footer-logo-img" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                <div class="footer-logo-text-fallback" style="display:none;">
                  <span class="footer-logo-abbr">{{ setting('site_name','HIASWANA') }}</span>
                </div>
              </div>
              <p class="footer-tagline-text">{{ setting('site_tagline','Health Informatics Association of Botswana') }}</p>
            </div>
            <p class="footer-about-text">
              {{ setting('footer_about','A multidisciplinary community of health professionals, ICT experts, researchers, and students dedicated to advancing health informatics and digital health in Botswana.') }}
            </p>
            <div class="footer-social-wrap">
              @if(setting('social_facebook','#') !== '#')<a href="{{ setting('social_facebook','#') }}" target="_blank" rel="noopener" class="footer-social-link" aria-label="Facebook"><i class="bi bi-facebook"></i></a>@endif
              @if(setting('social_twitter','#') !== '#')<a href="{{ setting('social_twitter','#') }}" target="_blank" rel="noopener" class="footer-social-link" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>@endif
              @if(setting('social_instagram','#') !== '#')<a href="{{ setting('social_instagram','#') }}" target="_blank" rel="noopener" class="footer-social-link" aria-label="Instagram"><i class="bi bi-instagram"></i></a>@endif
              @if(setting('social_linkedin','#') !== '#')<a href="{{ setting('social_linkedin','#') }}" target="_blank" rel="noopener" class="footer-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>@endif
              @if(setting('social_youtube','#') !== '#')<a href="{{ setting('social_youtube','#') }}" target="_blank" rel="noopener" class="footer-social-link" aria-label="YouTube"><i class="bi bi-youtube"></i></a>@endif
            </div>
          </div>

          <!-- Column 2: Quick Links -->
          <div class="col-lg-2 col-md-6 col-6">
            <h5 class="footer-col-heading">Quick Links</h5>
            <ul class="footer-links">
              <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="{{ url('/about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
              <li><a href="{{ url('/membership') }}"><i class="bi bi-chevron-right"></i> Membership</a></li>
              <li><a href="{{ url('/events') }}"><i class="bi bi-chevron-right"></i> Events</a></li>
              <li><a href="{{ url('/team') }}"><i class="bi bi-chevron-right"></i> Our Team</a></li>
              <li><a href="{{ url('/contact') }}"><i class="bi bi-chevron-right"></i> Contact</a></li>
            </ul>
          </div>

          <!-- Column 3: Resources -->
          <div class="col-lg-2 col-md-6 col-6">
            <h5 class="footer-col-heading">Resources</h5>
            <ul class="footer-links">
              <li><a href="{{ url('/publications') }}"><i class="bi bi-chevron-right"></i> Publications</a></li>
              <li><a href="{{ url('/events') }}"><i class="bi bi-chevron-right"></i> Workshops</a></li>
              <li><a href="{{ url('/events') }}"><i class="bi bi-chevron-right"></i> Webinars</a></li>
              <li><a href="{{ url('/events') }}"><i class="bi bi-chevron-right"></i> Conferences</a></li>
              <li><a href="{{ url('/membership') }}"><i class="bi bi-chevron-right"></i> Join HIASWANA</a></li>
            </ul>
          </div>

          <!-- Column 4: Contact + Newsletter -->
          <div class="col-lg-4 col-md-6">
            <h5 class="footer-col-heading">Get In Touch</h5>
            <ul class="footer-contact-list">
              <li>
                <i class="bi bi-pin-map-fill"></i>
                <span>{{ setting('contact_address','Gaborone, Botswana') }}</span>
              </li>
              <li>
                <i class="bi bi-telephone-fill"></i>
                <a href="tel:{{ setting('contact_phone','+267 71 234 567') }}">{{ setting('contact_phone','+267 71 234 567') }}</a>
              </li>
              <li>
                <i class="bi bi-envelope-fill"></i>
                <a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}">{{ setting('contact_email','info@hiaswana.co.bw') }}</a>
              </li>
              <li>
                <i class="bi bi-clock-fill"></i>
                <span>{{ setting('contact_hours','Mon–Sat: 8:00 AM – 5:00 PM') }}</span>
              </li>
            </ul>

            <div class="footer-newsletter mt-4">
              <h6 class="footer-newsletter-heading">{{ setting('footer_newsletter_heading','Stay Updated') }}</h6>
              <p class="footer-newsletter-sub">{{ setting('footer_newsletter_sub','Get news and updates from HIASWANA in your inbox.') }}</p>
              <form class="footer-newsletter-form" action="{{ url('/contact') }}" method="GET">
                <div class="newsletter-input-group">
                  <input type="email" name="email" placeholder="Your email address" class="newsletter-input" required>
                  <button type="submit" class="newsletter-btn" aria-label="Subscribe">
                    <i class="bi bi-send-fill"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Tagline Band -->
    <div class="footer-tagline-band">
      <div class="container">
        <p class="footer-tagline-main">{{ setting('footer_tagline','ADVANCING DIGITAL HEALTH & HEALTH INFORMATICS IN BOTSWANA ❤️') }}</p>
      </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-copyright-bar">
      <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
        <p class="mb-0">{{ setting('footer_copyright','© HIASWANA | ALL RIGHTS RESERVED') }} {{ date('Y') }}</p>
        <div class="footer-bottom-links">
          <a href="{{ url('/about') }}">About</a>
          <span>·</span>
          <a href="{{ url('/contact') }}">Contact</a>
          <span>·</span>
          <a href="{{ url('/membership') }}">Join Us</a>
        </div>
      </div>
    </div>

    <!-- Scroll to Top -->
    <a href="#" class="scroll-top" id="scroll-top" aria-label="Scroll to top">
      <i class="bi bi-chevron-up"></i>
    </a>

  </footer>
