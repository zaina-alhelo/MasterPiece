<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable = ['title', 'content','description', 'category_id', 'image'];
       public function category()
{
    return $this->belongsTo(Blog_Category::class);
}

}
