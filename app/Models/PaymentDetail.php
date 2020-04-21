<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'desc',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
