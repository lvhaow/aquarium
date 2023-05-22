@php 

  $allMultiImage = App\Models\MultiImage::all();
@endphp
@extends('frontend.main_master')
@section('main')

  <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Gallery Page</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach ($allMultiImage as $item)
                        <li><img src="{{ asset($item->multi_image) }}" alt="" width="120"></li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- portfolio-area -->
            <section class="portfolio__inner">
                <div class="container">
                    
                    <div class="portfolio__inner__active">

                    	@foreach($gallery as $item)
                        <div class="portfolio__inner__item grid-item cat-two cat-three">
                            <div class="row gx-0 align-items-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__thumb">
                                        <a href="portfolio-details.html">
       <img src="{{ asset($item->gallery_image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__content">
 <h2 class="title"><a href="{{ route('gallery.details',$item->id)}}">{{$item->gallery_title}}</a></h2>
                                <p>{!! Str::limit($item->gallery_description, 200) !!}  </p>
            <a href="{{ route('gallery.details',$item->id)}}" class="link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                         
                      
                    </div>
                     
                </div>
            </section>
            <!-- portfolio-area-end -->


            <!-- contact-area -->
            @include('frontend.home_all.home_feedback')
            <!-- contact-area-end -->

        </main>


@endsection