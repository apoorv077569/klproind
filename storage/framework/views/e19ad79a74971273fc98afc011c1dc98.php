<?php echo $__env->make('import.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Start Main Banner -->

<div class="uk-marketing-banner marketing-main-banner-area">
  <div class="uk-container">
    <div class="marketing-banner-content">

      <span>Fast Response - Quality Service</span>
    <h1>KLPro <b>Services</b> Make Your Life Easier.</h1>
    <p>
        KLPro delivers reliable and professional services right at your doorstep. 
        Our expert team ensures quick response, high-quality work, and a hassle-free 
        experience tailored to meet your everyday needs.
    </p>

      <ul class="banner-btn-list">
        <li>
          <a href="<?php echo e(route('frontend.contact.index')); ?>" class=" uk-button uk-button-default">Get Started</a>
        </li>
        <li>
          <a href="<?php echo e(route('frontend.about.index')); ?>" class="uk-button uk-button-default">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Main Banner -->


<div class="separate">
  <div class="br-line"></div>
</div>

<!-- Start About Area -->
<section id="about" class="uk-about about-area uk-section">
  <div class="uk-container">
    <div class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1@s">

    <div class="item">
        <div class="about-content">
            <div class="uk-section-title section-title">
            <span>About Us</span>
            <h2>Leading the Way in Reliable Service Solutions</h2>
            <div class="bar"></div>
            </div>

            <div class="about-text">
            <div class="icon">
                <i class="fa-solid fa-award"></i>
            </div>
            <h3>Trusted Service Provider for Your Everyday Needs</h3>
            <p>
                KLPro offers professional and dependable services designed to make your life easier. 
                From doorstep solutions to expert assistance, we focus on delivering high-quality work 
                with quick response times and complete customer satisfaction.
            </p>
            <p>
                Our experienced team is committed to providing reliable, efficient, and affordable services. 
                We work closely with our customers to ensure every job is completed with precision, care, 
                and attention to detail.
            </p>

            <div class="signature">
                <img src="assets/img/signature.png" alt="signature" />
            </div>
            </div>
        </div>
    </div>

      <div class="item">
        <div class="about-img">
          <img
            src="assets/img/Upper 1st image.png"
            class="about-img1"
            alt="about-img" />
          <!--<img
            src="assets/img/about2.jpg"
            class="about-img2"
            alt="about-img" />
          <img src="assets/img/1.png" class="shape-img" alt="shape" />-->

          <a
            href="<?php echo e(route('frontend.about.index')); ?>"
            class="uk-button uk-button-default lax"
            data-lax-preset="driftLeft">More About Us <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About Area -->

<div class="separate">
  <div class="br-line"></div>
</div>


<div id="services" class="uk-creative-services creative-services-area pt-100 pb-70">
  <div class="uk-container">
    <div class="section-title-with-big-text">
      <div class="big-text">Our Expertise</div>
      <span>OUR SERVICES</span>
      <h2>Premium Services Designed For Beauty, Home Care & Special Occasions</h2>
    </div>

    <div class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-3@m uk-child-width-1-2@s">
      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number">01</div>
          <h3>
            <a href="single-services.html">Men's Grooming Salon</a>
          </h3>
          <p>Professional haircuts, beard styling, and grooming services tailored for modern men.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number two">02</div>
          <h3>
            <a href="single-services.html">Women's Beauty Salon</a>
          </h3>
          <p>Complete beauty care including hair styling, skincare, makeup, and spa treatments.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number three">03</div>
          <h3>
            <a href="single-services.html">Plumbing Services</a>
          </h3>
          <p>Reliable plumbing solutions for homes and businesses, including repairs and installations.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number four">04</div>
          <h3>
            <a href="single-services.html">Wedding Planning</a>
          </h3>
          <p>End-to-end wedding planning services to make your special day perfect and memorable.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number five">05</div>
          <h3>
            <a href="single-services.html">Bridal Makeup & Styling</a>
          </h3>
          <p>Expert bridal makeup and styling services to give you a stunning wedding look.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-services-card">
          <div class="number six">06</div>
          <h3>
            <a href="single-services.html">Home Maintenance Services</a>
          </h3>
          <p>Complete home care solutions including plumbing, repairs, and maintenance services.</p>
          <a href="single-services.html" class="services-btn">Read More <i class="flaticon-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Services Area -->

<div class="separate">
  <div class="br-line"></div>
</div>


<div class="separate">
  <div class="br-line"></div>
</div>

<!-- Start Feedback Area -->
<?php echo $__env->make('import.feedback', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- End Feedback Area -->

<!-- Start Partner Area -->
<?php echo $__env->make('import.clients', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- End Partner Area -->

<!-- Servies Near You -->
<section class="services-section">
  <div class="container">

    <div class="section-header">
      <div class="section-eyebrow"><i class="fa-solid fa-bolt"></i> Trusted Professionals</div>
      <h2 class="section-title" style="margin-bottom: 10px !important;">Popular <label style="color: #ff4800;"> Home Services </label><br>Near You</h2>
      <p class="section-desc">Browse top-rated professionals for every corner of your home. Vetted, reviewed, and ready to help — book in minutes.</p>
    </div>

    <div class="services-grid">

      <!-- Card 1 -->
    <div class="card">
        <div class="card-img-wrap">
            <img class="card-img" src="assets/img/Hair Service.png" alt="Beauty & Home Services" />
            <span class="badge">Beauty Service</span>
            <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
            <img class="card-avatar" src="assets/img/fav2.png" alt="Service Expert" />
        </div>
        <div class="card-body">
            <p class="provider-name">KLPro Care Services</p>
          
            <h3 class="card-title">Professional Salon, Plumbing & Wedding Services At Your Doorstep</h3>
            <p class="card-desc">Expert solutions for beauty, home maintenance, and special occasions with trusted professionals.</p>
            <div class="card-divider"></div>
            <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
    <div class="card-img-wrap">
        <img class="card-img" src="assets/img/Wedding Make Up Service.png" alt="Bridal Makeup" />
        <span class="badge">Bridal Service</span>
        <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
    </div>
    <div class="card-avatar-wrap">
        <img class="card-avatar" src="assets/img/fav2.png" alt="Beauty Expert" />
    </div>
    <div class="card-body">
        <p class="provider-name">Glam Studio</p>
        <h3 class="card-title">Professional Bridal Makeup & Wedding Styling Services</h3>
        <p class="card-desc">Get a flawless bridal look with expert makeup artists for weddings and special events.</p>
        <div class="card-divider"></div>
        <div class="card-footer">
        <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    </div>

    <!-- Card 3 -->
    <div class="card">
    <div class="card-img-wrap">
        <img class="card-img" src="assets/img/Plumbing Service2.png" alt="Plumbing" />
        <span class="badge">Plumbing</span>
        <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
    </div>
    <div class="card-avatar-wrap">
        <img class="card-avatar" src="assets/img/fav2.png" alt="Plumber" />
    </div>
    <div class="card-body">
        <p class="provider-name">FixPro Services</p>
        <h3 class="card-title">Expert Plumbing Repairs & Installation Services</h3>
        <p class="card-desc">Quick and reliable plumbing solutions for leaks, fittings, and complete home maintenance.</p>
        <div class="card-divider"></div>
        <div class="card-footer">
        <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    </div>

    <!-- Card 4 -->
    <div class="card">
    <div class="card-img-wrap">
        <img class="card-img" src="assets/img/spa.jpg" alt="Salon & Spa" />
        <span class="badge">Salon & Spa</span>
        <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
    </div>
    <div class="card-avatar-wrap">
        <img class="card-avatar" src="assets/img/fav2.png" alt="Stylist" />
    </div>
    <div class="card-body">
        <p class="provider-name">Luxury Salon</p>
        <h3 class="card-title">Relaxing Spa & Beauty Treatments For Men & Women</h3>
        <p class="card-desc">Enjoy premium skincare, hair styling, and spa services for a refreshing experience.</p>
        <div class="card-divider"></div>
        <div class="card-footer">
        <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    </div>

    <!-- Card 5 -->
    <div class="card">
    <div class="card-img-wrap">
        <img class="card-img" src="assets/img/Wedding Plan Service.png" alt="Wedding Planning" />
        <span class="badge">Wedding</span>
        <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
    </div>
    <div class="card-avatar-wrap">
        <img class="card-avatar" src="assets/img/fav2.png" alt="Planner" />
    </div>
    <div class="card-body">
        <p class="provider-name">Dream Weddings</p>
        <h3 class="card-title">Complete Wedding Planning & Event Management</h3>
        <p class="card-desc">We organize memorable weddings with perfect planning, decoration, and coordination.</p>
        <div class="card-divider"></div>
        <div class="card-footer">
        <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    </div>

    <!-- Card 6 -->
    <div class="card">
    <div class="card-img-wrap">
        <img class="card-img" src="assets/img/Home Maintainence Service.png" alt="Home Services" />
        <span class="badge">Home Service</span>
        <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
    </div>
    <div class="card-avatar-wrap">
        <img class="card-avatar" src="assets/img/fav2.png" alt="Technician" />
    </div>
    <div class="card-body">
        <p class="provider-name">HomeCare Experts</p>
        <h3 class="card-title">All-in-One Home Maintenance & Repair Services</h3>
        <p class="card-desc">From plumbing to electrical fixes, we provide complete home service solutions.</p>
        <div class="card-divider"></div>
        <div class="card-footer">
        <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    </div>

    </div>

    <!-- CTA -->
    <div class="cta-wrap">
      <button class="btn-cta">View all services <i class="fa-solid fa-arrow-right"></i></button>
    </div>

  </div>
</section>
<!-- Servies Near You -->
<div class="separate" style="background: #f4f5f7;">
  <div class="br-line"></div>
</div>
<!-- Best Services -->


<section class="services-section">
  <div class="container">

    <div class="section-header">
      <h2 class="section-title" style="margin-bottom: 10px !important;">Top <label style="color: #ff4800;"> Home Services </label></h2>
      <p class="section-desc">Find trusted professionals for every need — from salon & wedding to plumbing and repairs. Book reliable experts in minutes.</p>
    </div>

    <div class="services-grid">

      <!-- Card 1 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/salon.jpg" alt="Salon" />
          <span class="badge">Salon</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-2.png" alt="Riya Sharma" />
        </div>
        <div class="card-body">
          <p class="provider-name">Glow Studio</p>
          <h3 class="card-title">Professional Salon & Beauty Services at Your Doorstep.</h3>
          <p class="card-desc">Hair styling, makeup, skincare, and grooming services by certified beauty experts.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
            
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/wedding and decoration service.png" alt="Wedding" />
          <span class="badge">Wedding</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-2.png" alt="Aman Verma" />
        </div>
        <div class="card-body">
          <p class="provider-name">Dream Weddings</p>
         
          <h3 class="card-title">Complete Wedding Planning & Decoration Services.</h3>
          <p class="card-desc">From venue setup to catering and decoration — we make your big day perfect.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/Ac Repair Service.png" alt="AC Repair" />
          <span class="badge">AC Repair</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-3.png" alt="Rahul Mehta" />
        </div>
        <div class="card-body">
          <p class="provider-name">CoolFix Services</p>
          
          <h3 class="card-title">Expert AC Repair & Maintenance Services.</h3>
          <p class="card-desc">Quick and reliable AC servicing, gas refilling, and installation support.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
            
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/Spa Service.png" alt="Spa" />
          <span class="badge">Spa & Wellness</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-4.png" alt="Neha Kapoor" />
        </div>
        <div class="card-body">
          <p class="provider-name">Relax Spa</p>
         
          <h3 class="card-title">Luxury Spa & Massage Therapy at Home.</h3>
          <p class="card-desc">Relax with professional massage, body therapy, and wellness treatments.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
          
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/Plumbing Service.png" alt="Plumber" />
          <span class="badge">Plumbing</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-5.png" alt="Imran Khan" />
        </div>
        <div class="card-body">
          <p class="provider-name">QuickFix Plumbing</p>
          
          <h3 class="card-title">Reliable Plumbing & Leak Repair Services.</h3>
          <p class="card-desc">Fix leaks, install fittings, and handle all plumbing issues quickly.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
           
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="card">
        <div class="card-img-wrap">
          <img class="card-img" src="assets/img/electrician service.png" alt="Electrician" />
          <span class="badge">Electrician</span>
          <button class="btn-heart" onclick="this.classList.toggle('active')"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="card-avatar-wrap">
          <img class="card-avatar" src="https://serve-nextjs.vercel.app/assets/images/services/service-author-6.png" alt="Vikram Singh" />
        </div>
        <div class="card-body">
          <p class="provider-name">PowerCare</p>
          
           
          <h3 class="card-title">Certified Electricians for All Home Needs.</h3>
          <p class="card-desc">Wiring, repairs, installations, and electrical maintenance services.</p>
          <div class="card-divider"></div>
          <div class="card-footer">
            <a href="#" class="link-details">View Details <i class="fa-solid fa-arrow-right"></i></a>
        
          </div>
        </div>
      </div>

    </div>

    <!-- CTA -->
    <div class="cta-wrap">
      <button class="btn-cta">Explore all services <i class="fa-solid fa-arrow-right"></i></button>
    </div>

  </div>
</section>
<!-- Best Services -->

<!-- Start Team Area -->
<!-- <section id="team" class="team-area uk-team uk-section">
  <div class="uk-container">
    <div class="uk-section-title section-title">
      <span>Meet Our Experts</span>
      <h2>Our Team</h2>
      <div class="bar"></div>

      <a href="#" class="uk-button uk-button-default">View All</a>
    </div>
  </div>

  <div class="team-slides owl-carousel owl-theme">
    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team1.jpg" alt="image" />

      <div class="team-content">
        <h3>Josh Buttler</h3>
        <span>Content Writer</span>
      </div>
    </div>

    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team2.jpg" alt="image" />

      <div class="team-content">
        <h3>David Warner</h3>
        <span>UX/UI Designer</span>
      </div>
    </div>

    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team3.jpg" alt="image" />

      <div class="team-content">
        <h3>Emili Lucy</h3>
        <span>Project Manager</span>
      </div>
    </div>

    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team4.jpg" alt="image" />

      <div class="team-content">
        <h3>Steven Smith</h3>
        <span>Marketing Manager</span>
      </div>
    </div>

    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team5.jpg" alt="image" />

      <div class="team-content">
        <h3>Steve Eva</h3>
        <span>Creative Designer</span>
      </div>
    </div>

    <div class="single-team">
      <ul class="team-social">
        <li>
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>

      <img src="assets/img/team1.jpg" alt="image" />

      <div class="team-content">
        <h3>Josh Buttler</h3>
        <span>Content Writer</span>
      </div>
    </div>
  </div>
</section> -->


<section id="providers" class="team-area uk-team uk-section">
    <div class="uk-container">
        <div class="uk-section-title section-title">
        <span>Trusted Professionals</span>
        <h2>Our Service Providers</h2>
        <div class="bar"></div>

        <a href="#" class="uk-button uk-button-default">View All Providers</a>
        </div>
    </div>

    <div class="team-slides owl-carousel owl-theme">
        
        <div class="single-team">
        <ul class="team-social">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <img src="assets/img/team1.jpg" alt="provider" />

        <div class="team-content">
            <h3>Rajesh Kumar</h3>
            <span>Plumber</span>
        </div>
        </div>

        <div class="single-team">
        <ul class="team-social">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <img src="assets/img/team2.jpg" alt="provider" />

        <div class="team-content">
            <h3>Amit Sharma</h3>
            <span>Electrician</span>
        </div>
        </div>

        <div class="single-team">
        <ul class="team-social">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <img src="assets/img/team3.jpg" alt="provider" />

        <div class="team-content">
            <h3>Sneha Verma</h3>
            <span>Home Cleaner</span>
        </div>
        </div>

        <div class="single-team">
        <ul class="team-social">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <img src="assets/img/team4.jpg" alt="provider" />

        <div class="team-content">
            <h3>Mohit Singh</h3>
            <span>AC Technician</span>
        </div>
        </div>

        <div class="single-team">
        <ul class="team-social">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <img src="assets/img/team5.jpg" alt="provider" />

        <div class="team-content">
            <h3>Pooja Mehta</h3>
            <span>Interior Designer</span>
        </div>
        </div>

    </div>
</section>
<!-- End Team Area -->

<!-- Start Subscribe Area -->
<?php echo $__env->make('import.newslater', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- End Subscribe Area -->

<!-- Start Blog Area -->
<!-- <section id="blog" class="blog-area uk-blog uk-section">
  <div class="uk-container">
    <div class="uk-section-title section-title">
      <span>Our Company Blog</span>
      <h2>Latest News</h2>
      <div class="bar"></div>

      <a href="#" class="uk-button uk-button-default">View All</a>
    </div>

    <div class="blog-slides owl-carousel owl-theme">
      <div class="single-blog-post">
        <div class="blog-post-image">
          <a href="single-blog.html">
            <img src="assets/img/blog1.jpg" alt="image" />
          </a>
        </div>

        <div class="blog-post-content">
          <span class="date">25 April</span>
          <h3>
            <a href="single-blog.html">The 13 Best Time Tracking Apps of 2024</a>
          </h3>
          <a href="single-blog.html" class="read-more">Read More</a>
        </div>
      </div>

      <div class="single-blog-post">
        <div class="blog-post-image">
          <a href="single-blog.html">
            <img src="assets/img/blog2.jpg" alt="image" />
          </a>
        </div>

        <div class="blog-post-content">
          <span class="date">26 April</span>
          <h3>
            <a href="single-blog.html">11 Tools to Help You Easily Create Proposals</a>
          </h3>
          <a href="single-blog.html" class="read-more">Read More</a>
        </div>
      </div>

      <div class="single-blog-post">
        <div class="blog-post-image">
          <a href="single-blog.html">
            <img src="assets/img/blog3.jpg" alt="image" />
          </a>
        </div>

        <div class="blog-post-content">
          <span class="date">27 April</span>
          <h3>
            <a href="single-blog.html">The Outlook for Digital Agencies in 4 Charts</a>
          </h3>
          <a href="single-blog.html" class="read-more">Read More</a>
        </div>
      </div>

      <div class="single-blog-post">
        <div class="blog-post-image">
          <a href="single-blog.html">
            <img src="assets/img/blog1.jpg" alt="image" />
          </a>
        </div>

        <div class="blog-post-content">
          <span class="date">25 April</span>
          <h3>
            <a href="single-blog.html">The 13 Best Time Tracking Apps of 2024</a>
          </h3>
          <a href="single-blog.html" class="read-more">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!--<section class="uk-creative-news creative-news-area pt-100 pb-70">
  <div class="uk-container">
    <div class="section-title-with-big-text top-zero">
      <span>Latest News</span>
      <h2>Read Our Latest News</h2>
    </div>

    <div class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-3@m uk-child-width-1-2@s">
      <div class="uk-item">
        <div class="creative-news-box">
          <div class="news-image">
            <a href="#">
              <img src="assets/img/blog1.jpg" alt="image">
            </a>
          </div>
          <div class="news-content">
            <ul class="meta">
              <li><a href="#">Web</a></li>
              <li>02-02-2024</li>
            </ul>
            <h3>
              <a href="#">University Admissions Could Face Emergency Controls</a>
            </h3>
            <div class="info">
              <img src="https://templates.envytheme.com/gunter/default/assets/img/client1.png" alt="image">

              <div class="title">
                <h4>By <a href="#">Burnett</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-news-box">
          <div class="news-image">
            <a href="single-blog.html">
              <img src="assets/img/blog2.jpg" alt="image">
            </a>
          </div>
          <div class="news-content">
            <ul class="meta">
              <li><a href="#">Development</a></li>
              <li>02-02-2024</li>
            </ul>
            <h3>
              <a href="single-blog.html">How To Create A ReactJS Image Lightbox Gallery?</a>
            </h3>
            <div class="info">
              <img src="https://templates.envytheme.com/gunter/default/assets/img/client2.png" alt="image">

              <div class="title">
                <h4>By <a href="#">Jimmie</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="uk-item">
        <div class="creative-news-box">
          <div class="news-image">
            <a href="#">
              <img src="assets/img/blog3.jpg" alt="image">
            </a>
          </div>
          <div class="news-content">
            <ul class="meta">
              <li><a href="#">Design</a></li>
              <li>02-02-2024</li>
            </ul>
            <h3>
              <a href="single-blog.html">Hide WooCommerce Products From Specific Categories</a>
            </h3>
            <div class="info">
              <img src="https://templates.envytheme.com/gunter/default/assets/img/client3.png" alt="image">

              <div class="title">
                <h4>By <a href="#">Rodriguez</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- End Blog Area -->

<div class="separate">
  <div class="br-line"></div>
</div>

<!-- Start Contact Area -->
<?php echo $__env->make('import.contact_form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- End Contact Area -->


<?php echo $__env->make('import.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/frontend/home/index.blade.php ENDPATH**/ ?>