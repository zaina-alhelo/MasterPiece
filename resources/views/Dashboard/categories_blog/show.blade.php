@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Category Details</h5>
                    
                    <!-- Category Card -->
                    <div class="card mb-3">
                        <div class="row g-0">
                            <!-- Category Image -->
                            <div class="col-md-4">
                                @if($category->image)
                                    <img src="{{ asset($category->image) }}" class="img-fluid rounded-start" alt="Category Image">
                               @endif
                            </div>

                            <!-- Category Details -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->category_name }}</h5>
                                    <p class="card-text">
                                        <strong>Created at:</strong> {{ $category->created_at->format('d M Y') }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Description:</strong> 
                                        {{ $category->category_description ? $category->category_description : 'No description available.' }}
                                    </p>
                                

                                    <!-- Buttons for Edit and Back -->
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('categories_blog.edit', $category->id) }}" class="btn btn-primary me-2">Edit Category</a>
                                        <a href="{{ route('categories_blog.index') }}" class="btn btn-secondary">Back to Categories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
