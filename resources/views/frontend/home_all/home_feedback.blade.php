<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Booking</span>
                        <h2 class="title">Aquarium Booking</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>Welcome to Aquarium, your one-stop booking platform for all things aquarium-related</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}">
                            @csrf
                            <input name="name" type="text" placeholder="Enter name*">
                            <input name="email" type="email" placeholder="Enter mail*">
                            <input name="phone" type="number" placeholder="Enter number*">
                            <textarea name="message" id="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
