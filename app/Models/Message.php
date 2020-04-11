<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content',
        'id_to',
        'id_from',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
