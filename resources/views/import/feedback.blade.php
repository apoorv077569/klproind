<style>
      .feedback-img .float-card {
        position: absolute;
        top: 5px;
        left: 30px;
        display: flex;
        align-items: end;
        gap: 16px;
        z-index: 99;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        padding: 16px;
        border-radius: 16px;
        border: 1px solid #dbeafe;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        animation: bounce 3s infinite;
        }

        .feedback-img .icon-box {
        width: 56px;
        height: 56px;
        border-radius: 50%;

        background: linear-gradient(135deg, #3b82f6, #4f46e5);
        display: flex;
        align-items: center;
        justify-content: center;

        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .feedback-img .icon-box span {
        font-size: 24px;
        color: #fff;
        }

        .feedback-img .label {
        font-size: 11px;
        color: #6b7280;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        }

        .feedback-img .value {
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        }

        .feedback-img .growth {
        display: inline-flex;
        align-items: center;
        gap: 4px;

        margin-top: 6px;
        padding: 2px 8px;

        background: #ecfdf5;
        color: #16a34a;

        font-size: 11px;
        font-weight: bold;

        border-radius: 999px;
        }

        .feedback-img .growth svg {
        width: 12px;
        height: 12px;
        stroke: currentColor;
        stroke-width: 3;
        fill: none;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        @media screen and (max-width: 768px){
            .feedback-img .float-card {
                display:none;
            }
        }
</style>
<section id="clients" class="feedback-area uk-section uk-feedback">
    <div class="uk-container">
        <div
            class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1@s" style="align-items: end">
            <div class="item">
                <div class="feedback-img">
                    <img src="assets/img/Testimonials Image.png" alt="image" />
                    <div class="float-card">
                        <div class="icon-box">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfJCi9mNhXyJQu2Magk8YxS9TQYOIDLloj_g&s" style="width: 56px; height: 56px; object-fit: cover; border-radius: 50%; object-position: top;" />
                        </div>

                        <div class="content">
                            <div class="label">Ayushi Agrawal</div>

                                <div class="rating">
                                    ⭐ ⭐ ⭐ ⭐ <span class="half-star">⭐</span>
                                </div>
                            </div>
                        </div>
                    <img src="assets/img/1.png" class="shape-img" alt="image" />

                   
                </div>
            </div>

            <div class="item">
                <div class="feedback-inner">
                    <!--<div class="uk-section-title section-title">
                        <span>What Client Says About US</span>
                        <h2>Our Testimonials</h2>
                        <div class="bar"></div>
                    </div>

                    <div class="feedback-slides owl-carousel owl-theme">
                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo viverra maecenas accumsan lacus vel facilisis.
                            </p>

                            <div class="client">
                                <h3>Jason Statham</h3>
                                <span>Founder at Envato</span>
                            </div>
                        </div>

                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo viverra maecenas accumsan lacus vel facilisis.
                            </p>

                            <div class="client">
                                <h3>Jason Statham</h3>
                                <span>Founder at Envato</span>
                            </div>
                        </div>

                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo viverra maecenas accumsan lacus vel facilisis.
                            </p>

                            <div class="client">
                                <h3>Jason Statham</h3>
                                <span>Founder at Envato</span>
                            </div>
                        </div>
                    </div> -->

                    <div class="uk-section-title section-title">
                        <span>What Clients Say About Us</span>
                        <h2>Our Testimonials</h2>
                        <div class="bar"></div>
                    </div>

                    <div class="feedback-slides owl-carousel owl-theme">

                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                I had a great experience with their service. The team was very professional, arrived on time, and completed the work efficiently. The quality of work exceeded my expectations, and everything was handled smoothly without any hassle.
                            </p>
                            <div class="client">
                                <h3>Rahul Sharma</h3>
                                <span>Delhi</span>
                            </div>
                        </div>

                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                Excellent service and very reliable team. They explained everything clearly and delivered exactly what was promised. I would definitely recommend them to anyone looking for trustworthy and quick service at a reasonable price.
                            </p>
                            <div class="client">
                                <h3>Priya Verma</h3>
                                <span>Mumbai</span>
                            </div>
                        </div>

                        <div class="single-feedback">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>
                                Really impressed with the overall experience. The booking process was simple, and the service quality was top-notch. The staff was polite and ensured everything was completed perfectly. Will surely use their services again.
                            </p>
                            <div class="client">
                                <h3>Amit Patel</h3>
                                <span>Ahmedabad</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>