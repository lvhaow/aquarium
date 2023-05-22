<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Gallery</span>
                    <h2 class="title">Discover the Enchanting Beauty of Marine Life</h2>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-content" id="portfolioTabContent">

        @php
            $gallery = App\Models\Gallery::latest()->get();
        @endphp


        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="graphic-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach ($gallery as $item)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($item->gallery_image) }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $item->gallery_name }}</span>
                                        <h4 class="title"><a
                                                href=" {{ route('gallery.details', $item->id) }} ">{{ $item->gallery_title }}</a>
                                        </h4>
                                        <a href="{{ route('gallery.details', $item->id) }}" class="link">Read More</a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
