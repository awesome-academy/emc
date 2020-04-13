<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestProduct extends Model
{
	protected $table = 'suggest_products';
    protected $fillable = [
        'name_product',
        'description',
        'status',
        'id_user',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
