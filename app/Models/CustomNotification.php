<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomNotification extends Model
{
    use HasFactory;

    protected $table = 'custom_notifications'; 
    protected $keyType = 'string';
    public $incrementing = false; 

    protected $fillable = [
        'id',
        'type',
        'notifiable_id',
        'notifiable_type',
        'message_id',
        'sender_id',  
        'message_content', 
        'read_at',
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }
}
