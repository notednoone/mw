    // Form Submission Thanks
    const form = document.getElementById('contactForm');
    const thankYouMessage = document.getElementById('thankYouMessage');
  
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
  
      const formData = new FormData(form);
      const data = new URLSearchParams(formData);
  
      try {
        const response = await fetch('https://gainliftoff.app.n8n.cloud/webhook/e3cb5383-97cf-4aac-8fce-cbb25c631ad2', {
          method: 'POST',
          body: data,
        });
  
        if (response.ok) {
          // Instead of hiding the form, just show the message
          thankYouMessage.style.display = 'block';
          // Optionally, reset the form fields:
          form.reset();
        } else {
          alert('There was a problem submitting your form.');
        }
      } catch (error) {
        alert('An error occurred. Please try again later.');
      }
    });
    
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
