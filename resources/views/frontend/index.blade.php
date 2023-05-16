@extends('frontend.main_master')
@section('main')
@section('title')
    Home | EasyLearning Website
@endsection
<!-- banner-area -->
@include('frontend.home_all.home_slide')
<!-- banner-area-end -->

<!-- about-area -->
@include('frontend.home_all.home_about')
<!-- about-area-end -->

<!-- services-area -->
{{-- <section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img
                                src="{{ asset('frontend/assets/img/images/services_img01.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon01.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon01.png') }}"
                                alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">Business Strategy</a></h3>
                        <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking
                            plan.</p>
                        <ul class="services__list">
                            <li>Research & Data</li>
                            <li>Branding & Positioning</li>
                            <li>Business Consulting</li>
                            <li>Go To Market</li>
                        </ul>
                        <a href="services-details.html" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img
                                src="{{ asset('frontend/assets/img/images/services_img02.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon02.png') }}"
                                alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">Brand Strategy</a></h3>
                        <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking
                            plan.</p>
                        <ul class="services__list">
                            <li>User Research & Testing</li>
                            <li>UX Design</li>
                            <li>Visual Design</li>
                            <li>Information Architecture</li>
                        </ul>
                        <a href="services-details.html" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img
                                src="{{ asset('frontend/assets/img/images/services_img03.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon03.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon03.png') }}"
                                alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">Product Design</a></h3>
                        <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking
                            plan.</p>
                        <ul class="services__list">
                            <li>User Research & Testing</li>
                            <li>UX Design</li>
                            <li>Visual Design</li>
                            <li>Information Architecture</li>
                        </ul>
                        <a href="services-details.html" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img
                                src="{{ asset('frontend/assets/img/images/services_img04.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light"
                                src="{{ asset('frontend/assets/img/icons/services_light_icon04.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon04.png') }}"
                                alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                        <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking
                            plan.</p>
                        <ul class="services__list">
                            <li>User Research & Testing</li>
                            <li>UX Design</li>
                            <li>Visual Design</li>
                            <li>Information Architecture</li>
                        </ul>
                        <a href="services-details.html" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html"><img
                                src="{{ asset('frontend/assets/img/images/services_img03.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light"
                                src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon02.png') }}"
                                alt="">
                        </div>
                        <h3 class="title"><a href="services-details.html">Web Development</a></h3>
                        <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking
                            plan.</p>
                        <ul class="services__list">
                            <li>User Research & Testing</li>
                            <li>UX Design</li>
                            <li>Visual Design</li>
                            <li>Information Architecture</li>
                        </ul>
                        <a href="services-details.html" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- services-area-end -->

<!-- work-process-area -->
{{-- Event --}}
@include('frontend.home_all.home_event')

{{-- Event End --}}
<!-- work-process-area-end -->

<!-- portfolio-area -->

@include('frontend.home_all.gallery')

<!-- portfolio-area-end -->

<!-- partner-area -->
{{-- <section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light01.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_01.png') }}"
                            alt="">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light02.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_02.png') }}"
                            alt="">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light03.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_03.png') }}"
                            alt="">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light04.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_04.png') }}"
                            alt="">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light05.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_05.png') }}"
                            alt="">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/partner_light06.png') }}"
                            alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/partner_06.png') }}"
                            alt="">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                    </div>
                    <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile apps
                        in different industries and verticals. Eventually, I decided that it would be a fun challenge to
                        try designing and building my own.</p>
                    <a href="contact.html" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- partner-area-end -->

<!-- testimonial-area -->

<!-- testimonial-area-end -->

<!-- blog-area -->
@include('frontend.home_all.home_blog')
<!-- blog-area-end -->

<!-- contact-area -->
{{-- feedback --}}

@include('frontend.home_all.home_feedback')
{{-- feedback End --}}
<!-- contact-area-end -->
@endsection
