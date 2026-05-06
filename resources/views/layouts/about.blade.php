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
                  <div class="stat-number">{{ setting('about_stat1_number','10+') }}</div>
                  <div class="stat-label">{{ setting('about_stat1_label','YEARS') }}</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">{{ setting('about_stat2_number','270+') }}</div>
                  <div class="stat-label">{{ setting('about_stat2_label','MEMBERS') }}</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">{{ setting('about_stat3_number','89') }}</div>
                  <div class="stat-label">{{ setting('about_stat3_label','PROJECTS') }}</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">{{ setting('about_stat4_number','53+') }}</div>
                  <div class="stat-label">{{ setting('about_stat4_label','EVENTS') }}</div>
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
              <div class="about-subheading">{{ setting('about_subheading','ABOUT US') }}</div>
              
              <h2 class="about-heading-new">
                {{ setting('about_heading','Our Work Promise To Uphold The Trust Placed') }}
              </h2>
              
              <p class="about-description-new">
                {{ setting('about_description') }}
              </p>

              <!-- Checkmarked List -->
              <ul class="about-checklist">
                <li><i class="bi bi-check-circle-fill"></i><span>{{ setting('about_check1','Health Informatics Leadership & Advocacy') }}</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>{{ setting('about_check2','Capacity Building & Professional Development') }}</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>{{ setting('about_check3','Research & Innovation in Digital Health') }}</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>{{ setting('about_check4','Collaboration & Knowledge Sharing') }}</span></li>
              </ul>

              <!-- Experience Badge and CTA -->
              <div class="about-cta-section">
                <div class="experience-badge-new">
                  <div class="badge-number">{{ setting('about_badge_number','10+') }}</div>
                  <div class="badge-text">
                    <div>{{ setting('about_badge_line1','YEARS') }}</div>
                    <div>{{ setting('about_badge_line2','OF EXPERIENCE') }}</div>
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
