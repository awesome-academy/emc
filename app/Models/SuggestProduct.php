<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestProduct extends Model
{
	protected $table = 'suggest_products';
    protected $fillable = [
        'name_product',
        'image',
        'description',
        'status',
        'id_user',
    ];

    const UNCONFIRM = 1;
    const CONFIRM = 2;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
