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
                <div class="col-lg-7 col-md-10" data-aos="fade-right" data-aos-delay="100">
                  <div class="content-box">
                    <span class="badge-accent" data-aos="fade-up" data-aos-delay="150">Leading Healthcare Specialists</span>
                    <h1 class="playful" data-aos="fade-up" data-aos-delay="200">Spine Specialist In Gaborone, Botswana</h1>
                    <p data-aos="fade-up" data-aos-delay="250">YOUR PATHWAY TO A PAIN FREE LIFE.</p>

                    <div class="cta-group" data-aos="fade-up" data-aos-delay="300">
                      <a href="appointment.html" class="btn btn-primary">Book Appointment</a>
                      <a href="services.html" class="btn btn-outline">Explore Services</a>
                    </div>

                    <div class="info-badges" data-aos="fade-up" data-aos-delay="350">
                      <div class="badge-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div class="badge-content">
                          <span>Call Now</span>
                          <strong>+267 71 234 567</strong>
                        </div>
                      </div>
                      <div class="badge-item">
                        <i class="bi bi-clock-fill"></i>
                        <div class="badge-content">
                          <span>Working Hours</span>
                          <strong>Mon-Sat: 8AM-5PM</strong>
                        </div>
                      </div>
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