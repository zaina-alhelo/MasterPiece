
        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5 ">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
  <a href="" class="navbar-brand p-0">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" class="mb-5" style="width: 100px;">
                </a>        <a href="https://maps.app.goo.gl/foBZf2CKf4Z53bG69" target="_blank"><i class="fas fa-home me-2"></i> مركز الغذاء المثالي</a>
                            <a href="mailto:zainaalhelo00@gmail.com"><i class="fas fa-envelope me-2"></i>Rubaalhelo@gmail.com</a>
                            <a href="tel:+962123456789"><i class="fas fa-phone me-2"></i> +962 123 456 789</a>
                            <div class="d-flex align-items-center mt-2">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-success rounded-circle mx-1"  href="https://www.facebook.com/rubaalhelo23?mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-success rounded-circle mx-1" href="https://www.instagram.com/dietitian.rubaalhelo?igsh=MTFiM2o1NXZjd2MwbQ==" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-success rounded-circle mx-1" href="https://www.linkedin.com/in/rubaalhelo?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
              <div class="col-md-6 col-lg-6 col-xl-3 rtl" >
        <div class="footer-item d-flex flex-column">
            <h4 class="mb-4 text-white">تعرف أكثر</h4>
            <a href="{{route('aboutUs')}}"> <i class="fas fa-angle-left me-2"></i> من نحن  </a>
            <a href=""> <i class="fas fa-angle-left me-2"></i> قصص النجاح  </a>
            <a href="">  <i class="fas fa-angle-left me-2"></i> آراء مراجعينا    </a>
            <a href="{{route('contactUS')}}">  <i class="fas fa-angle-left me-2"></i> تواصل معنا  </a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-xl-3 rtl">
        <div class="footer-item d-flex flex-column">
            <h4 class="mb-4 text-white">صفحات مفيدة</h4>
            <a href="{{route('product_check')}}"> <i class="fas fa-angle-left me-2"></i> شّيك منتجك  </a>
            <a href="{{route('landing.recipe_cat.index')}}"><i class="fas fa-angle-left me-2"></i> وصفات صحية  </a>
            <a href="{{route('landing.blog_cat.index')}}">  <i class="fas fa-angle-left me-2"></i>  مقالات صحية  </a>
            <a href="{{route('bmi')}}">  <i class="fas fa-angle-left me-2"></i> مؤشر كتلة الجسم </a>
            <a href="{{route('delayNeed')}}"> <i class="fas fa-angle-left me-2"></i> الأحتياج اليومي  </a>
            <a href="{{route('idealWeight')}}"> <i class="fas fa-angle-left me-2"></i> الوزن المثالي  </a>
        </div>
    </div>
                    
                     <div class="col-md-6 col-lg-6 col-xl-3">
            
<div class="footer-item d-flex flex-column rtl">
    <h4 class="mb-4 text-white"> أخر المقالات </h4>
@foreach($blogs_footer as $blog)
    <div class="mb-3">
        <a href="{{ route('landing.blogs.show', $blog->id) }}   " class="d-flex align-items-center text-white text-decoration-none">
            <div style="flex-shrink: 0; width: 70px; height: 70px; overflow: hidden; border-radius: 8px; background-color: #ddd; transition: transform 0.3s;">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;">
            </div>
            <div class="ms-3">
                <strong class="d-block" style="font-size: 1rem; font-weight: bold; line-height: 1.2;">  <i class="fas fa-angle-left me-1"> {{ $blog->title }}</i> </strong>
                <small class="text-muted" style="font-size: 0.85rem;">
                        <i class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}
                    </small> <br>
                    
            </div>
        </a>
    </div>
@endforeach

</div>


</div>


                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">WikiDiet</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">

                        Designed By <a class="text-white" href="">Zaineh Al-Helo</a> 
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-success btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets_land/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets_land/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets_land/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_land/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets_land/js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>