<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeShowController extends Controller
{
        public function index() {
    $categories = Category::all(); 
    return view('landingPage.pages.recipe_cat.index', compact('categories'));
}
public function show($id) {
    $category = Category::findOrFail($id);
    $recipes = Recipe::where('category_id', $id)->get(); 
               $recipes = Recipe::with('recipeImages')->get(); 

    return view('landingPage.pages.recipe_cat.show', compact('category', 'recipes'));
}
public function recipe($id)
{
    $recipe = Recipe::with('category', 'recipeImages')->findOrFail($id);
    return view('landingPage.pages.recipe.show', compact('recipe'));
}
}
