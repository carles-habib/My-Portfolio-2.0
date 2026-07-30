<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
@include('includes.head')
</head>

<body>

<!-- Preloader Area Start -->
<div class="preloader">
    <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
        <path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
    </svg>

    <div class="preloader-heading">
        <div class="load-text">
            <span>L</span>
            <span>o</span>
            <span>a</span>
            <span>d</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
        </div>
    </div>
</div>
<!-- Preloader Area End -->


<!-- start: Back To Top -->
<div class="progress-wrap" id="scrollUp">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- end: Back To Top -->

<!-- HEADER START -->
<header class="tj-header-area header-absolute">
    @include('includes.header')
</header>
<header class="tj-header-area header-2 header-sticky sticky-out">
    @include('includes.header')
</header>
<!-- HEADER END -->

@yield('content')
<!-- FOOTER AREA START -->
<footer class="tj-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-logo-box">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="{{ config('app.name') }}"></a>
                </div>
                <div class="footer-menu">
                    @php $home = request()->routeIs('home') ? '' : route('home'); @endphp
                    <nav>
                        <ul>
                            <li><a href="{{ $home }}#services-section">Services</a></li>
                            <li><a href="{{ $home }}#works-section">Works</a></li>
                            <li><a href="{{ $home }}#resume-section">Resume</a></li>
                            <li><a href="{{ $home }}#skills-section">Skills</a></li>
                            <li><a href="{{ $home }}#testimonials-section">Testimonials</a></li>
                            <li><a href="{{ $home }}#contact-section">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            @include('includes.footer')
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER AREA END -->


<!-- CSS here -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
<script src="{{asset("assets/js/backToTop.js")}}"></script>
<script src="{{ asset('assets/js/smooth-scroll.js') }}"></script>
<script src="{{ asset('assets/js/appear.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/js/one-page-nav.js') }}"></script>
<script src="{{ asset('assets/js/lightcase.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{asset("assets/js/magnific-popup.js")}}"></script>
<script src="{{asset("assets/js/scrollTrigger.min.js")}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>

@include('partials.flash-success-modal')

</body>

</html>
