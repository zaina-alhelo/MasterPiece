<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Res_images;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class RecipeController extends Controller
{
  
    public function index()
    {
           $recipes = Recipe::with('recipeImages')->get(); 
        return view('Dashboard.recipes.index', compact('recipes'));
    }

    public function create()
    {$categories = Category::all(); 
        return view('Dashboard.recipes.create', compact('categories'));

    }


public function store(Request $request)
{
    
    $request->validate([
        'recipe_name' => 'required|string|max:255',
        'recipe_description' => 'nullable|string',
        'ingredients' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'field_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $recipe = Recipe::create([
        'recipe_name' => $request->recipe_name,
        'recipe_description' => $request->recipe_description,
        'ingredients' => $request->ingredients, 

        'category_id' => $request->category_id,
    ]);

    if ($request->hasFile('field_images')) {
        foreach ($request->file('field_images') as $file) {
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/recipes_images'), $filename);
            Res_images::create([
                'res_images' => 'uploads/recipes_images/' . $filename,
                'res_id' => $recipe->id, 
            ]);
        }
    }

    return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'recipe_name' => 'required|string|max:255',
        'recipe_description' => 'nullable|string',
        'ingredients' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'field_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $recipe = Recipe::findOrFail($id);
    $recipe->recipe_name = $request->recipe_name;
    $recipe->recipe_description = $request->recipe_description;
     $recipe->ingredients = $request->ingredients;
    $recipe->category_id = $request->category_id;
    $recipe->save();

    if ($request->hasFile('field_images')) {
        foreach ($request->file('field_images') as $file) {
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/recipes_images'), $filename);

            Res_images::create([
                'res_images' => 'uploads/recipes_images/' . $filename,
                'res_id' => $recipe->id,
            ]);
        }
    }
       if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
            $image = Res_images::find($imageId);
            if ($image) {
                $image->delete();
            }
        }
        
    }
    return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
}

  
public function show($id)
{
    $recipe = Recipe::with('category', 'recipeImages')->findOrFail($id);
    return view('Dashboard.recipes.show', compact('recipe'));
}


 public function edit($id)
{
    $recipe = Recipe::findOrFail($id);
    $categories = Category::all(); 
    return view('Dashboard.recipes.edit', compact('recipe', 'categories')); // Pass both to the view
}


public function destroy($id)
{
    $recipe = Recipe::findOrFail($id);

    $recipe->delete();

    return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
}


}
