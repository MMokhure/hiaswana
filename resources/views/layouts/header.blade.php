  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

          <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
              <img src="assets/img/logo.png" height="80px" alt="Spinal Rehabilitation Center Logo">
              <!-- <h4 class="sitename">Spinal Rehabilitation Center</h4> -->
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <!-- <li><a href="index.html" class="active">Home</a></li> -->
                  <li><a href="{{ url('/about') }}">About us</a></li>

                  <li class="dropdown"><a href="#"><span>Our Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li class="dropdown"><a href="#"><span>Spine Conditions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                              <ul>
                                  <li><a href="#">Back & Neck Pains</a></li>
                                  <li><a href="#">Sciatica</a></li>
                                  <li><a href="#">Bulging & Herniated Disc</a></li>
                                  <li><a href="#">Facet Syndrome</a></li>
                                  <li><a href="#">Spondylosis</a></li>
                                  <li><a href="#">Pinched Nerve</a></li>
                                  <li><a href="#">Cervical Radiculopathy</a></li>
                              </ul>
                          </li>
                          <li class="dropdown"><a href="#"><span>Extremities</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                              <ul>
                                  <li><a href="#">Knee and Hip Pain</a></li>
                              </ul>
                          </li>

                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>What Makes Us Different</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="department-details.html">Back & Neck Pain Treatment</a></li>
                          <li><a href="service-details.html">Knee Decompression</a></li>
                     </ul>
                  </li>
                  <li><a href="{{ url('/contact-us') }}">Contact us</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <a class="btn-getstarted" href="{{ url('/#appointment') }}">Appointment</a>

      </div>
  </header>