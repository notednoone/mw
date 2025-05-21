<?
ob_start();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Airtable API Configuration
    $apiKey = 'patIEmgnC4tk0KxWz.1c36c09d52bf1daf37630d35496193ecd7a0f37399adbe46eaeba636ba6e65a0'; // Replace with your Airtable API key
    $baseId = 'appgLhvCwVCOvnkA6'; // Replace with your Airtable Base ID
    $tableName = 'LO%20Submissions'; // Replace with your Airtable Table Name
    $airtableUrl = "https://api.airtable.com/v0/$baseId/$tableName";

    // Form Data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Prepare data for Airtable
    $data = [
        'fields' => [
            'Name' => $name,
            'Email' => $email,
            'Subject' => $subject,
            'Message' => $message
        ]
    ];

    // Convert the data to JSON format
    $jsonData = json_encode($data);

    // Prepare cURL request to send data to Airtable
    $ch = curl_init($airtableUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $errorMessage = curl_error($ch);
    curl_close($ch);

    // Check the response and redirect or show a message
    if ($httpCode == 200) {
        header('Location: /index.php?sent=1#contactForm');
        exit();
    } else {
        header('Location: /index.php?error=1#contactForm');
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mike - Technology Veteran</title>
  <meta name="description"
    content="Mike is a technology industry veteran with over 32 years of experience, from Sun Microsystems to leading innovative tech ventures.">

  <!-- Open Graph tags for better social sharing -->
  <meta property="og:title" content="Mike - Technology Veteran">
  <meta property="og:description"
    content="Mike is a technology industry veteran with over 32 years of experience, from Sun Microsystems to leading innovative tech ventures.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://yourdomain.com">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="./assets/mw2.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
  <!-- Header -->
  <header id="header">
    <div class="container header-container">
      <a href="#" class="logo">Mike</a>

      <button class="nav-toggle" id="navToggle" aria-label="Toggle Navigation">
        <i class="fas fa-bars"></i>
      </button>

      <nav class="desktop-nav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#experience">Journey</a>
        <a href="#skills">Focus</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>

    <nav class="mobile-nav" id="mobileNav">
      <div class="container">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#experience">Journey</a>
        <a href="#skills">Focus</a>
        <a href="#contact">Contact</a>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="home" class="hero">
    <div class="container">
      <div class="hero-grid">
        <div class="hero-content">
          <p class="hero-greeting">Hello, I'm</p>
          <h1 class="hero-title">Mike</h1>
          <h2 class="hero-subtitle">Technology Veteran</h2>
          <p class="hero-bio">
            After failing high school, I turned my fascination for technology into a drive that has carried me for three
            decades along an exciting and unexpected journey through the tech industry.
          </p>
          <div>
            <a href="#contact" class="cta-button">Get In Touch</a>
          </div>
        </div>

        <div class="hero-image">
          <img src="./assets/mw3.png" alt="Mike - Portrait" class="hero-portrait">
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
<section id="about" class="bg-light">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">About Me</h2>
      <div class="section-divider"></div>
      <p class="section-description">I always found myself surrounded by the smartest people. What does that say about
        me?</p>
    </div>

    <div class="bio-content">
      <div style="float: right; margin: 0 0 1rem 2rem; max-width: 400px;">
        <img src="./assets/vectrex.jpg" alt="Vectrex Gaming System"
          style="width: 100%; border-radius: 0.5rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);">
        <figcaption
          style="text-align: center; font-size: 0.875rem; color: var(--text-secondary); margin-top: 0.5rem;">Playing
          my father's Vectrex gaming console</figcaption>
      </div>
      <p class="bio-paragraph">
        My fascination with technology began in the 80's with a Commodore 64 and later an IBM 386, alongside my
        father's Vectrex. While initially captivated by the games, my interest deepened after moving to California in
        1995 at 18 to work at Sun Microsystems. It was there, where my father was a mechanical engineer, that he told
        me they were hiring for Desktop Manufacturing.
      </p>
      <p class="bio-paragraph">
        At the time, there was a buzz at Sun about the upcoming "JAVA" product - the buildings had big purple signs
        eveywhere with the name. I eventually moved to Server Manufacturing with a growing desire to understand and
        work with that technology.
      </p>
      <p class="bio-paragraph">
        This early exposure at Sun ignited a career path that led me to roles at Xerox and eventually Siebel Systems
        in San Mateo. I joined Siebel during it's <a
          href="https://www.latimes.com/archives/la-xpm-2000-jul-31-fi-61937-story.html" class="green-link">Fastest
          Growing Company in the US</a> period, working in IT and then Engineering - an incredible experience.
      </p>
      <p class="bio-paragraph">
        My interest in web design, sparked during my time at Siebel, prompted a move to San Luis Obispo in 2001, where
        I immersed myself in the field.
      </p>
      <p class="bio-paragraph">
        Since then, I have remained in the web development industry, initially focusing on design and front-end work.
        This journey culminated in 2005 with the co-founding of our company, where I currently serve as CEO and Owner,
        a testament to my long-standing passion for technology that began with a Commodore 64 in my childhood.
      </p>
      <!-- Clear the float -->
      <div style="clear: both;"></div>
    </div>
  </div>

    <div class="values-interests">
      <div class="values-container">
        <h3 class="container-title">Core Values</h3>
        <div class="values-list">
          <div class="value-item">
            <span style="color: hsl(var(--forest));">&gt;</span>
            <span>Curiosity</span>
          </div>
          <div class="value-item">
            >
            <span>Self-Reliance</span>
          </div>
          <div class="value-item">
            >
            <span>Adaptability</span>
          </div>
        </div>
      </div>

      <div class="interests-container">
        <h3 class="container-title">Interests</h3>
        <div class="interests-grid">
          <div class="interest-item">
            >
            <span>Emerging AI Tech</span>
          </div>
          <div class="interest-item">
            >
            <span>Automation</span>
          </div>
          <div class="interest-item">
            >
            <span>Time with Friends/Family</span>
          </div>
          <div class="interest-item">
            >
            <span>Go Ducks!</span>
          </div>
          <div class="interest-item">
            >
            <span>Reading</span>
          </div>
          <div class="interest-item">
            >
            <span>Video Games</span>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Experience Section -->
  <section id="experience">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Journey</h2>
        <div class="section-divider"></div>
        <p class="section-description">
          Over three decades in the tech industry
        </p>
      </div>

      <div class="experience-container">
        <div class="experience-card">
          <div class="experience-grid">
            <div class="experience-logo">
              <img src="./assets/logo-liftoff.png" alt="LIFTOFF Digital logo">
            </div>
            <div class="experience-content">
              <div class="experience-header">
                <div>
                  <h3 class="experience-title">CEO & Founder</h3>
                  <h4 class="experience-company">LIFTOFF Digital</h4>
                </div>
                <span class="experience-period">2005 - Present</span>
              </div>

              <div class="experience-details">
                <p>After my partner of 14 years left, I've been running LIFTOFF since 2019 as the CEO and Owner
                  overseeing a diverse clientbase.</p>
                <p>LIFTOFF has serviced small to medium sized business since 2005.</p>
                <p>Most of that time we were based in San Luis Obispo, California until COVID began when we went fully
                  remote.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="experience-card">
          <div class="experience-grid">
            <div class="experience-logo">
              <img src="./assets/logo-techxpress.webp" alt="TechXpress logo">
            </div>
            <div class="experience-content">
              <div class="experience-header">
                <div>
                  <h3 class="experience-title">Design/Front-End</h3>
                  <h4 class="experience-company">TechXpress, Inc</h4>
                </div>
                <span class="experience-period">2004 - 2005</span>
              </div>

              <div class="experience-details">
                <p>TechXpress was the first company I worked for creating web designs, and eventually moving into
                  front-end development.</p>
                <p>It was during this time that my hobby of SEO (Search Engine Optimization) became part of my job as
                  well, where I created the SEO process we turned into a product.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="experience-card">
          <div class="experience-grid">
            <div class="experience-logo">
              <img src="./attached_assets/laptop-icon.png" alt="Freelance Consultant logo">
            </div>
            <div class="experience-content">
              <div class="experience-header">
                <div>
                  <h3 class="experience-title">Web Design + Front End Development</h3>
                  <h4 class="experience-company">Freelance</h4>
                </div>
                <span class="experience-period">2001 - 2004</span>
              </div>

              <div class="experience-details">
                <p>During this period, I was living in Photoshop, creating websites for friends and family - my uncles
                  real estate business being my very first paying job in web development.</p>
                <p>It was also during this period I began to explore SEO.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="experience-card">
          <div class="experience-grid">
            <div class="experience-logo">
              <img src="./assets/logo-siebel.png" alt="Siebel Systems logo">
            </div>
            <div class="experience-content">
              <div class="experience-header">
                <div>
                  <h3 class="experience-title">IT + QA Engineering</h3>
                  <h4 class="experience-company">Siebel Systems (Oracle)</h4>
                </div>
                <span class="experience-period">1999 - 2001</span>
              </div>

              <div class="experience-details">
                <p>At Siebel systems I initially worked IT at headquarters, assisting in the setup and deployment of
                  laptops for onsite staff.</p>
                <p>I would eventually move into QA Engineering where I helped managed servers in the various datacenters
                  onsite.</p>
                <p>I even met Tom Siebel in his office on one occassion!</p>
              </div>
            </div>
          </div>
        </div>

        <div class="experience-card">
          <div class="experience-grid">
            <div class="experience-logo">
              <img src="./assets/logo-sun.png" alt="Sun Microsystems logo">
            </div>
            <div class="experience-content">
              <div class="experience-header">
                <div>
                  <h3 class="experience-title">Server + Desktop Manufacturing</h3>
                  <h4 class="experience-company">Sun Microsystems (Oracle)</h4>
                </div>
                <span class="experience-period">1995 - 1999</span>
              </div>

              <div class="experience-details">
                <p>Fresh out of highschool, I began my career here building and testing SPARCstation desktop units.</p>
                <p>Later I switched to Server Manufacturing where I build entire server racks (Enterprise 5000's, among
                  others), installing rails, power, fiber cabling, and of course the various servers and storage units
                  that would be placed into rails within.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section id="skills" class="bg-light">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Focus</h2>
        <div class="section-divider"></div>
        <p class="section-description">
          Following my passion for technology wherever it leads me
        </p>
      </div>

      <div class="skills-grid">
        <div class="skill-card">
          <div class="skill-header">
            <div class="skill-icon">
              <i class="fas fa-robot"></i>
            </div>
            <h3 class="skill-title">Process Automation</h3>
          </div>
          <p class="skill-description">
            Implementing intelligent automation solutions that streamline operations, reduce costs, and improve service
            delivery.
          </p>
          <div class="skill-tags">
            <span class="skill-tag">RPA</span>
            <span class="skill-tag">Workflow Optimization</span>
            <span class="skill-tag">AI Integration</span>
          </div>
        </div>

        <div class="skill-card">
          <div class="skill-header">
            <div class="skill-icon">
              <i class="fas fa-users-cog"></i>
            </div>
            <h3 class="skill-title">Team Leadership</h3>
          </div>
          <p class="skill-description">
            Building and mentoring high-performing technical teams that consistently deliver exceptional results in
            dynamic environments.
          </p>
          <div class="skill-tags">
            <span class="skill-tag">Technical Mentorship</span>
            <span class="skill-tag">Talent Development</span>
          </div>
        </div>

        <div class="skill-card">
          <div class="skill-header">
            <div class="skill-icon">
              <i class="fas fa-lightbulb"></i>
            </div>
            <h3 class="skill-title">Innovation Management</h3>
          </div>
          <p class="skill-description">
            Fostering cultures of innovation that identify emerging technologies and turn them into business
            opportunities.
          </p>
          <div class="skill-tags">
            <span class="skill-tag">Ideation Processes</span>
            <span class="skill-tag">Technology Evaluation</span>
            <span class="skill-tag">R&D Strategy</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Get In Touch</h2>
        <div class="section-divider"></div>
        <p class="section-description">
          I'm always open to discussing technology and AI innovations
        </p>
      </div>

      <div class="contact-container">
        <div class="contact-info">
          <div>
            <h3 class="contact-heading">Let's talk about your project</h3>
            <p class="contact-description">
              Feel free to reach out if you're looking for guidance on technology strategy, automation implementations,
              or just want to connect about the future of tech.
            </p>
          </div>

          <div class="contact-details">

            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-text">
                <span class="contact-label">Location</span>
                <span class="contact-value">Eugene, Oregon</span>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fab fa-linkedin-in"></i>
              </div>
              <div class="contact-text">
                <span class="contact-label">LinkedIn</span>
                <a href="https://www.linkedin.com/in/mike-wiemholt/" target="_blank" rel="noopener noreferrer"><span
                    class="contact-value">/mike-wiemholt</span></a>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="contact-text">
                <span class="contact-label">Availability</span>
                <span class="contact-value">Consulting & Advisory Roles</span>
              </div>
            </div>
          </div>
        </div>

        <div class="contact-form-container">
          <form id="contactForm" class="contact-form">
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" id="subject" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" name="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="form-button">Send Message</button>


        <?
		      if (isset($_GET['sent']) && $_GET['sent'] == '1') {
		        ?>
              <div id="formSuccess" class="form-message success" style="display: none;">
                Your message has been sent successfully. I'll get back to you soon!
              </div>
		        <?
        } else if (isset($_GET['error']) && $_GET['error'] == '1') {
            ?>
              <div id="formError" class="form-message error" style="display: none;">
                There was an error sending your message. Please try again later.
              </div>
            <?
          }
        ?>

          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container footer-container">
      <a href="#" class="footer-logo">Mike</a>

      <nav class="footer-nav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#experience">Journey</a>
        <a href="#skills">Focus</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="social-links">
        <a href="https://www.linkedin.com/in/mike-wiemholt/" class="social-link" target="_blank"
          rel="noopener noreferrer">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>

      <p class="copyright">© 2025 Mike. All rights reserved.</p>
    </div>
  </footer>

  <script>
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

      // Contact Form Handling
      const contactForm = document.getElementById('contactForm');
      const formSuccess = document.getElementById('formSuccess');
      const formError = document.getElementById('formError');

      if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
          e.preventDefault();

          // Get form data
          const name = document.getElementById('name').value;
          const email = document.getElementById('email').value;
          const subject = document.getElementById('subject').value;
          const message = document.getElementById('message').value;

          // Airtable Configuration
          const airtableBaseId = 'appSyVYFGtpLH3GQd';
          const airtableTableId = 'tbltxLfKnGbgKqLS7';
          const airtablePAT = 'patV9O0jRPrLjXQtI';

          // Construct Airtable URL
          const airtableURL = `https://api.airtable.com/v0/${airtableBaseId}/${airtableTableId}`;

          // Construct Payload
          const payload = {
            records: [{
              fields: {
                Name: name,
                Email: email,
                Subject: subject,
                Message: message
              }
            }]
          };

          // Make the request
          fetch(airtableURL, {
            method: 'POST',
            headers: {
              'Authorization': `Bearer patV9O0jRPrLjXQtI`,
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
          })
            .then(response => response.json())
            .then(data => {
              console.log('Success:', data);
              // Hide any previous messages
              formSuccess.style.display = 'block';
              formError.style.display = 'none';

              // Reset the form
              contactForm.reset();

              // Hide success message after 5 seconds
              setTimeout(function () {
                formSuccess.style.display = 'none';
              }, 5000);
            })
            .catch((error) => {
              console.error('Error:', error);
              formError.style.display = 'block';
              formSuccess.style.display = 'none';
            });
        });
      }

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
  </script>
</body>

</html>
