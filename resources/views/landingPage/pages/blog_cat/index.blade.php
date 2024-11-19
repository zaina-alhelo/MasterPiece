@extends('land_page')
@section('title', 'مقالات ')

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">مقالات صحية</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active text-white">مقالات</li>
        </ol>
    </div>
</div>
<section class="bg-light" >

    <div class="container py-5 bg-light ">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 position-relative text-center" style="overflow: hidden;">
                        <img src="{{ asset($category->image) }}" class="img-fluid" alt="{{ $category->category_name }}" style="height: 300px; width: 100%; object-fit: cover;">
                        
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-white" style="background: rgba(0, 0, 0, 0.5);">
                            <h4 class="card-title mb-3 text-white">{{ $category->category_name }}</h4>
                            <a href="{{ route('landing.blog_cat.show', $category->id) }}" class="btn btn-success">عرض المزيد</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
@endsection


