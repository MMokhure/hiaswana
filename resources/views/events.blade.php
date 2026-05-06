@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">{{ setting('page_events_title','Community Activities') }}</h1>
        <p class="lead">
          {{ setting('page_events_subtitle','Stay up to date with HIASWANA meetings, workshops, webinars, conferences, and forums focused on digital health and health informatics.') }}
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    @php
      $categories = [
        'workshops'  => ['label' => 'Workshops & Trainings', 'icon' => 'bi-mortarboard-fill', 'subtitle' => 'Hands-on learning experiences to build capacity in health informatics'],
        'conference' => ['label' => 'Conference',            'icon' => 'bi-people-fill',      'subtitle' => 'Annual gatherings bringing together health informatics professionals'],
        'webinars'   => ['label' => 'Webinars',              'icon' => 'bi-camera-video-fill', 'subtitle' => 'Online learning sessions accessible from anywhere'],
        'forums'     => ['label' => 'Forums',                'icon' => 'bi-chat-dots-fill',    'subtitle' => 'Open discussions and knowledge sharing platforms'],
      ];
      $firstActive = collect($categories)->keys()->first(fn($k) => ($events[$k] ?? collect())->isNotEmpty()) ?? 'workshops';
    @endphp

    <!-- Category Navigation Tabs -->
    <div class="events-category-tabs mb-5" data-aos="fade-up">
      <div class="row">
        <div class="col-12">
          <ul class="nav nav-pills justify-content-center flex-wrap" id="eventTabs" role="tablist">
            @foreach($categories as $key => $cat)
            <li class="nav-item" role="presentation">
              <button class="nav-link {{ $key === $firstActive ? 'active' : '' }}"
                      id="{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $key }}"
                      type="button" role="tab">
                <i class="bi {{ $cat['icon'] }} me-2"></i>{{ $cat['label'] }}
              </button>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="eventTabsContent">
      @foreach($categories as $key => $cat)
      <div class="tab-pane fade {{ $key === $firstActive ? 'show active' : '' }}"
           id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
        <div class="events-section-header text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">{{ $cat['label'] }}</h2>
          <p class="section-subtitle">{{ $cat['subtitle'] }}</p>
        </div>
        <div class="row g-4">
          @forelse($events[$key] ?? [] as $i => $event)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3 + 1) * 100 }}">
            <div class="event-card-modern">
              @if($event->image)
              <div class="event-card-image">
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="img-fluid">
                @if($event->event_date)
                  <div class="event-card-badge {{ $event->event_date->isPast() ? 'badge-past' : '' }}">
                    @if($event->event_date->isPast())
                      <i class="bi bi-check-circle"></i> Past
                    @else
                      <i class="bi bi-calendar3"></i> Upcoming
                    @endif
                  </div>
                @endif
              </div>
              @endif
              <div class="event-card-content">
                <div class="event-card-category">{{ ucfirst($key) }}</div>
                <h3 class="event-card-title">{{ $event->title }}</h3>
                @if($event->description)
                <p class="event-card-description">{{ Str::limit($event->description, 140) }}</p>
                @endif
                <div class="event-card-meta">
                  <span>
                    <i class="bi bi-calendar-event"></i>
                    {{ $event->event_date ? $event->event_date->format('M d, Y') : 'TBA' }}
                  </span>
                  @if($event->location)
                  <span><i class="bi bi-geo-alt"></i> {{ $event->location }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12 text-center text-muted py-5">
            <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>
            No {{ strtolower($cat['label']) }} scheduled yet. Check back soon.
          </div>
          @endforelse
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection

    <!-- Tab Content -->
    <div class="tab-content" id="eventTabsContent">
      <!-- Workshops & Trainings -->
      <div class="tab-pane fade show active" id="workshops" role="tabpanel" aria-labelledby="workshops-tab">
        <div class="events-section-header text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">Workshops & Trainings</h2>
          <p class="section-subtitle">Hands-on learning experiences to build capacity in health informatics</p>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about3.jpeg') }}" alt="Health Informatics Workshop" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-calendar3"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Workshop</div>
                <h3 class="event-card-title">Health Informatics Fundamentals</h3>
                <p class="event-card-description">
                  A comprehensive workshop covering core concepts in health informatics, electronic health records, and data standards.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> TBA</span>
                  <span><i class="bi bi-geo-alt"></i> Gaborone, Botswana</span>
                </div>
                <a href="#" class="event-card-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bg-img.jpeg') }}" alt="Data Standards Training" class="img-fluid">
                <div class="event-card-badge badge-past">
                  <i class="bi bi-check-circle"></i> Past
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Training</div>
                <h3 class="event-card-title">Data Standards & Interoperability</h3>
                <p class="event-card-description">
                  Training session on health data standards, HL7, FHIR, and achieving interoperability in health information systems.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Completed</span>
                  <span><i class="bi bi-geo-alt"></i> Virtual</span>
                </div>
                <a href="#" class="event-card-link">View Details <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bgimg.jpeg') }}" alt="EHR Implementation" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-calendar3"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Workshop</div>
                <h3 class="event-card-title">EHR Implementation Best Practices</h3>
                <p class="event-card-description">
                  Learn from experts about successful electronic health record implementation strategies and common pitfalls to avoid.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> TBA</span>
                  <span><i class="bi bi-geo-alt"></i> TBA</span>
                </div>
                <a href="#" class="event-card-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Conference -->
      <div class="tab-pane fade" id="conference" role="tabpanel" aria-labelledby="conference-tab">
        <div class="events-section-header text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">Conference</h2>
          <p class="section-subtitle">Annual gatherings bringing together health informatics professionals</p>
        </div>
        <div class="row g-4">
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="event-card-modern event-card-large">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about2.jpeg') }}" alt="HIASWANA Annual Conference" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-star-fill"></i> Featured
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Annual Conference</div>
                <h3 class="event-card-title">HIASWANA Annual Health Informatics Conference</h3>
                <p class="event-card-description">
                  Join us for our premier annual conference featuring keynote speakers, research presentations, panel discussions, and networking opportunities. This event brings together clinicians, technologists, researchers, and policymakers to advance digital health in Botswana and the region.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> TBA</span>
                  <span><i class="bi bi-geo-alt"></i> Gaborone, Botswana</span>
                  <span><i class="bi bi-clock"></i> 2 Days</span>
                </div>
                <a href="#" class="event-card-link">Register Now <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="event-card-modern event-card-large">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about3.jpeg') }}" alt="Regional Conference" class="img-fluid">
                <div class="event-card-badge badge-past">
                  <i class="bi bi-check-circle"></i> Past
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Regional Conference</div>
                <h3 class="event-card-title">HELINA Scientific Conference</h3>
                <p class="event-card-description">
                  HIASWANA members participated in the HELINA scientific conference, contributing to discussions on strengthening health information systems and health informatics capacity across Africa.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Completed</span>
                  <span><i class="bi bi-geo-alt"></i> Regional</span>
                </div>
                <a href="#" class="event-card-link">View Proceedings <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Webinars -->
      <div class="tab-pane fade" id="webinars" role="tabpanel" aria-labelledby="webinars-tab">
        <div class="events-section-header text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">Webinars</h2>
          <p class="section-subtitle">Online learning sessions accessible from anywhere</p>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bg-img.jpeg') }}" alt="Digital Health Webinar" class="img-fluid">
                <div class="event-card-badge badge-webinar">
                  <i class="bi bi-camera-video"></i> Live
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Webinar</div>
                <h3 class="event-card-title">Digital Health Trends 2024</h3>
                <p class="event-card-description">
                  Explore the latest trends and innovations in digital health, including AI applications, telemedicine, and health data analytics.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Monthly</span>
                  <span><i class="bi bi-globe"></i> Online</span>
                </div>
                <a href="#" class="event-card-link">Join Webinar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bgimg.jpeg') }}" alt="Health Data Privacy" class="img-fluid">
                <div class="event-card-badge badge-webinar">
                  <i class="bi bi-camera-video"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Webinar</div>
                <h3 class="event-card-title">Health Data Privacy & Security</h3>
                <p class="event-card-description">
                  Learn about best practices for protecting patient data, compliance with regulations, and implementing robust security measures.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> TBA</span>
                  <span><i class="bi bi-globe"></i> Online</span>
                </div>
                <a href="#" class="event-card-link">Register <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about3.jpeg') }}" alt="Health Informatics Research" class="img-fluid">
                <div class="event-card-badge badge-past">
                  <i class="bi bi-play-circle"></i> Recorded
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Webinar</div>
                <h3 class="event-card-title">Research Methods in Health Informatics</h3>
                <p class="event-card-description">
                  A session on conducting rigorous research in health informatics, including study design, data collection, and analysis methods.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Completed</span>
                  <span><i class="bi bi-globe"></i> Online</span>
                </div>
                <a href="#" class="event-card-link">Watch Recording <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Forums -->
      <div class="tab-pane fade" id="forums" role="tabpanel" aria-labelledby="forums-tab">
        <div class="events-section-header text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">Forums</h2>
          <p class="section-subtitle">Open discussions and knowledge sharing platforms</p>
        </div>
        <div class="row g-4">
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about2.jpeg') }}" alt="Policy Forum" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-chat-dots"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Policy Forum</div>
                <h3 class="event-card-title">Digital Health Policy Roundtable</h3>
                <p class="event-card-description">
                  Join policymakers, health professionals, and technologists for an open discussion on shaping digital health policies in Botswana. Share insights, challenges, and opportunities.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Quarterly</span>
                  <span><i class="bi bi-geo-alt"></i> Gaborone, Botswana</span>
                </div>
                <a href="#" class="event-card-link">Participate <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bg-img.jpeg') }}" alt="Technical Forum" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-chat-dots"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Technical Forum</div>
                <h3 class="event-card-title">Health IT Practitioners Forum</h3>
                <p class="event-card-description">
                  A forum for health IT professionals to discuss implementation challenges, share solutions, and collaborate on projects. Network with peers and learn from real-world experiences.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Bi-monthly</span>
                  <span><i class="bi bi-geo-alt"></i> Hybrid</span>
                </div>
                <a href="#" class="event-card-link">Join Forum <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/bgimg.jpeg') }}" alt="Research Forum" class="img-fluid">
                <div class="event-card-badge badge-past">
                  <i class="bi bi-check-circle"></i> Past
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Research Forum</div>
                <h3 class="event-card-title">Health Informatics Research Exchange</h3>
                <p class="event-card-description">
                  Researchers present their work, receive feedback, and explore collaboration opportunities. A platform for advancing health informatics research in Botswana.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Completed</span>
                  <span><i class="bi bi-geo-alt"></i> Virtual</span>
                </div>
                <a href="#" class="event-card-link">View Summary <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="event-card-modern">
              <div class="event-card-image">
                <img src="{{ asset('assets/img/about3.jpeg') }}" alt="Student Forum" class="img-fluid">
                <div class="event-card-badge">
                  <i class="bi bi-chat-dots"></i> Upcoming
                </div>
              </div>
              <div class="event-card-content">
                <div class="event-card-category">Student Forum</div>
                <h3 class="event-card-title">Student & Early Career Forum</h3>
                <p class="event-card-description">
                  A dedicated space for students and early-career professionals to connect, share ideas, and learn from experienced members. Mentorship opportunities available.
                </p>
                <div class="event-card-meta">
                  <span><i class="bi bi-calendar-event"></i> Monthly</span>
                  <span><i class="bi bi-geo-alt"></i> Hybrid</span>
                </div>
                <a href="#" class="event-card-link">Join Forum <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
