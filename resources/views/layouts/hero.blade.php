    <section id="hero" class="hero section dark-background">
      <div class="container-fluid p-0">
        <div class="hero-wrapper">
          <div class="hero-image slideshow" id="heroSlideshow">
            @if($heroSlides->isNotEmpty())
              @foreach($heroSlides as $slide)
                <div class="slide" data-bg="{{ $slide->image_url }}" style="background-image: url('{{ $slide->image_url }}')" aria-hidden="true"></div>
              @endforeach
            @else
              <div class="slide" data-bg="{{ asset('assets/img/bg-img.jpeg') }}" style="background-image: url('{{ asset('assets/img/bg-img.jpeg') }}')" aria-hidden="true"></div>
              <div class="slide" data-bg="{{ asset('assets/img/bgimg.jpeg') }}" style="background-image: url('{{ asset('assets/img/bgimg.jpeg') }}')" aria-hidden="true"></div>
              <div class="slide" data-bg="{{ asset('assets/img/about.jpeg') }}" style="background-image: url('{{ asset('assets/img/about.jpeg') }}')" aria-hidden="true"></div>
            @endif
          </div>

          <div class="hero-content">
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-md-10" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-box">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">{{ setting('hero_title','Building a Connected, Data-Driven Health System') }}</h1>
                    <p class="hero-description animated-text" data-aos="fade-up" data-aos-delay="250">
                      @foreach(explode(' ', setting('hero_description','We bring together clinicians, technologists, academics, and policymakers to strengthen digital health and health information systems across Botswana.')) as $word)
                        <span class="word-animate">{{ $word }}</span>
                      @endforeach
                    </p>

                    <div class="hero-cta-cards" data-aos="fade-up" data-aos-delay="300">
                      <a href="{{ url('/contact') }}" class="hero-cta-card">
                        <div class="cta-card-icon">
                          <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="cta-card-content">
                          <span class="cta-card-label">{{ setting('hero_cta1_label','Get in touch') }}</span>
                          <strong class="cta-card-value">{{ setting('contact_phone','+267 71 234 567') }}</strong>
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
                          <span class="cta-card-label">{{ setting('hero_cta2_label','Community Activities') }}</span>
                          <strong class="cta-card-value">{{ setting('hero_cta2_sub','Workshops & trainings, Conference, webinars, forums') }}</strong>
                        </div>
                        <div class="cta-card-arrow">
                          <i class="bi bi-arrow-right"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
