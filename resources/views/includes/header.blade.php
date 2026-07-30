@php
    // On the home page keep bare hashes so the theme's smooth-scroll JS
    // (which binds to a[href^="#"]) still handles them; elsewhere point
    // back at home so the anchors aren't dead links.
    $home = request()->routeIs('home') ? '' : route('home');

    // The theme shipped with the vendor's own address hard-coded here.
    // Take it from the contact record, falling back to the configured sender.
    $headerEmail = \App\Models\ContactInfo::value('email') ?: config('mail.from.address');
@endphp
<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-wrap align-items-center">

            <div class="logo-box">
                <a href="{{url('/')}}">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                </a>
            </div>

            <div class="header-info-list d-none d-md-inline-block">
                <ul class="ul-reset">
                    @if ($headerEmail)
                        <li><a href="mailto:{{ $headerEmail }}">{{ $headerEmail }}</a></li>
                    @endif
                </ul>
            </div>

            <div class="header-menu">
                    <ul>
                        <li><a href="{{ $home }}#services-section">Services</a></li>
                        <li><a href="{{ $home }}#works-section">Works</a></li>
                        <li><a href="{{ $home }}#resume-section">Resume</a></li>
                        <li><a href="{{ $home }}#skills-section">Skills</a></li>
                        <li><a href="{{ $home }}#testimonials-section">Testimonials</a></li>
                        <li><a href="{{ $home }}#contact-section">Contact</a></li>
                    </ul>
            </div>

            <div class="header-button">
                <a href="{{ $home }}#contact-section" class="btn tj-btn-primary">Hire Me</a>
            </div>

            <div class="menu-bar d-lg-none">
                <button>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</div>

