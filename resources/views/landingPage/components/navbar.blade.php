    <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <!-- <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>Travela</h1> -->
                    <img src="{{asset('images/logo.png')}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{url('/')}}" class="nav-item nav-link active">الصفحة الرئيسية</a>
                        <a href="" class="nav-item nav-link">About</a>
                        <a href="{{route('landing.recipe_cat.index')}}" class="nav-item nav-link">وصفات</a>
                        <a href="{{route('landing.blog_cat.index')}}" class="nav-item nav-link">مقالات</a>
                        <a href="" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="destination.html" class="dropdown-item">Destination</a>
                                <a href="tour.html" class="dropdown-item">Explore Tour</a>
                                <a href="booking.html" class="dropdown-item">Travel Booking</a>
                                <a href="gallery.html" class="dropdown-item">Our Gallery</a>
                                <a href="guides.html" class="dropdown-item">Travel Guides</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="{{route('contactUS')}}" class="nav-item nav-link">تواصل معنا</a>
                    </div>
                    <a href="" class="btn btn-success rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
                </div>
            </nav>


        <!-- Navbar & Hero End -->