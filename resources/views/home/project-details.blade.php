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

  body {
    background: var(--guardian-primary);
    color: var(--text);
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .project-details {
    background: var(--guardian-secondary);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    max-width: 900px;
    width: 90%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: var(--transition);
    border: 1px solid var(--guardian-accent);
  }

  .project-image img {
    width: 100%;
    display: block;
    object-fit: cover;
  }

  .project-content {
    padding: 2rem;
  }

  .project-title {
    font-size: 2rem;
    color: var(--guardian-accent);
    text-shadow: 0 0 10px var(--guardian-accent);
    margin-bottom: 1rem;
  }

  .project-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }

  .tech-stack {
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    margin-bottom: 1.5rem;
  }

  .tech-stack span {
    padding: 0.4rem 1rem;
    border: 1px solid var(--guardian-accent);
    border-radius: var(--radius);
    color: var(--guardian-accent);
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 1px;
    transition: var(--transition);
  }

  .tech-stack span:hover {
    background: var(--guardian-accent);
    color: var(--guardian-primary);
    box-shadow: var(--glow-shadow);
  }

  .project-links {
    display: flex;
    gap: 1rem;
  }

  .project-links a {
    flex: 1;
    text-align: center;
    padding: 0.8rem 1rem;
    border-radius: var(--radius);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    border: 1px solid var(--guardian-accent);
    color: var(--guardian-accent);
  }

  .project-links a:hover {
    background: var(--guardian-accent);
    color: var(--guardian-primary);
    box-shadow: var(--glow-shadow);
  }

  /* Responsive */
  @media (min-width: 768px) {
    .project-details {
      flex-direction: row;
    }

    .project-image {
      flex: 1;
    }

    .project-content {
      flex: 1;
      padding: 2.5rem;
    }
  }
</style>
<div class="project-details">
  <div class="project-image">
    <img src="https://via.placeholder.com/600x400" alt="Project Preview">
  </div>

  <div class="project-content">
    <h1 class="project-title">Awesome Neon Project</h1>
    <p class="project-description">
      This is a futuristic web design built with HTML, CSS, and JavaScript.
      It features smooth animations, responsive layout, and a glowing neon aesthetic.
    </p>

    <div class="tech-stack">
      <span>HTML</span>
      <span>CSS</span>
      <span>JavaScript</span>
    </div>

    <div class="project-links">
      <a href="#" target="_blank" class="live-link">Live Demo</a>
      <a href="#" target="_blank" class="github-link">GitHub</a>
    </div>
  </div>
</div>