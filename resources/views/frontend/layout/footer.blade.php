<footer id="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="{{ route('frontend.home') }}" class="logo">Home<span>Ease</span></a>
        <p>Bringing trusted, certified home service professionals to your doorstep across India. Quality, comfort, and convenience — every time.</p>
        <div class="social-row">
          <a href="#" class="s-lnk" aria-label="Facebook">f</a>
          <a href="#" class="s-lnk" aria-label="Instagram">ig</a>
          <a href="#" class="s-lnk" aria-label="Twitter">𝕏</a>
          <a href="#" class="s-lnk" aria-label="LinkedIn">in</a>
        </div>
      </div>
      <div class="footer-col">
        <h5>Quick Links</h5>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
            <li><a href="{{ route('frontend.service.index') }}">All Services</a></li>
            <li><a href="{{ route('frontend.provider.index') }}">Our Providers</a></li>
            <!-- <li><a href="{{ route('frontend.booking.index') }}">Book a Service</a></li> -->
          <li><a href="{{route('frontend.contact.index')}}">Book a Service</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Services</h5>
        <ul>
          <li><a href="s{{ route('frontend.service.index') }}#salon">Massage at Home</a></li>
            <li><a href="{{ route('frontend.service.index') }}#salon">Salon at Home</a></li>
            <li><a href="{{ route('frontend.service.index') }}#cleaning">Home Cleaning</a></li>
            <li><a href="{{ route('frontend.provider.index') }}">Browse Providers</a></li>
        </ul>
      </div>
      <div class="footer-col f-contact">
        <h5>Contact</h5>
        <p>📍 123 Wellness Street, Bandra West, Mumbai – 400050</p>
        <p>📞 +91 98765 43210</p>
        <p>✉️ hello@homeease.in</p>
        <p>⏰ Mon–Sat: 8am – 9pm</p>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 HomeEase Services Pvt. Ltd. All rights reserved.</span>
      <span>Privacy Policy · Terms of Service · Refund Policy</span>
    </div>
  </div>
</footer>