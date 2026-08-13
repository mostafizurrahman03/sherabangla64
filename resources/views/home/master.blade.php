<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Recent Graduate</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">

  <style>
    :root {
      /* Premium Neon Colors */
      --guardian-primary: #0a0a0a;
      --guardian-secondary: #111111;
      --guardian-accent: #00ffe1;
      --neon-blue: #00c3ff;
      --neon-purple: #b266ff;
      --neon-green: #00ff9c;
      --neon-orange: #ffae00;
      --neon-red: #ff0066;
      --neon-cyan: #00ffff;

      /* Text Colors */
      --text: #f2f2f2;
      --text-light: #a0a0a0;

      /* Utility */
      --white: #ffffff;
      --transition: all 0.3s ease;
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
      --glow-shadow: 0 0 10px var(--guardian-accent),
        0 0 20px var(--guardian-accent);
      --radius: 10px;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Orbitron', sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: var(--guardian-primary);
      color: var(--text);
      line-height: 1.6;
      overflow-x: hidden;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    section {
      padding: 100px 0;
    }

    h1,
    h2,
    h3,
    h4 {
      color: var(--white);
      margin-bottom: 20px;
      font-weight: 700;
    }

    p {
      margin-bottom: 15px;
    }

    a {
      text-decoration: none;
      color: var(--guardian-accent);
      transition: var(--transition);
    }

    a:hover {
      color: var(--neon-blue);
    }

    /* Premium Neon Buttons */
    .btn {
      display: inline-block;
      padding: 12px 30px;
      background: transparent;
      color: var(--guardian-accent);
      border-radius: 30px;
      font-weight: 600;
      transition: var(--transition);
      border: 2px solid var(--guardian-accent);
      cursor: pointer;
      position: relative;
      overflow: hidden;
      z-index: 1;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 0 10px rgba(0, 255, 225, 0.3);
    }

    .btn:before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(0, 255, 225, 0.2), transparent);
      transition: all 0.6s;
      z-index: -1;
    }

    .btn:hover {
      color: #000;
      box-shadow: 0 0 15px var(--guardian-accent),
        0 0 30px var(--guardian-accent);
    }

    .btn:hover:before {
      left: 100%;
    }

    .btn:hover:after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--guardian-accent);
      z-index: -1;
      border-radius: 30px;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid var(--guardian-accent);
      color: var(--guardian-accent);
    }

    .btn-outline:hover {
      background: var(--guardian-accent);
      color: var(--guardian-primary);
    }

    .section-title {
      text-align: center;
      margin-bottom: 60px;
      position: relative;
    }

    .section-title:after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--guardian-accent);
      border-radius: 2px;
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    /* Guardian Premium Header Styles */
    .guardian-header {
      background: rgba(10, 10, 10, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(0, 255, 225, 0.2);
      box-shadow: 0 0 20px rgba(0, 255, 225, 0.1);
      position: sticky;
      top: 0;
      z-index: 999;
      transition: var(--transition);
    }

    .guardian-header.scrolled {
      background: rgba(10, 10, 10, 0.98);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
    }

    .guardian-nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.2rem 0;
      position: relative;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--text);
      letter-spacing: 2px;
      text-transform: uppercase;
      transition: 0.3s;
    }

    .logo span {
      color: var(--guardian-accent);
      text-shadow: 0 0 10px var(--guardian-accent);
    }

    .nav-links {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .nav-links li a {
      text-decoration: none;
      color: var(--text);
      font-weight: 600;
      padding: 8px 14px;
      border-radius: 8px;
      transition: 0.3s ease-in-out;
      position: relative;
    }

    .nav-links li a:hover,
    .nav-links li a.active {
      background-color: var(--guardian-accent);
      color: #000;
      box-shadow: 0 0 10px var(--guardian-accent), 0 0 20px var(--guardian-accent);
    }

    /* Hamburger Menu (Mobile) */
    .hamburger {
      display: none;
      font-size: 1.5rem;
      color: var(--guardian-accent);
      cursor: pointer;
    }

    /* Page Content */
    .page {
      display: none;
      min-height: 100vh;
    }

    .page.active {
      display: block;
    }

    /* Improved Hero Section with Photo */
    .hero {
      height: 100vh;
      display: flex;
      align-items: center;
      background: linear-gradient(135deg, var(--guardian-primary) 0%, var(--guardian-secondary) 100%);
      position: relative;
      overflow: hidden;
      padding-top: 80px;
    }

    .hero-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
      align-items: center;
      width: 100%;
    }

    .hero-text {
      max-width: 600px;
      z-index: 1;
    }

    .hero h1 {
      font-size: 3.5rem;
      margin-bottom: 15px;
      line-height: 1.2;
    }

    .hero h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      color: var(--guardian-accent);
      font-weight: 600;
      text-shadow: 0 0 10px rgba(0, 255, 225, 0.5);
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: var(--text-light);
    }

    .hero-btns {
      display: flex;
      gap: 15px;
    }

    .hero-image {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .profile-container {
      position: relative;
      width: 350px;
      height: 400px;
      /* border-radius: 50%; */
      background: linear-gradient(135deg,
          var(--guardian-accent) 0%,
          var(--neon-blue) 100%);
      padding: 8px;
      box-shadow: var(--shadow), 0 0 20px rgba(0, 255, 225, 0.3);
      animation: float 6s ease-in-out infinite;
    }

    .profile-image {
      width: 100%;
      height: 100%;
      /* border-radius: 50%; */
      object-fit: cover;
      border: 4px solid var(--guardian-secondary);
    }

    .hero-shape {
      position: absolute;
      bottom: -10%;
      right: -5%;
      width: 50%;
      height: 120%;
      background: var(--guardian-accent);
      clip-path: polygon(100% 0, 100% 100%, 0 100%);
      opacity: 0.05;
    }

    .floating-elements {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .floating-element {
      position: absolute;
      background: var(--guardian-accent);
      opacity: 0.1;
      border-radius: 50%;
    }

    .floating-element:nth-child(1) {
      width: 80px;
      height: 80px;
      top: 20%;
      left: 10%;
      animation: float 8s ease-in-out infinite;
    }

    .floating-element:nth-child(2) {
      width: 40px;
      height: 40px;
      top: 60%;
      left: 5%;
      animation: float 6s ease-in-out infinite 1s;
    }

    .floating-element:nth-child(3) {
      width: 60px;
      height: 60px;
      top: 30%;
      right: 10%;
      animation: float 7s ease-in-out infinite 0.5s;
    }

    @keyframes float {
      0% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(10deg);
      }

      100% {
        transform: translateY(0) rotate(0deg);
      }
    }

    /* About Section */
    .about-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
      align-items: center;
    }

    .about-img {
      position: relative;
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .about-img img {
      width: 100%;
      display: block;
      transition: var(--transition);
    }

    .about-img:hover img {
      transform: scale(1.05);
    }

    .about-text h3 {
      margin-bottom: 15px;
    }

    .about-text p {
      margin-bottom: 20px;
    }

    /* Skills Section */
    .skills-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }

    .skill-card {
      background: var(--guardian-secondary);
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .skill-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .skill-card i {
      font-size: 40px;
      color: var(--guardian-accent);
      margin-bottom: 20px;
      text-shadow: 0 0 10px rgba(0, 255, 225, 0.5);
    }

    .skill-card h3 {
      margin-bottom: 15px;
    }

    /* Projects Section */
    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 30px;
    }

    .project-card {
      background: var(--guardian-secondary);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .project-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .project-img {
      height: 200px;
      overflow: hidden;
    }

    .project-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .project-card:hover .project-img img {
      transform: scale(1.1);
    }

    .project-content {
      padding: 20px;
    }

    .project-content h3 {
      margin-bottom: 10px;
    }

    .project-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 15px 0;
    }

    .project-tag {
      background: var(--guardian-accent);
      color: #000;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    /* Experience Section */
    .timeline {
      position: relative;
      max-width: 800px;
      margin: 0 auto;
    }

    .timeline:before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 2px;
      height: 100%;
      background: var(--guardian-accent);
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    .timeline-item {
      position: relative;
      margin-bottom: 50px;
      width: 50%;
      padding-right: 40px;
    }

    .timeline-item:nth-child(even) {
      margin-left: 50%;
      padding-right: 0;
      padding-left: 40px;
    }

    .timeline-content {
      background: var(--guardian-secondary);
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      position: relative;
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .timeline-content:after {
      content: '';
      position: absolute;
      top: 20px;
      right: -10px;
      width: 0;
      height: 0;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-left: 10px solid var(--guardian-secondary);
    }

    .timeline-item:nth-child(even) .timeline-content:after {
      right: auto;
      left: -10px;
      border-left: none;
      border-right: 10px solid var(--guardian-secondary);
    }

    .timeline-date {
      display: inline-block;
      background: var(--guardian-accent);
      color: #000;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.9rem;
      margin-bottom: 10px;
      font-weight: 600;
    }

    /* Achievements Section */
    .achievements-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }

    .achievement-card {
      background: var(--guardian-secondary);
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      text-align: center;
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .achievement-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .achievement-icon {
      width: 70px;
      height: 70px;
      background: var(--guardian-accent);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      font-size: 30px;
      color: #000;
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    /* Certifications Section */
    .certifications-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }

    .certification-card {
      background: var(--guardian-secondary);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .certification-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .certification-img {
      height: 200px;
      overflow: hidden;
    }

    .certification-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .certification-content {
      padding: 20px;
    }

    /* Blog Section */
    .blog-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 30px;
    }

    .blog-card {
      background: var(--guardian-secondary);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .blog-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .blog-img {
      height: 200px;
      overflow: hidden;
    }

    .blog-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .blog-card:hover .blog-img img {
      transform: scale(1.1);
    }

    .blog-content {
      padding: 20px;
    }

    .blog-meta {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 0.9rem;
      color: var(--text-light);
    }

    /* Services Section */
    .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }

    .service-card {
      background: var(--guardian-secondary);
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      text-align: center;
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7), 0 0 15px rgba(0, 255, 225, 0.2);
    }

    .service-icon {
      width: 70px;
      height: 70px;
      background: var(--guardian-accent);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      font-size: 30px;
      color: #000;
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    /* Gallery Section */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 15px;
    }

    .gallery-item {
      position: relative;
      border-radius: var(--radius);
      overflow: hidden;
      height: 250px;
      cursor: pointer;
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 255, 225, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: var(--transition);
    }

    .gallery-item:hover .gallery-overlay {
      opacity: 1;
    }

    /* Contact Section */
    .contact-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .contact-item i {
      width: 50px;
      height: 50px;
      background: var(--guardian-accent);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: #000;
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    .contact-form {
      background: var(--guardian-secondary);
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      border: 1px solid rgba(0, 255, 225, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      background: var(--guardian-primary);
      border: 1px solid rgba(0, 255, 225, 0.2);
      border-radius: var(--radius);
      color: var(--text);
      transition: var(--transition);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--guardian-accent);
      box-shadow: 0 0 10px rgba(0, 255, 225, 0.3);
    }

    textarea.form-control {
      min-height: 150px;
      resize: vertical;
    }

    /* Footer */
    footer {
      background: var(--guardian-secondary);
      padding: 70px 0 20px;
      border-top: 1px solid rgba(0, 255, 225, 0.1);
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 40px;
      margin-bottom: 50px;
    }

    .footer-column h3 {
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
    }

    .footer-column h3:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 3px;
      background: var(--guardian-accent);
      box-shadow: 0 0 10px var(--guardian-accent);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: var(--text-light);
      transition: var(--transition);
    }

    .footer-links a:hover {
      color: var(--guardian-accent);
      padding-left: 5px;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      width: 40px;
      height: 40px;
      background: var(--guardian-primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      border: 1px solid rgba(0, 255, 225, 0.2);
    }

    .social-links a:hover {
      background: var(--guardian-accent);
      transform: translateY(-5px);
      box-shadow: 0 0 10px var(--guardian-accent);
      color: #000;
    }

    .copyright {
      text-align: center;
      padding-top: 20px;
      border-top: 1px solid rgba(0, 255, 225, 0.1);
      color: var(--text-light);
      font-size: 0.9rem;
    }

    /* Animations */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Modal for Gallery */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      z-index: 1100;
      align-items: center;
      justify-content: center;
    }

    .modal.active {
      display: flex;
    }

    .modal-content {
      max-width: 90%;
      max-height: 90%;
      position: relative;
    }

    .modal-content img {
      width: 100%;
      height: auto;
      border-radius: var(--radius);
      box-shadow: 0 0 30px rgba(0, 255, 225, 0.3);
    }

    .close-modal {
      position: absolute;
      top: -40px;
      right: 0;
      color: var(--white);
      font-size: 30px;
      cursor: pointer;
      transition: var(--transition);
    }

    .close-modal:hover {
      color: var(--guardian-accent);
      text-shadow: 0 0 10px var(--guardian-accent);
    }

    /* Responsive Design */
    @media (max-width: 992px) {

      .about-content,
      .contact-container {
        grid-template-columns: 1fr;
      }

      .hero-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 40px;
      }

      .hero h1 {
        font-size: 3rem;
      }

      .profile-container {
        width: 280px;
        height: 280px;
      }
    }

    @media (max-width: 768px) {
      .nav-links {
        position: fixed;
        top: 70px;
        right: -100%;
        width: 80%;
        height: calc(100vh - 70px);
        background: var(--guardian-secondary);
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 50px;
        transition: var(--transition);
        border-left: 1px solid rgba(0, 255, 225, 0.1);
      }

      .nav-links.active {
        right: 0;
      }

      .nav-links li {
        margin: 15px 0;
      }

      .hamburger {
        display: block;
      }

      .timeline:before {
        left: 30px;
      }

      .timeline-item {
        width: 100%;
        padding-right: 0;
        padding-left: 70px;
      }

      .timeline-item:nth-child(even) {
        margin-left: 0;
        padding-left: 70px;
      }

      .timeline-content:after {
        right: auto;
        left: -10px;
        border-left: none;
        border-right: 10px solid var(--guardian-secondary);
      }

      .hero h1 {
        font-size: 2.5rem;
      }

      .hero h2 {
        font-size: 1.5rem;
      }

      .profile-container {
        width: 240px;
        height: 240px;
      }
    }

    @media (max-width: 576px) {
      .hero-btns {
        flex-direction: column;
        width: 100%;
      }

      .btn {
        width: 100%;
        text-align: center;
      }

      .hero h1 {
        font-size: 2.2rem;
      }

      .profile-container {
        width: 200px;
        height: 200px;
      }

      .projects-grid,
      .blog-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
  @stack('css')
</head>

<body>

  <!-- Header & Navigation -->
  <header id="header" class="guardian-header">
    <div class="container">
      <nav class="guardian-nav">
        <div class="logo">Asif<span>Hossain</span></div>

        <ul class="nav-links">
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="#" data-page="about">About</a></li>
          <li><a href="#" data-page="skills">Skills</a></li>
          <li><a href="#" data-page="blog">Blog</a></li>
          <li><a href="#" data-page="services">Services</a></li>
          {{-- <li><a href="{{ route('gallery') }}">Gallery</a></li> --}}
          <li><a href="#" data-page="contact">Contact</a></li>
        </ul>

        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </nav>
    </div>
  </header>

  @yield('content')

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-column">
          <h3>Portfolio</h3>
          <p>A showcase of my skills, projects, and experience as a recent graduate in computer science.</p>
          <div class="social-links">
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="footer-column">
          <h3>Quick Links</h3>
          <ul class="footer-links">
            <li><a href="#" data-page="home">Home</a></li>
            <li><a href="#" data-page="about">About</a></li>
            <li><a href="#" data-page="skills">Skills</a></li>
            <li><a href="#" data-page="projects">Projects</a></li>
            <li><a href="#" data-page="experience">Experience</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Services</h3>
          <ul class="footer-links">
            <li><a href="#" data-page="services">Web Development</a></li>
            <li><a href="#" data-page="services">UI/UX Design</a></li>
            <li><a href="#" data-page="services">Frontend Development</a></li>
            <li><a href="#" data-page="services">Responsive Design</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Contact Info</h3>
          <ul class="footer-links">
            <li><i class="fas fa-map-marker-alt"></i> New York, NY</li>
            <li><i class="fas fa-envelope"></i> john.doe@example.com</li>
            <li><i class="fas fa-phone"></i> +1 (123) 456-7890</li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        <p>&copy; 2023 John Doe. All Rights Reserved.</p>
      </div>
    </div>
  </footer>


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
</body>

</html>