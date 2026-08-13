@extends('home.master')

@section('content')
<!-- Gallery Page -->
<div id="gallery">
  <section class="gallery">
    <div class="container">
      <h2 class="section-title">Gallery</h2>
      <div class="gallery-grid">
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80"
            alt="Project 1">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            alt="Project 2">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            alt="Project 3">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            alt="Project 4">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            alt="Project 5">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
        <div class="gallery-item fade-in">
          <img
            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
            alt="Project 6">
          <div class="gallery-overlay">
            <i class="fas fa-search-plus"></i>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Gallery Modal -->
<div class="modal" id="galleryModal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <img src="" alt="Gallery Image">
  </div>
</div>

<!-- Contact Page -->
<div id="contact">
  <section class="contact">
    <div class="container">
      <h2 class="section-title">Get In Touch</h2>
      <div class="contact-container">
        <div class="contact-info">
          <h3>Let's Connect</h3>
          <p>I'm currently looking for new opportunities. Whether you have a question or just want to say hi, I'll try
            my best to get back to you!</p>
          <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <h4>Location</h4>
              <p>New York, NY</p>
            </div>
          </div>
          <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <div>
              <h4>Email</h4>
              <p>john.doe@example.com</p>
            </div>
          </div>
          <div class="contact-item">
            <i class="fas fa-phone"></i>
            <div>
              <h4>Phone</h4>
              <p>+1 (123) 456-7890</p>
            </div>
          </div>
        </div>
        <div class="contact-form">
          <form id="contactForm">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" id="subject" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="message">Your Message</label>
              <textarea id="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  // Multi-page navigation
    document.addEventListener('DOMContentLoaded', function () {
      // Set home page as active initially
      showPage('home');

      // Add event listeners to all navigation links
      document.querySelectorAll('a[data-page]').forEach(link => {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          const pageId = this.getAttribute('data-page');
          showPage(pageId);

          // Close mobile menu if open
          if (navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            hamburger.innerHTML = '<i class="fas fa-bars"></i>';
          }
        });
      });

      // Function to show a specific page
      function showPage(pageId) {
        // Hide all pages
        document.querySelectorAll('.page').forEach(page => {
          page.classList.remove('active');
        });

        // Show the selected page
        document.getElementById(pageId).classList.add('active');

        // Scroll to top
        window.scrollTo(0, 0);

        // Update active nav link
        document.querySelectorAll('.nav-links a').forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('data-page') === pageId) {
            link.classList.add('active');
          }
        });
      }
    });

    // Navigation Scroll Effect
    window.addEventListener('scroll', function () {
      const header = document.getElementById('header');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active');
      hamburger.innerHTML = navLinks.classList.contains('active')
        ? '<i class="fas fa-times"></i>'
        : '<i class="fas fa-bars"></i>';
    });

    // Scroll Animation
    const fadeElements = document.querySelectorAll('.fade-in');

    const fadeInOnScroll = () => {
      fadeElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < window.innerHeight - elementVisible) {
          element.classList.add('visible');
        }
      });
    };

    window.addEventListener('scroll', fadeInOnScroll);
    // Initial check in case elements are already in view
    fadeInOnScroll();

    // Form Submission
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();

      // Get form values
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;

      // In a real application, you would send this data to a server
      // For this example, we'll just show an alert
      alert(`Thank you for your message, ${name}! I'll get back to you soon.`);

      // Reset form
      contactForm.reset();
    });

    // Gallery Modal
    const galleryModal = document.getElementById('galleryModal');
    const modalImg = galleryModal.querySelector('img');
    const closeModal = document.querySelector('.close-modal');

    document.querySelectorAll('.gallery-item').forEach(item => {
      item.addEventListener('click', function () {
        const imgSrc = this.querySelector('img').getAttribute('src');
        modalImg.setAttribute('src', imgSrc);
        galleryModal.classList.add('active');
      });
    });

    closeModal.addEventListener('click', function () {
      galleryModal.classList.remove('active');
    });

    galleryModal.addEventListener('click', function (e) {
      if (e.target === galleryModal) {
        galleryModal.classList.remove('active');
      }
    });
</script>
@endsection