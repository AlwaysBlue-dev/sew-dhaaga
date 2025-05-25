<?php 
$pageTitle = "Services - Sew Dhaaga";
include 'header.php'; 
?>
<style>
    body{
    background: linear-gradient(to right, #9c2d6a 0%, #9c2d6a 100%);
}
</style>
<section class="contact-section">
    <!-- Animated Background Elements -->
    <div class="circle-shape-1"></div>
    <div class="circle-shape-2"></div>
    <div class="circle-shape-3"></div>
    
    <div class="container py-5 position-relative mt-5">
        <div class="text-center">
            <h1 class="text-white mb-5 animate__animated animate__fadeInDown d-inline-block" data-aos="fade-up">
              Let's Connect <span class="highlight-text">!</span>
            </h1>
          </div>
          
        
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <p class="lead text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                    Have a project in mind or want to discuss potential collaboration? 
                    We'd love to hear from you.
                </p>
            </div>
        </div>

        <!-- Info Cards with Hover Effects -->
        <div class="row mb-5 g-4">
            
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="info-card p-4 text-center h-100">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="fw-bold">Call Us</h5>
                    <p class="mb-0">0336-2271465<br>Mon-Fri, 9am-6pm</p>
                    <!-- <div class="mt-3">
                        <a href="#" class="btn-link">Schedule a Call <i class="bi bi-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="info-card p-4 text-center h-100">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="fw-bold">Email Us</h5>
                    <p class="mb-0">sewdhaaga@gmail.com</p>
                    <!-- <div class="mt-3">
                        <a href="#" class="btn-link">Email Now <i class="bi bi-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
             <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="info-card p-4 text-center h-100">
                    <div class="icon-wrapper mb-3">
                      <i class="bi bi-chat-dots-fill"></i>

                    </div>
                    <h5 class="fw-bold">Social Media</h5>
                    <div class="container text-center py-4">
                    <div class="social-links">
                      <a href="https://www.facebook.com/share/19FZPs2zpf/?mibextid=wwXIfr" class="social-icon" data-aos="zoom-in" data-aos-delay="200" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/sew.dhaaga?igsh=NXJpcHk3bDJ0d2U%3D&utm_source=qr" class="social-icon" data-aos="zoom-in" data-aos-delay="300" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/sew-dhaaga/about/?viewAsMember=true " class="social-icon" data-aos="zoom-in" data-aos-delay="200" target="_blank"><i class="bi bi-linkedin"></i></a>
                       
                    </div>
                </div>
                    <!-- <div class="mt-3">
                        <a href="#" class="btn-link">Schedule a Call <i class="bi bi-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Contact Form with Floating Labels -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-4 p-md-5" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-center text-white mb-4">Send Us a Message</h3>
                    
                    <form method="post" action="https://api.web3forms.com/submit" class="needs-validation"  >
                         <input type="hidden" name="access_key" value="52ba5189-b0a9-412f-afe0-66c64cdd0a43">
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                            <label for="name"><i class="bi bi-person-fill me-2"></i>Your Name</label>
                            <div class="invalid-feedback">
                                Please provide your name.
                            </div>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                            <label for="email"><i class="bi bi-envelope-fill me-2"></i>Your Email</label>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                            <label for="subject"><i class="bi bi-card-heading me-2"></i>Subject</label>
                            <div class="invalid-feedback">
                                Please provide a subject.
                            </div>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <textarea class="form-control" placeholder="Your Message" id="message" name="message" style="height: 150px" required></textarea>
                            <label for="message"><i class="bi bi-chat-left-text-fill me-2"></i>Your Message</label>
                            <div class="invalid-feedback">
                                Please enter your message.
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-gradient w-100 py-3 fs-5 mt-2">
                            <span class="submit-text">Send Message</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
   
</section>
<?php include 'footer.php'; ?>

  