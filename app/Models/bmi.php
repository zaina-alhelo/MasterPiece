<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bmi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'weight', 'height', 'bmi','gender', 'bmi_change_percentage', 'age_group'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
