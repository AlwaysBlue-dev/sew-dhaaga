<?php
$pageTitle = "Home - Sew Dhaaga";
include 'header.php';
?>

<!-- Hero Section -->
<div class="hero">
  <div class="particles">
    <div class="particle" style="width: 10px; height: 10px; left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="width: 15px; height: 15px; left: 30%; animation-delay: 2s;"></div>
    <div class="particle" style="width: 8px; height: 8px; left: 50%; animation-delay: 4s;"></div>
    <div class="particle" style="width: 12px; height: 12px; left: 70%; animation-delay: 6s;"></div>
    <div class="particle" style="width: 10px; height: 10px; left: 90%; animation-delay: 8s;"></div>
  </div>
  <div class="container hero-content">
    <div class="d-flex flex-column justify-content-center align-items-center text-center min-vh-100" data-aos="fade-up" data-aos-delay="200">
      <h1 class="display-6 fw-bold text-gradient animate__animated animate__pulse animate__infinite">Fit Apka, Stitch Humara</h1>
      <p class="lead fs-3 text-light mt-3">Become your own designer</p>
      <a href="#cards" class="btn btn-hero btn-lg mt-4 animate__animated animate__bounceIn">Explore Now</a>
    </div>
  </div>
</div>

<!-- Cards Section -->
<section id="cards" class="card-section container py-5 mt-5">
  <div class="row g-4">
    <div class="col-md-6" data-aos="flip-left" data-aos-delay="100">
      <div class="card service-card h-100">
        <img src="images/style-library.png" class="card-img-top img-fluid" alt="Custom Outfit">
        <div class="card-body">
          <h5 class="card-title fw-bold">HAMARI STYLE LIBRARY SE APNA FIT BANAEIN</h5>
          <p class="card-text text-muted">Select your Style, buƩons, and more to make it yours.</p>
          <a href="services.php" class="btn btn-primary btn-service">Start Customizing</a>
        </div>
      </div>
    </div>
    <div class="col-md-6" data-aos="flip-right" data-aos-delay="200">
      <div class="card service-card h-100">
        <img src="images/door-step.png" class="card-img-top img-fluid" alt="Tailor at Doorstep">
        <div class="card-body">
          <h5 class="card-title fw-bold">Tailor at Your Door (Coming Soon)</h5>
          <p class="card-text text-muted">Get measured perfectly at your home, just how you like it</p>
          <button class="btn btn-secondary btn-service disabled">Coming Soon</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials py-5 text-center">
  <div class="container">
    <h2 class="section-title mb-5" data-aos="zoom-in">Reviews</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="testimonial-card mx-auto" data-aos="fade-up">
            <p class="fst-italic">"I customized my ouƞit using your Style Library — perfection!"</p>
            <h6 class="fw-bold">- Zara</h6>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial-card mx-auto" data-aos="fade-up">
            <p class="fst-italic">"Style Library se apna design banaya... jawab nahi! 10/10"</p>
            <h6 class="fw-bold">- Ali</h6>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial-card mx-auto" data-aos="fade-up">
            <p class="fst-italic">"Everyone asked where I got this outfit after I designed it here!"</p>
            <h6 class="fw-bold">- Ayesha</h6>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial-card mx-auto" data-aos="fade-up">
            <p class="fst-italic">"Picked my buttons & neckline — it’s exactly how I imagined"</p>
            <h6 class="fw-bold">- Fatima</h6>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>