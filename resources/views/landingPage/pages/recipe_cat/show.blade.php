@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">وصفات</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">وصفات</li>
        </ol>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-4">{{ $category->category_name }}</h2>

    @if($recipes->isEmpty())
        <p class="text-center">لا توجد وصفات في هذه الفئة حتى الآن.</p>
    @else
        <div class="row">
            @foreach ($recipes as $recipe)
          <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="image-container">
                            <img src="{{ asset($recipe->recipeImages->first()->res_images) }}" class="card-img-top blog-image" alt="" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->recipe_name }}</h5>
                            <p class="card-text">{!! Str::limit($recipe->recipe_description, 100) !!}</p>
                            <a href="{{ route('landing.recipes.show', $recipe->id) }}" class="btn btn-success">عرض المدونة</a>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
    @endif
</div>

@include("landingPage.components.footer")


