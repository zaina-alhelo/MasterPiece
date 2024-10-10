@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Category</h5>

                    <!-- Category Creation Form -->
                    <form method="POST" action="{{ route('categories_blog.store') }}" enctype="multipart/form-data" id="categoryForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="category_name" class="col-sm-2 col-form-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" 
                                       name="category_name" 
                                       id="category_name" 
                                       class="form-control" 
                                       value="{{ old('category_name') }}" 
                                       placeholder="Enter category name">
                                @if ($errors->has('category_name'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('category_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_description" class="col-sm-2 col-form-label">Category Description</label>
                            <div class="col-sm-10">
                                <textarea name="category_description" 
                                          id="category_description" 
                                          class="form-control" 
                                          style="height: 100px" 
                                          placeholder="Describe the category...">{{ old('category_description') }}</textarea>
                                @if ($errors->has('category_description'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('category_description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Category Image</label>
                            <div class="col-sm-10">
                                <input type="file" 
                                       name="image" 
                                       id="image" 
                                       class="form-control"
                                       accept="image/jpeg,image/png,image/jpg">
                                @if ($errors->has('image'))
                                    <span class="text-danger"><li><i class="bi bi-exclamation-circle"></i> {{ $errors->first('category_image') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
