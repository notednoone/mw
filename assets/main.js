    // Dynamic copyright year
    document.getElementById('copyright-year').textContent = new Date().getFullYear();

    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function () {
      const navToggle = document.getElementById('navToggle');
      const mobileNav = document.getElementById('mobileNav');
      const header = document.getElementById('header');

      navToggle.addEventListener('click', function () {
        mobileNav.classList.toggle('show');
      });

      // Close mobile menu when clicking on a link
      const mobileLinks = mobileNav.querySelectorAll('a');
      mobileLinks.forEach(link => {
        link.addEventListener('click', function () {
          mobileNav.classList.remove('show');
        });
      });

      // Add shadow to header on scroll
      window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });

      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();

          const targetId = this.getAttribute('href').substring(1);
          if (!targetId) return; // Skip if href is just "#"

          const targetElement = document.getElementById(targetId);
          if (targetElement) {
            window.scrollTo({
              top: targetElement.offsetTop - 80, // Offset for header height
              behavior: 'smooth'
            });
          }
        });
      });
    });
