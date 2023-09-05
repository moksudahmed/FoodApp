<?php 

// app/Models/OrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'menu_id', 'quantity', 'unit_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(RestaurantMenu::class);
    }
}
