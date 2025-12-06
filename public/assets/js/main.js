/**
* Template Name: MediTrust
* Template URL: https://bootstrapmade.com/meditrust-bootstrap-hospital-website-template/
* Updated: Jul 04 2025 with Bootstrap v5.3.7
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   * Enhanced with smooth header animation
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    
    if (window.scrollY > 100) {
      selectBody.classList.add('scrolled');
      selectHeader.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
      selectHeader.style.transition = 'all 0.3s ease';
    } else {
      selectBody.classList.remove('scrolled');
      selectHeader.style.boxShadow = '0 2px 15px rgba(0, 0, 0, 0.1)';
    }
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);
  
  /**
   * Animate nav menu items on page load
   */
  window.addEventListener('load', () => {
    const navItems = document.querySelectorAll('.navmenu > ul > li');
    navItems.forEach((item, index) => {
      item.style.opacity = '0';
      item.style.transform = 'translateY(-10px)';
      setTimeout(() => {
        item.style.transition = 'all 0.6s ease-out';
        item.style.opacity = '1';
        item.style.transform = 'translateY(0)';
      }, 100 + (index * 100));
    });
  });

  /**
   * Mobile nav toggle with enhanced animations
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  const navMenu = document.querySelector('#navmenu');
  const navMenuItems = document.querySelectorAll('#navmenu ul li');

  function mobileNavToogle() {
    const body = document.querySelector('body');
    const isActive = body.classList.contains('mobile-nav-active');
    
    body.classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
    
    // Reset animations when closing
    if (!isActive) {
      navMenuItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        setTimeout(() => {
          item.style.transition = 'all 0.4s ease-out';
          item.style.opacity = '1';
          item.style.transform = 'translateX(0)';
        }, index * 50);
      });
    }
  }
  
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Enhanced nav link interactions
   */
  document.querySelectorAll('#navmenu a').forEach(link => {
    // Add hover effect with ripple
    link.addEventListener('mouseenter', function(e) {
      this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
    });
    
    // Active state management
    if (window.location.pathname === new URL(link.href).pathname) {
      link.classList.add('active');
    }
  });

  /**
   * Hide mobile nav on same-page/hash links with smooth transition
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        // Add slight delay for smooth transition
        setTimeout(() => {
          mobileNavToogle();
        }, 100);
      }
    });
  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTopButtons = document.querySelectorAll('.scroll-top');
  
  function toggleScrollTop() {
    scrollTopButtons.forEach((scrollTop) => {
      // Only toggle active class for fixed position buttons (not footer buttons)
      if (scrollTop && !scrollTop.closest('.footer')) {
        window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
      }
    });
  }
  
  scrollTopButtons.forEach((scrollTop) => {
    if (scrollTop) {
      scrollTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    }
  });
  
  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

})();

/* Ensure hero background video auto-plays and loops reliably */
(function() {
  try {
    const heroVideo = document.querySelector('.hero .hero-image video');
    if (!heroVideo) return;
    // Ensure muted so autoplay is allowed
    heroVideo.muted = true;
    heroVideo.playsInline = true;
    heroVideo.loop = true;

    const safePlay = () => {
      // Some browsers may reject autoplay; catch to avoid uncaught promise
      const p = heroVideo.play();
      if (p && p.then) p.catch(() => {});
    };

    // Try to play on load and when visibility changes
    window.addEventListener('load', safePlay);
    document.addEventListener('visibilitychange', () => {
      if (!document.hidden) safePlay();
    });

    // Fallback: if 'ended' fires, restart
    heroVideo.addEventListener('ended', () => {
      try { heroVideo.currentTime = 0; heroVideo.play(); } catch (e) {}
    });
  } catch (e) {
    // ignore errors
  }
})();

/**
 * About Section Slideshow
 */
(function() {
  'use strict';

  const aboutSlideshow = document.querySelector('.about-slideshow');
  if (!aboutSlideshow) return;

  const slides = aboutSlideshow.querySelectorAll('.about-slide');
  const indicators = document.querySelectorAll('.slideshow-indicators .indicator');
  let currentSlide = 0;
  let slideInterval;

  // Set background images from data-bg attributes
  slides.forEach((slide) => {
    const bg = slide.getAttribute('data-bg');
    if (bg) {
      slide.style.backgroundImage = 'url("' + bg + '")';
    }
  });

  function showSlide(index) {
    // Remove active class from all slides and indicators
    slides.forEach((slide) => slide.classList.remove('active'));
    indicators.forEach((indicator) => indicator.classList.remove('active'));

    // Add active class to current slide and indicator
    if (slides[index]) {
      slides[index].classList.add('active');
    }
    if (indicators[index]) {
      indicators[index].classList.add('active');
    }

    currentSlide = index;
  }

  function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    showSlide(next);
  }

  function startSlideshow() {
    slideInterval = setInterval(nextSlide, 4000); // Change slide every 4 seconds
  }

  function stopSlideshow() {
    if (slideInterval) {
      clearInterval(slideInterval);
    }
  }

  // Initialize slideshow
  if (slides.length > 0) {
    showSlide(0);
    startSlideshow();

    // Pause on hover
    aboutSlideshow.addEventListener('mouseenter', stopSlideshow);
    aboutSlideshow.addEventListener('mouseleave', startSlideshow);

    // Indicator click handlers
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        stopSlideshow();
        showSlide(index);
        setTimeout(startSlideshow, 3000); // Resume after 3 seconds
      });
    });
  }
})();