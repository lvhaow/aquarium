@php
    $events = App\Models\Event::latest()
        ->limit(4)
        ->get();
        
@endphp

<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">02 - Event</span>
                    <h2 class="title">Upcoming Events</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">
            @foreach ($events as $item)
                <div class="col">
                    <div class="work__process__item">
                        <span
                            class="work__process_step">{{ \Carbon\Carbon::parse($item->start_date)->format('F j, Y g:i A') }}</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset($item->event_image) }}" alt="">
                            <img class="dark" src="{{ asset($item->event_image) }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title"> {{ $item->name }} </h4>
                            
                            <p>{!! Str::limit($item->description, 100) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="blog__button text-center">
            <a data-scroll href="#booking" class="btn">Booking Event</a>
           </div>
    </div>
</section>
