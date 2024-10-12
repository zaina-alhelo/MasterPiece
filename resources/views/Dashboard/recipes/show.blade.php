@extends('Dashboard.master')

@section('content')
<div class="container">
    <h1>Recipe Details</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $recipe->recipe_name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Category:</strong> {{ optional($recipe->category)->category_name }}</p>
            <p><strong>Ingredients:</strong> {!! $recipe->ingredients !!}</p>
            <p><strong>Description:</strong> {!! $recipe->recipe_description !!}</p>

            <h5>Images:</h5>
            <div class="row">
                @foreach ($recipe->recipeImages as $image)
                    <div class="col-md-3">
                        <img src="{{ asset($image->res_images) }}" alt="{{ $recipe->recipe_name }}" class="img-fluid img-thumbnail mb-2" style="height: 150px;">
                    </div>
                @endforeach
            </div>

            <a href="{{ route('recipes.index') }}" class="btn btn-primary mt-3">Back to Recipes List</a>
        </div>
    </div>
</div>
@endsection
