@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $recipe->recipe_name }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">{{ $recipe->category->category_name }}</li>
        </ol>    
    </div>
</div>

<!-- Recipe Show Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <!-- Display the first recipe image -->
                @if($recipe->recipeImages->isNotEmpty())
                    <img src="{{ asset($recipe->recipeImages->first()->res_images) }}" class="card-img-top" alt="{{ $recipe->recipe_name }}">
                @else
                    <img src="{{ asset('path/to/default/image.jpg') }}" class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body rtl">
                    <h2 class="card-title">{{ $recipe->recipe_name }}</h2>
                    <p class="text-muted">
                        <i class="fa fa-tag me-2"></i>{{ $recipe->category->category_name }}
                        <span class="mx-2">|</span> 
                        <i class="fa fa-calendar-alt me-2"></i>{{ $recipe->created_at->format('M d, Y') }}
                    </p>
                    <p class="card-text">{!! $recipe->recipe_description !!}</p>
                    <div class="content">
                        <h5>المكونات</h5>
                        <p>{!! $recipe->ingredients !!}</p> 
                    </div>
                    <a href="{{ route('landing.recipe_cat.show', $recipe->category->id) }}" class="btn btn-success">العودة إلى الوصفات</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recipe Show End -->

@include("landingPage.components.footer")
