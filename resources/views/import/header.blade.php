<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    <title>Services – HomeEase – Professional Services at Your Doorstep</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
</head>

<body>
    <!-- Start Preloader Area -->
    <!--<div class="uk-preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>-->
    <!-- End Preloader Area -->

    <!-- Start Mobile Navbar -->
    <div
        id="offcanvas-flip"
        class="mobile-navbar uk-mobile-navbar"
        uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <nav class="uk-navbar-container">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="{{route('frontend.home')}}">Home</a>
                    </li>
                    <li><a href="{{route('frontend.about.index')}}">About Us</a></li>
                    <li><a href="{{route('frontend.home')}}#services">Our Services</a></li>
                    <li><a href="{{route('frontend.home')}}#clients">Testimonials</a></li>
                    <li><a href="{{route('frontend.contact.index')}}">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Mobile Navbar -->

    <!-- Start Navbar Area -->
    <header class="header-area header-area-with-position-relative with-position-absolute border-bottom">
        <div class="uk-container">
            <div class="uk-navbar" style="align-items: center;">
                <div class="logo uk-navbar-left">
                    <a href="{{route('frontend.home')}}">
                        <img
                            src="assets/img/dark-logo.png"
                            alt="logo"
                            style="max-width: 130px" />
                    </a>
                </div>

                <div class="uk-navbar-toggle" id="navbar-toggle" uk-toggle="target: #offcanvas-flip" tabindex="0">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="navbar uk-navbar-right">
                    <nav class="uk-navbar-container">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active">
                                <a href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li><a href="{{route('frontend.about.index')}}">About Us</a></li>
                            <li><a href="{{route('frontend.home')}}#services">Our Services</a></li>
                            <li><a href="{{route('frontend.home')}}#clients">Testimonials</a></li>
                            <li><a href="{{route('frontend.contact.index')}}">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="others-option">
                    <div class="option-item">
                        <a href="tel:+91 82872 66266"><i class="fas fa-phone-alt"></i> +91 82872 66266</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const currentHash = window.location.hash; // #services

        document.querySelectorAll(".uk-navbar-nav li").forEach(li => {
            const link = li.querySelector("a");
            const href = link.getAttribute("href");

            // href ko split karo
            const [page, hash] = href.split("#");

            // match condition
            if (
                page === currentPage &&
                ((hash && "#" + hash === currentHash) || (!hash && !currentHash))
            ) {
                li.classList.add("uk-active");
            } else {
                li.classList.remove("uk-active");
            }
        });
    </script>
    <script>
        function setActive() {
            const currentPage = window.location.pathname.split("/").pop();
            const currentHash = window.location.hash;

            document.querySelectorAll(".uk-navbar-nav li").forEach(li => {
                const link = li.querySelector("a");
                const href = link.getAttribute("href");
                const [page, hash] = href.split("#");

                if (
                    page === currentPage &&
                    ((hash && "#" + hash === currentHash) || (!hash && !currentHash))
                ) {
                    li.classList.add("uk-active");
                } else {
                    li.classList.remove("uk-active");
                }
            });
        }

        // initial load
        setActive();
        window.addEventListener("hashchange", setActive);
    </script>
    <!-- End Navbar Area -->