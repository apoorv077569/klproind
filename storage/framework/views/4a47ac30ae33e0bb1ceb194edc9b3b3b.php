<style>
    .single-footer-widget .nav-links {
        list-style: none;
        padding-left: 0px
    }
    .single-footer-widget .nav-links li{
        font-size: 15px;
        color: #999999;
        margin-bottom: 10px;
    }
    .single-footer-widget .nav-links li a{
        color: #999999;
    }
</style>

<!-- Start Footer Area -->
<footer class="footer-area uk-footer">
    <div class="uk-container">
        <div
            class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-4@m uk-child-width-1-2@s">
            <div class="item">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="<?php echo e(route('frontend.home')); ?>">
                            <img src="assets/img/dark-logo.png" alt="logo" style="max-width: 150px;" />
                        </a>
                    </div>

                    <p>
                        Providing reliable services with precision and care, ensuring quality solutions tailored to meet your everyday needs seamlessly.
                    </p>
                </div>
            </div>

            <div class="item">
                <div class="single-footer-widget">
                    <h3>Services</h3>
                    <div class="bar"></div>

                   <ul class="nav-links">
                        <li><a href="https://klproind.com/">&#8594; Home</a></li>
                        <li><a href="https://klproind.com/about-us">&#8594; About Us</a></li>
                        <li><a href="#services">&#8594; Our Services</a></li>
                        <li><a href="#clients">&#8594; Testimonials</a></li>
                        <li><a href="https://klproind.com/contact-us">&#8594; Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="item">
                <div class="single-footer-widget">
                    <h3>India</h3>
                    <div class="bar"></div>

                    <div class="location">
                        <p>
                            Shop No.5, 5th Floor <br />
                            East Avenue Grand Complex, Kohli Vihar<br />
                            Noida Sec-49, Gautam Buddha Nagar <br />
                            U.P.- 201301
                        </p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="single-footer-widget">
                    <h3>Contact</h3>
                    <div class="bar"></div>

                    <ul class="contact-info">
                        <li>
                            <a href="mailto:info@klproind.com">info@klproind.com</a></a>
                        </li>
                        <li><a href="tel:+91 8287 266266">+91 8287 266266</a></li>
                    </ul>
                    <ul class="social">
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
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <div
                class="uk-grid uk-grid-match uk-grid-medium uk-child-width-1-2@m uk-child-width-1-2@s">
                <div class="item">
                    <p>© KCPRO. All Rights Reserved</p>
                </div>
    
                <div class="item">
                    <ul>
                        <li><a href="<?php echo e(route('frontend.terms.index')); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo e(route('frontend.privacy.index')); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="go-top"><i class="flaticon-chevron"></i></div>
        </div>
    </div>

    <div class="br-line"></div>
    <div class="footer-shape1">
        <img src="assets/img/footer-shape1.png" alt="shape" />
    </div>
    <div class="footer-shape2">
        <img src="assets/img/footer-shape2.png" alt="shape" />
    </div>
</footer>
<!-- End Footer Area -->

<!-- Links of JS files -->

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/uikit.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/uikit-icons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/appear.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/odometer.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/lax.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/active.js')); ?>"></script>
<script>
    (function() {
        function c() {
            var b = a.contentDocument || a.contentWindow.document;
            if (b) {
                var d = b.createElement("script");
                d.innerHTML =
                    "window.__CF$cv$params={r:'9e1db9ee9fb7373a',t:'MTc3NDQzOTcyMw=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName("head")[0].appendChild(d);
            }
        }
        if (document.body) {
            var a = document.createElement("iframe");
            a.height = 1;
            a.width = 1;
            a.style.position = "absolute";
            a.style.top = 0;
            a.style.left = 0;
            a.style.border = "none";
            a.style.visibility = "hidden";
            document.body.appendChild(a);
            if ("loading" !== document.readyState) c();
            else if (window.addEventListener)
                document.addEventListener("DOMContentLoaded", c);
            else {
                var e = document.onreadystatechange || function() {};
                document.onreadystatechange = function(b) {
                    e(b);
                    "loading" !== document.readyState &&
                        ((document.onreadystatechange = e), c());
                };
            }
        }
    })();
</script>
</body>

</html><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/import/footer.blade.php ENDPATH**/ ?>