@extends('layouts.default')

@section('content')

    <main class="site-content" id="content">
        <!-- HERO SECTION START -->
        <section class="hero-section d-flex align-items-center" id="intro">
            <div class="intro_text">
                <svg viewBox="0 0 1320 300">
                    <text x="50%" Y="50%" text-anchor="middle">
                        HI
                    </text>
                </svg>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content-box">
                            @foreach($main as $data)
                            <span class="hero-sub-title wow fadeInLeft" data-wow-delay="1.1s">{{$data->name}}</span>
                            <h1 class="hero-title wow fadeInLeft" data-wow-delay="1.2s">{{$data->title}} <br>{{$data->subtitle}}
                            </h1>

                            <p class="lead wow fadeInLeft" data-wow-delay="1.4s">{{$data->description}}</p>
                            @endforeach
                                @foreach($quicklinks as $link)

                                <div class="button-box d-flex flex-wrap align-items-center">

                                <a href="{{asset($link->cv)}}" class="btn tj-btn-secondary wow fadeInLeft" data-wow-delay="1.5s">Download
                                    CV</a>
                                <ul class="ul-reset social-icons wow fadeInLeft" data-wow-delay="1.6s">
                                    <li><a href="{{$link->ig}}"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$link->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href="{{$link->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$link->github}}"><i class="fa-brands fa-github"></i></a></li>
                                </ul>

                            </div>
                                @endforeach

                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="hero-image-box text-center wow fadeInRight" data-wow-delay="1.5s">
                            <img src="{{ asset('storage/'.$image->image_path) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="funfact-area">
                    <div class="row">
                        @foreach($funfact as $ff)
                        <div class="col-6 col-lg-3">
                            <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                                <div class="number"><span class="odometer" data-count="{{$ff->no}}">0</span></div>
                                <div class="text">{{$ff->top}}<br>{{$ff->bottom}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- HERO SECTION END -->
        <!-- SERVICES SECTION START -->
        <section class="services-section" id="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center">
                            <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Quality Services</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">
                                We put your ideas and thus your wishes in the form of a unique web project that inspires you and
                                you customers.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="services-widget position-relative">
                            @foreach($services as $service)

                            <div class="service-item current d-flex flex-wrap align-items-center wow fadeInUp"
                                 data-wow-delay=".5s">
                                <div class="left-box d-flex flex-wrap align-items-center">
                                    <span class="number">0{{$service->order}}</span>
                                    <h3 class="service-title">{{$service->name}}</h3>
                                </div>
                                <div class="right-box">
                                    <p>
                                        {{$service->brief}}
                                    </p>
                                </div>
                                <i class="flaticon-up-right-arrow"></i>
                                <button data-mfp-src="#service-popup-{{$service->id}}" wire:click="openModalInsert" class="service-link modal-popup"></button>
                            </div>
                            @endforeach

                            <div class="active-bg wow fadeInUp" data-wow-delay=".5s"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICES SECTION END -->

        <!-- Generate Popups for Each Service -->
        @foreach($services as $service)
            <div id="service-popup-{{$service->id}}" class="popup_content_area zoom-anim-dialog mfp-hide">
                <div class="popup_modal_img">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{$service->name}}">
                </div>

                <div class="popup_modal_content">
                    <div class="service_details">
                        <div class="row">
                            <div class="col-lg-7 col-xl-8">
                                <div class="service_details_content">
                                    <div class="service_info">
                                        <h6 class="subtitle">SERVICES</h6>
                                        <h2 class="title">{{$service->name}}</h2>
                                        <div class="desc">
                                            <p>{{$service->desc1}}</p>
                                            <p>{{$service->desc2}}</p>
                                            <p>{{$service->desc3}}</p>
                                        </div>

                                        <h3 class="title">{{$service->process}}</h3>
                                        <div class="desc">
                                            <p>{{$service->processdesc}}</p>
                                        </div>
                                        <ul>
                                            <li>{{$service->objective1}}</li>
                                            <li>{{$service->objective2}}</li>
                                            <li>{{$service->objective3}}</li>
                                            <li>{{$service->objective4}}</li>
                                            <li>{{$service->objective5}}</li>
                                            <li>{{$service->objective6}}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4">
                                <div class="tj_main_sidebar">
                                    <div class="sidebar_widget services_list">
                                        <div class="widget_title">
                                            <h3 class="title">All Services</h3>
                                        </div>
                                        <ul>
                                            @foreach($services as $s)
                                                <li class="{{$s->id == $service->id ? 'active' : ''}}">
                                                    <button data-mfp-src="#service-popup-{{$s->id}}" class="service-link modal-popup">
                                                        <i class="flaticon-design"></i>
                                                        {{$s->name}}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="sidebar_widget contact_form">
                                        <div class="widget_title">
                                            <h3 class="title">Get in Touch</h3>
                                        </div>

                                        <form action="#">
                                            <div class="form_group">
                                                <input type="text" name="firstName" id="firstName" placeholder="First Name" autocomplete="off">
                                            </div>
                                            <div class="form_group">
                                                <input type="email" name="semail" id="semail" placeholder="Email" autocomplete="off">
                                            </div>
                                            <div class="form_group">
                                                <textarea name="smessage" id="smessage" placeholder="Your message" autocomplete="off"></textarea>
                                            </div>
                                            <div class="form_btn">
                                                <button class="btn tj-btn-primary" type="submit">Send Message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


