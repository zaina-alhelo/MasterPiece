<?php

namespace App\Http\Controllers;

use App\Models\Blog_Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class CategoryShowController extends Controller
{
    public function index() {
    $categories = Blog_Category::all(); 
    return view('landingPage.pages.blog_cat.index', compact('categories'));
}
public function show($id) {
    $category = Blog_Category::findOrFail($id);
    $blogs = Blog::where('category_id', $id)->get(); 
    return view('landingPage.pages.blog_cat.show', compact('category', 'blogs'));
}


}
