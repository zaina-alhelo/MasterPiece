<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
            $categories = Category::all();
    return view('Dashboard.categories_res.index', compact('categories'));
    }

    public function create()
    {
        return view('Dashboard.categories_res.create');

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
        $path = 'uploads/categories_res/'; 
        $file->move(public_path($path), $filename);

        $imagePath = $path . $filename;     
    }

    Category::create([
        'category_name' => $request->category_name,
        'category_description' => $request->category_description,
        'image' => isset($imagePath) ? $imagePath : null, 
    ]);

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}


public function show($id)
{
    $category = Category::find($id);
    return view('Dashboard.categories_res.show', compact('category'));
}


public function edit($id)
{
    $category = Category::find($id);
    return view('Dashboard.categories_res.edit', compact('category'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $category = Category::find($id);

    // Handle file upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/categories_res/';
        $file->move(public_path($path), $filename);

        $category->image = $path . $filename; 
    }

    $category->update([
        'category_name' => $request->category_name,
        'category_description' => $request->category_description,
        'image' => $category->image, 
    ]);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

public function destroy($id)
{
    $category = Category::find($id);
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

}
