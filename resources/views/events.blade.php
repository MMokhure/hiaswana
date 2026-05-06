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
