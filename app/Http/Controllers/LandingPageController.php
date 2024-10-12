<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
      public function index()
    {
    $blogs = Blog::with('category')->get();
        $recipes = Recipe::with(['category', 'recipeImages'])->limit(6)->get();
         $categories = Category::all();

        return view('landingpage.landingpage', compact('blogs','recipes', 'categories'));
    }
} 
