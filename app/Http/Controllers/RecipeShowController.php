<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeShowController extends Controller
{
        public function index() {
    $categories = Category::all(); 
        $recipes = Recipe::with(['category', 'recipeImages'])->limit(6)->get();

    return view('landingPage.pages.recipe_cat.index', compact('categories', 'recipes'));
}
public function show($id) {
    $category = Category::findOrFail($id);
    $recipes = Recipe::with('recipeImages')->where('category_id', $id)->get(); 

    return view('landingPage.pages.recipe_cat.show', compact('category', 'recipes'));
}

public function recipe($id)
{
    $recipe = Recipe::with('category', 'recipeImages')->findOrFail($id);
        $recipes = Recipe::with(['category', 'recipeImages'])->limit(6)->get();

    return view('landingPage.pages.recipe.show', compact('recipe','recipes'));
}
}   
