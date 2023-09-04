<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    protected $fillable = [
        'restaurant_id', 'name', 'description', 'price', // Add other fields here
    ];

    // Define relationships
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
