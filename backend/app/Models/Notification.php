<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'message', 'is_read', // Add other fields here
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
