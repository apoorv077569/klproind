<header>
  <div class="container">
    <nav>
      <a href="{{ route('frontend.home') }}" class="logo">
        <img src="{{ asset('frontend/images/dark-logo.png') }}"  style="height: 60px;" alt="HomeEase Logo">
    </a>

      <input type="checkbox" id="nav-chk" style="display:none"/>
      <label for="nav-chk" class="nav-toggle" aria-label="Menu">
        <span></span><span></span><span></span>
      </label>

      <ul class="nav-links">
          <li><a href="{{ route('frontend.home') }}" class="active">Home</a></li>
          <li><a href="{{ route('frontend.service.index') }}">Services</a></li>
          <li><a href="{{ route('frontend.provider.index') }}">Providers</a></li>
          <li><a href="#footer">Contact-us</a></li> 
          <!-- <li><a href="{{route('frontend.contact.index')}}">Book Now</a></li> -->
          <li><a href="{{ route('frontend.contact.index') }}" class="nav-cta">Book Now</a></li>
      </ul>
    </nav>
  </div>
</header>
