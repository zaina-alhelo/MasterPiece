@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")


<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">مقالات صحية</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">مقالات</li>
        </ol>    
    </div>
</div>
ن




<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="mb-3">مقالاتنا</h2>
        <p class="lead">Discover our latest articles and updates</p>
    </div>
    
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{!! Str::limit($blog->description, 100) !!}</p>
                        <a href="{{ route('landing.blogs.show', $blog->id) }}" class="btn btn-success mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

@include("landingPage.components.footer")
