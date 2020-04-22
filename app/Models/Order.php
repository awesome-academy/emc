<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id_user',
        'id_product',
        'total_price',
        'payment_detail_id',
        'status',
    ];

    const PENDING = 1;
    const CONFIRM = 2;
    const CANCEL = 3;


    public function orderdetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function paymendetail()
    {
        return $this->hasOne(PaymenDetail::class, 'id', 'payment_detail_id');
    }
}
