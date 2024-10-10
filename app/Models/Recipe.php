<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory,SoftDeletes;
        protected $fillable = ['recipe_name', 'recipe_description', 'ingredients','category_id'];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }
       public function recipeImages()
    {
        return $this->hasMany(Res_images::class, 'res_id'); 
    }
}
