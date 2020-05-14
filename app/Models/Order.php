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


    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function paymentdetail()
    {
        return $this->hasOne(PaymentDetail::class, 'id');
    }
}
