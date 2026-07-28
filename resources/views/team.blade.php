@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">{{ setting('page_team_title','Our Team') }}</h1>
        <p class="lead">
          {{ setting('page_team_subtitle','HIASWANA is led by volunteers from health, ICT, academia, and development partners who are passionate about using data and technology to improve health.') }}
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section light-background">
  <div class="container">
    <div class="section-header text-center mb-4">
      <h2>{{ setting('page_team_section_heading','Leadership & Coordination') }}</h2>
      <p class="muted">{{ setting('page_team_section_subtitle','Current HIASWANA office bearers.') }}</p>
    </div>

    <div class="row g-4">
      @forelse($members as $member)
      <div class="col-md-4 col-lg-3" data-aos="fade-up">
        <div class="team-card card p-4 text-center h-100">
          @if($member->photo)
            <img src="{{ Storage::url($member->photo) }}" class="img-fluid rounded-circle mx-auto mb-3"
                 alt="{{ $member->name }}" style="width:110px;height:110px;object-fit:cover;">
          @else
            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white mx-auto mb-3"
                 style="width:110px;height:110px;font-size:2rem;">
              {{ strtoupper(substr($member->name, 0, 1)) }}
            </div>
          @endif
          <h5 class="mb-1">{{ $member->name }}</h5>
          <small class="muted d-block mb-2">{{ $member->role }}</small>
          @if($member->bio)
            <p class="muted mb-0">{{ $member->bio }}</p>
          @endif
        </div>
      </div>
      @empty
      <div class="col-12 text-center text-muted py-4">Team information coming soon.</div>
      @endforelse
    </div>
  </div>
</section>

{{-- Committees --}}
@if($committees->isNotEmpty())
  @foreach($committees as $committee)
  <section class="section {{ $loop->even ? 'light-background' : '' }}">
    <div class="container">
      <div class="section-header text-center mb-4">
        <h2>{{ $committee->name }}</h2>
        @if($committee->description)
          <p class="muted">{{ $committee->description }}</p>
        @endif
      </div>
      <div class="row g-4 justify-content-center">
        @foreach($committee->members as $cm)
        <div class="col-md-4 col-lg-3" data-aos="fade-up">
          <div class="team-card card p-4 text-center h-100">
            @if($cm->photo)
              <img src="{{ Storage::url($cm->photo) }}" class="img-fluid rounded-circle mx-auto mb-3"
                   alt="{{ $cm->name }}" style="width:110px;height:110px;object-fit:cover;">
            @else
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white mx-auto mb-3"
                   style="width:110px;height:110px;font-size:2rem;">
                {{ strtoupper(substr($cm->name, 0, 1)) }}
              </div>
            @endif
            <h5 class="mb-1">{{ $cm->name }}</h5>
            <small class="muted d-block mb-1">{{ $cm->role }}</small>
            @if($cm->organization)
              <small class="text-muted d-block mb-2">{{ $cm->organization }}</small>
            @endif
            @if($cm->bio)
              <p class="muted mb-0 small">{{ $cm->bio }}</p>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endforeach
@endif

@endsection
