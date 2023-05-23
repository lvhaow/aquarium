@php
$bookings = App\Models\Booking::latest()->get();
$events = App\Models\Event::latest()->limit(4)->get();
@endphp

<section class="homeContact" id="booking">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">05 - Booking</span>
                        <h2 class="title">Aquarium Booking</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>Welcome to Aquarium, your one-stop booking platform for all things aquarium-related</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">info@aquarium.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('booking.store') }}">
                            @csrf
                            <select name="event_id" class="form-select form-select-lg mb-5" aria-label=".form-select-lg example">
                                            <option selected="">Select Event</option>
                                            @foreach ($events as $item)
                                                <option value="{{$item->id}}"> {{$item->name}} </option>
                                            @endforeach
                                        </select>
                            <input name="name" type="text" placeholder="Name*">
                            <input name="email" type="email" placeholder="Enter mail*">
                            <input name="phone_number" type="number" placeholder="Enter number*">
                            <input name="number_of_tickets" type="text" placeholder="number of tickets*">
                            <textarea name="description" id="description" placeholder="Enter Description*"></textarea>
                            <button type="submit">Send Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
