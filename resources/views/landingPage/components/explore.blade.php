<!-- Explore Tour Start -->
<div class="container-fluid ExploreTour py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">استكشف الوصفات</h5>
            <h1 class="mb-4">عالم الوصفات المتنوعة</h1>
            <p class="mb-0">استمتع بتجربة مجموعة متنوعة من الوصفات الشهية من جميع أنحاء العالم، تم إعدادها بعناية لتلبي ذوقك وتثري مائدتك!</p>
        </div>

        <div class="tab-class text-center">
            <div class="tab-content">
                <div id="NationalTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4" id="recipeContainer">
                        @foreach($recipes as $recipe)
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="{{ asset($recipe->recipeImages->first()->res_images) }}" 
                                     style="height: 300px; width: 100%; object-fit: cover;" 
                                     alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">{{ $recipe->recipe_name }}</h5>
                                        <a href="{{ route('landing.recipes.show', $recipe->id) }}" class="btn-hover text-white">View Recipe <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Explore Tour End -->
