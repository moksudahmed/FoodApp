<?php
// app/Models/PaymentTransaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = [
        'order_id', 'payment_date', 'amount', 'payment_method',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
