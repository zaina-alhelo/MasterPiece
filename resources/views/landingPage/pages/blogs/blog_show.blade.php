@include("landingPage.components.head")
@include("landingPage.components.spinner")
@include("landingPage.components.topbar")
@include("landingPage.components.navbar")

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $blog->title }}</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">{{$blog->category->category_name  }}</li>
        </ol>    
    </div>
</div>

<!-- Blog Show Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                <div class="card-body rtl">
                    <h2 class="card-title">{{ $blog->title }}</h2>
                    <p class="text-muted">
                        <i class="fa fa-tag me-2"></i>{{ $blog->category->category_name }}
                        <span class="mx-2">|</span> 
                        <i class="fa fa-calendar-alt me-2"></i>{{ $blog->created_at->format('M d, Y') }}
                    </p>
                    <p class="card-text">{!! $blog->description  !!}</p>
                    <div class="content">
                        <h5>محتوى المقال</h5>
                        <p>    {!! $blog->content !!} </p> 
                    </div>
                    <a href="{{ route('landing.blog_cat.show', $blog->category->id) }}" class="btn btn-success">العودة إلى المقالات</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Show End -->

@include("landingPage.components.footer")