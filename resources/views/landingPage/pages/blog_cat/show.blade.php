@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">مقالات</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">مقالات</li>
        </ol>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-4">{{ $category->category_name }}</h2>

    @if($blogs->isEmpty())
        <p class="text-center">لا توجد مقالات في هذه الفئة حتى الآن.</p>
    @else
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="image-container">
                            <img src="{{ asset($blog->image) }}" class="card-img-top blog-image" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                            <a href="{{ route('landing.blogs.show', $blog->id) }}" class="btn btn-primary">عرض المدونة</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include("landingPage.components.footer")


