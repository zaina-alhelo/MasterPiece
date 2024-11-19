<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function loadFooterContent()
    {
        $blogs_footer = Blog::latest()->take(3)->get();

        return view('landingPage.components.footer', compact('blogs_footer'));
    }
}
