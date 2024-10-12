<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogShowController extends Controller
{


      public function index()
    {
        $blogs = Blog::all();
        return view('landingPage.pages.blogs.index', compact('blogs'));
    }
      public function show($id)
    {
        $blog = Blog::findOrFail($id); 
        return view('landingPage.pages.blogs.blog_show', compact('blog'));
    }
}
