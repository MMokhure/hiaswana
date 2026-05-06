@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">{{ setting('page_pubs_title','Publications') }}</h1>
        <p class="lead">
          {{ setting('page_pubs_subtitle','A space to showcase reports, guidelines, case studies, and research outputs related to health informatics and digital health in Botswana.') }}
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2>{{ setting('page_pubs_heading','Featured Publications') }}</h2>

    <div class="list-group mt-4">
      @forelse($publications as $pub)
      <a href="{{ $pub->file_url ? (str_starts_with($pub->file_url, 'http') ? $pub->file_url : Storage::url($pub->file_url)) : '#' }}"
         target="_blank"
         class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
        <div class="ms-0 me-3">
          <h5 class="mb-1">{{ $pub->title }}</h5>
          @if($pub->description)
            <p class="mb-1 text-muted">{{ $pub->description }}</p>
          @endif
          <small>{{ $pub->author ? $pub->author . ', ' : '' }}{{ $pub->year }}</small>
        </div>
        <span class="badge bg-primary rounded-pill align-self-center">{{ $pub->type }}</span>
      </a>
      @empty
      <div class="text-center py-5 text-muted">
        <i class="bi bi-journal-x fs-1 d-block mb-3"></i>
        No publications available yet.
      </div>
      @endforelse
    </div>
  </div>
</section>

@endsection

