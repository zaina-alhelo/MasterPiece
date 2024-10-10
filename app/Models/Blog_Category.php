<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog_Category extends Model
{
    use HasFactory , SoftDeletes;
       protected $guarded=[];

    public function blogs()
{
    return $this->hasMany(Blog::class);
}

}
