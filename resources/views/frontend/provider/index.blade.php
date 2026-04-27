@extends('frontend.layout.master')

@section('title', 'Service Providers – HomeEase')

@section('content')

<section class="page-hero">
    <div class="container">
        <span class="eyebrow" style="justify-content:center">Meet the Experts</span>
        <h1>Our <span class="grad-text">Providers</span></h1>
        <p>Every professional is background-checked, skill-assessed, and customer-rated. Meet some of our top experts.</p>
    </div>
</section>

<main class="providers-page">
  <div class="container">

    <!-- FILTER -->
    <div class="filter-row">
      <button class="f-btn active" type="button">All Providers</button>
      <button class="f-btn" type="button">💆 Massage</button>
      <button class="f-btn" type="button">✂️ Salon</button>
      <button class="f-btn" type="button">🧹 Cleaning</button>
      <button class="f-btn" type="button">⭐ Top Rated</button>
    </div>

    <!-- MASSAGE PROVIDERS -->
    <div class="prov-label">💆 Massage Therapists</div>
    <div class="prov-grid">

      <article class="prov-card anim-1">
        <div class="prov-av mint">👩<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Reena Patel</h3>
        <p class="prov-exp">7+ years · 540 sessions completed</p>
        <div class="primary-skill">Deep Tissue Massage</div>
        <div class="skill-tags">
          <span class="stag">Swedish Massage</span>
          <span class="stag">Head Massage</span>
          <span class="stag">Back Therapy</span>
          <span class="stag">Aromatherapy</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.9</span><span style="color:var(--text-muted);font-weight:400">(214 reviews)</span></div>
        <a href="booking.html" class="btn btn-primary">Book This Provider</a>
      </article>

      <article class="prov-card anim-2">
        <div class="prov-av blue">👨<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Vikram Nair</h3>
        <p class="prov-exp">5+ years · 420 sessions completed</p>
        <div class="primary-skill blue">Swedish Massage</div>
        <div class="skill-tags">
          <span class="stag">Deep Tissue</span>
          <span class="stag">Sports Massage</span>
          <span class="stag">Couple's Massage</span>
          <span class="stag">Reflexology</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.8</span><span style="color:var(--text-muted);font-weight:400">(189 reviews)</span></div>
        <a href="booking.html" class="btn btn-primary">Book This Provider</a>
      </article>

      <article class="prov-card anim-3">
        <div class="prov-av pink">👩‍🦱<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Anjali Desai</h3>
        <p class="prov-exp">9+ years · 870 sessions completed</p>
        <div class="primary-skill pink">Aromatherapy Massage</div>
        <div class="skill-tags">
          <span class="stag">Swedish Massage</span>
          <span class="stag">Pregnancy Massage</span>
          <span class="stag">Head Massage</span>
          <span class="stag">Back Therapy</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>5.0</span><span style="color:var(--text-muted);font-weight:400">(312 reviews)</span></div>
        <a href="booking.html" class="btn btn-primary">Book This Provider</a>
      </article>

    </div>

    <!-- SALON PROVIDERS -->
    <div class="prov-label">✂️ Salon Professionals</div>
    <div class="prov-grid">

      <article class="prov-card anim-1">
        <div class="prov-av mint">👩‍🦳<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Sunita Sharma</h3>
        <p class="prov-exp">11+ years · 1,200 sessions completed</p>
        <div class="primary-skill">Bridal Makeup &amp; Styling</div>
        <div class="skill-tags">
          <span class="stag">Haircut &amp; Colour</span>
          <span class="stag">Facial &amp; Cleanup</span>
          <span class="stag">Manicure</span>
          <span class="stag">Pedicure</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>5.0</span><span style="color:var(--text-muted);font-weight:400">(487 reviews)</span></div>
        <a href="booking.html" class="btn btn-blue">Book This Provider</a>
      </article>

      <article class="prov-card anim-2">
        <div class="prov-av blue">💇<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Divya Krishnan</h3>
        <p class="prov-exp">6+ years · 630 sessions completed</p>
        <div class="primary-skill blue">Advanced Facial Treatments</div>
        <div class="skill-tags">
          <span class="stag">Haircut</span>
          <span class="stag">Threading</span>
          <span class="stag">Waxing</span>
          <span class="stag">Eyebrow Design</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.9</span><span style="color:var(--text-muted);font-weight:400">(221 reviews)</span></div>
        <a href="booking.html" class="btn btn-blue">Book This Provider</a>
      </article>

      <article class="prov-card anim-3">
        <div class="prov-av pink">👩‍🎨<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Pooja Iyer</h3>
        <p class="prov-exp">4+ years · 380 sessions completed</p>
        <div class="primary-skill pink">Nail Art &amp; Manicure</div>
        <div class="skill-tags">
          <span class="stag">Gel Nails</span>
          <span class="stag">Pedicure</span>
          <span class="stag">Nail Extensions</span>
          <span class="stag">Hand Massage</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★☆</span><span>4.7</span><span style="color:var(--text-muted);font-weight:400">(143 reviews)</span></div>
        <a href="booking.html" class="btn btn-blue">Book This Provider</a>
      </article>

    </div>

    <!-- CLEANING PROVIDERS -->
    <div class="prov-label">🧹 Cleaning Specialists</div>
    <div class="prov-grid">

      <article class="prov-card anim-1">
        <div class="prov-av mint">👨‍🔧<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Ramesh Kumar</h3>
        <p class="prov-exp">8+ years · 960 sessions completed</p>
        <div class="primary-skill">Full Home Deep Cleaning</div>
        <div class="skill-tags">
          <span class="stag">Kitchen Cleaning</span>
          <span class="stag">Bathroom Sanitizing</span>
          <span class="stag">Post-Construction</span>
          <span class="stag">Pest Control</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.9</span><span style="color:var(--text-muted);font-weight:400">(381 reviews)</span></div>
        <a href="booking.html" class="btn btn-pink">Book This Provider</a>
      </article>

      <article class="prov-card anim-2">
        <div class="prov-av blue">👷<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Suresh Babu</h3>
        <p class="prov-exp">5+ years · 510 sessions completed</p>
        <div class="primary-skill blue">Kitchen &amp; Chimney Cleaning</div>
        <div class="skill-tags">
          <span class="stag">Appliance Cleaning</span>
          <span class="stag">Floor Polishing</span>
          <span class="stag">Tile Scrubbing</span>
          <span class="stag">Cabinet Cleaning</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.8</span><span style="color:var(--text-muted);font-weight:400">(205 reviews)</span></div>
        <a href="booking.html" class="btn btn-pink">Book This Provider</a>
      </article>

      <article class="prov-card anim-3">
        <div class="prov-av pink">🧑‍🏭<div class="v-badge">✓</div></div>
        <h3 class="prov-name">Meena Rajput</h3>
        <p class="prov-exp">3+ years · 290 sessions completed</p>
        <div class="primary-skill pink">Sofa &amp; Carpet Cleaning</div>
        <div class="skill-tags">
          <span class="stag">Upholstery Care</span>
          <span class="stag">Bathroom Deep Clean</span>
          <span class="stag">Odour Treatment</span>
          <span class="stag">Stain Removal</span>
        </div>
        <div class="prov-rating"><span class="stars">★★★★★</span><span>4.8</span><span style="color:var(--text-muted);font-weight:400">(117 reviews)</span></div>
        <a href="booking.html" class="btn btn-pink">Book This Provider</a>
      </article>

    </div>

    <!-- NO MATCH BANNER -->
    <div class="no-match">
      <h2>Don't see the right <span class="grad-text">match?</span></h2>
      <p>Tell us your requirements during booking and we'll assign the best available professional for you.</p>
      <a href="booking.html" class="btn btn-primary" style="font-size:1rem;padding:.95rem 2.5rem">Book &amp; Let Us Match You →</a>
    </div>

  </div>
</main>

@endsection