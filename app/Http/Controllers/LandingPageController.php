<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
      public function index()
    {
    $blogs = Blog::with('category')->get();
        return view('landingpage.landingpage', compact('blogs'));
    }
} 
