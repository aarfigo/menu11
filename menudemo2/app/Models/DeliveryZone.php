<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryZone extends Model
{
    protected $fillable = ['name', 'cost', 'is_active'];
    protected $casts = [
        'cost' => 'float',
        'is_active' => 'boolean',
    ];

    public $timestamps = true;
}
