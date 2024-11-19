@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Category</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_description" class="form-label">Category Description</label>
                            <textarea class="form-control" id="category_description" name="category_description">{{ old('category_description', $category->category_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave blank to keep the current image.</small>
                        </div>

                        @if($category->image)
                        <div class="mb-3">
                            <label class="form-label">Current Image:</label><br>
                            <img src="{{ asset($category->image) }}" alt="Category Image" style="max-width: 200px; height: auto;">
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Update Category</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
