@extends('layouts.app')
@section('content')

<section class="page-hero section dark-background">
  <div class="container mt-5 py-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">Privacy Notice</h1>
        <p class="lead mb-0">How HIASWANA collects, uses, stores, and protects your personal information.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container legal-content">
    <div class="legal-card" data-aos="fade-up">
      <p><strong>Last updated:</strong> {{ now()->format('F d, Y') }}</p>

      <h2>1. Who We Are</h2>
      <p>HIASWANA (Health Informatics Association of Botswana) is responsible for the personal data submitted through this website, including membership applications.</p>

      <h2>2. Information We Collect</h2>
      <ul>
        <li>Identity details: name, surname, identification number, nationality.</li>
        <li>Contact details: email, phone number, residential and postal address.</li>
        <li>Membership data: category, motivation, payment proof, payment status, and application status.</li>
        <li>Consent records: confirmation that you accepted this Privacy Notice and the Terms of Use, plus consent timestamp and IP address.</li>
      </ul>

      <h2>3. Why We Process Your Data</h2>
      <ul>
        <li>To process and manage your membership application.</li>
        <li>To communicate with you about membership status, payments, and association activities.</li>
        <li>To maintain membership records and meet governance or legal obligations.</li>
        <li>To protect the website and prevent abuse or fraud.</li>
      </ul>

      <h2>4. Legal Basis</h2>
      <p>We process your data based on your consent, our legitimate interest in administering membership, and where applicable, compliance with legal obligations.</p>

      <h2>5. Data Sharing</h2>
      <p>We do not sell your personal data. We may share data with authorized administrators, service providers supporting website operations, or competent authorities where legally required.</p>

      <h2>6. Data Retention</h2>
      <p>We retain personal data only for as long as necessary for membership administration, audit, legal, and operational requirements. Data that is no longer required is deleted or anonymized.</p>

      <h2>7. Your Data Subject Rights</h2>
      <p>Subject to applicable law, you may request:</p>
      <ul>
        <li>Access to your personal data.</li>
        <li>Correction of inaccurate or incomplete data.</li>
        <li>Deletion of your data.</li>
        <li>Restriction or objection to certain processing.</li>
        <li>Withdrawal of consent for future processing.</li>
      </ul>
      <p>To exercise any of these rights, contact us at <a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}">{{ setting('contact_email','info@hiaswana.co.bw') }}</a>.</p>

      <h2>8. Security</h2>
      <p>We apply reasonable technical and organizational safeguards to protect your data from unauthorized access, alteration, disclosure, or destruction.</p>

      <h2>9. Contact</h2>
      <p>For privacy questions or complaints, contact HIASWANA at <a href="mailto:{{ setting('contact_email','info@hiaswana.co.bw') }}">{{ setting('contact_email','info@hiaswana.co.bw') }}</a>.</p>
    </div>
  </div>
</section>

@endsection
