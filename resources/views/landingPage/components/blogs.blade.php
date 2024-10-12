<!-- Blogs Start -->
<div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Blogs</h5>
            <h1 class="mb-0">Latest Blogs</h1>
        </div>
        <div class="packages-carousel owl-carousel">
            @foreach($blogs as $blog)
            <div class="packages-item">
                <div class="packages-img">
                    <img src="{{ asset($blog->image) }}" class="img-fluid w-100 rounded-top" alt="{{ $blog->title }}">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-tag me-2"></i>{{ $blog->category->category_name }}
                        </small>
                        <small class="flex-fill text-center py-2">
                            <i class="fa fa-calendar-alt me-2"></i>{{ $blog->created_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">{{ $blog->title }}</h5>
                        <p class="mb-4">{!! $blog->description !!}</p>
                    </div>
                    <div class="row bg-success rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                          <a href="{{ route('landing.blogs.show', $blog->id) }}" class="btn-hover btn text-white py-2 px-4">Read More</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blogs End -->



<!-- Packages Start -->
<!-- <div class="container-fluid packages py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Packages</h5>
            <h1 class="mb-0">Awesome Packages</h1>
        </div>
        <div class="packages-carousel owl-carousel">
            <div class="packages-item">
                <div class="packages-img">
                    <img src="assets_land/img/packages-4.jpg" class="img-fluid w-100 rounded-top" alt="Image">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-map-marker-alt me-2"></i>Venice - Italy
                        </small>
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-calendar-alt me-2"></i>3 days
                        </small>
                        <small class="flex-fill text-center py-2">
                            <i class="fa fa-user me-2"></i>2 Person
                        </small>
                    </div>
                    <div class="packages-price py-2 px-4">$349.00</div>
                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">Venice - Italy</h5>
                        <small class="text-uppercase">Hotel Deals</small>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt nemo quia quae illum aperiam fugiat voluptatem repellat</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4">Read More</a>
                        </div>
                        <div class="col-6 text-end px-0">
                            <a href="#" class="btn-hover btn text-white py-2 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div> -->
<!-- Packages End -->
