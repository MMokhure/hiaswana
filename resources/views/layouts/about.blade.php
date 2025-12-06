 <!-- Home About Section -->
   <section id="home-about" class="home-about section modern-about-section">
      <div class="container">
        <div class="row g-5 align-items-stretch">
          <!-- Image Column with Statistics Overlay -->
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="about-image-wrapper-new">
              <div class="about-image-frame-new about-slideshow">
                <div class="about-slide active" data-bg="{{asset('assets/img/about3.jpeg')}}"></div>
                <div class="about-slide" data-bg="{{asset('assets/img/bg-img.jpeg')}}"></div>
                <div class="about-slide" data-bg="{{asset('assets/img/bgimg.jpeg')}}"></div>
                <div class="about-slide" data-bg="{{asset('assets/img/about2.jpeg')}}"></div>
              </div>
              
              <!-- Statistics Overlay -->
              <div class="statistics-overlay">
                <div class="stat-item">
                  <div class="stat-number">10+</div>
                  <div class="stat-label">YEARS</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">270+</div>
                  <div class="stat-label">MEMBERS</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">89</div>
                  <div class="stat-label">PROJECTS</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">53+</div>
                  <div class="stat-label">EVENTS</div>
                </div>
              </div>

              <!-- Slideshow Indicators -->
              <div class="slideshow-indicators">
                <span class="indicator active" data-slide="0"></span>
                <span class="indicator" data-slide="1"></span>
                <span class="indicator" data-slide="2"></span>
                <span class="indicator" data-slide="3"></span>
              </div>
            </div>
          </div>

          <!-- Content Column -->
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="about-content-new">
              <div class="about-subheading">ABOUT US</div>
              
              <h2 class="about-heading-new">
                Our Work Promise To Uphold The Trust Placed
              </h2>
              
              <p class="about-description-new">
                We are a multidisciplinary community of health professionals, ICT experts, researchers, and students dedicated to
                advancing biomedical and health informatics in Botswana and the region. Inspired by global bodies such as the
                International Medical Informatics Association (IMIA) and the Pan‑African Health Informatics Association (HELINA),
                we promote the safe, ethical, and effective use of information and communication technologies to improve health
                for all.
              </p>

              <!-- Checkmarked List -->
              <ul class="about-checklist">
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Health Informatics Leadership & Advocacy</span>
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Capacity Building & Professional Development</span>
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Research & Innovation in Digital Health</span>
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Collaboration & Knowledge Sharing</span>
                </li>
              </ul>

              <!-- Experience Badge and CTA -->
              <div class="about-cta-section">
                <div class="experience-badge-new">
                  <div class="badge-number">10+</div>
                  <div class="badge-text">
                    <div>YEARS</div>
                    <div>OF EXPERIENCE</div>
                  </div>
                </div>
                <a href="{{ url('/about') }}" class="btn-learn-more">
                  Learn More
                </a>
              </div>
            </div>
          </div>
        </div>     
      </div>
    </section><!-- /Home About Section -->
