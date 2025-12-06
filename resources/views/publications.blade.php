@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-5">Publications</h1>
        <p class="lead">
          A space to showcase reports, guidelines, case studies, and research outputs related to health informatics and
          digital health in Botswana.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2>Featured Publications</h2>
    <p class="muted">
      Below is an example entry. You can extend this list with national digital health strategies, implementation guides,
      and HIASWANA‑endorsed documents.
    </p>

    <div class="list-group mt-4">
      <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
        <div class="ms-0 me-3">
          <h5 class="mb-1">Sample: HIASWANA Brief on Health Informatics Capacity in Botswana</h5>
          <p class="mb-1 text-muted">Published by HIASWANA – an example placeholder link that you can update with the real PDF or web page.</p>
          <small>HIASWANA, 2025</small>
        </div>
        <span class="badge bg-primary rounded-pill align-self-center">PDF</span>
      </a>
    </div>
  </div>
</section>

@endsection


