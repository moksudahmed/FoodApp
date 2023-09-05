<?php
// app/Models/DeliveryDriver.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryDriver extends Model
{
    protected $fillable = [
        'name', 'phone_number', 'email', 'vehicle_info',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id');
    }
}
