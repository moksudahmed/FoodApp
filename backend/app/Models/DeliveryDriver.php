<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryDriver extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', // Add other fields here
    ];

    // Define relationships
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
