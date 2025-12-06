  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

          <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
              <div class="logo-wrapper">
                <img src="{{ asset('assets/img/logo.png') }}" alt="HIASWANA - Health Informatics Association of Botswana logo" class="logo-img">
              </div>
              <div class="logo-text-wrapper d-none d-md-block">
                <h4 class="sitename">HIASWANA</h4>
                <span class="logo-tagline">Health Informatics Association</span>
              </div>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="{{ url('/') }}" class="nav-link"><i class="bi bi-house-door-fill d-xl-none"></i><span class="nav-text">Home</span></a></li>
                  <li><a href="{{ url('/membership') }}" class="nav-link"><i class="bi bi-people-fill d-xl-none"></i><span class="nav-text">Membership</span></a></li>
                  <li><a href="{{ url('/events') }}" class="nav-link"><i class="bi bi-calendar-event-fill d-xl-none"></i><span class="nav-text">Events</span></a></li>
                  <li><a href="{{ url('/team') }}" class="nav-link"><i class="bi bi-person-badge-fill d-xl-none"></i><span class="nav-text">Team</span></a></li>
                  <li><a href="{{ url('/publications') }}" class="nav-link"><i class="bi bi-journal-text d-xl-none"></i><span class="nav-text">Publications</span></a></li>
                  <li><a href="{{ url('/contact') }}" class="nav-link"><i class="bi bi-envelope-fill d-xl-none"></i><span class="nav-text">Contact</span></a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <a class="btn-getstarted" href="{{ url('/membership') }}">Join HIASWANA</a>

      </div>
  </header>