@extends('Dashboard.master')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Recipe</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        <div class="mb-3">
                            <label for="recipe_name" class="form-label">Recipe Name</label>
                            <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="{{ old('recipe_name', $recipe->recipe_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="recipe_description" class="form-label">Recipe Description</label>
                            <textarea class="form-control" id="summernote-description" name="recipe_description">{{ old('recipe_description', $recipe->recipe_description) }}</textarea>
                        </div>
<div class="form-group">
    <label for="ingredients">Ingredients</label>
    <textarea name="ingredients" id="summernote-ingredients" class="form-control" rows="5" required>{{ $recipe->ingredients }}</textarea>
    @error('ingredients')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="field_images" class="form-label">Upload Images</label>
                            <input type="file" class="form-control" id="field_images" name="field_images[]" multiple>
                            <small class="form-text text-muted">You can upload multiple images.</small>
                        </div>

                        @if($recipe->recipeImages->count() > 0)
                        <div class="mb-3">
                            <label class="form-label">Current Images:</label><br>
                            @foreach ($recipe->recipeImages as $image)
                                <div style="display: inline-block; margin-right: 10px;">
                                    <img src="{{ asset($image->res_images) }}" alt="Recipe Image" style="max-width: 200px; height: auto;"><br>
                                    <label>
                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                        Delete
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Update Recipe</button>
                        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
$(document).ready(function() {
    $('#summernote-ingredients').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        lang: 'ar', 
        direction: 'rtl' ,
    });

    $('#summernote-description').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['fullscreen', 'help']]
        ],
        lang: 'ar',
        direction: 'rtl' 
    });
});
</script>
