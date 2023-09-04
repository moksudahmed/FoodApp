<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = [
        'code', 'discount_amount', 'expiration_date', // Add other fields here
    ];

    // No relationships defined for this model
}
