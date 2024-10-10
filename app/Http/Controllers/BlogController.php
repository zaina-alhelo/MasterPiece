<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $blogs = Blog::all();
        return view('Dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Blog_Category::all(); 
        
        return view('Dashboard.blogs.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:blog__categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); 
        $filename = time() . '.' . $extension;
        $path = 'uploads/blogs/'; 
        $file->move(public_path($path), $filename);

        $imagePath = $path . $filename;     
    }
    Blog::create([
      'title' => $request->title,
      'content' => $request->content,
      'category_id' => $request->category_id,
      'image' => $imagePath,
  ]);
      return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');

    }


  public function show($id)
{
    $blog = Blog::findOrFail($id); 
    return view('Dashboard.blogs.show', compact('blog')); 
}

public function edit($id)
{
    $blog = Blog::findOrFail($id);
    $categories = Blog_Category::all(); 
    return view('Dashboard.blogs.edit', compact('blog', 'categories'));
}


   public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:blog__categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $blog = Blog::findOrFail($id);
    
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->category_id = $request->category_id;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/blogs/';
        $file->move(public_path($path), $filename);

        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->image = $path . $filename;
    }

    $blog->save();

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $blog = Blog::findOrFail($id);

    if ($blog->image && file_exists(public_path($blog->image))) {
        unlink(public_path($blog->image));
    }

    $blog->delete();

    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
}

}