{{--
--}}



        <!-- PORTFOLIO SECTION START -->
        <section class="portfolio-section" id="works-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center">
                            <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Recent Works</h2>
                            <p class=" wow fadeInUp" data-wow-delay=".4s">We put your ideas and thus your wishes in the
                                form of a unique web project that inspires you and your customers.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="portfolio-filter text-center wow fadeInUp" data-wow-delay=".5s">
                            <div class="button-group filter-button-group">
                                <button data-filter="*" class="active">All</button>
                                @foreach ($categories as $category)
                                    <button data-filter=".{{ $category }}">{{ ucfirst($category) }}</button>
                                @endforeach
                                <div class="active-bg"></div>
                            </div>
                        </div>

                        <div class="portfolio-box wow fadeInUp" data-wow-delay=".6s">
                            <div class="portfolio-sizer"></div>
                            <div class="gutter-sizer"></div>

                            @foreach ($portfolios as $portfolio)
                                <div class="portfolio-item {{ $portfolio['category'] }}">
                                    <div class="image-box">
                                        <img src="{{ asset('storage/'.$portfolio->image_path) }}" alt="{{ $portfolio['title'] }}">
                                    </div>
                                    <div class="content-box">
                                        <h3 class="portfolio-title">{{ $portfolio['title'] }}</h3>
                                        <p>{{ $portfolio['description'] }}</p>
                                        <i class="flaticon-up-right-arrow"></i>
                                        <button data-mfp-src="#portfolio-modal-{{ $portfolio['id'] }}"
                                                class="portfolio-link modal-popup"></button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- start: Portfolio Popup -->
        @foreach ($portfolios as $portfolio)
            @include('pages.modal', ['portfolio' => $portfolio])
        @endforeach        <!-- end: Portfolio Popup -->




        <!-- PORTFOLIO SECTION END-->
        <!-- RESUME SECTION START -->
        <section class="resume-section" id="resume-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-header wow fadeInUp" data-wow-delay=".3s">
                            <h2 class="section-title">My Experience</h2>
                        </div>

                        <div class="resume-widget">
                            @foreach($experiences as $experice)
                            <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                                <div class="time">
                                    {{$experice->startDate}} - {{$experice->endDate}}
                                </div>
                                <h3 class="resume-title">{{$experice->title}}</h3>
                                <div class="institute">
                                    {{$experice->place}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="section-header wow fadeInUp" data-wow-delay=".4s">
                            <h2 class="section-title">My Education</h2>
                        </div>

                        <div class="resume-widget">
                            @foreach($education as $edu)
                            <div class="resume-item wow fadeInRight" data-wow-delay=".5s">
                                <div class="time">
                                    {{$edu->startDate}} - {{$edu->endDate}}
                                </div>
                                <h3 class="resume-title">{{$edu->title}}</h3>
                                <div class="institute">
                                    {{$edu->place}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- RESUME SECTION END -->

        <!-- SKILLS SECTION START -->
        <section class="skills-section" id="skills-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center">
                            <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Skills</h2>
                            <p class=" wow fadeInUp" data-wow-delay=".4s">We put your ideas and thus your wishes in the
                                form of a unique web project that inspires
                                you
                                and you customers.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="skills-widget d-flex flex-wrap justify-content-center align-items-center">
                            @foreach($skills as $skill)
                            <div class="skill-item wow fadeInUp" data-wow-delay=".3s">
                                <div class="skill-inner">
                                    <div class="icon-box">
                                        <img src="{{asset('storage/'.$skill->image)}}" alt="{{$skill->name}}">
                                    </div>
                                </div>
                                <p>{{$skill->name}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SKILLS SECTION END -->

        <!-- TESTIMONIAL SECTION START -->
        <section class="testimonial-section" id="testimonials-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-header">
                            <h2 class="section-title wow fadeInLeft" data-wow-delay=".3s">My Client's Stories</h2>
                            <p class=" wow fadeInLeft" data-wow-delay=".4s">Empowering people in new a digital journey
                                with my super services</p>
                        </div>
                    </div>

                    <div class="col-lg-7 col-xl-6 offset-xl-1">
                        <div class="testimonials-widget wow fadeInRight" data-wow-delay=".5s">
                            <div class="owl-carousel testimonial-carousel">
                                @foreach($stories as $story)
                                <div class="testimonial-item">
                                    <div class="top-area d-flex flex-wrap justify-content-between">
                                    <div class="icon-box">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                fill="url(#paint0_linear_263_588)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_263_588" x1="-0.0363755"
                                                                y1="-0.0729998" x2="35.3333" y2="-0.0729991"
                                                                gradientUnits="userSpaceOnUse">
                                                    <stop offset="1" stop-color="var(--tj-theme-primary)" />
                                                    <stop offset="1" stop-color="#140C1C" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                fill="url(#paint0_linear_263_589)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_263_589" x1="-0.0363755"
                                                                y1="-0.0729998" x2="35.3333" y2="-0.0729991"
                                                                gradientUnits="userSpaceOnUse">
                                                    <stop offset="1" stop-color="var(--tj-theme-primary)" />
                                                    <stop offset="1" stop-color="#140C1C" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="quote">“{{$story->description}} </p>
                                    <h4 class="name">{{$story->name}}</h4>
                                    <span class="designation">{{$story->jobtitle}}, {{$story->coname}}</span>
                                </div>
                            </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- TESTIMONIAL SECTION END -->

        <!-- BLOG SECTION STAR -->
{{--        <section class="blog-section" id="blog-section">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="section-header text-center">--}}
{{--                            <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Recent Blogs</h2>--}}
{{--                            <p class=" wow fadeInUp" data-wow-delay=".4s">We put your ideas and thus your wishes in the--}}
{{--                                form of a unique web project that inspires--}}
{{--                                you--}}
{{--                                and you customers.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="blog-item wow fadeInUp" data-wow-delay=".5s">--}}
{{--                            <div class="blog-thumb">--}}
{{--                                <a href="{{route('pages.blog')}}">--}}
{{--                                    <img src="assets/img/blog/1.jpg" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="#" class="category">Tutorial</a>--}}
{{--                            </div>--}}

{{--                            <div class="blog-content">--}}
{{--                                <div class="blog-meta">--}}
{{--                                    <ul class="ul-reset">--}}
{{--                                        <li><i class="fa-light fa-calendar-days"></i> Oct 01, 2022</li>--}}
{{--                                        <li><i class="fa-light fa-comments"></i> <a href="#">Comment (0)</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <h3 class="blog-title"><a href="{{route('pages.blog')}}">top 10 ui ux designers</a></h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- BLOG SECTION END -->

        <!-- CONTACT SECTION START -->
        <section class="contact-section" id="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 order-2 order-md-1">
                        <div class="contact-form-box wow fadeInLeft" data-wow-delay=".3s">
                            <div class="section-header">
                                <h2 class="section-title">Let’s work together!</h2>
                                <p>I design and code beautifully simple things and i love what i do. Just simple like
                                    that!
                                </p>
                            </div>

                            <div class="tj-contact-form">
                                <form action="{{route('submitmessage')}}"  method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-sm-6">
                                            <div class="form_group">
                                                <input type="text" name="firstName" id="firstName" placeholder="First name"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form_group">
                                                <input type="text" name="lastName" id="lastName" placeholder="Last name"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form_group">
                                                <input type="email" name="email" id="email" placeholder="Email address"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form_group">
                                                <input type="tel" name="phone" id="phone" placeholder="Phone number"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form_group">
                                                <select name="service" id="service" class="tj-nice-select">
                                                    <option value="" selected disabled>Choose Service</option>
                                                    <option value="Design">Web Design</option>
                                                    <option value="Development">Web Development</option>
                                                    <option value="uxui">UI/UX Design</option>
                                                    <option value="app">App Design</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form_group">
                                                <textarea name="message" id="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form_btn">
                                                <button type="submit" class="btn tj-btn-primary">Send Message</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1 col-md-5  d-flex flex-wrap align-items-center  order-1 order-md-2">
                        @foreach($ContactInfo as $info)
                        <div class="contact-info-list">
                            <ul class="ul-reset">
                                <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                                    data-wow-delay=".4s">
                                    <div class="icon-box">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="text-box">
                                        <p>Phone</p>
                                        <a href="">{{$info->phone}}</a>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                                    data-wow-delay=".5s">
                                    <div class="icon-box">
                                        <i class="flaticon-mail-inbox-app"></i>
                                    </div>
                                    <div class="text-box">
                                        <p>Email</p>
                                        <a href="mailto:{{$info->email}}">{{$info->email}}</a>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                                    data-wow-delay=".6s">
                                    <div class="icon-box">
                                        <i class="flaticon-location"></i>
                                    </div>
                                    <div class="text-box">
                                        <p>Address</p>
                                        <a href="#">{{$info->address}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTACT SECTION END -->
    </main>

@stop


