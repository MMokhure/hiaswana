    <section id="featured-services" class="featured-services section services-modern">
      <div class="container">
        <!-- Header Section -->
        <div class="services-header text-center" data-aos="fade-up" data-aos-delay="100">
          <h2 class="services-main-title">{{ setting('services_heading','Transforming Healthcare Through Digital Innovation') }}</h2>
          <div class="services-subheading">{{ setting('services_subheading','OUR CORE INITIATIVES') }}</div>
          <p class="services-intro">
            {{ setting('services_intro',"As Botswana's leading health informatics association, we unite clinicians, technologists, researchers, and policymakers to build stronger, more connected health systems.") }}
          </p>
        </div>

        <!-- Services Grid -->
        <div class="row g-4 mt-4">
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card-modern">
              <div class="service-card-image">
                @php $img1 = setting('service1_image'); @endphp
                <img src="{{ $img1 ? Storage::url($img1) : asset('assets/img/about3.jpeg') }}" alt="{{ setting('service1_title','Capacity Building & Training') }}" class="img-fluid">
              </div>
              <div class="service-card-content">
                <h3 class="service-card-title">{{ setting('service1_title','Capacity Building & Training') }}</h3>
                <p class="service-card-description">
                  {{ setting('service1_description','Short courses, workshops, and mentorship on core health informatics topics such as electronic health records, data standards, privacy, and data use for decision‑making.') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="service-card-modern">
              <div class="service-card-image">
                @php $img2 = setting('service2_image'); @endphp
                <img src="{{ $img2 ? Storage::url($img2) : asset('assets/img/bg-img.jpeg') }}" alt="{{ setting('service2_title','Standards & Interoperability') }}" class="img-fluid">
              </div>
              <div class="service-card-content">
                <h3 class="service-card-title">{{ setting('service2_title','Standards & Interoperability') }}</h3>
                <p class="service-card-description">
                  {{ setting('service2_description','Promoting national and international standards (such as ICD, SNOMED CT, HL7 FHIR) to enable safe data exchange between systems and levels of care.') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card-modern">
              <div class="service-card-image">
                @php $img3 = setting('service3_image'); @endphp
                <img src="{{ $img3 ? Storage::url($img3) : asset('assets/img/bgimg.jpeg') }}" alt="{{ setting('service3_title','Research & Innovation') }}" class="img-fluid">
              </div>
              <div class="service-card-content">
                <h3 class="service-card-title">{{ setting('service3_title','Research & Innovation') }}</h3>
                <p class="service-card-description">
                  {{ setting('service3_description','Supporting applied research, pilot projects, and innovation labs that explore new ways to use data, AI, and digital tools to improve clinical care and public health.') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="350">
            <div class="service-card-modern">
              <div class="service-card-image">
                @php $img4 = setting('service4_image'); @endphp
                <img src="{{ $img4 ? Storage::url($img4) : asset('assets/img/about2.jpeg') }}" alt="{{ setting('service4_title','Policy & Advocacy') }}" class="img-fluid">
              </div>
              <div class="service-card-content">
                <h3 class="service-card-title">{{ setting('service4_title','Policy & Advocacy') }}</h3>
                <p class="service-card-description">
                  {{ setting('service4_description','Engaging with government, partners, and regulators to ensure that digital health investments are ethical, sustainable, and aligned with national health priorities.') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Featured Services Section -->
