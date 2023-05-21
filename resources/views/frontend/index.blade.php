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



<!-- work-process-area -->
{{-- Event --}}
@include('frontend.home_all.home_event')

{{-- Event End --}}
<!-- work-process-area-end -->

<!-- portfolio-area -->

@include('frontend.home_all.gallery')

<!-- portfolio-area-end -->


<!-- testimonial-area -->

<!-- testimonial-area-end -->

<!-- blog-area -->
@include('frontend.home_all.home_blog')
<!-- blog-area-end -->

<!-- contact-area -->
{{-- feedback --}}

{{-- @include('frontend.home_all.home_feedback') --}}
@include('frontend.home_all.home_booking')
{{-- feedback End --}}
<!-- contact-area-end -->
@endsection
