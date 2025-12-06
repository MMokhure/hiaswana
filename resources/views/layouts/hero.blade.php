<section id="hero" class="hero section dark-background">
      <div class="container-fluid p-0">
        <div class="hero-wrapper">
          <div class="hero-image slideshow">
            <div class="slide" data-bg="{{ asset('assets/img/bg-img.jpeg') }}" aria-hidden="true"></div>
            <div class="slide" data-bg="{{ asset('assets/img/bgimg.jpeg') }}" aria-hidden="true"></div>
            <div class="slide" data-bg="{{ asset('assets/img/about2.jpeg') }}" aria-hidden="true"></div>
          </div>

          <div class="hero-content">
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-md-10" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-box">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">Building a Connected, Data‑Driven Health System</h1>
                    <p class="hero-description animated-text" data-aos="fade-up" data-aos-delay="250">
                      <span class="word-animate">We</span> <span class="word-animate">bring</span> <span class="word-animate">together</span> <span class="word-animate">clinicians,</span> <span class="word-animate">technologists,</span> <span class="word-animate">academics,</span> <span class="word-animate">and</span> <span class="word-animate">policymakers</span> <span class="word-animate">to</span> <span class="word-animate">strengthen</span> <span class="word-animate">digital</span> <span class="word-animate">health</span> <span class="word-animate">and</span> <span class="word-animate">health</span> <span class="word-animate">information</span> <span class="word-animate">systems</span> <span class="word-animate">across</span> <span class="word-animate">Botswana.</span>
                    </p>

                    <div class="hero-cta-cards" data-aos="fade-up" data-aos-delay="300">
                      <a href="{{ url('/contact') }}" class="hero-cta-card">
                        <div class="cta-card-icon">
                          <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="cta-card-content">
                          <span class="cta-card-label">Get in touch</span>
                          <strong class="cta-card-value">+267 71 234 567</strong>
                        </div>
                        <div class="cta-card-arrow">
                          <i class="bi bi-arrow-right"></i>
                        </div>
                      </a>
                      <a href="{{ url('/events') }}" class="hero-cta-card">
                        <div class="cta-card-icon">
                          <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="cta-card-content">
                          <span class="cta-card-label">Community Activities</span>
                          <strong class="cta-card-value">Workshops & trainings, Conference, webinars, forums</strong>
                        </div>
                        <div class="cta-card-arrow">
                          <i class="bi bi-arrow-right"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
<!-- 
              <div class="features-wrapper">
                <div class="row gy-4">

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                      <div class="feature-icon">
                        <i class="bi bi-heart-pulse-fill"></i>
                      </div>
                      <div class="feature-text">
                        <h3>Cardiology</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                      <div class="feature-icon">
                        <i class="bi bi-lungs-fill"></i>
                      </div>
                      <div class="feature-text">
                        <h3>Pulmonology</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="550">
                      <div class="feature-icon">
                        <i class="bi bi-capsule"></i>
                      </div>
                      <div class="feature-text">
                        <h3>Diagnostics</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div> -->

            </div>
          </div>
        </div>
      </div>
      <script>
        // Set slide background images from data-bg attributes to avoid nested-quote issues
        (function(){
          try {
            document.querySelectorAll('#hero .slide').forEach(function(s){
              var bg = s.getAttribute('data-bg');
              if(bg) s.style.backgroundImage = 'url("' + bg + '")';
            });
          } catch(e){ /* fail silently */ }
        })();
      </script>
    </section>