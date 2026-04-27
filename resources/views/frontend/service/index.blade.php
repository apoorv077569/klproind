@extends('frontend.layout.master')

@section('title', 'Services – HomeEase')

@section('content')

<section class="page-hero">
    <div class="container">
        <span class="eyebrow" style="justify-content:center">Our Offerings</span>
        <h1>All <span class="grad-text">Services</span></h1>
        <p>Explore our full range of professional home services — each delivered by trained, background-verified experts with all equipment included.</p>
    </div>
</section>

<main class="services-page">
  <div class="container">

    <!-- MASSAGE -->
    <div class="cat-block anim-1" id="massage">
      <div class="cat-head">
        <div class="cat-icon mint">💆</div>
        <div>
          <h2>Massage at Home</h2>
          <p class="cat-meta">Certified therapists · Premium oils included · 60–120 min sessions</p>
        </div>
        <a href="booking.html" class="btn btn-primary" style="margin-left:auto;flex-shrink:0">Book Now →</a>
      </div>
      <div class="sub-grid">
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Swedish Massage</h4>
            <span class="sub-price mint">₹999</span>
          </div>
          <p>Gentle full-body relaxation using long strokes and kneading techniques to ease muscle tension and improve circulation.</p>
          <div class="sub-meta"><span class="dur">60–90 min</span><span class="rat">4.9 (312 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Deep Tissue Massage</h4>
            <span class="sub-price mint">₹1,199</span>
          </div>
          <p>Targets deeper muscle layers to relieve chronic pain, stiffness, and sports injuries. Highly effective for tension knots.</p>
          <div class="sub-meta"><span class="dur">60–90 min</span><span class="rat">4.8 (276 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Head Massage</h4>
            <span class="sub-price mint">₹599</span>
          </div>
          <p>Indian Champissage targeting scalp, neck and shoulders. Reduces headaches and deeply calms the nervous system.</p>
          <div class="sub-meta"><span class="dur">30–45 min</span><span class="rat">4.9 (198 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Aromatherapy Massage</h4>
            <span class="sub-price mint">₹1,399</span>
          </div>
          <p>Essential oils blended with gentle massage techniques to promote relaxation, balance emotions, and nourish the skin.</p>
          <div class="sub-meta"><span class="dur">75 min</span><span class="rat">5.0 (143 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Back &amp; Shoulder Therapy</h4>
            <span class="sub-price mint">₹799</span>
          </div>
          <p>Focused treatment on upper back, shoulders and neck. Perfect for desk workers and those with postural tension.</p>
          <div class="sub-meta"><span class="dur">45 min</span><span class="rat">4.7 (221 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
        <div class="sub-card mint">
          <div class="sub-top">
            <h4>Couple's Massage</h4>
            <span class="sub-price mint">₹2,199</span>
          </div>
          <p>Two therapists, one experience. Synchronized full-body session side by side with your partner in your own home.</p>
          <div class="sub-meta"><span class="dur">60–90 min</span><span class="rat">5.0 (89 reviews)</span></div>
          <a href="booking.html" class="btn btn-outline-mint">Book This →</a>
        </div>
      </div>
    </div>

    <!-- SALON -->
    <div class="cat-block anim-2" id="salon">
      <div class="cat-head">
        <div class="cat-icon blue">✂️</div>
        <div>
          <h2>Salon at Home</h2>
          <p class="cat-meta">Trained beauticians · Hygienic disposable tools · All hair types welcome</p>
        </div>
        <a href="booking.html" class="btn btn-blue" style="margin-left:auto;flex-shrink:0">Book Now →</a>
      </div>
      <div class="sub-grid">
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Haircut &amp; Styling</h4>
            <span class="sub-price blue">₹499</span>
          </div>
          <p>Professional cut and style from experienced hairdressers who specialise in all textures and the latest trends.</p>
          <div class="sub-meta"><span class="dur">45–60 min</span><span class="rat">4.8 (334 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Facial &amp; Skin Care</h4>
            <span class="sub-price blue">₹799</span>
          </div>
          <p>Cleanse, tone, exfoliate and hydrate with a professional facial using branded skincare suited to your skin type.</p>
          <div class="sub-meta"><span class="dur">60 min</span><span class="rat">4.9 (287 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Manicure</h4>
            <span class="sub-price blue">₹449</span>
          </div>
          <p>Complete nail care: shaping, cuticle treatment, buffing, polish of your choice. Includes a 15-min hand massage.</p>
          <div class="sub-meta"><span class="dur">45 min</span><span class="rat">4.8 (312 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Pedicure</h4>
            <span class="sub-price blue">₹549</span>
          </div>
          <p>Foot soak, scrub, nail shaping and polish with a relaxing foot &amp; calf massage. Hygienic single-use tools guaranteed.</p>
          <div class="sub-meta"><span class="dur">60 min</span><span class="rat">4.7 (265 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Threading &amp; Waxing</h4>
            <span class="sub-price blue">₹299</span>
          </div>
          <p>Eyebrow threading, upper lip, full-face or body waxing using premium wax strips that are gentle on skin.</p>
          <div class="sub-meta"><span class="dur">20–45 min</span><span class="rat">4.8 (401 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
        <div class="sub-card blue">
          <div class="sub-top">
            <h4>Bridal Package</h4>
            <span class="sub-price blue">₹3,999</span>
          </div>
          <p>Complete pre-bridal pampering: facial, hair, manicure, pedicure, threading, waxing + professional makeup included.</p>
          <div class="sub-meta"><span class="dur">3–4 hrs</span><span class="rat">5.0 (76 reviews)</span></div>
          <a href="booking.html" class="btn btn-blue" style="background:rgba(56,189,248,.12);color:var(--accent-2);box-shadow:none;border:1px solid rgba(56,189,248,.25)">Book This →</a>
        </div>
      </div>
    </div>

    <!-- CLEANING -->
    <div class="cat-block anim-3" id="cleaning">
      <div class="cat-head">
        <div class="cat-icon pink">🧹</div>
        <div>
          <h2>Home Cleaning</h2>
          <p class="cat-meta">Eco-friendly products · Insured cleaners · All equipment provided</p>
        </div>
        <a href="booking.html" class="btn btn-pink" style="margin-left:auto;flex-shrink:0">Book Now →</a>
      </div>
      <div class="sub-grid">
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Kitchen Deep Cleaning</h4>
            <span class="sub-price pink">₹1,299</span>
          </div>
          <p>Counter scrubbing, appliance exterior cleaning, chimney degreasing, sink descaling, floor mop and cabinet wipe-down.</p>
          <div class="sub-meta"><span class="dur">2–3 hrs</span><span class="rat">4.8 (198 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Bathroom Cleaning</h4>
            <span class="sub-price pink">₹699</span>
          </div>
          <p>Tile scrubbing, toilet sanitizing, mirror cleaning, faucet descaling, floor mop and exhaust vent dusting. Per bathroom.</p>
          <div class="sub-meta"><span class="dur">1–1.5 hrs</span><span class="rat">4.9 (276 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Full Home Cleaning</h4>
            <span class="sub-price pink">₹2,999</span>
          </div>
          <p>Complete floor-to-ceiling clean including all rooms, kitchen, bathrooms, balcony and common areas. Move-in/move-out ready.</p>
          <div class="sub-meta"><span class="dur">4–6 hrs</span><span class="rat">4.8 (154 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Sofa &amp; Carpet Cleaning</h4>
            <span class="sub-price pink">₹899</span>
          </div>
          <p>Foam or dry cleaning for sofas, chairs and carpets to remove dust mites, stains and odours. Fabric-safe solutions used.</p>
          <div class="sub-meta"><span class="dur">1.5–2.5 hrs</span><span class="rat">4.7 (132 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Post-Construction</h4>
            <span class="sub-price pink">₹4,999</span>
          </div>
          <p>Removal of construction dust, paint splatter, cement residue and debris. Heavy-duty cleaning for newly renovated homes.</p>
          <div class="sub-meta"><span class="dur">6–8 hrs</span><span class="rat">4.8 (67 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
        <div class="sub-card pink">
          <div class="sub-top">
            <h4>Regular Upkeep Plan</h4>
            <span class="sub-price pink">₹1,499<small style="font-size:.65rem">/mo</small></span>
          </div>
          <p>Weekly or bi-weekly visits from a dedicated cleaner. Customizable scope. Save up to 30% vs. one-time bookings.</p>
          <div class="sub-meta"><span class="dur">2 hrs/visit</span><span class="rat">4.9 (213 reviews)</span></div>
          <a href="booking.html" class="btn btn-pink" style="background:rgba(244,114,182,.12);color:var(--accent-3);box-shadow:none;border:1px solid rgba(244,114,182,.25)">Book This →</a>
        </div>
      </div>
    </div>

  </div>
</main>

@endsection
