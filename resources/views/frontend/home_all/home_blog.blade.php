@php
$animals = App\Models\Animal::latest()->limit(3)->get();
@endphp


<section class="blog">
               <div class="container">
                   <div class="row gx-0 justify-content-center">
                    <div class="row justify-content-center">

                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title">03 - Animal</span> <br>
                            </div>
                        </div>
                    </div>

   @foreach($animals as $item)
   <div class="col-lg-4 col-md-6 col-sm-9">
       <div class="blog__post__item">
           <div class="blog__post__thumb">
               <a href="blog-details.html"><img src="{{ asset($item->animal_image) }} " alt=""></a>
               <div class="blog__post__tags">
     <a href="blog.html">{{ $item['category']['animal_category'] }}</a>
               </div>
           </div>
           <div class="blog__post__content">
               <span class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span>
               <h3 class="title"><a href="#"> {{ $item->animal_title }} </a></h3>
               <a href="#" class="read__more">Read mORe</a>
           </div>
       </div>
   </div>
   @endforeach
    
                     
                   </div>
                   <div class="blog__button text-center">
                       <a href="blog.html" class="btn">more blog</a>
                   </div>
               </div>
           </section>