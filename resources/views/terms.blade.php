@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">Terms of Use</h1>
        <p class="lead mb-0">Rules and conditions for using the HIASWANA website and membership services.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container legal-content">
    <div class="legal-card" data-aos="fade-up">
      <p><strong>Last updated:</strong> {{ now()->format('F d, Y') }}</p>

      <h2>1. Acceptance of Terms</h2>
      <p>By accessing this website or submitting a membership application, you agree to these Terms of Use and our Privacy Notice.</p>

      <h2>2. Use of Website</h2>
      <p>You agree to use this website lawfully and not to disrupt, misuse, or attempt unauthorized access to any systems or data.</p>

      <h2>3. Membership Applications</h2>
      <ul>
        <li>You must provide accurate and complete information.</li>
        <li>HIASWANA may verify submitted information where necessary.</li>
        <li>Submission of an application does not guarantee approval.</li>
        <li>Membership decisions are made according to HIASWANA governance procedures.</li>
      </ul>

      <h2>4. Payments</h2>
      <p>Where membership fees apply, payment instructions will be provided by HIASWANA. Membership activation may be subject to successful payment verification.</p>

      <h2>5. Intellectual Property</h2>
      <p>Unless otherwise stated, website content is owned by or licensed to HIASWANA and may not be copied, distributed, or reused without permission.</p>

      <h2>6. Limitation of Liability</h2>
      <p>The website is provided on an "as is" basis. HIASWANA is not liable for indirect or consequential damages arising from use of the site, to the extent permitted by law.</p>

      <h2>7. Privacy</h2>
      <p>Personal data submitted through this website is handled according to our <a href="{{ route('privacy') }}">Privacy Notice</a>.</p>

      <h2>8. Changes to Terms</h2>
      <p>We may update these Terms of Use from time to time. Continued use of the website after changes means you accept the updated terms.</p>

      <h2>9. Contact</h2>
      <p>Questions about these terms can be sent to <a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}">{{ setting('contact_email','info@hiaswana.co.bw') }}</a>.</p>
    </div>
  </div>
</section>

@endsection
