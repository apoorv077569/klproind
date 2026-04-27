@include('import.header')


<!-- Start Page Title Area -->
<section class="page-title-area uk-page-title">
    <div class="uk-container">
        <h1>About</h1>
        <ul>
            <li><a href="{{route('frontend.home')}}">Home</a></li>
            <li>About</li>
        </ul>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start About Area -->
<section id="about" class="uk-about about-area uk-section">
    <div class="uk-container">
        <div
            class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1@s">
            <div class="item">
                <div class="about-content">
                    <div class="uk-section-title section-title">
                        <span>About Us</span>
                        <h2>Leading the way in Creative Digital Agency</h2>
                        <div class="bar"></div>
                    </div>

                    <div class="about-text">
                        <div class="icon">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <h3>Best Digital Agency in the World</h3>
                        <p>
                            We provide marketing services to startups and small businesses
                            to looking for a partner of their digital media, design &
                            development, lead generation and communications requirents. We
                            work with you, not for you. Although we have a great
                            resources.
                        </p>
                        <p>
                            We are an experienced and talented team of passionate
                            consultants who live and breathe search engine marketing.
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
                        src="assets/img/about1.jpg"
                        class="about-img1"
                        alt="about-img" />
                    <img
                        src="assets/img/about2.jpg"
                        class="about-img2"
                        alt="about-img" />
                    <img src="assets/img/1.png" class="shape-img" alt="shape" />

                    <a
                        href="{{route('frontend.contact.index')}}"
                        class="uk-button uk-button-default lax"
                        data-lax-preset="driftLeft">More About Us <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->


<!-- Start Feedback Area -->

@include('import.feedback')
<!-- End Feedback Area -->

<!-- Start Partner Area -->
@include('import.clients')
<!-- End Partner Area -->

<!-- Start Team Area -->
<section id="team" class="team-area uk-team uk-section">
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
</section>
<!-- End Team Area -->


<!-- Start Subscribe Area -->
@include('import.newslater')
<!-- End Subscribe Area -->

@include('import.footer')
