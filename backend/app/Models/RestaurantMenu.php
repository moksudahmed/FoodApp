<?php

// app/Models/RestaurantMenu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    protected $table = 'restaurant_menus';

    protected $fillable = [
        'restaurant_id', 'name', 'description', 'price', 'category',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
