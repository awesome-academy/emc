<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = 'order_details';
    protected $fillable = [
        'id_order',
        'id_product',
        'name_product',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
