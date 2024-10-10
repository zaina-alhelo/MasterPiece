<?php

namespace App\Http\Controllers;

use App\Models\Blog_Category;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    
    public function index()
    {
                    $categories = Blog_Category::all();
    return view('Dashboard.categories_blog.index', compact('categories'));
    }

    public function create()
    {
         return view('Dashboard.categories_blog.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); 
        $filename = time() . '.' . $extension;
        $path = 'uploads/categories_blog/'; 
        $file->move(public_path($path), $filename);

        $imagePath = $path . $filename;     
    }

    Blog_Category::create([
        'category_name' => $request->category_name,
        'category_description' => $request->category_description,
        'image' => isset($imagePath) ? $imagePath : null, // Save the image path
    ]);

    return redirect()->route('categories_blog.index')->with('success', 'Category created successfully.');
}


public function show($id)
{
    $category = Blog_Category::find($id);
    return view('Dashboard.categories_blog.show', compact('category'));
}

 
public function edit($id)
{
    $category = Blog_Category::find($id);
    return view('Dashboard.categories_blog.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $category = Blog_Category::find($id);
     
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/categories_blog/';
        $file->move(public_path($path), $filename);

        $category->image = $path . $filename; 
    }

    $category->update([
        'category_name' => $request->category_name,
        'category_description' => $request->category_description,
        'image' => $category->image, 
    ]);

    return redirect()->route('categories_blog.index')->with('success', 'Category updated successfully.');
}


public function destroy($id)
{
    $category = Blog_Category::find($id);
    $category->delete();

    return redirect()->route('categories_blog.index')->with('success', 'Category deleted successfully.');
}
}
